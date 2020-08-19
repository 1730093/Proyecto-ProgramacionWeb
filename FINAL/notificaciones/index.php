<?php

include '../session.php';

$db = getPdo();
$sqlCmd = 'SELECT id, asunto, contenido, fyhenvio, usuariointerno, idDestino FROM notificaciones';
$stmt = $db->prepare($sqlCmd);
$stmt->execute();

$sqlCmdd = 'SELECT nombre + "" + apellidos as nombre FROM pacientes';
$stmtt = $db->prepare($sqlCmdd);
$stmtt->execute();

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <!--- Basic Page Needs
   ================================================== -->
   <meta charset="utf-8">
	<title>Notificaciones</title>
	<meta name="description" content="">
	<meta name="author" content="">

   <!-- Mobile Specific Metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
    ================================================== -->
   <link rel="stylesheet" href="../css/default.css">
	<link rel="stylesheet" href="../css/layout.css">
   <link rel="stylesheet" href="../css/media-queries.css">    

   <!-- Script
   ================================================== -->
	<script src="../js/modernizr.js"></script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    
	<div id="preloader">      
      <div id="status">
         <img src="images/preloader.gif" height="64" width="64" alt="">
      </div>
   </div>

   <!-- Intro Section
   ================================================== -->
   <section id="intro">
   	<header class="row">	 
			<div id="logo" >
				<a href="index.php" >
            <h1>Hospital</h1>   
              </a>					
			</div>
         <?php include '../html_parts/session_control.php'; ?>
		   <nav id="nav-wrap">
		      <ul id="nav" class="nav">
               <li><a class="smoothscroll" href="../notificaciones/index.php">Notificaciones</a></li>	
               <li><a class="smoothscroll" href="../pacientes/index.php">Registro Pacientes</a></li>	
               <li><a class="smoothscroll" href="../login.html">Cerrar Sesión</a></li>		
               		         
		      </ul> <!-- end #nav -->
		   </nav> <!-- end #nav-wrap --> 	        
	   </header> <!-- Header End -->   	
   

   <!-- Java Script
   ================================================== -->
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

   <script src="../js/init.js"></script>

<div id="contenedor">
    <form action="enviar_notificacion.php" method="POST">
        <label for="txtasunto">Asunto:</label>
        <input id="txtasunto" name="asunto" type="text" required="required" />
        <label for="txtmensaje">Mensaje:</label>
        <input id="txtmensaje" size="50" name="mensaje" type="text" required="required" />
        <label for="destino">Usuario:</label>
        <select name="destino">
        <?php 
        while ($D = $stmtt->fetch(PDO::FETCH_ASSOC))
        {
            <option value = $D['nombre']>Usuario</option>
        }
        ?>        
        </select>
        <br />
        
        <input type="submit" value="Enviar" />
    </form>
    <h2>Notificaciones enviadas</h2>   
            
    <table style="border-colapse: colapse;">
        <thead>
            <tr>
                <th>Asunto</th><th>Mensaje</th><th>Fecha y Hora</th><th>Usuario Interno</th><th>Usuario Externo</th><th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
<?php while($r = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td style="border: 1px solid black; width: 300px;"><?= $r['asunto'] ?></td>
                <td style="border: 1px solid black; text-align: center;"><?= $r['contenido'] ?></td>
                <td style="border: 1px solid black; text-align: center;"><?= $r['fyhenvio'] ?></td>  
                <td style="border: 1px solid black; text-align: center;"><?= $r['usuariointerno'] ?></td>  
                <td style="border: 1px solid black; text-align: center;"><?= $r['usuarioexterno'] ?></td>  
                <td style="border: 1px solid black;">
                    <a href="eliminar_notificaciones.php?id=<?=$r['id']?>">Eliminar</a>
                </td>
            </tr>
<?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>