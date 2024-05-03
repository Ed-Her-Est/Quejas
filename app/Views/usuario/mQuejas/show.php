<?= $this->extend('plantilla/layout')?>
<?= $this->section('titulo')?>
<?= $this->section('contenido')?>
<body>


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Detalles de la Queja</div>
                 
                    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
                    <dl>
                        <dt>Usuario:</dt>
                        <dd><?= ucwords(strtolower($usuario->nombre_completo)) ?></dd>

                        <dt>Fecha:</dt>
                        <dd>
                            <?php
                            // Convertir la fecha a un formato más legible en español
                            setlocale(LC_TIME, 'es_ES.UTF-8');
                            $fechaFormateada = strftime('%d de %B de %Y', strtotime($queja->fecha));
                            ?>
                            <?= $fechaFormateada ?>
                        </dd>

                        <dt>Asunto:</dt>
                        <dd><?= ucwords(strtolower($queja->asunto)) ?></dd>

                        <dt>Lugar:</dt>
                        <dd><?= ucwords(strtolower($queja->lugar)) ?></dd>

                        <dt>Estado:</dt>
                        <dd><?= ucwords(strtolower($prioridad->tipoPrioridad)) ?></dd>

                        <dt>Descripción:</dt>
                        <dd><?= ucfirst(strtolower($queja->descripcion)) ?></dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-md-6">
            <a href="<?= base_url('usuario/mquejas') ?>" class="btn btn-primary btn-block">Regresar</a>
        </div>
    </div>
</div>

</body>

</html>
<?= $this->endSection()?>
<?= $this->endSection()?>