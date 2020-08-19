<?php

include '../config.php';
include '../db.php';

// Obtener el id del ToDo y si se va a borrar.
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if($id == NULL || $id === false){
    header('Location: ../todos/');
    exit();
}

//OBTENCION DEL OBJETO PDO PARA LA INTERACCION CON BD
$db = getPdo();
//COMANDO SQL PARA INSERTAR REGISTRO
$sqlCmd = 'DELETE FROM todos WHERE id = :id';
echo $sqlCmd;
//Obtencion del objeto statement para hacer la ejecucion a la BD

$stmt = $db->prepare($sqlCmd);
$stmt->bindParam(':id', $id);
$stmt->execute();

header('Location: ../todos/');
