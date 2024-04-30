<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Queja</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
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
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }

        .card-header {
            background-color: #338343;
            color: #fff;
            font-size: 24px;
            padding: 10px 0;
        }

        .card-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .col-form-label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #338343;
            border-color: #338343;
        }

        .btn-primary:hover {
            background-color: #6a6a6a;
            border-color: #6a6a6a;
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
        .user-icon {
            font-size: 44px;
            margin-right: 10px;
            border-radius: 50%;
            background-color: #808080;
            color:#000000;
            padding: 0px;
        }

        .user-name {
            font-weight: bold;
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
    <div class="container mt-5">
<div class="card">
            <div class="card-header">Retroalimentación de Queja</div>
 
    <div class="container">
        <!-- Mostrar mensajes de error si los hay -->
        <?php if (session()->has('error')): ?>
        <div class="alert alert-danger" role="alert">
            <?= ucfirst(session('error')) ?>
        </div>
    <?php endif ?>

        <!-- Mostrar mensajes de éxito si los hay -->
        <?php if (session()->has('success')): ?>
        <div class="alert alert-success" role="alert">
            <?= ucfirst(session('success')) ?>
        </div>
    <?php endif ?>

        <div class="card">
        <div class="card-body">
        <h5 class="card-title">Detalles de la Queja</h5>
        <p class="card-text">ID: <?= $queja->id ?></p>
        <p class="card-text">Descripción: <?= ucfirst($queja->descripcion) ?></p>
        <!-- Mostrar más detalles de la queja si es necesario -->
    </div>

        <!-- Formulario para modificar la prioridad -->
        <form action="<?= base_url('admin/quejas/retroalimentaciones/' . $queja->id) ?>" method="post" class="mt-3">
            <div class="form-group">
                <label for="tipoPrioridad">Estatus</label>
                <select name="tipoPrioridad" id="tipoPrioridad" class="form-control">
                    <option value="">Seleccione...</option>
                    <option value="1" <?= ($queja->id_prioridad == 1) ? 'selected' : ''; ?>>En Espera</option>
                    <option value="2" <?= ($queja->id_prioridad == 2) ? 'selected' : ''; ?>>En Proceso</option>
                    <option value="3" <?= ($queja->id_prioridad == 3) ? 'selected' : ''; ?>>Hecho</option>
                    <option value="4" <?= ($queja->id_prioridad == 4) ? 'selected' : ''; ?>>Queja Rechazada</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Prioridad</button>
        </form>
   <!-- Mostrar retroalimentaciones anteriores si las hay -->
<?php if (!empty($retroalimentaciones)): ?>
    <div class="card mt-3">
        <div class="card-body" style="max-height: 200px; overflow-y: auto;">
            <h5 class="card-title">Retroalimentaciones Anteriores</h5>
            <ul class="list-group">
                <?php foreach ($retroalimentaciones as $retroalimentacion): ?>
                    <li class="list-group-item"><?= ucfirst($retroalimentacion['descripcion']) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
<?php endif ?>


        <!-- Formulario para agregar retroalimentación -->
        <form action="<?= base_url('admin/quejas/retroalimentaciones/' . $queja->id) ?>" method="post" class="mt-3">
            <div class="form-group">
                <label for="retroalimentacion_nueva">Nueva Retroalimentación</label>
                <textarea name="retroalimentacion_nueva" id="retroalimentacion_nueva" class="form-control" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Retroalimentación</button>
        </form>

    
    </div>
    <div class="container mt-5"><a href="<?= base_url('admin/quejas') ?>" class="btn btn-primary">
                                <i class="fas fa-arrow-left"></i> Regresar
                            </a>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
