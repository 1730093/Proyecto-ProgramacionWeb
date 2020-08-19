<?php

include '../session.php';


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
               <li><a class="smoothscroll" href="../login.html">Cerrar Sesión</a></li>	
               		         
		      </ul> <!-- end #nav -->
		   </nav> <!-- end #nav-wrap --> 	        
	   </header> <!-- Header End -->   	
   

   <!-- Java Script
   ================================================== -->
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

   <script src="../js/init.js"></script>

<form action="registrarPacientes.php" method="POST"> 
        <div class="form">
            <h1>Registro de pacientes</h1>
            <input type="text" name="nombre" placeholder="Nombre" required />
            <input type="text" name="apellido" placeholder="Apellido" required/>
            <input id="inSexo" type="radio" name="sexo" value="Masculino" onclick="marcado=true">Masculino
            <input id="inSexo" type="radio" name="sexo" value="Femenino" onclick="marcado=true">Femenino
            <input id="inFecha" type="date" name="fnacimiento" placeholder="Fecha de nacimiento" />
            <input id="inFechaIng" type="datetime-local" name="fingreso" placeholder="Fecha y hora de ingreso" required/>
            <input id="inFechaAlt" type="datetime-local" name="falta" placeholder="Fecha y hora de alta" />
            <input id="inFechaDef" type="datetime-local" name="defuncion" placeholder="Fecha y hora de defunción" />
            <input type="text" name="diagnostico" placeholder="Dignostico" />
            <input id="btnEnviar" type="submit" name="submit" value="Guardar">
        </div>
        </form>
</body>
</html>