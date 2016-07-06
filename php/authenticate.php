<?php
// Initialize session
session_start();
 
function authenticate($user, $password) {
	if(empty($user) || empty($password)) return false;
 
	// Active Directory server
	$ldap_host = "helpdesk.net";
 
	//Active Directory's  Organisation Unit, Domain Controller
	$ldap_dn = "OU=Users,DC=helpdesk,DC=net";
 
	// Active Directory user group
	$ldap_user_group = "ASL";
 
	
 
	// Domain, for purposes of constructing $user
	$ldap_usr_dom = '@helpdesk.net';
 
	// connect to active directory
	$ldap = ldap_connect($ldap_host,389);
 
	// verify user and password
	if($bind = @ldap_bind($ldap, $user.$ldap_usr_dom, $password)) {
		return true;
	} else {
		// invalid name or password
		return false;
	}
}
?>