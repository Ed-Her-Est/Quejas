<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buzón de Quejas</title>
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
            padding: 20px; /* Aumentando el padding */
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 18px; /* Aumentando el tamaño del texto */
        }
        .container {
            max-width: 800px;
            margin: 0 auto; /* Centrar el contenedor */
            padding: 20px;
            text-align: center;
        }
        .area-modules {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        .area-module {
            width: 200px;
            height: 200px;
            background-color: #338343;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .area-module:hover {
            background-color: #6a6a6a;
        }
        .area-module a {
            color: #000000;
            text-decoration: none;
            font-size: 20px;
            margin-top: 10px;
        }
        .module-title {
            font-size: 24px;
            margin-top: 10px;
        }
        .module-icon {
            font-size: 48px;
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
            background-color: #6a6a6a; /* Cambiando el color del botón */
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            color: #fff;
            transition: background-color 0.3s;
        }
        .btn-logout:hover {
            background-color: #444; /* Cambiando el color al pasar el ratón */
        }
        .user-icon {
            font-size: 44px;
            margin-right: 10px;
            border-radius: 50%;
            background-color: #808080;
            color:#000000;
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
    <div class="container mt-5">
        <h1 class="mb-4">Administración de Quejas</h1>
        <div class="area-modules">
            
            <div class="area-module">
            <a href="<?= base_url('admin/quejas') ?>">
                    <i class="fas fa-exclamation-circle module-icon"></i>
                    <span class="module-title">Quejas</span>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
