<?php

/* https://www.lawebdelprogramador.com/foros/PHP/1586981-Crear-usuarios-Active-Directory-con-PHP.html */
## From form

$CN = "Test";

$givenName = "Test";

$SN = "Test";

$mail = "test@ltu.sld.cu";

$Phone = "323635";

$pwdtxt = "123456";

 

$AD_server = "ldap://192.168.1.3";  //******* Sin SSL:   ldap_add(): Add: Server is unwilling to perform

$AD_server = "ldaps://192.168.1.3"; //******* Con SSL:   ldap_bind(): Unable to bind to server: Can't contact LDAP server


$AD_Auth_User = 'CN=administrador,CN=Users,DC=local,DC=com'; //Administrative user

$AD_Auth_PWD = "Pasword"; //The password


$dn = 'CN='.$CN.',CN=Users,DC=local,DC=com';


## Create Unicode password

$newPassword = "\"" . $pwdtxt . "\"";


## Crear contraseña Unicode

## Supone que la contraseña dada está en la codificación UTF-8!

## Ajústelo a la codificación real de la contraseña


$len = strlen($newPassword);

$newPassw = "";


for($i=0;$i<$len;$i++) {

    $newPassw .= "{$newPassword{$i}}\000";

}


## CONNNECT TO AD

$ds = ldap_connect($AD_server) or die('No se puede conectar al server ldap');

if ($ds) {

     ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3); // IMPORTANT

     ldap_set_option($ds, LDAP_OPT_X_TLS_REQUIRE_CERT, LDAP_OPT_X_TLS_NEVER);

	

     $r = ldap_bind($ds, $AD_Auth_User, $AD_Auth_PWD); //BIND


    $ldaprecord['cn'] = $CN;

    $ldaprecord['givenName'] = $givenName;

    $ldaprecord['sn'] = $SN;

    $ldaprecord['objectclass'][0] = "top";

    $ldaprecord['objectclass'][1] = "person";

    $ldaprecord['objectclass'][1] = "organizationalPerson";

    $ldaprecord['objectclass'][2] = "user";

    $ldaprecord['mail'] = $mail;

    $ldaprecord['telephoneNumber'] = $Phone;

    $ldaprecord["unicodePwd"] = $newPassw;

    $ldaprecord["sAMAccountName"] = $CN;

    $ldaprecord["UserAccountControl"] = "512";


    $r = ldap_add($ds, $dn, $ldaprecord);

    var_dump($r);

} else {

    echo "cannot connect to LDAP server at $AD_server.";

}


?>