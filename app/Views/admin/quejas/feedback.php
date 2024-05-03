<?= $this->extend('plantilla/layout')?>
<?= $this->section('titulo')?>
<?= $this->section('contenido')?>



<body>

<div class="container mt-5">
    <div class="card">
        <div class="card-header text-center">Retroalimentación de Queja</div>
 
        <div class="card-body">
            <form action="<?= base_url('admin/quejas/feedback/' . $queja->id); ?>" method="post">
 
                
                    <label for="tipoPrioridad" class="col-form-label text-center">Estatus</label>
                    <select name="tipoPrioridad" id="tipoPrioridad" class="form-control" required>
                        <option value="">Seleccione...</option>
                        <option value="1" <?= ($prioridad->tipoPrioridad == 1) ? 'selected' : ''; ?>>En Espera</option>
                        <option value="2" <?= ($prioridad->tipoPrioridad == 2) ? 'selected' : ''; ?>>En Proceso</option>
                        <option value="3" <?= ($prioridad->tipoPrioridad == 3) ? 'selected' : ''; ?>>Hecho</option>
                        <option value="4" <?= ($prioridad->tipoPrioridad == 4) ? 'selected' : ''; ?>>Queja Rechazada</option>
                    </select>
                </div>

                <!-- Campo de retroalimentación -->
               
                    <label for="queja" class="col-form-label text-center">Retroalimentación</label>
                    <textarea name="retroalimentacion" id="retroalimentacion" class="form-control" rows="4" required></textarea>
                </div>

                <!-- Botón de enviar retroalimentación -->
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i> Enviar Retroalimentación
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

</button>
                        
            </div> 
        </div>    
         <div class="container mt-5"><a href="<?= base_url('admin/quejas') ?>" class="btn btn-primary">
                                <i class="fas fa-arrow-left"></i> Regresar
                            </a>
    </div>

</body>

</html>
<?= $this->endSection()?>
<?= $this->endSection()?>