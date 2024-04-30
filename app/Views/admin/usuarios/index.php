<?= $this->extend('admin/template/main'); ?>

<?= $this->section('content'); ?>


<div class="card mt-3">
    <div class="card-header bg-dark">
        <div class="row">
            <div class="col">
                Usuarios
            </div>
            <div class="col">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-primary btn-sm" href="<?= base_url('admin/usuarios/new') ?>" type="button">+</a>
                </div>
            </div>

        </div>

    </div>

    <div class="card-body">
        <table class="table">
            <thead>
                <th>ID</th>
                <th>TÍTULO</th>
                <th>AUTOR</th>
                <th>FECHA DE PUBLICACIÓN</th>
                <th>ACCIONES</th>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>

                <tr>
                    <td><?= $usuario['id'] ?></td>
                    <td><?= $usuario['nombre'] . " " . $usuario['apaterno'] . " " . $usuario['amaterno'] ?></td>
                    <td><?= $usuario['email'] ?></td>
                    <td><?= $usuario['perfil'] ?></td>
                    <td>ver | eliminar</td>
                </tr>

                <?php endforeach; ?>

            </tbody>
            <tfoot>
                <th>ID</th>
                <th>TÍTULO</th>
                <th>AUTOR</th>
                <th>FECHA DE PUBLICACIÓN</th>
                <th>ACCIONES</th>
            </tfoot>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>