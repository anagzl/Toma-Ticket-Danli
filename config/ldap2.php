
<?php
// La secuencia básica con LDAP es conectar, amarrar, buscar, interpretar el resultado
// de la búsqueda, y cerrar la conexión.
require_once("config.php");
function mailboxpowerloginrd($user,$pass){
  // Datos de acceso al servidor LDAP
	$ldaprdn = trim($user).'@'.DOMINIO; 
    $ldappass = trim($pass); 
    $ds = DOMINIO; 
    $dn = DN;  
    $puertoldap = 389; 

    // Atributo para incorporar en la respuesta
    $displayAttr = "cn";
    // Respuesta por defecto
    $status = 1;
    $msg = "";
    $userDisplayName = "null";

// Establecer la conexión con el servidor LDAP
    $ldapconn = ldap_connect($ds,$puertoldap) or die("No se pudo conectar al servidor LDAP.");

echo "<h3>Consulta de prueba LDAP</h3>";
echo "Conectando ...";
$ds=ldap_connect($ds,$puertoldap) or die("No se pudo conectar al servidor LDAP."); // Debe ser un servidor LDAP válido!
echo "El resultado de la conexión es " . $ds . "<br />";

if ($ds) { 
    echo "Vinculando ..."; 
    $r=ldap_bind($ds);     // Esta es una vinculación "anónima", tipicamente
                           // con acceso de sólo lectura.
    echo "El resultado de la vinculación es " . $r . "<br />";

    echo "Buscando (sn=S*) ...";
    // Busca la entrada de apellidos
    $sr=ldap_search($ds, "o=My Company, c=US", "sn=S*");  
    echo "El resultado de la búsqueda es " . $sr . "<br />";

    echo "El número de entradas devueltas es " . ldap_count_entries($ds, $sr) . "<br />";

    echo "Obteniendo entradas ...<p>";
    $info = ldap_get_entries($ds, $sr);
    echo "Los datos para " . $info["count"] . " objetos devueltos:<p>";

    for ($i=0; $i<$info["count"]; $i++) {
        echo "El dn es: " . $info[$i]["dn"] . "<br />";
        echo "La primera entrada cn es: " . $info[$i]["cn"][0] . "<br />";
        echo "La primera entrada de correo electrónico es: " . $info[$i]["mail"][0] . "<br /><hr />";
    }

    echo "Cerando la conexión";
    ldap_close($ds);

} else {
    echo "<h4>No se puede conectar al servidor LDAP</h4>";
}


echo  $info[$i]["cn"][0] ;
return  $info[$i]["cn"][0] ;
} 
?>
