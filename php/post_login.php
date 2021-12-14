<?php
$conection= new mysqli("bzkzkzkuzcjwi9d2a2bg-mysql.services.clever-cloud.com", "uc83qqg4ppdrupb6", "kgk52QyokiTGlWM7dK3c", "bzkzkzkuzcjwi9d2a2bg");
if ($conection->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$ID=$_POST['ID']; 
$pass=$_POST['password'];
$bd;

$datos3 = array("ID"=> $ID,"password"=>($pass));
$resul = $conection->query("call logi_user('".$ID."')");
foreach($resul as $v){
//echo json_encode (var_dump($v) ."<br />");
$bd= $v["contraseña"];
$arreglo=$v;
}

if($bd==$pass){
    /*echo json_encode(true);*/
    /*echo json_encode($arreglo["carne"]);*/
   /* echo json_encode($arreglo["IDrol"]);*/
   session_start();

   $_SESSION['SESION']=$arreglo;
  if($arreglo["IDrol"]==1){
  echo json_encode(1);
  }
  if($arreglo["IDrol"]==2){
  echo json_encode(2);
}
if($arreglo["IDrol"]==3){
echo json_encode(3);
}
}

else{
    echo json_encode(false);  
}

/*
$encriptada=mysqli_query($conection, $sql);
$comparar= base64_decode($encriptada);
if($pass==$comparar){

    echo json_encode (true);
}
else{

    echo json_encode (false);
}*/
?>