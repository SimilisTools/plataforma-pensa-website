<?php

#LDAP configuration below

require_once( "$IP/extensions/LdapAuthentication/LdapAuthentication.php" );
$wgAuth = new LdapAuthenticationPlugin();

$wgLDAPDomainNames = array(
  'plataforma-pensa'
);

$wgLDAPServerNames = array(
  'plataforma-pensa' => 'domain'
);

$wgLDAPUseLocal = true;

$wgLDAPPort = array(
  'plataforma-pensa' => 389,
);

$wgLDAPEncryptionType = array(
  'plataforma-pensa' => 'clear'
);

#$wgLDAPDisableAutoCreate = array(
#  'plataforma-pensa' => true
#);

$wgLDAPSearchAttributes = array(
  'plataforma-pensa' => 'mail'
);

$wgLDAPBaseDNs = array(
  'plataforma-pensa' => 'dc=plataforma-pensa,dc=site'
);

$wgLDAPUserBaseDNs = array( 
  'plataforma-pensa' => 'ou=Users,dc=plataforma-pensa,dc=site'
);

$wgLDAPGroupUseFullDN = array( "plataforma-pensa"=>true );

$wgLDAPSearchStrings = array("plataforma-pensa"=>"USER-NAME@plataforma-pensa");

$wgLDAPProxyAgent = array(
  'plataforma-pensa' => 'agent@plataforma-pensa'
);

$wgLDAPProxyAgentPassword = array(
  'plataforma-pensa' => 'passwd'
);

#$wgLDAPLowerCaseUsername = array(
#       'plataforma-pensa' => true
#);

$wgLDAPUseLDAPGroups = array( "plataforma-pensa"=>true );

$wgLDAPDebug = 3;

$wgLDAPGroupsUseMemberOf = array( "plataforma-pensa" => true );

//The objectclass of the groups we want to search for
// $wgLDAPGroupObjectclass = array( "plataforma-pensa"=>"group" );

//The attribute used for group members
// $wgLDAPGroupAttribute = array( "plataforma-pensa"=>"member" );

//The naming attribute of the group
// $wgLDAPGroupNameAttribute = array( "plataforma-pensa"=>"cn" );


#$wgLDAPRequiredGroups = array( "plataforma-pensa"=> array( "OU=*Generic users,DC=plataforma-pensa,DC=site" ) );

$wgLDAPPreferences = array( "plataforma-pensa"=>array( "email"=>"mail","realname"=>"cn") );

