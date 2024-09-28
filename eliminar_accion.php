<?php
include 'accion_model.php';

$id = $_GET['id'];
$accion = obtenerAccionPorId($id);

if (!$accion) {
    echo "Acción no encontrada.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    eliminarAccion($id);
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Acción</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
    <h1>Eliminar Acción</h1>

    <p>¿Estás seguro de que deseas eliminar la acción: "<?php echo htmlspecialchars($accion['nombre_accion']); ?>"?</p>

    <form method="POST">
        <button type="submit" class="btn btn-danger">Eliminar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

</body>
</html>
