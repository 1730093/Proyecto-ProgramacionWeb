<?php

include '../config.php';
include '../db.php';

// Obtener el id del ToDo y si se va a marcar como done o not done.
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if($id == NULL || $id === false){
    header('Location: ../todos/');
    exit();
}

$done = filter_input(INPUT_GET, 'done', FILTER_VALIDATE_INT);

if($done === NULL || $done === false){
    header('Location: ../todos/');
    exit();
}

$doneDb = $done != 0;
//OBTENCION DEL OBJETO PDO PARA LA INTERACCION CON BD
$db = getPdo();
//COMANDO SQL PARA INSERTAR REGISTRO
$sqlCmd = 'UPDATE todos SET done = :done WHERE id = :id';
//Obtencion del objeto statement para hacer la ejecucion a la BD

$stmt = $db->prepare($sqlCmd);
$stmt->bindParam(':done', $doneDb);
$stmt->bindParam(':id', $id);
$stmt->execute();

header('Location: ../todos/');
