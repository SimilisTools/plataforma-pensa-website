FROM toniher/nginx-php:nginx-1.10-php-5.6

ARG MEDIAWIKI_VERSION=1.23
ARG MEDIAWIKI_FULL_VERSION=1.23.15
ARG MYSQL_HOST=127.0.0.1
ARG MYSQL_DATABASE=mediawiki
ARG MYSQL_USER=mediawiki
ARG MYSQL_PASSWORD=mediawiki
ARG MYSQL_PREFIX=mw_
ARG MW_PASSWORD=prova
ARG MW_SCRIPTPATH=/w
ARG MW_WIKILANG=en
ARG MW_WIKINAME=Test
ARG MW_WIKIUSER=WikiSysop
ARG MW_EMAIL=hello@localhost
ARG DOMAIN_NAME=localhost
ARG PROTOCOL=http://

# https://www.mediawiki.org/keys/keys.txt
RUN gpg --keyserver hkp://keyserver.ubuntu.com:80 --recv-keys \
	441276E9CCD15F44F6D97D18C119E1A64D70938E \
	41B2ABE817ADD3E52BDA946F72BC1C5D23107F8A \
	162432D9E81C1C618B301EECEE1F663462D84F01 \
	1D98867E82982C8FE0ABC25F9B69B3109D3BB7B0 \
	3CEF8262806D3F0B6BA1DBDD7956EE477F901A30 \
	280DB7845A1DCAC92BB5A00A946B02565DC00AA7

RUN MEDIAWIKI_DOWNLOAD_URL="https://releases.wikimedia.org/mediawiki/$MEDIAWIKI_VERSION/mediawiki-$MEDIAWIKI_FULL_VERSION.tar.gz"; \
	set -x; \
	mkdir -p /var/www/w \
	&& curl -fSL "$MEDIAWIKI_DOWNLOAD_URL" -o mediawiki.tar.gz \
	&& curl -fSL "${MEDIAWIKI_DOWNLOAD_URL}.sig" -o mediawiki.tar.gz.sig \
	&& gpg --verify mediawiki.tar.gz.sig \
	&& tar -xf mediawiki.tar.gz -C /var/www/w --strip-components=1

COPY composer.json /var/www/w

RUN set -x; echo "Host is $MYSQL_HOST"

COPY nginx-default.conf /etc/nginx/conf.d/default.conf
# Adding extra domain name
RUN sed -i "s/localhost/localhost $DOMAIN_NAME/" /etc/nginx/conf.d/default.conf

# Starting processes
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

COPY LocalSettings.local.php /var/www/w

# Forcing Invalidate cache
ARG CACHE_INSTALL=2016-11-01

RUN cd /var/www/w; php maintenance/install.php \
		--dbname "$MYSQL_DATABASE" \
		--dbpass "$MYSQL_PASSWORD" \
		--dbserver "$MYSQL_HOST" \
		--dbtype mysql \
		--dbprefix "$MYSQL_PREFIX" \
		--dbuser "$MYSQL_USER" \
		--installdbpass "$MYSQL_PASSWORD" \
		--installdbuser "$MYSQL_USER" \
		--pass "$MW_PASSWORD" \
		--scriptpath "$MW_SCRIPTPATH" \
		--lang "$MW_WIKILANG" \
"${MW_WIKINAME}" "${MW_WIKIUSER}"


# Addding extra stuff to LocalSettings
RUN echo "\n\
enableSemantics( '${DOMAIN_NAME}' );\n\
include_once \"\$IP/LocalSettings.local.php\"; " >> /var/www/w/LocalSettings.php

RUN cd /var/www/w; composer update --no-dev;

RUN rm -rf /var/www/images; mkdir -p  /var/www/w/images

# Process extensions

RUN cd /var/www/w/extensions \
	&& curl -fSL https://extdist.wmflabs.org/dist/extensions/Arrays-REL1_23-261b2d8.tar.gz -o /tmp/Arrays.tar.gz \
	&& curl -fSL https://extdist.wmflabs.org/dist/extensions/SemanticInternalObjects-REL1_23-021b137.tar.gz -o /tmp/SemanticInternalObjects.tar.gz \
	&& curl -fSL https://extdist.wmflabs.org/dist/extensions/Widgets-REL1_23-e30386c.tar.gz -o /tmp/Widgets.tar.gz \
	&& curl -fSL https://extdist.wmflabs.org/dist/extensions/Lockdown-REL1_23-d08bcd8.tar.gz -o /tmp/Lockdown.tar.gz \
	&& curl -fSL https://github.com/wikimedia/mediawiki-extensions-PageForms/archive/4.0.2.tar.gz -o /tmp/PageForms.tar.gz

RUN mkdir -p /var/www/w/extensions/Arrays; tar -xf /tmp/Arrays.tar.gz -C /var/www/w/extensions/Arrays --strip-components=1
RUN mkdir -p /var/www/w/extensions/SemanticInternalObjects; tar -xf /tmp/SemanticInternalObjects.tar.gz -C /var/www/w/extensions/SemanticInternalObjects --strip-components=1
RUN mkdir -p /var/www/w/extensions/Widgets; tar -xf /tmp/Widgets.tar.gz -C /var/www/w/extensions/Widgets --strip-components=1
RUN mkdir -p /var/www/w/extensions/Lockdown; tar -xf /tmp/Lockdown.tar.gz -C /var/www/w/extensions/Lockdown --strip-components=1
RUN mkdir -p /var/www/w/extensions/PageForms; tar -xf /tmp/PageForms.tar.gz -C /var/www/w/extensions/PageForms --strip-components=1


RUN rm -f /tmp/*tar.gz

RUN chown -R www-data:www-data /var/www/w

# Let's put images here
VOLUME /var/www/w/images

RUN cd /var/www/w; php maintenance/update.php

# Update Semantic MediaWiki
RUN cd /var/www/w; php extensions/SemanticMediaWiki/maintenance/rebuildData.php -ftpv
RUN cd /var/www/w; php extensions/SemanticMediaWiki/maintenance/rebuildData.php -v

RUN cd /var/www/w; php maintenance/runJobs.php


CMD ["/usr/bin/supervisord"]

