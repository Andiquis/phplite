<?php
include 'accion_model.php';

$id = $_GET['id'];
$accion = obtenerAccionPorId($id);

if (!$accion) {
    echo "Acción no encontrada.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_accion = $_POST['nombre_accion'];
    $completada = isset($_POST['completada']) ? 1 : 0;
    actualizarAccion($id, $nombre_accion, $completada);
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Acción</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
    <h1>Editar Acción</h1>

    <form method="POST" class="form">
        <label for="nombre_accion">Acción:</label>
        <input type="text" name="nombre_accion" value="<?php echo htmlspecialchars($accion['nombre_accion']); ?>" required class="form-input">
        
        <label>
            <input type="checkbox" name="completada" <?php echo $accion['completada'] ? 'checked' : ''; ?>> Completada
        </label>
        
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>

    <a href="index.php" class="btn btn-secondary">Volver a la lista</a>
</div>

</body>
</html>
