<!DOCTYPE html>
<!--Rosario Muñoz García-->
<html lang="es">
        <head>
		<meta charset="utf-8"/>
        <link rel ="stylesheet" type="text/css" href="catalogo.css"/>
	</head>
	<body>
        <div class="principal">
        <div class="fondo">
		<?PHP
			$servidor="localhost";
			$usuario="root";
			$clave="";
            $conexion=mysqli_connect($servidor, $usuario, $clave, "puertosCompu");
            mysqli_set_charset($conexion,"utf8");
            
if(!$conexion)
{ echo "<h2>Error al eatablecer conexion con el servidor!!!</h2>";
 exit;}

			$sql = "select * from Computadoras";
			$resultado=mysqli_query ($conexion, $sql);
			echo "<table border ='1'>";
                echo "<tr>";
                echo "<tr> COMPUTADORA </tr>";
                echo "<th>IP</th>";
                echo "<th>PUERTO</th>";
                echo "<th>ESTADO</th>";
                echo "<th>SERVICIO</th>";
                echo "</tr>";
			while($renglon = mysqli_fetch_array($resultado)){
				echo "<tr>";
				echo "<td>" . $renglon['IP']."</td>";
				echo "<td>".$renglon['Puerto']."</td>";
				echo "<td>" . $renglon['Estado']."</td>";
			    echo "<td>" . $renglon['Servicio']."</td>";
				echo "</tr>";
}
				echo "</table>";
mysqli_close($conexion);
        ?>
        <br/>
        <a href="index.html">Regresar</a>
        </div>
        </div>
	</body>
</html>
  