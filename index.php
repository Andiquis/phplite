<?php
include 'accion_model.php';

// Crear la tabla si no existe
crearTablaAcciones();

// Obtener todas las acciones
$acciones = obtenerAcciones();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Lista de Acciones</title>
    <style>
        /* General styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            text-align: center; /* Centra el contenido del texto */
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Admin button */
        .admin-button {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }

        .btn-admin {
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-admin:hover {
            background-color: #2980b9;
        }

        /* Table styles */
        .tabla-acciones {
            width: 70%;
            border-collapse: collapse;
            margin: 20px auto; /* Centra la tabla horizontalmente */
        }

        .tabla-acciones th,
        .tabla-acciones td {
            border: 1px solid #ddd;
            padding: 0px;
            text-align: left;
            height: 40px;
            cursor: pointer;
        }

        .tabla-acciones th {
            background-color: #3498db;
            color: white;
        }

        .tabla-acciones tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Action form styles */
        .form-accion {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .accion-label {
            display: flex;
            width: 100%;
            align-items: center;
            padding: 0px;
            box-sizing: border-box;
            cursor: pointer;
        }

        .accion-nombre {
            width: 100%;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        /* Checkbox oculto pero clicable */
        .checkbox {
            visibility: hidden;
            position: absolute;
        }

        .checkbox:checked + .accion-nombre {
            text-decoration: line-through;
            color: #2ecc71;
        }

        /* Status styles */
        .estado {
            font-weight: bold;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Ajustar tamaño del checkbox visualmente */
        .checkbox:checked + .accion-nombre:before {
            content: "\f00c"; /* Unicode del ícono check de FontAwesome */
            font-family: "FontAwesome";
            display: none; /* Ya no se muestra el ícono aquí */
        }

        /* Estilos para la columna del estado */
        .icono-check {
            font-size: 1.2em;
            color: #2ecc71;
        }

        /* Eliminar bordes entre texto y icono */
        .tabla-acciones td:nth-child(2) { /* Columna de la acción */
            border-right: none; /* Quita el borde derecho */
        }

        .tabla-acciones td:nth-child(3) { /* Columna del estado (icono) */
            border-left: none; /* Quita el borde izquierdo */
        }

        .tabla-acciones th:nth-child(2) { /* Columna de la acción */
            border-right: none; /* Quita el borde derecho */
        }

        .tabla-acciones th:nth-child(3) { /* Columna del estado (icono) */
            border-left: none; /* Quita el borde izquierdo */
        }
        
        span {
            margin: 10px 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Lista de Acciones</h1>

        <!-- Botón Administrativo -->
        <div class="admin-button">
            <a href="admin_acciones.php" class="btn-admin">Administración (Agregar, Editar, Eliminar)</a>
        </div>

        <!-- Tabla de acciones -->
        <table class="tabla-acciones">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Acción</th>
                    <th></th> <!-- Nueva columna para el estado -->
                </tr>
            </thead>
            <tbody>
                <?php 
                $contador = 1; // Inicializar contador
                foreach ($acciones as $accion) : ?>
                    <tr>
                        <td><span style="margin: 10px 5px;"><?php echo $contador++; ?></span></td> <!-- Mostrar número sucesivo -->

                        <td>
                            <form action="actualizar_estado.php" method="POST" class="form-accion">
                                <input type="hidden" name="id" value="<?php echo $accion['id']; ?>">
                                <label class="accion-label">
                                    <input type="checkbox" name="completada" class="checkbox" <?php echo $accion['completada'] ? 'checked' : ''; ?> onchange="this.form.submit()">
                                    <span class="accion-nombre">
                                        <?php echo htmlspecialchars($accion['nombre_accion']); ?>
                                    </span>
                                </label>
                            </form>
                        </td>
                        <td class="estado">
                            <?php if ($accion['completada']) : ?>
                                <i class="fa fa-check icono-check" aria-hidden="true"></i> <!-- Icono del check en una nueva columna -->
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>
