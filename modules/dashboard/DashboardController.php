<?php
require '../../config/conectar.php';
require '../seguridad_autenticacion/controller.php';

session_start();

// Crear una instancia de la clase Conectar y obtener la conexión
$conexion = new Conectar();
$conn = $conexion->getConexion();

// Crear una instancia del controlador de usuario
$controller = new UserController($conn);

if (!isset($_SESSION['nombre'])) {
    header("Location: ../../public/login.php");
    exit();
}

// Si es una solicitud para cerrar sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'logout') {
    $controller->logout();
   /* header("Location: ../seguridad_autenticacion/login.php");
    exit();*/
}

// Enviar los datos necesarios a la vista
$nombre = $_SESSION['nombre'];
$rol = $_SESSION['rol'];

require_once 'DashboardView.php';
?>