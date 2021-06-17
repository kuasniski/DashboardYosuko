<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Registro de Usuario</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="http://localhost/DashboardYosuko/">home</a></li>
                        <li class="breadcrumb-item active">Registro de usuario</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
<div class="container-fluid">
    <?php if (isset($editar)): ?>
        <?php $ruta_accion = "http://localhost/DashboardYosuko/?controller=usuario&action=save&id=" . $usuario->id ?>
    <?php else: ?>
        <?php $ruta_accion = "http://localhost/DashboardYosuko/?controller=usuario&action=save" ?>
    <?php endif; ?>

    <div class="row">

        <div class="card-body register-card-body col-10 m-auto">
            <?php if (isset($_SESSION['datos-correctos'])): ?>
                <div class="alert alert-success" role="alert">
                    <?= $_SESSION['datos-correctos'] ?> 
                </div>
                <?php utils::deleteSession("persona_temp"); ?>
            <?php elseif (isset($_SESSION['datos-error'])): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $_SESSION['datos-error'] ?>
                </div>
            <?php endif; ?>

            <form action="<?= $ruta_accion ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="image col-4 m-auto" id="perfil">
                        <?php if (isset($usuario) && $usuario->imagen_path != "" ): ?>
                            <img src="uploads/usuarios/imagen/<?= $usuario->imagen_path ?>" class="img-circle img-fluid img-bordered" alt="User Image">
                        <?php else: ?>
                            <img src="uploads/usuarios/imagen/user.jpg" class="img-circle img-fluid img-bordered" alt="User Image">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <strong><?= isset($_SESSION['errores']['nombre']) ? $_SESSION['errores']['nombre'] : '' ?></strong>
                    <input type="text" class="form-control" placeholder="Nombre" name="nombre" value="<?= isset($usuario->nombre) ? $usuario->nombre : '' ?>" >
                </div>

                <div class="form-group">
                    <strong><?= isset($_SESSION['errores']['apellido']) ? $_SESSION['errores']['apellido'] : '' ?></strong>
                    <input type="text" class="form-control" placeholder="Apellido" name="apellido" value="<?= isset($usuario->apellido) ? $usuario->apellido : '' ?>" >
                </div>
                <div class="form-group">
                    <strong><?= isset($_SESSION['errores']['email']) ? $_SESSION['errores']['email'] : '' ?></strong>
                    <input type="email" class="form-control" placeholder="Email" name="email" value="<?= isset($usuario->email) ? $usuario->email : '' ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Dirección" name="direccion" value="<?= isset($usuario->email) ? $usuario->email : '' ?>">
                </div>

                <div class="form-group">
                    <strong><?= isset($_SESSION['errores']['dni']) ? $_SESSION['errores']['dni'] : '' ?></strong>
                    <input type="number" class="form-control" placeholder="Dni" name="dni" value="<?= isset($usuario->dni) ? $usuario->dni : '' ?>">
                </div>
                <div class="form-group">
                    <strong><?= isset($_SESSION['errores']['telefono']) ? $_SESSION['errores']['telefono'] : '' ?></strong>
                    <input type="text" class="form-control" placeholder="Telefono" name="telefono" value="<?= isset($usuario->telefono) ? $usuario->telefono : '' ?>">
                </div>
                <div class="form-group">
                    <strong><?= isset($_SESSION['errores']['fecha']) ? $_SESSION['errores']['fecha'] : '' ?></strong>
                    <input type="date" class="form-control" placeholder="Fecha de nacimiento" name="fecha_nacimiento" value="<?= isset($usuario->fecha_nacimiento) ? $usuario->fecha_nacimiento : '' ?>">
                </div>
                <strong><?= isset($_SESSION['errores']['imagen']) ? $_SESSION['errores']['imagen'] : '' ?></strong>
                <div class="form-group">
                    <div class="custom-file">

                        <input type="file" class="custom-file-input" id="customFile" name="imagen" value="<?= isset($usuario->imagen_path) ? $usuario->imagen_path : '' ?>">
                        <label class="custom-file-label" for="customFile">Imegen</label>
                    </div>
                </div>

                <div class="row">
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>


        <?php
        utils::deleteSession("datos-correctos");
        utils::deleteSession("datos-error");
        utils::deleteSession("errores");
        ?>
    </div>
</div>