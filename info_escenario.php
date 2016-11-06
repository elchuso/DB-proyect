<!DOCTYPE html>
				<html lang="es">
				<head>
					<title>Gestion_Representante</title>
					<meta charset="UTF-8">
					<meta http-equiv="content-type" content="text/html; charset=UTF-8">
					<meta http-equiv="application-name" content="Agenda Cultural">
					<meta http-equiv="author" content="Santiago Baena Rivera">
					<meta http-equiv="author" content="Sebastian Ramirez Lopez">
					<meta http-equiv="author" content="David Sanchez Uribe">
					<meta http-equiv="keywords" content="Agenda, Cultural">
				</head>
				<body>

					<form action="" method="get">
            <fieldset>
              <legend>informacion escenario</legend>
							Nombre: <input type="text" name="nesce"> <input type="submit" name="buscaresce" value="Buscar"><br>
              telefono: <input type="text" name="telefonoesce"> <br>
              direccion : <input type="text" name="direccionesce"><br>
              capacidad: <input type="text" name="capcaidadesce"><br>
              </fieldset>
          </form>

          <script>
          function mostrar(telefono , direccion, capacidad){
            document.getElementById("telefono").value = telefonoesce;
            document.getElementById("direccion").value = direccionesce;
            document.getElementById("capacidad").value = capacidadesce;
          }
          </script>

          <?php
          include 'conexion.php';
          if(isset($_GET['buscaresce'])){
            $nEsce = $_GET['nesce'];
            $sql = "SELECT <telfono>,<direccion>,<capacidad> FROM <tablaescenario> WHERE nombre = '$nEsce'";
            $result = mysqli_query($connect, $sql);
              if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_assoc($result);
                echo "<script> mostrar('" . $row["telefono"] . "', '" .$row["direccion"] . "," . $row["capacidad"] . "); </script>";
              }
              mysqli_close($link);
          ?>

				</body>
				</html>
