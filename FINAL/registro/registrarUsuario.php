<?php

include '../config.php';
include '../db.php';


$name = filter_input(INPUT_POST, 'nombre');
$lastName = filter_input(INPUT_POST, 'apellido');
$sexo = filter_input(INPUT_POST, 'sexo');
$nac = filter_input(INPUT_POST, 'fnacimiento');
$email = filter_input(INPUT_POST, 'correo');
$user = filter_input(INPUT_POST, 'usuario');
$pass = filter_input(INPUT_POST, 'contra');


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
if ($user === NULL || $user === false || $user === '') {
    header('Location: index.html');
    exit();
}
if ($email === NULL || $email === false || $email === '') {
    header('Location: index.html');
    exit();
}
if ($pass === NULL || $pass === false || $pass === '') {
    header('Location: index.html');
    exit();
}

// Obtención del objeto PDO para la interaccion con DB.
$db = getPdo();  

// Comando SQL para insertar el registro.
$sqlCmd = 'INSERT INTO uexterno (id, nombre, apellido, sexo, fechanacimiento, email, usuario, contrasena) VALUES (NULL, :nombree, :apellidoo, :sexoo, :fechaa, :correoo, :usuarioo, :pass)';
// Obtención del objeto Statement para hacer la ejecución a la DB.
$stmt = $db->prepare($sqlCmd);
// Paso de parámetros al comando SQL de insert.
$stmt->bindParam(':nombree', $name);
$stmt->bindParam(':apellidoo', $lastName);
$stmt->bindParam(':sexoo', $sexo);
$stmt->bindParam(':fechaa', $nac);
$stmt->bindParam(':correoo', $email);
$stmt->bindParam(':usuarioo', $user);
$stmt->bindParam(':pass', $pass);



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
header('Location: ../login.html');