<?php
/**
 * Modificar registros de bitacora
 * 
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 13/06/2022
 * @Fecha Revision:
*/

/**
 * Configuracion de conexion
 */
    include("../../config/conexion.php");

/**
 * Crear un ticket dependiendo del area
 * 
 */    
if(isset($_POST['idDireccion'])){
    switch($_POST['idDireccion']){
        case 1: //catastro 
            $stmt = $conexion->prepare("INSERT INTO ticketcatastro(
                                            Bitacora_idBitacora,
                                            Bitacora_Sede_idSede,
                                            Empleado_idEmpleado,
                                            disponibilidad,
                                            preferencia,
                                            vecesLlamado,
                                            marcarRellamado,
                                            sigla,
                                            numero
                                        )
                                        VALUES(
                                            :Bitacora_idBitacora,
                                            :Bitacora_Sede_idSede,
                                            :Empleado_idEmpleado,
                                            :disponibilidad,
                                            :preferencia,
                                            :vecesLlamado,
                                            :marcarRellamado,
                                            :sigla,
                                            :numero
                                        )");
            $stmt->bindParam(":Bitacora_idBitacora",$_POST["Bitacora_idBitacora"]);
            $stmt->bindParam(":Bitacora_Sede_idSede",$_POST["Bitacora_Sede_idSede"]);
            $stmt->bindParam(":disponibilidad",$_POST["disponibilidad"]);
            $stmt->bindParam(":preferencia",$_POST["preferencia"]);
            $stmt->bindParam(":vecesLlamado",$_POST["vecesLlamado"]);
            $stmt->bindParam(":marcarRellamado",$_POST["marcarRellamado"]);
            $stmt->bindParam(":sigla",$_POST["sigla"]);
            $null = null;
            if($_POST['numero'] == null){
                $stmt->bindParam(":numero",$null,PDO::PARAM_NULL);
            }else{
                $stmt->bindParam(":numero",$_POST['numero'],PDO::PARAM_INT);
            }

            if($_POST['Empleado_idEmpleado'] == null){
                $stmt->bindParam(":Empleado_idEmpleado",$null,PDO::PARAM_NULL);
            }else{
                $stmt->bindParam(":Empleado_idEmpleado",$_POST['Empleado_idEmpleado'],PDO::PARAM_INT);
            }
            
            $stmt->execute();
            if (!empty($resultado)){
                echo 'Registrado';
            }else{
                echo "Registro Vacio.";
            }
            break;
        case 2:  //regulacion predial
            $stmt = $conexion->prepare("INSERT INTO ticketpredial(
                                            Bitacora_idBitacora,
                                            Bitacora_Sede_idSede,
                                            Empleado_idEmpleado,
                                            disponibilidad,
                                            preferencia,
                                            vecesLlamado,
                                            marcarRellamado,
                                            sigla,
                                            numero
                                        )
                                        VALUES(
                                            :Bitacora_idBitacora,
                                            :Bitacora_Sede_idSede,
                                            :Empleado_idEmpleado,
                                            :disponibilidad,
                                            :preferencia,
                                            :vecesLlamado,
                                            :marcarRellamado,
                                            :sigla,
                                            :numero
                                        )");
                $stmt->bindParam(":Bitacora_idBitacora",$_POST["Bitacora_idBitacora"]);
                $stmt->bindParam(":Bitacora_Sede_idSede",$_POST["Bitacora_Sede_idSede"]);
                $stmt->bindParam(":disponibilidad",$_POST["disponibilidad"]);
                $stmt->bindParam(":preferencia",$_POST["preferencia"]);
                $stmt->bindParam(":vecesLlamado",$_POST["vecesLlamado"]);
                $stmt->bindParam(":marcarRellamado",$_POST["marcarRellamado"]);
                $stmt->bindParam(":sigla",$_POST["sigla"]);
                $null = null;
                //aplicar valor null en caso de que lo sean
                if($_POST['numero'] == null){
                $stmt->bindParam(":numero",$null,PDO::PARAM_NULL);
                }else{
                $stmt->bindParam(":numero",$_POST['numero'],PDO::PARAM_INT);
                }

                if($_POST['Empleado_idEmpleado'] == null){
                $stmt->bindParam(":Empleado_idEmpleado",$null,PDO::PARAM_NULL);
                }else{
                $stmt->bindParam(":Empleado_idEmpleado",$_POST['Empleado_idEmpleado'],PDO::PARAM_INT);
                }

                $stmt->execute();
                if (!empty($resultado)){
                    echo 'Registrado';
                }else{
                    echo "Registro Vacio.";
                }
                break;
        case 3: //propiedad intelectual
            $stmt = $conexion->prepare("INSERT INTO ticketpropiedadintelectual(
                                            Bitacora_idBitacora,
                                            Bitacora_Sede_idSede,
                                            Empleado_idEmpleado,
                                            disponibilidad,
                                            preferencia,
                                            vecesLlamado,
                                            marcarRellamado,
                                            sigla,
                                            numero
                                        )
                                        VALUES(
                                            :Bitacora_idBitacora,
                                            :Bitacora_Sede_idSede,
                                            :Empleado_idEmpleado,
                                            :disponibilidad,
                                            :preferencia,
                                            :vecesLlamado,
                                            :marcarRellamado,
                                            :sigla,
                                            :numero
                                        )");
            $stmt->bindParam(":Bitacora_idBitacora",$_POST["Bitacora_idBitacora"]);
            $stmt->bindParam(":Bitacora_Sede_idSede",$_POST["Bitacora_Sede_idSede"]);
            $stmt->bindParam(":disponibilidad",$_POST["disponibilidad"]);
            $stmt->bindParam(":preferencia",$_POST["preferencia"]);
            $stmt->bindParam(":vecesLlamado",$_POST["vecesLlamado"]);
            $stmt->bindParam(":marcarRellamado",$_POST["marcarRellamado"]);
            $stmt->bindParam(":sigla",$_POST["sigla"]);
            $null = null;
            //aplicar valor null en caso de que lo sean
            if($_POST['numero'] == null){
            $stmt->bindParam(":numero",$null,PDO::PARAM_NULL);
            }else{
            $stmt->bindParam(":numero",$_POST['numero'],PDO::PARAM_INT);
            }

            if($_POST['Empleado_idEmpleado'] == null){
            $stmt->bindParam(":Empleado_idEmpleado",$null,PDO::PARAM_NULL);
            }else{
            $stmt->bindParam(":Empleado_idEmpleado",$_POST['Empleado_idEmpleado'],PDO::PARAM_INT);
            }

            $stmt->execute();
            if (!empty($resultado)){
                echo 'Registrado';
            }else{
                echo "Registro Vacio.";
            }
            break;
        case 4: //registro inmueble
            $stmt = $conexion->prepare("INSERT INTO ticketregistroinmueble(
                                            Bitacora_idBitacora,
                                            Bitacora_Sede_idSede,
                                            Empleado_idEmpleado,
                                            disponibilidad,
                                            preferencia,
                                            vecesLlamado,
                                            marcarRellamado,
                                            sigla,
                                            numero
                                        )
                                        VALUES(
                                            :Bitacora_idBitacora,
                                            :Bitacora_Sede_idSede,
                                            :Empleado_idEmpleado,
                                            :disponibilidad,
                                            :preferencia,
                                            :vecesLlamado,
                                            :marcarRellamado,
                                            :sigla,
                                            :numero
                                        )");
            $stmt->bindParam(":Bitacora_idBitacora",$_POST["Bitacora_idBitacora"]);
            $stmt->bindParam(":Bitacora_Sede_idSede",$_POST["Bitacora_Sede_idSede"]);
            $stmt->bindParam(":disponibilidad",$_POST["disponibilidad"]);
            $stmt->bindParam(":preferencia",$_POST["preferencia"]);
            $stmt->bindParam(":vecesLlamado",$_POST["vecesLlamado"]);
            $stmt->bindParam(":marcarRellamado",$_POST["marcarRellamado"]);
            $stmt->bindParam(":sigla",$_POST["sigla"]);
            $null = null;
            //aplicar valor null en caso de que lo sean
            if($_POST['numero'] == null){
            $stmt->bindParam(":numero",$null,PDO::PARAM_NULL);
            }else{
            $stmt->bindParam(":numero",$_POST['numero'],PDO::PARAM_INT);
            }

            if($_POST['Empleado_idEmpleado'] == null){
            $stmt->bindParam(":Empleado_idEmpleado",$null,PDO::PARAM_NULL);
            }else{
            $stmt->bindParam(":Empleado_idEmpleado",$_POST['Empleado_idEmpleado'],PDO::PARAM_INT);
            }

            $stmt->execute();
            if (!empty($resultado)){
                echo 'Registrado';
            }else{
                echo "Registro Vacio.";
            }
            break;
    }
 
}
?>