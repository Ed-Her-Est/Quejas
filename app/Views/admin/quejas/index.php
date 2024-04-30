<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Quejas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<style>
    .capitalize {
        text-transform: capitalize;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }

    .navbar {
        background-color: #338343;
        color: #fff;
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 18px;
    }

    .container {
        max-width: 95%;
        margin: 0 auto;
        padding: 20px;
        text-align: center;
    }

    .table-custom {
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 1rem;
        background-color: #4CAF50;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .table-custom th,
    .table-custom td {
        padding: 0.75rem;
        text-align: left;
        border: 1px solid #4CAF50;
    }

    .table-custom th {
        background-color: #4CAF50;
        color: #green;
    }

    .user-info {
        display: flex;
        align-items: center;
    }

    .user-info a {
        margin-right: 20px;
        text-decoration: none;
        color: #fff;
        font-size: 18px;
    }

    .btn-logout {
        background-color: #6a6a6a;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        color: #fff;
        transition: background-color 0.3s;
    }

    .btn-logout:hover {
        background-color: #444;
    }

    .user-icon {
        font-size: 44px;
        margin-right: 10px;
        border-radius: 50%;
        background-color: #808080;
        color: #000000;
        padding: 0px;
    }
</style>

</head>

<body>

    <div class="navbar">
        <div class="user-info">
            <i class="fas fa-user-circle user-icon"></i>
            <a href="#" class="d-block"><?= session()->get('nombre'); ?></a>
        </div>
        <a href="<?= base_url('logout'); ?>" class="btn-logout"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
    </div>
    <div class="container">
    <div class="mt-5">
        <table id="quejasTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Fecha</th>
                    <th>Asunto</th>
                    <th>Prioridad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($quejas as $queja) : ?>
    <?php
    // Establecer el idioma local en español latino
    setlocale(LC_TIME, 'es_ES.UTF-8');

    // Humanizar la fecha
    $fechaHumana = strftime('%d de %B de %Y', strtotime($queja->fecha));

    // Definir un array asociativo para mapear los colores según el tipo de prioridad
    $prioridadColors = [
        'en espera' => '#87a2c7', // Color azul claro para "En Espera"
        'en proceso' => '#ffcc00', // Color amarillo claro para "En Proceso"
        'hecho' => '#4caf50', // Color verde claro para "Hecho"
        'rechazada' => '#ff5252' // Color rojo claro para "Rechazada"
    ];

    // Obtener el color correspondiente a la prioridad actual
    $color = $prioridadColors[strtolower($queja->tipoPrioridad)];
    ?>
    <tr>
        <td class="capitalize"><?= ucfirst($queja->nombre_usuario) ?></td>
        <td><?= $fechaHumana ?></td>
        <td class="capitalize"><?= $queja->asunto ?></td>
        <td>
            <!-- Mostrar un círculo coloreado según la prioridad de la queja -->
            <div style="display: flex; align-items: center;">
                 <div style="width: 20px; height: 20px; border-radius: 50%; background-color: <?= $color ?>; margin-right: 15px;"></div>
                <span><?= ucfirst($queja->tipoPrioridad) ?></span>
            </div>
        </td>
            <td class="text-center">
                <a href="<?= base_url('admin/quejas/show/' . $queja->id); ?>" class="btn btn-success btn-sm">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </a>
                <a href="<?= base_url('admin/quejas/feedback/' . $queja->id); ?>" class="btn btn-warning btn-sm">
                    <i class="fa fa-comments" aria-hidden="true"></i>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>

            </tbody>
        </table> <a href="<?= base_url('admin') ?>" class="btn btn-primary">
                Regresar
            </a>
    </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"></script>
    <script>
        $(document).ready(function() {
            $('#quejasTable').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
                },
                order: [
                    [1, 'desc'] // Ordenar por la segunda columna (fecha) de manera descendente
                ]
            });
        });
    </script>
</body>

</html>
