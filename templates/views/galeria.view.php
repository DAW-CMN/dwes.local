<?php
require_once __DIR__ . '/../inicio.part.php';
require_once __DIR__ . '/../navegacion.part.php';
?>

<div id="galeria">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                <h1 class="text-center">Galería</h1>
                <p class="text-center">Nuestros viajeros comparten aquí sus mejores experiencias.</p>
                <h2>Subir imágenes:</h2>
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

                <form class="form-horizontal" action="galeria.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label class="control-label" for="imagen">Imagen</label>
                            <input class="form-control-file" type="file" id="imagen" name="imagen">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label class="control-label" for="titulo">Título</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" value="<?= htmlspecialchars($titulo); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label class="control-label" for="descripcion">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion"><?= htmlspecialchars($descripcion); ?></textarea>
                            <button type="submit" class="pull-right btn btn-lg sr-button">ENVIAR</button>
                        </div>
                    </div>
                </form>
                <hr class="divider">
                <div class="imagenes_galeria"></div>
            </div>
        </div>
    </div>
</div>

<?php
require_once __DIR__ . '/../fin.part.php';
