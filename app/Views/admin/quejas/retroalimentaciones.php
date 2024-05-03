<?= $this->extend('plantilla/layout') ?>
<?= $this->section('titulo') ?>
<?= $this->section('contenido') ?>
<body>

<div class="container mt-5">
    <!-- Tabs para dividir la vista -->
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-detalles-tab" data-bs-toggle="pill" data-bs-target="#pills-detalles" type="button" role="tab" aria-controls="pills-detalles" aria-selected="true">Detalles de la Queja</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-retroalimentaciones-tab" data-bs-toggle="pill" data-bs-target="#pills-retroalimentaciones" type="button" role="tab" aria-controls="pills-retroalimentaciones" aria-selected="false">Retroalimentaciones de la Queja</button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <!-- Primera pestaña: Detalles y actualización de estado -->
        <div class="tab-pane fade show active" id="pills-detalles" role="tabpanel" aria-labelledby="pills-detalles-tab">
            <div class="card">
                <div class="card-header">Información y Cambio del Estado de la Queja</div>
                <div class="card-body">
                    <!-- Contenido de detalles y formulario para modificar la prioridad -->
                    <!-- Mostrar mensajes de error si los hay -->
                    <?php if (session()->has('error')): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= ucfirst(session('error')) ?>
                        </div>
                    <?php endif ?>

                    <!-- Mostrar mensajes de éxito si los hay -->
                    <?php if (session()->has('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <?= ucfirst(session('success')) ?>
                        </div>
                    <?php endif ?>

                    <!-- Sección de detalles de la queja -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Detalles de la Queja</h5>
                            <p class="card-text">ID: <?= $queja->id ?></p>
                            <p class="card-text">Descripción: <?= ucfirst($queja->descripcion) ?></p>
                            <!-- Mostrar más detalles de la queja si es necesario -->
                        </div>
                    </div>

                    <!-- Formulario para modificar la prioridad -->
                    <form action="<?= base_url('admin/quejas/retroalimentaciones/' . $queja->id) ?>" method="post" class="mt-3">
                        <div class="form-group">
                            <label for="tipoPrioridad">Estado</label>
                            <select name="tipoPrioridad" id="tipoPrioridad" class="form-control">
                                <option value="">Seleccione...</option>
                                <option value="1" <?= ($queja->id_prioridad == 1) ? 'selected' : ''; ?>>En Espera</option>
                                <option value="2" <?= ($queja->id_prioridad == 2) ? 'selected' : ''; ?>>En Proceso</option>
                                <option value="3" <?= ($queja->id_prioridad == 3) ? 'selected' : ''; ?>>Hecho</option>
                                <option value="4" <?= ($queja->id_prioridad == 4) ? 'selected' : ''; ?>>Rechazada</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar Estado</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Segunda pestaña: Retroalimentaciones anteriores y nueva retroalimentación -->
<div class="tab-pane fade" id="pills-retroalimentaciones" role="tabpanel" aria-labelledby="pills-retroalimentaciones-tab">
    <div class="card">
        <div class="card-header">Retroalimentaciones Anteriores y Nueva Retroalimentación</div>
        <div class="card-body">
            <!-- Contenido de retroalimentaciones anteriores y formulario para agregar nueva retroalimentación -->
            <!-- Sección de retroalimentaciones anteriores -->
            <?php if (!empty($retroalimentaciones)): ?>
                <div class="card">
                    <div class="card-body" style="max-height: 200px; overflow-y: auto;">
                        <h5 class="card-title">Retroalimentaciones Anteriores</h5>
                        <ul class="list-group">
                            <?php foreach ($retroalimentaciones as $retroalimentacion): ?>
                                <li class="list-group-item"><?= ucfirst($retroalimentacion['descripcion']) ?></li>
                                <?php if (!empty($retroalimentacion['respuesta'])): ?>
                                    <li class="list-group-item">Respuesta del Usuario: <?= ucfirst($retroalimentacion['respuesta']) ?></li>
                                <?php endif ?>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            <?php endif ?>

            <!-- Formulario para agregar retroalimentación -->
            <form action="<?= base_url('admin/quejas/retroalimentaciones/' . $queja->id) ?>" method="post" class="mt-3">
                <div class="form-group">
                    <label for="retroalimentacion_nueva">Nueva Retroalimentación</label>
                    <textarea name="retroalimentacion_nueva" id="retroalimentacion_nueva" class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Agregar Retroalimentación</button>
            </form>
        </div>
    </div>
</div>


<!-- Botón de regresar -->
<div class="container mt-3">
    <a href="<?= base_url('admin/quejas') ?>" class="btn btn-primary">
        <i class="fas fa-arrow-left"></i> Regresar
    </a>
</div>

<?= $this->endSection() ?>
<?= $this->endSection() ?>
