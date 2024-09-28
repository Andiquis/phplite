<?php
include 'accion_model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nombre_accion'])) {
        // Insertar nueva acción
        agregarAccion($_POST['nombre_accion']);
    } elseif (isset($_POST['id']) && isset($_POST['nombre_accion_editar'])) {
        // Editar acción
        actualizarAccion($_POST['id'], $_POST['nombre_accion_editar'], 0);
    } elseif (isset($_POST['id_eliminar'])) {
        // Eliminar acción
        eliminarAccion($_POST['id_eliminar']);
    }

    header('Location: admin_acciones.php');
    exit;
}

$acciones = obtenerAcciones();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <title>Administrar Acciones</title>
    <style>
        /* General styles */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        .container {
            max-width: 1100px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .form-accion,
        .form-accion-editar {
            display: flex;
            gap: 10px;
        }

        .form-accion input[type="text"] {
            flex-grow: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
        }

        .form-accion button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #27ae60;
            color: #fff;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-accion button:hover {
            background-color: #219150;
        }

        .form-accion-editar button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #2980b9;
            color: #fff;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-accion-editar button:hover {
            background-color: #1f6aa7;
        }

        .btn-danger {
            padding: 10px 20px;
            background-color: #e74c3c;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #c0392b;
        }

        /* Tabla de acciones */
        .tabla-acciones {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .tabla-acciones th,
        .tabla-acciones td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .tabla-acciones th {
            background-color: #34495e;
            color: white;
            text-transform: uppercase;
        }

        .tabla-acciones tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .tabla-acciones tr:hover {
            background-color: #eaeaea;
        }

        /* Estilo de input sin borde y ancho completo */
        .form-accion-editar input[type="text"] {
            width: 100%;
            padding: 10px;
            border: none;
            font-size: 1rem;
            background-color: transparent;
            box-shadow: none;
        }

        .btn-navegar {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            margin-bottom: 20px; /* Espacio entre el botón y la tabla */
            float: right; /* Alinear a la derecha */
        }


        .btn-navegar:hover {
            background-color: #2980b9;
        }
        .boton-navegar-container {
            display: flex;
            justify-content: flex-end; /* Alinear a la derecha */
            margin-bottom: 20px; /* Espacio entre el botón y la tabla */
        }

    </style>
</head>

<body>

    <div class="container">
        <h1>Administrar Acciones</h1>

        <div class="boton-navegar-container">
            <a href="index.php" class="btn-navegar">Ver Lista</a>
        </div>


        <!-- Formulario para agregar nueva acción -->
        <form action="admin_acciones.php" method="POST" class="form-accion">
            <input type="text" name="nombre_accion" placeholder="Nueva acción" required>
            <button type="submit" class="btn-admin">Agregar</button>
        </form>

        <!-- Tabla de acciones --> 
        <table class="tabla-acciones">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Acción</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($acciones as $accion): ?>
                    <tr>
                        <td><?php echo $accion['id']; ?></td>
                        <td>
                            <form action="admin_acciones.php" method="POST" class="form-accion-editar">
                                <input type="hidden" name="id" value="<?php echo $accion['id']; ?>">
                                <input type="text" name="nombre_accion_editar" value="<?php echo htmlspecialchars($accion['nombre_accion']); ?>" required>
                                <button type="submit">Editar</button>
                            </form>
                        </td>
                        <td>
                            <form action="admin_acciones.php" method="POST">
                                <input type="hidden" name="id_eliminar" value="<?php echo $accion['id']; ?>">
                                <button type="submit" class="btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>
