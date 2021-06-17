<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Caja</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="http://localhost/DashboardYosuko/">home</a></li>
                    <li class="breadcrumb-item active">Gestion de Caja</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
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
                <form>
                    <div class="form-group">
                        <label>Selecccione tipo de movimiento</label>
                        <select class="form-control select2 select2-danger select2-hidden-accessible" data-dropdown-css-class="select2-danger" style="width: 100%;" data-select2-id="12" tabindex="-1" aria-hidden="true">
                            <?php $tipoFacturas = utils::getTipoFacturas(); ?>
                            <?php while($tipoFactura = $tipoFacturas->fetch_object()):?>
                                <option value="<?=$tipoFactura->id?>">
                                    <?=$tipoFactura->tipo_factura?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="row">
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Continuar</button>
                    </div>
                    <!-- /.col -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>