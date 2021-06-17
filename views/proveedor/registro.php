<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Registro de Proveedor</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="http://localhost/DashboardYosuko/">home</a></li>
                        <li class="breadcrumb-item active">Registro de proveedor</li>
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
        <?php $ruta_accion = "http://localhost/DashboardYosuko/?controller=proveedor&action=save&id=" . $proveedor->id ?>
    <?php else: ?>
        <?php $ruta_accion = "http://localhost/DashboardYosuko/?controller=proveedor&action=save" ?>
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
                    <strong><?= isset($_SESSION['errores']['nombre']) ? $_SESSION['errores']['nombre'] : '' ?></strong>
                    <input type="text" class="form-control" placeholder="Nombre" name="nombre" value="<?= isset($proveedor->nombre) ? $proveedorr->nombre : '' ?>" >
                </div>

                <div class="form-group">
                    <strong><?= isset($_SESSION['errores']['apellido']) ? $_SESSION['errores']['apellido'] : '' ?></strong>
                    <input type="number" class="form-control" placeholder="CUIT sin guion" name="cuit" value="<?= isset($proveedor->cuit) ? $proveedor->cuit : '' ?>" >
                </div>
                <div class="form-group">
                    <strong><?= isset($_SESSION['errores']['email']) ? $_SESSION['errores']['email'] : '' ?></strong>
                    <input type="text" class="form-control" placeholder="Dirección" name="direccion" value="<?= isset($proveedor->direccion) ? $proveedor->direccion : '' ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Telefono" name="telefono" value="<?= isset($proveedor->telefono) ? $proveedor->telefono : '' ?>">
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