<?php

include '../config.php';
include '../db.php';


$name = filter_input(INPUT_POST, 'nombre');
$lastName = filter_input(INPUT_POST, 'apellido');
$sexo = filter_input(INPUT_POST, 'sexo');
$nac = filter_input(INPUT_POST, 'fnacimiento');
$ingreso = filter_input(INPUT_POST, 'fingreso');
$alta = filter_input(INPUT_POST, 'falta');
$def = filter_input(INPUT_POST, 'defuncion');
$razon = filter_input(INPUT_POST, 'motivo');
$diagn = filter_input(INPUT_POST, 'diagnostico');

if ($name === NULL || $name === false || $name === '') {
    header('Location: index.html');
    exit();
}
if ($lastName === NULL || $lastName === false || $lastName === '') {
    header('Location: index.html');
    exit();
}
if ($nac === NULL || $nac === false || $nac === '') {
    header('Location: index.html');
    exit();
}

// Obtención del objeto PDO para la interaccion con DB.
$db = getPdo();  

// Comando SQL para insertar el registro.
$sqlCmd = 'INSERT INTO pacientes (id, nombre, apellidos, sexo, fechanac, fechaingreso, fechaalta, motivo, fechadefuncion, diagnostico) VALUES (NULL, :nombree, :apellidoo, :sexoo, :fechaa, :fechaing, :fechaalta, :motivo, :fechadef, :diagnostico)';
// Obtención del objeto Statement para hacer la ejecución a la DB.
$stmt = $db->prepare($sqlCmd);
// Paso de parámetros al comando SQL de insert.
$stmt->bindParam(':nombree', $name);
$stmt->bindParam(':apellidoo', $lastName);
$stmt->bindParam(':sexoo', $sexo);
$stmt->bindParam(':fechaa', $nac);
$stmt->bindParam(':fechaing', $ingreso);
$stmt->bindParam(':fechaalta', $alta);
$stmt->bindParam(':motivo', $razon);
$stmt->bindParam(':fechadef', $def);
$stmt->bindParam(':diagnostico', $diagn);






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
header('Location: ../index.php');