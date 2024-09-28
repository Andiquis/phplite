<?php
include 'accion_model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['nueva_accion'])) {
        agregarAccion($_POST['nueva_accion']);
        header('Location: index.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nueva Acción</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
    <h1>Agregar Nueva Acción</h1>

    <form method="POST" class="form">
        <label for="nueva_accion">Acción:</label>
        <input type="text" name="nueva_accion" required class="form-input">
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>

    <a href="index.php" class="btn btn-secondary">Volver a la lista</a>
</div>

</body>
</html>
