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
            <a href="#" class="d-block"><?= ucwords(strtolower(session()->get('nombre'))); ?></a>
        </div>
        <a href="<?= base_url('logout'); ?>" class="btn-logout"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detalles de la Queja</div>

                    <div class="card-body">
    <div class="form-group row">
        <label for="id_usuarios" class="col-md-4 col-form-label text-md-right">Usuario</label>
        <div class="col-md-6">
    <p><?= ucwords(strtolower($usuario->nombre_completo)) ?></p>
</div>
    </div>

    <div class="form-group row">
    <label for="fecha" class="col-md-4 col-form-label text-md-right">Fecha</label>
    <div class="col-md-6">
        <?php
        // Convertir la fecha a un formato más legible en español
        setlocale(LC_TIME, 'es_ES.UTF-8');
        $fechaFormateada = strftime('%d de %B de %Y', strtotime($queja->fecha));
        ?>
        <p><?= $fechaFormateada ?></p>
    </div>
</div>


    <div class="form-group row">
        <label for="asunto" class="col-md-4 col-form-label text-md-right">Asunto</label>
        <div class="col-md-6">
            <p><?= ucwords(strtolower($queja->asunto)) ?></p>
        </div>
    </div>

    <div class="form-group row">
        <label for="lugar" class="col-md-4 col-form-label text-md-right">Lugar</label>
        <div class="col-md-6">
            <p><?= ucwords(strtolower($queja->lugar)) ?></p>
        </div>
    </div>

    <div class="form-group row">
        <label for="id_prioridad" class="col-md-4 col-form-label text-md-right">Prioridad</label>
        <div class="col-md-6">
            <p><?= ucwords(strtolower($prioridad->tipoPrioridad)) ?></p>
        </div>
    </div>

    <div class="form-group row">
        <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripción</label>
        <div class="col-md-6">
            <p><?= ucfirst(strtolower($queja->descripcion)) ?></p>
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <a href="<?= base_url('usuario/mquejas') ?>" class="btn btn-primary">
                Regresar
            </a>
        </div>
    </div>
</div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   
</body>

</html>
