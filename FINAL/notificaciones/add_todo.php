<?php

include '../config.php';
include '../db.php';

$todo = filter_input(INPUT_POST, 'todo');
if ($todo === NULL || $todo === false || $todo === '') {
    header('Location: ../todos/');
    exit();
}

$done = false;

// Obtención del objeto PDO para la interaccion con DB.
$db = getPdo();  

// Comando SQL para insertar el registro.
$sqlCmd = 'INSERT INTO todos (todo, done) VALUES (:todo, :done)';
// Obtención del objeto Statement para hacer la ejecución a la DB.
$stmt = $db->prepare($sqlCmd);

// Paso de parámetros al comando SQL de insert.
$stmt->bindParam(':todo', $todo);
$stmt->bindParam(':done', $done);

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
header('Location: ../todos/');
