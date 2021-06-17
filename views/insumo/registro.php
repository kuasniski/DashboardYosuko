<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Registro de Insumo</h1>
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
        <?php $ruta_accion = "http://localhost/DashboardYosuko/?controller=insumo&action=save&id=" . $usuario->id ?>
    <?php else: ?>
        <?php $ruta_accion = "http://localhost/DashboardYosuko/?controller=insumo&action=save" ?>
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
                  <label>Seleccione proveedor</label>
                  <select class="form-control select2 select2-hidden-accessible " style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                      <?php $proveedores = utils::getProveedores(); ?>
                      <?php while($proveedor = $proveedores->fetch_object()): ?>
                            <option  value="<?=$proveedor->id?>">
                                <?=$proveedor->nombre?>
                            </option>
                        <?php endwhile; ?>
                  </select>
                  
                </div>
                
                <div class="form-group">
                    <label>Detalle</label>
                    <strong><?= isset($_SESSION['errores']['nombre']) ? $_SESSION['errores']['nombre'] : '' ?></strong>
                    <input type="text" class="form-control" placeholder="Nombre" name="nombre" value="<?= isset($insumo->nombre) ? $insumo->nombre : '' ?>" >
                </div>
                
                <div class="form-group">
                    <label>Costo</label>
                    <strong><?= isset($_SESSION['errores']['apellido']) ? $_SESSION['errores']['apellido'] : '' ?></strong>
                    <input type="number" class="form-control" placeholder="Costo" name="costo" value="<?= isset($insumo->costo) ? $insumo->costo : '' ?>" >
                </div>
                <div class="form-group">
                    <label>Cantidad</label>
                    <strong><?= isset($_SESSION['errores']['email']) ? $_SESSION['errores']['email'] : '' ?></strong>
                    <input type="number" class="form-control" placeholder="Cantidad" name="cantidad" value="<?= isset($imsumo->cantidad) ? $insumo->cantidad : '' ?>">
                </div>
                <div class="form-group">
                    <label>Unidad de medida</label>
                    <input type="text" class="form-control" placeholder="Unidad de medida" name="unidad_medida" value="<?= isset($insumo->umidad_medida) ? $imsumo->unidad_medida : '' ?>">
                </div>

                <div class="form-group">
                    <label>Fecha de vencimiento</label>
                    <strong><?= isset($_SESSION['errores']['dni']) ? $_SESSION['errores']['dni'] : '' ?></strong>
                    <input type="date" class="form-control" placeholder="Fecha de vencimiento" name="fecha_vencimiento" value="<?= isset($inusmo->fecha_vencimiento) ? $imsumo->fecha_vencimiento : '' ?>">
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
    <script>
        document.querySelector("body > div.wrapper > div.content-wrapper > section.content > div > div:nth-child(1) > div.card-body > div:nth-child(1) > div:nth-child(1) > div:nth-child(1)")
    </script>
</div>