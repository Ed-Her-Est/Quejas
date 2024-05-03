<?= $this->extend('plantilla/layout')?>
<?= $this->section('titulo')?>
<?= $this->section('contenido')?>

    <div class="container">
    <div class="mt-5">
        <table id="quejasTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>Fecha</th>
                <th>Asunto</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($quejas as $queja): ?>
    <?php
    // Definir un array asociativo para mapear los colores según el tipo de prioridad
    $prioridadColors = [
        'en espera' => '#87a2c7',  // Color azul claro para "en espera"
        'en proceso' => '#ffcc00', // Color amarillo claro para "en proceso"
        'hecho' => '#4caf50',      // Color verde claro para "hecho"
        'rechazada' => '#ff5252'   // Color rojo claro para "rechazada"
    ];

    // Obtener el color correspondiente a la prioridad actual
    $color = $prioridadColors[strtolower($queja['tipoPrioridad'])];
    ?>
    <tr>
        <td><?= strftime('%d de %B de %Y', strtotime($queja['fecha'])) ?></td>
        <td><?= ucfirst($queja['asunto']) ?></td>
        <td>
            <!-- Mostrar un círculo coloreado según la prioridad de la queja -->
            <div style="width: 20px; height: 20px; border-radius: 50%; background-color: <?= $color ?>; float: left; margin-right: 10px;"></div>
            <?= ucfirst($queja['tipoPrioridad']) ?>
        </td>
        <td>
            <a href="<?= base_url('usuario/mquejas/show/' . $queja['id']); ?>" class="btn btn-success">
                <i class="fa fa-eye" aria-hidden="true"></i>
            </a>
            <a href="<?= base_url('usuario/mquejas/feedback/' . $queja['id']); ?>" class="btn btn-warning">
                <i class="fa fa-comments" aria-hidden="true"></i>
            </a>
        </td>
    </tr>
<?php endforeach ?>



        </tbody>
    </table>
</div>
<a href="<?= base_url('usuario') ?>" class="btn btn-primary">
                Regresar
            </a>
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
                    // Ordenar por la primera columna (Fecha) de manera descendente
                    order: [
                        [0, 'desc']
                    ],
                     pageLength: 7 // Mostrar inicialmente 7 filas por página
                   });
                });
        </script>
</body>

</html>
<?= $this->endSection()?>
<?= $this->endSection()?>