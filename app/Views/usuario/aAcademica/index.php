<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buzón de Quejas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
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
        .form-container {
            margin-top: 20px;
        }
        .form-group {
            margin-bottom: 20px;
            background-color: #e9ecef; /* Color de fondo gris */
            border-radius: 10px; /* Bordes redondeados */
            padding: 20px; /* Espaciado interno */
            text-align: center; /* Centrar texto */
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn-send,
        .btn-primary {
            margin-top: 20px;
        }

        .btn-send {
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .btn-send:hover {
            background-color: #45a049;
        }

        .moderation-info {
            font-style: italic;
            color: #666;
        }
        
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg">        
        <div class="user-info">
            <i class="fas fa-user-circle user-icon"></i>
            <a href="#" class="d-block"><?= session()->get('nombre'); ?></a>
        </div>
        <a href="<?= base_url('logout'); ?>" class="btn-logout"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
    </nav>

    <div class="container">
        <div class="form-container">
            <h2 class="form-title">Queja Area Académica</h2>
            <form action="<?= base_url('usuario/aacademica/insert'); ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" name="id_usuarios" value="<?= session()->get('id_usuarios'); ?>">
                <!-- Campos del formulario -->
                <div class="form-group">
                    <label for="fecha" class="form-label">Fecha:</label>
                    <input type="date" id="fecha" name="fecha" required class="form-control form-control-sm form-input capitalize"> <!-- Aplicando capitalize aquí -->
                
                    <label for="asunto" class="form-label">Asunto:</label>
                    <input type="text" id="asunto" name="asunto" required class="form-control form-control-sm form-input capitalize"> <!-- Aplicando capitalize aquí -->
                
                    <label for="lugar" class="form-label">Lugar:</label>
                    <input type="text" id="lugar" name="lugar" required class="form-control form-control-sm form-input capitalize"> <!-- Aplicando capitalize aquí -->
                
                    <label for="descripcion" class="form-label">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" rows="4" required class="form-control form-control-sm form-input capitalize"></textarea> <!-- Aplicando capitalize aquí -->
                    <!-- Botón de enviar -->
                    <button type="submit" class="btn btn-success btn-sm btn-send"><i class="fas fa-paper-plane"></i> Enviar Queja</button>
                </div>
            </form>
            <p class="moderation-info">Favor de moderar sus comentarios.</p>
        </div>
        <a href="<?= base_url("usuario"); ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Regresar</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
