<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to bottom, #338343 50%, #ffffff 50%);
            position: relative; /* Permite posicionar elementos hijos de forma absoluta */
        }

        .title-container {
            position: absolute; /* Posiciona el contenedor del título */
            top: calc(50% - 280px); /* Posición vertical del contenedor del título */
            left: 0; /* Alineación del contenedor del título al centro */
            right: 0;
            text-align: center;
            width: 100%;
        }

        .title {
            font-size: 54px;
            font-weight: bold;
            color: #ffffff; /* Color del texto */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); /* Sombra del texto */
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            max-width: 100%;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .btn {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #6a6a6a;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        /* Alinea el contenido al centro */
        @media screen and (max-width: 500px) {
            .container {
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <!-- Contenedor del título -->
    <div class="title-container">
        <div class="title">Buzón de Quejas</div>
    </div>

    <div class="container">
        <h1><i class="fas fa-user-alt"></i> INICIAR SESIÓN</h1>
        <form id="loginForm" action="<?php echo base_url('login'); ?>" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Nombre de Usuario:</label>
                <input type="text" id="username" name="username" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Recordarme
                </label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Iniciar sesión</button>
        </form>

    </div>

    <script>
        document.getElementById("loginForm").addEventListener("submit", function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            var username = formData.get("username");
            var password = formData.get("password");

            // Verificar las credenciales
            // Aquí puedes agregar la lógica para verificar las credenciales con PHP o JavaScript
            // Por ejemplo:
            // if (username === "usuario" && password === "contraseña") {
            //     // Credenciales válidas, redirigir a la página principal
            //     window.location.href = "pagina_principal.php";
            // } else {
            //     // Credenciales inválidas, mostrar un mensaje de error
            //     alert("Credenciales incorrectas. Por favor, inténtalo de nuevo.");
            // }

            // En este ejemplo, simplemente enviaremos el formulario
            this.submit();
        });
    </script>
</body>

</html>
