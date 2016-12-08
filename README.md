t# plataforma-pensa-website
Repository for storing configuration of Plataforforma Pensa website


* Parameters are stored in plataforma-pensa.sh script.
* A MariaDB and a NGINX based PHP images are created.
* sh plataforma-pensa.sh for starting the process.
* Finally, run: docker run -p PORT:80 --name plataforma-pensa -d plataforma-pensa (where PORT number to be used in the host)
