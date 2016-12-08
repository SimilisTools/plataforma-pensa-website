<?php

# Locale of website
$wgLanguageCode = "ca";

ini_set( 'max_execution_time', 1000 );
ini_set('memory_limit', '-1');

$wgEnableUploads = true;
$wgUseInstantCommons = true;

$wgPFEnableStringFunctions = true;
$wgRestrictDisplayTitle = false; 
$wgAllowExternalImages = true;

# Clean URL
$wgScriptPath       = "";
$wgArticlePath      = "/$1";
$wgUsePathInfo      = true;
$wgScriptExtension  = ".php";

# Skin
$wgDefaultSkin='chameleon';
#$egChameleonLayoutFile= __DIR__ . '/skins/plataforma/layouts/plataforma.xml';
#$egChameleonExternalStyleModules = array(       __DIR__."/skins/plataforma/styles/main.less" => $wgScriptPath."/skins/plataforma/styles" );
#\Bootstrap\BootstrapManager::getInstance()->addCacheTriggerFile( __DIR__ . '/skins/plataforma/styles/main.less' );
#require_once "$IP/skins/plataforma/components/ToolbarHorizontal_plataforma.php";

# Namespaces for Platform
define("NS_PONENT", 200);
define("NS_PONENT_TALK", 201);
define("NS_LLOC", 202);
define("NS_LLOC_TALK", 203);
define("NS_ACTE", 204);
define("NS_ACTE_TALK", 205);
define("NS_RECURS", 206);
define("NS_RECURS_TALK", 207);
define("NS_ENTITAT", 208);
define("NS_ENTITAT_TALK", 209);
define("NS_APUNT", 210);
define("NS_APUNT_TALK", 211);
define("NS_PREMSA", 212);
define("NS_PREMSA_TALK", 213);
$wgExtraNamespaces[NS_PONENT] = "Ponent";
$wgExtraNamespaces[NS_PONENT_TALK] = "Ponent_Discussió";
$wgExtraNamespaces[NS_LLOC] = "Lloc";
$wgExtraNamespaces[NS_LLOC_TALK] = "Lloc_Discussió";
$wgExtraNamespaces[NS_ACTE] = "Acte";
$wgExtraNamespaces[NS_ACTE_TALK] = "Acte_Discussió";
$wgExtraNamespaces[NS_RECURS] = "Recurs";
$wgExtraNamespaces[NS_RECURS_TALK] = "Recurs_Discussió";
$wgExtraNamespaces[NS_ENTITAT] = "Entitat";
$wgExtraNamespaces[NS_ENTITAT_TALK] = "Entitat_Discussió";
$wgExtraNamespaces[NS_APUNT] = "Apunt";
$wgExtraNamespaces[NS_APUNT_TALK] = "Apunt_Discussió";
$wgExtraNamespaces[NS_PREMSA] = "Premsa";
$wgExtraNamespaces[NS_PREMSA_TALK] = "Premsa_Discussió";

$wgContentNamespaces = array( NS_MAIN, NS_PONENT, NS_LLOC, NS_ACTE, NS_RECURS, NS_APUNT, NS_PREMSA );

# Default permissions
$wgGroupPermissions['*']['createaccount'] = false;
$wgGroupPermissions['*']['read'] = true;
$wgGroupPermissions['*']['edit'] = false;
$wgGroupPermissions['*']['upload'] = false;
$wgGroupPermissions['*']['reupload'] = false;
$wgGroupPermissions['user']['edit'] = true;
$wgGroupPermissions['*']['createpage'] = false;
$wgGroupPermissions['user']['createpage'] = true;
$wgGroupPermissions['*']['delete'] = false;
$wgGroupPermissions['user']['delete'] = true;
$wgGroupPermissions['*']['move'] = false;
$wgGroupPermissions['user']['move'] = true;
$wgGroupPermissions['user']['upload'] = true;
$wgGroupPermissions['user']['reupload'] = false;
$wgGroupPermissions['editor']['edit'] = true;
$wgGroupPermissions['editor']['upload'] = true;
$wgGroupPermissions['editor']['reupload'] = true;
$wgGroupPermissions['editor']['move'] = true;

# Extensions
require_once "$IP/extensions/Arrays/Arrays.php";
require_once "$IP/extensions/PageForms/PageForms.php";
require_once "$IP/extensions/Lockdown/Lockdown.php";
require_once "$IP/extensions/SemanticInternalObjects/SemanticInternalObjects.php";

# Namespace and extra permissions
$wgNamespacePermissionLockdown = array_fill( 0, 300, array( 'delete' => array( 'sysop' ) ) );
$wgNamespacePermissionLockdown = array_fill( 0, 300, array( 'move' => array( 'sysop' ) ) );
$wgNamespacePermissionLockdown = array_fill( 0, 300, array( 'edit' => array( 'sysop' ) ) );
$wgNamespacePermissionLockdown = array_fill( 0, 300, array( 'createpage' => array( 'sysop' ) ) );

$wgNamespacePermissionLockdown[NS_MAIN]['*'] = array('sysop');
$wgNamespacePermissionLockdown[NS_MAIN]['read'] = array('*');
$wgNamespacePermissionLockdown[NS_MAIN]['edit'] = array('sysop', 'editor');
$wgNamespacePermissionLockdown[NS_MAIN]['createpage'] = array('sysop', 'editor');
$wgNamespacePermissionLockdown[NS_MAIN]['source'] = array('sysop', 'editor');

$wgNamespacePermissionLockdown[NS_CATEGORY]['*'] = array('sysop');
$wgNamespacePermissionLockdown[NS_CATEGORY]['read'] = array('user');
$wgNamespacePermissionLockdown[NS_CATEGORY]['edit'] = array('sysop');
$wgNamespacePermissionLockdown[NS_CATEGORY]['createpage'] = array('sysop');
$wgNamespacePermissionLockdown[NS_CATEGORY]['source'] = array('sysop');

$wgNamespacePermissionLockdown[NS_TEMPLATE]['*'] = array('sysop');
$wgNamespacePermissionLockdown[NS_TEMPLATE]['read'] = array('sysop');
$wgNamespacePermissionLockdown[NS_TEMPLATE]['edit'] = array('sysop');
$wgNamespacePermissionLockdown[NS_TEMPLATE]['createpage'] = array('sysop');

$wgNamespacePermissionLockdown[SF_NS_FORM]['*'] = array('sysop');
$wgNamespacePermissionLockdown[SF_NS_FORM]['read'] = array('sysop', 'editor');
$wgNamespacePermissionLockdown[SF_NS_FORM]['edit'] = array('sysop');
$wgNamespacePermissionLockdown[SF_NS_FORM]['createpage'] = array('sysop');


$wgNamespacePermissionLockdown[NS_PONENT]['*'] = array('sysop');
$wgNamespacePermissionLockdown[NS_PONENT]['read'] = array('*');
$wgNamespacePermissionLockdown[NS_PONENT]['edit'] = array('sysop', 'editor');
$wgNamespacePermissionLockdown[NS_PONENT]['createpage'] = array('sysop', 'editor');

$wgNamespacePermissionLockdown[NS_LLOC]['*'] = array('sysop', 'editor');
$wgNamespacePermissionLockdown[NS_LLOC]['read'] = array('*');
$wgNamespacePermissionLockdown[NS_LLOC]['edit'] = array('sysop', 'editor');
$wgNamespacePermissionLockdown[NS_LLOC]['createpage'] = array('sysop', 'editor');

$wgNamespacePermissionLockdown[NS_ENTITAT]['*'] = array('sysop');
$wgNamespacePermissionLockdown[NS_ENTITAT]['read'] = array('*');
$wgNamespacePermissionLockdown[NS_ENTITAT]['edit'] = array('sysop', 'editor');
$wgNamespacePermissionLockdown[NS_ENTITAT]['createpage'] = array('sysop', 'editor');

$wgNamespacePermissionLockdown[NS_APUNT]['*'] = array('sysop');
$wgNamespacePermissionLockdown[NS_APUNT]['read'] = array('*');
$wgNamespacePermissionLockdown[NS_APUNT]['edit'] = array('sysop', 'editor');
$wgNamespacePermissionLockdown[NS_APUNT]['createpage'] = array('sysop', 'editor');

$wgNamespacePermissionLockdown[NS_RECURS]['*'] = array('sysop', 'user');
$wgNamespacePermissionLockdown[NS_RECURS]['read'] = array('*');
$wgNamespacePermissionLockdown[NS_RECURS]['edit'] = array('sysop', 'user');
$wgNamespacePermissionLockdown[NS_RECURS]['createpage'] = array('sysop', 'user');
$wgNamespacePermissionLockdown[NS_RECURS]['move'] = array('user');
$wgNamespacePermissionLockdown[NS_RECURS]['delete'] = array('user');

$wgNamespacePermissionLockdown[NS_ACTE]['*'] = array('sysop');
$wgNamespacePermissionLockdown[NS_ACTE]['read'] = array('*');
$wgNamespacePermissionLockdown[NS_ACTE]['edit'] = array('sysop', 'editor');

$wgNamespacePermissionLockdown[NS_PREMSA]['*'] = array('sysop');
$wgNamespacePermissionLockdown[NS_PREMSA]['read'] = array('*');
$wgNamespacePermissionLockdown[NS_PREMSA]['edit'] = array('sysop', 'editor');


$wgSpecialPageLockdown['Recentchanges'] = array('sysop');
$wgSpecialPageLockdown['DoubleRedirects'] = array('sysop');
$wgSpecialPageLockdown['Disambiguations'] = array('sysop');
$wgSpecialPageLockdown['Userlogin'] = array('*');
$wgSpecialPageLockdown['Userlogout'] = array('*');
$wgSpecialPageLockdown['Upload'] = array('sysop', 'sysop');
$wgSpecialPageLockdown['Imagelist'] = array('sysop');
$wgSpecialPageLockdown['Newimages'] = array('sysop');
$wgSpecialPageLockdown['Listusers'] = array('sysop');
$wgSpecialPageLockdown['Statistics'] = array('sysop');
$wgSpecialPageLockdown['Randompage'] = array('sysop');
$wgSpecialPageLockdown['Lonelypages'] = array('sysop');
$wgSpecialPageLockdown['Uncategorizedpages'] = array('sysop');
$wgSpecialPageLockdown['Uncategorizedcategories'] = array('sysop');
$wgSpecialPageLockdown['Uncategorizedimages'] = array('sysop');
$wgSpecialPageLockdown['Uncategorizedtemplates'] = array('sysop');
$wgSpecialPageLockdown['Unusedcategories'] = array('sysop');
$wgSpecialPageLockdown['Unusedimages'] = array('sysop');
$wgSpecialPageLockdown['Unusedtemplates'] = array('sysop');
$wgSpecialPageLockdown['Wantedpages'] = array('sysop');
$wgSpecialPageLockdown['Wantedcategories'] = array('sysop');
$wgSpecialPageLockdown['Mostlinked'] = array('sysop');
$wgSpecialPageLockdown['Mostlinkedcategories'] = array('sysop');
$wgSpecialPageLockdown['Mostlinkedtemplates'] = array('sysop');
$wgSpecialPageLockdown['Mostcategories'] = array('sysop');
$wgSpecialPageLockdown['Mostimages'] = array('sysop');
$wgSpecialPageLockdown['Mostrevisions'] = array('sysop');
$wgSpecialPageLockdown['Fewestrevisions'] = array('sysop');
$wgSpecialPageLockdown['Shortpages'] = array('sysop');
$wgSpecialPageLockdown['Longpages'] = array('sysop');
$wgSpecialPageLockdown['Newpages'] = array('sysop');
$wgSpecialPageLockdown['Ancientpages'] = array('sysop');
$wgSpecialPageLockdown['Deadendpages'] = array('sysop');
$wgSpecialPageLockdown['Protectedpages'] = array('sysop');
$wgSpecialPageLockdown['Allpages'] = array('sysop');
$wgSpecialPageLockdown['Prefixindex'] = array('sysop');
$wgSpecialPageLockdown['Ipblocklist'] = array('sysop');
$wgSpecialPageLockdown['Specialpages'] = array('sysop');
$wgSpecialPageLockdown['Contributions'] = array('sysop');
$wgSpecialPageLockdown['Emailuser'] = array('sysop');
$wgSpecialPageLockdown['Whatlinkshere'] = array('sysop');
$wgSpecialPageLockdown['Recentchangeslinked'] = array('sysop');
$wgSpecialPageLockdown['Movepage'] = array('sysop');
$wgSpecialPageLockdown['Blockme'] = array('sysop');
$wgSpecialPageLockdown['Booksources'] = array('sysop');
$wgSpecialPageLockdown['Categories'] = array('sysop');
$wgSpecialPageLockdown['Export'] = array('sysop');
$wgSpecialPageLockdown['Version'] = array('sysop', 'sysop');
$wgSpecialPageLockdown['Allmessages'] = array('sysop');
$wgSpecialPageLockdown['Log'] = array('sysop');
$wgSpecialPageLockdown['Blockip'] = array('sysop');
$wgSpecialPageLockdown['Undelete'] = array('sysop');
$wgSpecialPageLockdown['Import'] = array('sysop');
$wgSpecialPageLockdown['Lockdb'] = array('sysop');
$wgSpecialPageLockdown['Unlockdb'] = array('sysop');
$wgSpecialPageLockdown['Userrights'] = array('sysop');
$wgSpecialPageLockdown['MIMEsearch'] = array('sysop');
$wgSpecialPageLockdown['Unwatchedpages'] = array('sysop');
$wgSpecialPageLockdown['Listredirects'] = array('sysop');
$wgSpecialPageLockdown['Revisiondelete'] = array('sysop');
$wgSpecialPageLockdown['Randomredirect'] = array('sysop');
$wgSpecialPageLockdown['Mypage'] = array('*');
$wgSpecialPageLockdown['Mytalk'] = array('*');
$wgSpecialPageLockdown['Mycontributions'] = array('*');
$wgSpecialPageLockdown['Listadmins'] = array('sysop');
$wgSpecialPageLockdown['Popularpages'] = array('sysop');
$wgSpecialPageLockdown['Search'] = array('*');
$wgSpecialPageLockdown['Resetpass'] = array('*');
$wgSpecialPageLockdown['Withoutinterwiki'] = array('sysop');


# Enable UserFunctions in Main Namespace
$wgUFAllowedNamespaces[NS_MAIN] = true;
$wgUFAllowedNamespaces[NS_ACTE] = true;
$wgUFAllowedNamespaces[NS_APUNT] = true;
$wgUFEnableSpecialContexts = true;

# Semantic MediaWiki stuff

$GLOBALS['smwgPageSpecialProperties'] = array( '_MDAT', '_CDAT', '_LEDT' );
$sfgRenameEditTabs = true;
$wgGroupPermissions['*']['viewedittab'] = false;
$wgGroupPermissions['sysop']['viewedittab'] = true;

$smwgLinksInValues = true;

# We could push globals below in a extension
$GLOBALS['smwgNamespacesWithSemanticLinks'] = array(
        NS_MAIN => true,
        NS_TALK => false,
        NS_USER => true,
        NS_USER_TALK => false,
        NS_PROJECT => true,
        NS_PROJECT_TALK => false,
        NS_IMAGE => true,
        NS_IMAGE_TALK => false,
        NS_MEDIAWIKI => false,
        NS_MEDIAWIKI_TALK => false,
        NS_TEMPLATE => false,
        NS_TEMPLATE_TALK => false,
        NS_HELP => true,
        NS_HELP_TALK => false,
        NS_PONENT => true,
        NS_PONENT_TALK => false,
        NS_LLOC => true,
        NS_LLOC_TALK => false,
        NS_ACTE => true,
        NS_ACTE_TALK => false,
        NS_RECURS => true,
        NS_RECURS_TALK => false,
        NS_ENTITAT => true,
        NS_ENTITAT_TALK => false,
        NS_APUNT => true,
        NS_APUNT_TALK => false,
        NS_PREMSA => true,
        NS_PREMSA_TALK => false
);



