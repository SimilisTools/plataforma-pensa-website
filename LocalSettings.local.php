<?php

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

# Extensions
require_once "$IP/extensions/Arrays/Arrays.php";
require_once "$IP/extensions/PageForms/PageForms.php";
require_once "$IP/extensions/Lockdown/Lockdown.php";
require_once "$IP/extensions/SemanticInternalObjects/SemanticInternalObjects.php";

# Semantic MediaWiki stuff

$GLOBALS['smwgPageSpecialProperties'] = array( '_MDAT', '_CDAT', '_LEDT' );
$sfgRenameEditTabs = true;
$wgGroupPermissions['*']['viewedittab'] = false;
$wgGroupPermissions['sysop']['viewedittab'] = true;

$smwgLinksInValues = true;

