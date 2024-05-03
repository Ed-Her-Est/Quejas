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
        max-width: 95%;
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
        .ticket {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 20px;
    margin-bottom: 20px;
}

.ticket-field {
    text-align: left;
}

.ticket-value {
    text-align: right;
}

        
    </style>
</head>
</body>