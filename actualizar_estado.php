<?php
include 'accion_model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $completada = isset($_POST['completada']) ? 1 : 0;

    $accion = obtenerAccionPorId($id);
    $nombre_accion = $accion['nombre_accion'];

    actualizarAccion($id, $nombre_accion, $completada);

    header('Location: index.php');
    exit;
}
?>
