<?= $this->extend('plantilla/layout')?>
<?= $this->section('titulo')?>
<?= $this->section('contenido')?>

    <div class="container">
        <div class="form-container">
            <h2 class="form-title">Queja Cafeteria</h2>
            <form action="<?= base_url('usuario/cafeteria/insert'); ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" name="id_usuarios" value="<?= session()->get('id_usuarios'); ?>">
                <div class="form-group">
                    <label for="fecha" class="form-label">Fecha:</label>
                    <input type="date" id="fecha" name="fecha" required class="form-control form-control-sm form-input">
                
                
                
                    <label for="asunto" class="form-label">Asunto:</label>
                    <input type="text" id="asunto" name="asunto" required class="form-control form-control-sm form-input">
                
               
                
                    <label for="lugar" class="form-label">Lugar:</label>
                    <input type="text" id="lugar" name="lugar" required class="form-control form-control-sm form-input">
                
                
                
                    <label for="descripcion" class="form-label">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" rows="4" required class="form-control form-control-sm form-input"></textarea>
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
<?= $this->endSection()?>
<?= $this->endSection()?>