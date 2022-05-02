<?php
/**
 * Formato conexion via LDAP 
 * 
 * @Autor: Luis Estrada 
 * @Fecha Creacion: 01/03/2022
 * @Fecha Revision:
*/

require_once("config.php");

 mailboxpowerloginrd('tecnico','Pulgoso22');

function mailboxpowerloginrd($user,$pass){
  // Datos de acceso al servidor LDAP
	  $ldaprdn = trim($user).'@'.DOMINIO; 
    $ldappass = trim($pass);  
    $ds = DOMINIO; 
    $dn = DN;  
    $basedn ="dc=ip,dc=gob,dc=hn";
    $puertoldap = 389; 
    $group = 'SomeGroup';

    // Atributo para incorporar en la respuesta
    $displayAttr = "cn";
    // Respuesta por defecto
    $status = 1;
    $msg = "";
    $userDisplayName = "null";
    $user_n = "null";
    $name = "null";
    $description = "null";
    $group= "null";
    $level=  "null";

  $host = 'ldap';
  $domain = 'ip.gob.hn';


// Establecer la conexión con el servidor LDAP
    $ad = ldap_connect("ldap://{$host}.{$domain}") or die('Could not connect to LDAP server.');
    $ldapconn = ldap_connect($ds,$puertoldap) or die("No se pudo conectar al servidor LDAP.");

    // Autenticar contra el servidor LDAP
      ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION,3); 
      ldap_set_option($ldapconn, LDAP_OPT_REFERRALS,0); 
      $ldapbind = @ldap_bind($ldapconn, $ldaprdn, $ldappass); 
      echo "- Prueba de LDAP -";

      $userdn = getDN($ldapconn, $user, $basedn);
      if (checkGroupEx($ldapconn, $userdn, getDN($ldapconn, $group, $basedn))) {
      //if (checkGroup($ad, $userdn, getDN($ad, $group, $basedn))) {
          echo "----You're authorized as xD ".getCN($userdn)."--------";
      } else {
          echo '----Authorization failed ;( -----';
      }

      ldap_unbind($ad);




      /* 
      Este es un ejemplo de cómo consultar un servidor LDAP e imprimir todas las entradas.
       */
    if ($ldapbind){
        /*  echo  $filter; */
        // En caso de éxito, recuperar los datos del usuario
        $sr = @ldap_search($ldapconn, $dn, "cn=*"); 
        /*  echo  $sr; */
        $ldapResults = @ldap_get_entries($ldapconn, $sr); 


        for ($item = 0; $item < $ldapResults['count']; $item++)
        {
          for ($attribute = 0; $attribute < $ldapResults[$item]['count']; $attribute++)
          {
            $data = $ldapResults[$item][$attribute];
            echo $data.":&nbsp;&nbsp;".$ldapResults[$item][$data][0]."<br>";
          }
          echo '<hr />';
        } 

	  }else{ 
        $array=0;
           // Si falla la autenticación, retornar un msj de error
        $msg = "<script> alert('Usuario o clave incorrecta. Vuelva a digitarlos por favor.'); window.location.href='../views/login.php'; </script>";
      } 

  ldap_close($ldapconn); 

	return $msg;
} 


/* Funciones para verificar la membresía del grupo y algunas otras que pueden ser útiles para trabajar con LDAP (Active Directory en este ejemplo). 
https://www.php.net/manual/en/ref.ldap.php#99347
*/

/*
*Esta función busca en el árbol LDAP ($ad -Identificador de enlace LDAP)
* entrada especificada por samaccountname y devuelve su DN o epmty
* cadena en caso de falla.
*/
function getDN($ad, $samaccountname, $basedn) {
  $attributes = array('dn');
  $result = ldap_search($ad, $basedn,
      "(samaccountname={$samaccountname})", $attributes);
  if ($result === FALSE) { return ''; }
  $entries = ldap_get_entries($ad, $result);
  if ($entries['count']>0) { return $entries[0]['dn']; }
  else { return ''; };
}

/*
* Esta función recupera y devuelve CN de DN dado
*/
function getCN($dn) {
  preg_match('/[^,]*/', $dn, $matchs, PREG_OFFSET_CAPTURE, 3);
  return $matchs[0][0];
}

/*
* Esta función verifica la pertenencia al grupo del usuario, buscando solo
* en el grupo especificado (no recursivamente).
*/
function checkGroup($ad, $userdn, $groupdn) {
  $attributes = array('members');
  $result = ldap_read($ad, $userdn, "(memberof={$groupdn})", $attributes);
  if ($result === FALSE) { return FALSE; };
  $entries = ldap_get_entries($ad, $result);
  return ($entries['count'] > 0);
}

/*
* Esta función comprueba la pertenencia al grupo del usuario, buscando
* en grupo especificado y grupos que son sus miembros (recursivamente).
*/
function checkGroupEx($ad, $userdn, $groupdn) {
  $attributes = array('memberof');
  $result = ldap_read($ad, $userdn, '(objectclass=*)', $attributes);
  if ($result === FALSE) { return FALSE; };
  $entries = ldap_get_entries($ad, $result);
  if ($entries['count'] <= 0) { return FALSE; };
  if (empty($entries[0]['memberof'])) { return FALSE; } else {
      for ($i = 0; $i < $entries[0]['memberof']['count']; $i++) {
          if ($entries[0]['memberof'][$i] == $groupdn) { return TRUE; }
          elseif (checkGroupEx($ad, $entries[0]['memberof'][$i], $groupdn)) { return TRUE; };
      };
  };
  return FALSE;
}

?>
