<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Caja</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="http://localhost/DashboardYosuko/">home</a></li>
                        <li class="breadcrumb-item active">Apertura de Caja</li>
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
        <?php $ruta_accion = "http://localhost/DashboardYosuko/?controller=caja&action=apertura&id=" . $caja->id ?>
    <?php else: ?>
        <?php $ruta_accion = "http://localhost/DashboardYosuko/?controller=caja&action=apertura" ?>
    <?php endif; ?>

    <div class="row">

        <div class="card-body register-card-body col-8 m-auto">
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
                    <label>Fecha de apertura</label>
                    <strong><?= isset($_SESSION['errores']['dni']) ? $_SESSION['errores']['dni'] : '' ?></strong>
                    <input type="date" class="form-control" placeholder="Fecha de vencimiento" name="fecha_apertura" value="<?= isset($inusmo->fecha_vencimiento) ? $imsumo->fecha_vencimiento : '' ?>">
                </div>
                <div class="form-group">
                    <label>Hora de apertura</label>
                    <input name="hora_apertura" type="time" class="form-control datetimepicker-input" data-target="#timepicker">
                  </div>
                  <!-- /.form group -->
                <div class="form-group">
                    <label>Monto de apertura</label>
                    <strong><?= isset($_SESSION['errores']['nombre']) ? $_SESSION['errores']['nombre'] : '' ?></strong>
                    <input  step="any" type="number" class="form-control" placeholder="$999.99" name="monto_apertura" value="<?= isset($proveedor->nombre) ? $proveedorr->nombre : '' ?>" >
                </div>

                <div class="row">
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Apertura de Caja</button>
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