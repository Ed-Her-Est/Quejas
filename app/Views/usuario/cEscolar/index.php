<?= $this->extend('plantilla/layout')?>
<?= $this->section('titulo')?>
<?= $this->section('contenido')?>

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
            <h2 class="form-title">Queja Control Escolar</h2>
            <form action="<?= base_url('usuario/cescolar/insert'); ?>" method="POST" enctype="multipart/form-data">
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

  </body>
</html>

<?= $this->endSection()?>
<?= $this->endSection()?>