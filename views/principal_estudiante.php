
<!DOCTYPE html>
<html lang="es">
<head> 
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>principal</title>
	<!-- CSS only  style="background-image: url(../img/sebas2.jpg); background-repeat: no-repeat; background-size: 100vw 100vh;"-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="../style/principal.css ">
	
</head>
<body style="background-image: url(../img/sebas2.jpg); background-repeat: no-repeat; background-size: 100vw 100vh;" >
	<header class="header">
		<div class="container">
		<div class="btn-menu">
			<label  for="btn-menu">☰</label>
		</div>
			<div class="logo">
				<h1 style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;"></h1>
			</div>
			<nav class="menu">
				

				<a href="#">Contacto</a> 
			</nav>
		</div>
	</header>
	<div class="capa"></div>
<!--	--------------->
<input type="checkbox" id="btn-menu">
<div class="container-menu">
	<div class="cont-menu">
		<nav>
			<a href="#">Perfil</a>
			<a href="#">Matricula</a>
			<a href="./index.html">cerra sesion</a>
		   
		</nav>
		<label for="btn-menu">✖️</label>
	</div>
</div>
<?php
//$conection= new mysqli("127.0.0.1", "root", "", "matricula", 8888);
$conection = mysqli_connect(
    'bzkzkzkuzcjwi9d2a2bg-mysql.services.clever-cloud.com',
    'uc83qqg4ppdrupb6',
    'kgk52QyokiTGlWM7dK3c',
    'bzkzkzkuzcjwi9d2a2bg'
);


if (!$conection) {
    die("Connection failed: " . mysqli_connect_error());
}    session_start();
   $arry= $_SESSION['SESION'];
$ID=$arry['carne'];



$datos3 = array("ID"=> $ID);
/*$stmt = $conection->prepare(" CALL consulta_carrera(?);");
$stmt->bind_param('i',$datos3["ID"]);
$stmt->execute();
$resul = $stmt->get_result();
var_dump(mysqli_fetch_array($resul));*/
$consulta3="CALL consulta_carrera($ID)";//extraigo el periodo activo
$resul=mysqli_query( $conection,$consulta3);//al ser un select guarda un 1 o mas si no hay errores y un 0 si los hay
while($row1 =mysqli_fetch_array($resul)){
$carrera=$row1[0];
//var_dump($row1);"", "", "", "bzkzkzkuzcjwi9d2a2bg"
}
$conection = mysqli_connect(
    'bzkzkzkuzcjwi9d2a2bg-mysql.services.clever-cloud.com',
    'uc83qqg4ppdrupb6',
    'kgk52QyokiTGlWM7dK3c',
    'bzkzkzkuzcjwi9d2a2bg'
);

$consulta3="CALL  plan_estudio($carrera)";//PLAN DE ESTUDIO 
$resul2=mysqli_query( $conection,$consulta3);

/*session_start();
$_SESSION['SESION'];
*/


	
	


?>
<div class="tabla">
	<header><h2>plan de estudio</h2></header>

	<table class="table table-hover" style="width: 100%;">
	<thead>
	  <tr>
		<th scope="col">carrera</th>
		<th scope="col">curso</th>
		<th scope="col">requisito</th>
	  </tr>
	</thead>
	<?php while($row =mysqli_fetch_array($resul2)){?>
	  <tr>
		
		<td><?php echo $row['nombreCarrera']; ?></td>
		<td><?php echo $row['idCurso']; ?></td>
		<td><?php echo $row['asignatura']; ?></td>
		<td><?php echo $row['idRequisito']; ?></td>
	</tr>
	
	<?php }?>
  </table>

</div>

</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>