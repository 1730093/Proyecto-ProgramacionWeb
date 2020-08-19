<?php

include '../config.php';
include '../db.php';

$asunto = filter_input(INPUT_POST, 'asunto');
$contenido = filter_input(INPUT_POST, 'mensaje');
$destino = filter_input(INPUT_POST, 'destino');
$fyhora = date("Y-m-d H:i:s");
$usuario = $_SESSION['unombre'];


if ($todo === NULL || $todo === false || $todo === '') {
    header('Location: ../notificaciones/');
    exit();
}

// Obtención del objeto PDO para la interaccion con DB.
$db = getPdo();  

// Comando SQL para insertar el registro.
$sqlCmd = 'INSERT INTO notificaciones (id, asunto, contenido, fyhenvio, usuariointerno, idDestino) 
VALUES (NULL, :asunto, :mensaje, :hora, :interno, :destino )';
// Obtención del objeto Statement para hacer la ejecución a la DB.
$stmt = $db->prepare($sqlCmd);

// Paso de parámetros al comando SQL de insert.
$stmt->bindParam(':asunto', $asunto);
$stmt->bindParam(':mensaje', $mensaje);
$stmt->bindParam(':destino', $destino);
$stmt->bindParam(':hora', $fyhora);
$stmt->bindParam(':interno', $usuario);



// Ejecución de la instruccion a DB.
$stmt->execute();

// Para obtener el id autoincremental de la sentencia insert anterior.
$sqlCmd = "SELECT LAST_INSERT_ID() id";
$stmt = $db->prepare($sqlCmd);
$stmt->execute();
$id = $stmt->fetch(PDO::FETCH_ASSOC)['id'];

/*  NO HACER ESTO A MENOS QUE SEAS UN MAL DESARROLLADOR!!!
$sqlCmd = "INSERT INTO todos (todo, done) VALUES ('" . $todo . "', 0)";
$stmt = $db->prepare($sqlCmd);
$stmt->execute();
*/
header('Location: ../notificaciones/');
