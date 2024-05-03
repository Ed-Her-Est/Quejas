<?= $this->extend('plantilla/layout')?>
<?= $this->section('titulo')?>
<?= $this->section('contenido')?>

<body>

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

</body>
</html>

<?= $this->endSection()?>
<?= $this->endSection()?>