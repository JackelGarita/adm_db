<?php
$conection= new mysqli("bzkzkzkuzcjwi9d2a2bg-mysql.services.clever-cloud.com", "uc83qqg4ppdrupb6", "kgk52QyokiTGlWM7dK3c", "bzkzkzkuzcjwi9d2a2bg");
if ($conection->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$ID=$_POST['ID']; 
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$cumpleaños=$_POST['cumpleaños'];
$telefono=$_POST['telefono'];
$email=$_POST['email'];
$password=$_POST['password'];

$datos3 = array("ID"=> $ID,"nombre"=>$nombre,"apellido"=>$apellido,"cumpleaños"=>$cumpleaños,"telefono"=>$telefono,"email"=>$email,"password"=>$password);
$statement = $conection->prepare("CALL inserPersona(?,?,?,?,?,?,?)");
$statement->bind_param("issssss",$datos3["ID"],$datos3["nombre"],$datos3["apellido"],$datos3["cumpleaños"],$datos3["telefono"],$datos3["email"],$datos3["password"]);
$statement->execute();
$statement->close();
$conection->close();

echo json_encode ($datos3);
/*
$sql="CALL inserPersona(('{$_POST[ID]}', '{$_POST[nombre]}','{$_POST[apellido]}','{$_POST[cumpleaños]}','{$_POST[telefono]}','{$_POST[email]}' ,'{$_POST[password]}');" ;
mysqli_query($conn, $sql); SELECT carrera.nombreCarrera, cursos.idCurso, cursos.asignatura requisitos.idRequisito FROM cursos INNER JOIN carrera ON carrera.idCarrera= cursos.idCarrera INNER JOIN requisitos ON requisitos.idRequisito cursos.idCurso
*/

 
?>