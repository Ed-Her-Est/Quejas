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
            <div class="card-header">Retroalimentacion de Queja</div>

            <div class="card-body">
                <div class="form-group row">
                    <label for="descripcion" class="col-md-4 col-form-label text-md-right">Retroalimentacion</label>
                    <div class="col-md-6">
                        <p><?= ucfirst($feedback['descripcion']) ?></p>
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

</body>

</html>
