<?= $this->extend('plantilla/layout') ?>
<?= $this->section('titulo') ?>
<?= $this->section('contenido') ?>
<body>
    
<div class="container mt-5">
    <!-- Mostrar la última retroalimentación -->
    <?php if($feedback): ?>
        <div class="card">
            <div class="card-header">
                <h2>Retroalimentación:</h2>
            </div>
            <div class="card-body">
                <p><strong>Retroalimentacion anterior:</strong> <?= $feedback['descripcion'] ?></p>
             </div>
        </div>
    <?php else: ?>
        <p>No hay retroalimentación disponible.</p>
    <?php endif; ?>

    <!-- Formulario para enviar una respuesta -->
    <div class="card mt-3">
        <div class="card-header">
            <h2>Responder:</h2>
        </div>
        <div class="card-body">
        <p><strong>Tu respuesta anterior:</strong> <?= $feedback['respuesta'] ? $feedback['respuesta'] : 'Sin respuesta' ?></p>
           
            <form action="<?= base_url('usuario/mquejas/feedback/'.$feedback['id_queja']) ?>" method="post">
                <div class="form-group">
                    <label for="respuesta">Respuesta:</label>
                    <textarea class="form-control" id="respuesta" name="respuesta" rows="4" cols="50"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar respuesta</button>
            </form>
        </div>
    </div>
</div>
<!-- Botón de regresar -->
<div class="container mt-3">
    <a href="<?= base_url('usuario/mquejas') ?>" class="btn btn-primary">
        <i class="fas fa-arrow-left"></i> Regresar
    </a>
</div>
</body>
</html>
<?= $this->endSection() ?>
<?= $this->endSection() ?>
