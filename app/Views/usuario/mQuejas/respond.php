<!-- app/Views/usuario/mquejas/respond.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Encabezado y estilos -->
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">Responder Retroalimentación</div>
            <div class="card-body">
                <!-- Formulario para responder retroalimentación -->
                <form action="<?= base_url('usuario/mquejas/respond/' . $feedback['id']) ?>" method="post">
                    <div class="form-group">
                        <label for="respuesta">Respuesta</label>
                        <textarea name="respuesta" id="respuesta" class="form-control" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar Respuesta</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
