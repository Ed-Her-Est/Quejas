<?= $this->extend('plantilla/layout')?>
<?= $this->section('titulo')?>
<?= $this->section('contenido')?>

    <div class="container mt-5">
        <h1 class="mb-4">Buzón de Quejas</h1>
        <div class="area-modules">
            <div class="area-module">
                <a href="<?= base_url('usuario/aadmin') ?>">
                    <i class="fas fa-user-tie module-icon"></i>
                    <span class="module-title">Área Administrativa</span>
                </a>
            </div>
            <div class="area-module">
            <a href="<?= base_url('usuario/cescolar') ?>">
                    <i class="fas fa-chalkboard-teacher module-icon"></i>
                    <span class="module-title">Control Escolar</span>
                </a>
            </div>
            <div class="area-module">
            <a href="<?= base_url('usuario/papeleria') ?>">
                    <i class="fas fa-file-alt module-icon"></i>
                    <span class="module-title">Papelería</span>
                </a>
            </div>
            <div class="area-module">
            <a href="<?= base_url('usuario/cafeteria') ?>">
                    <i class="fas fa-coffee module-icon"></i>
                    <span class="module-title">Cafetería</span>
                </a>
            </div>
            <div class="area-module">
            <a href="<?= base_url('usuario/aacademica') ?>">
                    <i class="fas fa-graduation-cap module-icon"></i>
                    <span class="module-title">Área Académica</span>
                </a>
            </div>
            <div class="area-module">
            <a href="<?= base_url('usuario/mquejas') ?>">
                    <i class="fas fa-exclamation-circle module-icon"></i>
                    <span class="module-title">Mis Quejas</span>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
<?= $this->endSection()?>
<?= $this->endSection()?>