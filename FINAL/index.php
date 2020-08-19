<?php

include 'session.php';

?>

<!DOCTYPE html>
<html class="no-js" lang="en"> 
<head>

   <!--- Basic Page Needs
   ================================================== -->
   <meta charset="utf-8">
	<title>Proyecto</title>
	<meta name="description" content="">
	<meta name="author" content="">

   <!-- Mobile Specific Metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
    ================================================== -->
   <link rel="stylesheet" href="css/default.css">
	<link rel="stylesheet" href="css/layout.css">
   <link rel="stylesheet" href="css/media-queries.css">    

   <!-- Script
   ================================================== -->
	<script src="js/modernizr.js"></script>
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
         <?php include 'html_parts/session_control.php'; ?>
		   <nav id="nav-wrap">
		      <ul id="nav" class="nav">
               <li><a class="smoothscroll" href="notificaciones/index.php">Notificaciones</a></li>	
               <li><a class="smoothscroll" href="pacientes/index.php">Registro Pacientes</a></li>	
               <li><a class="smoothscroll" href="login.html">Cerrar Sesión</a></li>	
               		         
		      </ul> <!-- end #nav -->
		   </nav> <!-- end #nav-wrap --> 	        
	   </header> <!-- Header End -->   	
   

   <!-- Java Script
   ================================================== -->
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

   <script src="js/init.js"></script>

</body>

</html>