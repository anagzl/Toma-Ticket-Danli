<?
if (mysqli_num_rows($resultado)>0)
{
   echo(" Existe registro");
   // despues de verificar que si hay registro recorres el objeto
   while ($misdatos = mysqli_fetch_assoc($resultado))
   {
       // imprimes los registros
   }
} else {
   echo("No Existen registros");
}

?> 