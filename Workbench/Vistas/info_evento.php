<!DOCTYPE html>
<html>
  <head>
    <title>info_evento</title>
  	<meta charset="UTF-8">
  	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
  	<meta http-equiv="application-name" content="Agenda Cultural">
  	<meta http-equiv="author" content="Santiago Baena Rivera">
  	<meta http-equiv="author" content="Sebastian Ramirez Lopez">
  	<meta http-equiv="author" content="David Sanchez Uribe">
  	<meta http-equiv="keywords" content="Agenda, Cultural">
  </head>
  <body>
    <form action="" method="post" >
      <fieldset>
  			<legend> Informacion Evento</legend>
  			Nombre:<input type="text" name="nevento" maxlength="45" required> <input type ="button"  name="buscar" value="buscar"><br>
  			Hora Inicio:<input type="text" name="horaIni">
  			Hora Fin:<input type="text" name="horaFin">  <br>
  			Fecha:<input type="date" name="Fecha">  <br>
  			Tipo Evento: <input type="Text" name="tipo"><br>
  			Descrppcion: <br>
        <textarea name="descripcion" rows="4" cols="50"></textarea><br>
  			Universidad:<output type=text name="universidad"> <br>
  		  Escenario:<output type="text"  name="escenario"> <br>
  			<a href="page.html"><button type="button">Regresar</button></a>
  			<p style="font-size:70%">Los campos marcados con * son obligatorios</p>
  		</fieldset>
  	</form>
    <script>
      function display(horaI, HoraF, Fecha, Descri, Universidad, Esce){
  		    document.getElementById("horaIni").value = horaI;
		      document.getElementById("horaFin").value = HoraF;
	        document.getElementById("Fecha").value = Fecha;
          document.getElementById("universidad").value = Universidad;
          document.getElementById("escenario").value = Esce;
      }
    </script>
    <?php
        include 'conexion.php';
        if(isset($_POST['Buscar'])){
            $nom = $_POST['nevento'];
            $sql = "SELECT horaInicio, fecha, horaFinalizacion, descripcion, nom_universidad, nom_escenario FROM Eventos, Universidades, Escenarios WHERE $nom = 'nom_escenario' AND 'Eventos.Escenarios_id' = 'Escenarios.idEscenarios' AND 'Eventos.Universidades_id' = 'Universidades.idIniversidades'";
          	$result =mysqli_query($connect, $sql);
            if (mysqli_num_rows($result) > 0) {
              $row = mysqli_fetch_assoc($result);
              echo"<script> display('" .$row["horaInicio"]. "', '" . $row["horaFinalizacion"] . "','" . $row["descripcion"] . "','" .$row["nom_universidad"]."','" .$row["nom_escenario"]. "'); </script>"
            }
        }
        mysqli_close($link);
     ?>
  </body>
</html>
