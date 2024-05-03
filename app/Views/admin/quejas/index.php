<?= $this->extend('plantilla/layout')?>
<?= $this->section('titulo')?>
<?= $this->section('contenido')?>


<body>

  
    <div class="container">
    <div class="mt-5">
        <table id="quejasTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Fecha</th>
                    <th>Asunto</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($quejas as $queja) : ?>
    <?php
    // Establecer el idioma local en español latino
    setlocale(LC_TIME, 'es_ES.UTF-8');

    // Humanizar la fecha
    $fechaHumana = strftime('%d de %B de %Y', strtotime($queja->fecha));

    // Definir un array asociativo para mapear los colores según el tipo de prioridad
    $prioridadColors = [
        'en espera' => '#87a2c7', // Color azul claro para "En Espera"
        'en proceso' => '#ffcc00', // Color amarillo claro para "En Proceso"
        'hecho' => '#4caf50', // Color verde claro para "Hecho"
        'rechazada' => '#ff5252' // Color rojo claro para "Rechazada"
    ];

    // Obtener el color correspondiente a la prioridad actual
    $color = $prioridadColors[strtolower($queja->tipoPrioridad)];
    ?>
    <tr>
        <td class="capitalize"><?= ucfirst($queja->nombre_usuario) ?></td>
        <td><?= $fechaHumana ?></td>
        <td class="capitalize"><?= $queja->asunto ?></td>
        <td>
            <!-- Mostrar un círculo coloreado según la prioridad de la queja -->
            <div style="display: flex; align-items: center;">
                 <div style="width: 20px; height: 20px; border-radius: 50%; background-color: <?= $color ?>; margin-right: 15px;"></div>
                <span><?= ucfirst($queja->tipoPrioridad) ?></span>
            </div>
        </td>
            <td class="text-center">
                <a href="<?= base_url('admin/quejas/show/' . $queja->id); ?>" class="btn btn-success btn-sm">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </a>
                <a href="<?= base_url('admin/quejas/feedback/' . $queja->id); ?>" class="btn btn-warning btn-sm">
                    <i class="fa fa-comments" aria-hidden="true"></i>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>

            </tbody>
        </table> <a href="<?= base_url('admin') ?>" class="btn btn-primary">
                Regresar
            </a>
    </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"></script>
    <script>
    $(document).ready(function() {
        $('#quejasTable').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
            },
            order: [
                [1, 'desc'] // Ordenar por la segunda columna (fecha) de manera descendente
            ],
            pageLength: 7 // Mostrar inicialmente 7 filas por página
        });
    });
</script>

</body>

</html>

<?= $this->endSection()?>
<?= $this->endSection()?>