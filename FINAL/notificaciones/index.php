<?php

include '../session.php';

$db = getPdo();

$sqlCmd = 'SELECT id, todo, done FROM todos';
$stmt = $db->prepare($sqlCmd);
$stmt->execute();

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

<div id="contenedor">
    <h3>ToDo App</h3>

    <form action="add_todo.php" method="POST">
        <label for="txtTodo">TODO:</label>
        <input id="txtTodo" name="todo" type="text" required="required" />
        <br />
        <input type="submit" value="Agregar" />
    </form>

    <table style="border-colapse: colapse;">
        <thead>
            <tr>
                <th>Todo</th><th>Done?</th><th>Mark</th><th>Delete</th>
            </tr>
        </thead>
        <tbody>
<?php while($r = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td style="border: 1px solid black; width: 300px;"><?= $r['todo'] ?></td>
                <td style="border: 1px solid black; text-align: center;"><?= $r['done'] != '0' ? 'YES' : 'NO' ?></td>
                <td style="border: 1px solid black;">
                    <a href="done_todo.php?id=<?=$r['id']?>&done=<?=$r['done'] == '0' ? '1' : '0'?>">MARK</a>
                </td>
                <td style="border: 1px solid black;">
                    <a href="delete_todo.php?id=<?=$r['id']?>">DELETE</a>
                </td>
            </tr>
<?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>