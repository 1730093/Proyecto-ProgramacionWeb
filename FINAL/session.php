<?php
session_start();

include 'config.php';
include 'db.php';
if (!$_SESSION['usuario_id']) {
    header('Location: ' . $APP_ROOT . 'login.html');
    exit();
}
