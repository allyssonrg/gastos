<?php
//incluir la configuración de la conexion
require "../config/conexion.php";

Class Empleado{
  public function __construct(){

  }


  public function insertar($nombre, $primerApellido, $segundoApellido, $email, $fechaEntrada, $fechaBaja, 
  $idDepartamento, $idJefe, $esJefe, $usr, $pwd, $foto, $idEmpActualiza){
    $sql= "INSERT INTO empleados (nombre, primerApellido, segundoApellido, email, fechaEntrada, fechaBaja, 
    idDepartamento, idJefe, esJefe, usr, pwd, foto, idEmpActualiza) values ('$nombre', '$primerApellido', '$segundoApellido', '$email', '$fechaEntrada', '$fechaBaja', 
  '$idDepartamento', '$idJefe', '$esJefe', '$usr', '$pwd', '$foto','$idEmpActualiza')";
    return ejecutarConsultaRetornaID($sql);
  }

  public function editar($idEmpleado, $nombre, $primerApellido, $segundoApellido, $email, $fechaEntrada, $fechaBaja, 
  $idDepartamento, $idJefe, $esJefe, $usr, $pwd, $foto,$fechaActualizacion, $idEmpActualiza){
    $sql="UPDATE empleados SET idEmpleado='$idEmpleado', nombre='$nombre', primerApellido='$primerApellido', segundoApellido='$segundoApellido',
     email='$email', fechaEntrada='$fechaEntrada', fechaBaja='fechaBaja', 
    idDepartamento='$idDepartamento', idJefe='$idJefe', esJefe='$esJefe', usr='$usr', pwd='$pwd', 
    foto='$foto', fechaActualizacion='$fechaActualizacion', idEmpActualiza='$idEmpActualiza'
    where idEmpleado='$idEmpleado' ";
      return ejecutarConsulta($sql);
  }

  public function desactivar($idEmpleado){
    $sql= "UPDATE empleados SET activo = '0'
    WHERE idEmpleado='$idEmpleado' " ;
    return ejecutarConsulta($sql);
  }

  public function activar($idEmpleado){
    $sql= "UPDATE empleados SET activo = '1'
    WHERE idEmpleado='$idEmpleado' " ;
    return ejecutarConsulta($sql);
  }	

  public function mostrar($idEmpleado){
    $sql= "SELECT
    e.idEmpleado, 
    e.nombre, 
    e.primerApellido, 
    e.segundoApellido, 
    e.email, 
    e.fechaEntrada, 
    e.fechaBaja, 
    e.idDepartamento, 
    e.idJefe, 
    e.esJefe, 
    e.usr, 
    e.pwd, 
    e.foto, 
    e.activo, 
    e.fechaCreacion, 
    e.fechaActualizacion, 
    e.idEmpActualiza
    
    FROM empleados e
    WHERE idEmpleado='$idEmpleado'" ;

    return ejecutarConsultaSimpleFila($sql);
  }

  public function listar(){
    $sql= "SELECT
    e.idEmpleado, 
    e.nombre, 
    e.primerApellido, 
    e.segundoApellido, 
    e.email, 
    e.fechaEntrada, 
    e.fechaBaja, 
    e.idDepartamento, 
    e.idJefe, 
    e2.nombre as jefeNombre, 
    e2.primerApellido as jefePrimerApellido, 
    e.esJefe, 
    e.usr, 
    e.pwd, 
    e.foto, 
    e.activo, 
    e.fechaCreacion, 
    e.fechaActualizacion, 
    e.idEmpActualiza
    
    FROM empleados e
    INNER JOIN departamentos d
    ON e.idDepartamento=d.idDepartamento
    LEFT OUTER JOIN empleados e2
    ON e.idJefe = e2.idEmpleado " ;
    return ejecutarConsulta($sql);
  }

  public function select(){
    $sql= "SELECT
    e.idEmpleado, 
    e.nombre, 
    e.primerApellido, 
    e.segundoApellido, 
    e.email, 
    e.fechaEntrada, 
    e.fechaBaja, 
    e.idDepartamento, 
    e.idJefe, 
    e.esJefe, 
    e.usr, 
    e.pwd, 
    e.foto, 
    e.activo, 
    e.fechaCreacion, 
    e.fechaActualizacion, 
    e.idEmpActualiza
    
    FROM empleados e
    WHERE idEmpleado='$idEmpleado'
    AND activo='1'" ;
    return ejecutarConsulta($sql);
  }
}

/*idEmpleado, nombre, primerApellido, segundoApellido, email, fechaEntrada, fechaBaja, 
  idDepartamento, idJefe, esJefe, usr, pwd, foto, activo, fechaCreacion, fechaActualizacion, idEmpActualiza,

    $idEmpleado, $nombre, $primerApellido, $segundoApellido, $email, $fechaEntrada, $fechaBaja, 
  $idDepartamento, $idJefe, $esJefe, $usr, $pwd, $foto, $activo, $fechaCreacion, $fechaActualizacion, $idEmpActualiza,

  '$idEmpleado', '$nombre', '$primerApellido', '$segundoApellido', '$email', '$fechaEntrada', '$fechaBaja', 
  '$idDepartamento', '$idJefe', '$esJefe', '$usr', '$pwd', '$foto', '$activo', '$fechaCreacion', '$fechaActualizacion', '$idEmpActualiza'



  idEmpleado='$idEmpleado', nombre='$nombre', primerApellido='$primerApellido', segundoApellido='$segundoApellido', email='$email', fechaEntrada='$fechaEntrada', fechaBaja='fechaBaja', 
  idDepartamento='$idDepartamento', idJefe='$idJefe', esJefe='$esJefe', usr='$usr', pwd='$pwd', foto='$foto', activo='$activo', fechaCreacion='$fechaCreacion', fechaActualizacion='$fechaActualizacion', idEmpActualiza='$idEmpActualiza',
*/

?>