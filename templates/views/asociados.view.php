<?php
require_once __DIR__ . '/../inicio.part.php';
require_once __DIR__ . '/../navegacion.part.php';
?>

<div id="asociados">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                <h1 class="text-center">Asociados</h1>
                <h2>Registrar un asociado:</h2>
                <hr>

                <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
                <div class="alert alert-<?= empty($errores) ? 'info' : 'danger'; ?> alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?php if (empty($errores)) : ?>
                    <p><?= htmlspecialchars($mensaje); ?></p>
                    <?php else : ?>
                    <ul>
                        <?php foreach ($errores as $error) : ?>
                        <li><?= htmlspecialchars($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

                <form class="form-horizontal" action="asociados.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label class="control-label" for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= htmlspecialchars($nombre); ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label class="control-label" for="descripcion">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion"><?= htmlspecialchars($descripcion); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label class="control-label" for="logo">Logo</label>
                            <input class="form-control-file" type="file" id="logo" name="logo">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label class="control-label" for="codigo-captcha">Introduce el captcha <img src="/src/utils/captcha.php" id="captcha" alt="Código de seguridad" style="border: 1px solid #D3D0D0;"></label>
                            <input class="form-control" type="text" id="codigo-captcha" name="captcha" autocomplete="off">
                            <button type="submit" class="pull-right btn btn-lg sr-button">ENVIAR</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
require_once __DIR__ . '/../fin.part.php';
