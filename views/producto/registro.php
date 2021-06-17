<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Registro de Producto</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="http://localhost/DashboardYosuko/">home</a></li>
                        <li class="breadcrumb-item active">Registro de Insumo</li>
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
        <?php $ruta_accion = "http://localhost/DashboardYosuko/?controller=producto&action=save&id=" . $usuario->id ?>
    <?php else: ?>
        <?php $ruta_accion = "http://localhost/DashboardYosuko/?controller=producto&action=save" ?>
    <?php endif; ?>

    <div class="row">

        <div class="card-body register-card-body col-10 m-auto">
            <?php if (isset($_SESSION['datos-correctos'])): ?>
                <div class="alert alert-success" role="alert">
                    <?= $_SESSION['datos-correctos'] ?> 
                </div>
                
            <?php elseif (isset($_SESSION['datos-error'])): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $_SESSION['datos-error'] ?>
                </div>
            <?php endif; ?>
             
            <form action="<?= $ruta_accion ?>" method="post" enctype="multipart/form-data">
                
                <div class="form-group">
                    <label>Detalle</label>
                    <strong><?= isset($_SESSION['errores']['nombre']) ? $_SESSION['errores']['nombre'] : '' ?></strong>
                    <input type="text" class="form-control" placeholder="Detalle" name="descripcion" value="<?= isset($producto->detalle) ? $producto->detelle : '' ?>" >
                </div>
                
                <div class="form-group">
                    <label>Costo</label>
                    <strong><?= isset($_SESSION['errores']['apellido']) ? $_SESSION['errores']['apellido'] : '' ?></strong>
                    <input type="number" class="form-control" placeholder="Costo" name="costo" value="<?= isset($producto->costo) ? $producto->costo : '' ?>" >
                </div>
                <div class="form-group">
                    <label>Precio de Venta</label>
                    <strong><?= isset($_SESSION['errores']['email']) ? $_SESSION['errores']['email'] : '' ?></strong>
                    <input type="number" class="form-control" placeholder="Precio de Venta" name="precio_venta" value="<?= isset($producto->precio_venta) ? $producto->precio_venta : '' ?>">
                </div>
                <div class="form-group">
                    <label>Cantidad</label>
                    <input type="number" class="form-control" placeholder="Cantidad" name="cantidad" value="<?= isset($producto->cantidad) ? $producto->cantidad : '' ?>">
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