<?php

session_start();
session_unset();
session_destroy();

include 'config.php';
include 'db.php';

$usuario = filter_input(INPUT_POST, 'usuario');
$pass = filter_input(INPUT_POST, 'contrasena');

if ($usuario === false || $usuario === NULL || $usuario === '' ||
        $pass === false || $pass === NULL || $pass === '') {
    header('Location: login.html');
    exit();
}

// Validación del usuario Externo
$db = getPDO();  // Obtenemos objeto PDO.
$sqlCmd = 'SELECT * FROM uexterno WHERE usuario = :username';  // Comando SQL para consultar el user.
$stmt = $db->prepare($sqlCmd);  // Preparamos ese comando SQL para obtener el object Statement
$stmt->bindParam(':username', $usuario);  // asociamos los parametros del comando SQL a variables.
$stmt->execute();  // Ejecutamos la consulta.
$r = $stmt->fetch(PDO::FETCH_ASSOC);  // Obtenemos el primer row de la ejecución de la consulta.

// Si hay un registro asociado al username y si ese registro coincide el password.
if ($r && $r['contrasena'] === $pass) {
    session_start();  // iniciamos la sesión.
    // Establecemos variables de sesión correspondientes a los datos del usuario.
    $_SESSION['usuario_id'] = (int)$r['id'];
    $_SESSION['unombre'] = $r['nombre'];
    header('Location: index.php');  // Redirect al index.php
    exit();
}


// Validación del usuario Interno
$db = getPDO();  // Obtenemos objeto PDO.
$sqlCmd = 'SELECT * FROM uinterno WHERE usuario = :username';  // Comando SQL para consultar el user.
$stmt = $db->prepare($sqlCmd);  // Preparamos ese comando SQL para obtener el object Statement
$stmt->bindParam(':username', $usuario);  // asociamos los parametros del comando SQL a variables.
$stmt->execute();  // Ejecutamos la consulta.
$r = $stmt->fetch(PDO::FETCH_ASSOC);  // Obtenemos el primer row de la ejecución de la consulta.

// Si hay un registro asociado al username y si ese registro coincide el password.
if ($r && $r['contrasena'] === $pass) {
    session_start();  // iniciamos la sesión.
    // Establecemos variables de sesión correspondientes a los datos del usuario.
    $_SESSION['usuario_id'] = (int)$r['id'];
    $_SESSION['unombre'] = $r['nombre'];
    header('Location: index.php');  // Redirect al index.php
    exit();
}


header('Location: login.html');
