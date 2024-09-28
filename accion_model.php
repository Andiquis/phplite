<?php
// accion_model.php
include 'db.php';

function crearTablaAcciones() {
    global $db;
    $db->exec("CREATE TABLE IF NOT EXISTS acciones (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nombre_accion TEXT,
        completada INTEGER DEFAULT 0
    )");
}

function agregarAccion($nombre_accion) {
    global $db;
    $stmt = $db->prepare("INSERT INTO acciones (nombre_accion, completada) VALUES (:nombre_accion, 0)");
    $stmt->bindParam(':nombre_accion', $nombre_accion);
    return $stmt->execute();
}

function obtenerAcciones() {
    global $db;
    $stmt = $db->query("SELECT * FROM acciones");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function obtenerAccionPorId($id) {
    global $db;
    $stmt = $db->prepare("SELECT * FROM acciones WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function actualizarAccion($id, $nombre_accion, $completada) {
    global $db;
    $stmt = $db->prepare("UPDATE acciones SET nombre_accion = :nombre_accion, completada = :completada WHERE id = :id");
    $stmt->bindParam(':nombre_accion', $nombre_accion);
    $stmt->bindParam(':completada', $completada);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}

function eliminarAccion($id) {
    global $db;
    $stmt = $db->prepare("DELETE FROM acciones WHERE id = :id");
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}
?>
