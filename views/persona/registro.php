
<div class="container-fluid">

    <div class="row">
         <?php if (isset($_SESSION['datos-correctos'])): ?>
            <div class="alert alert-success" role="alert">
                <?= $_SESSION['datos-correctos'] ?> 
            </div>
            <div class="card-body col-12 bg-dark ">
                <a class="btn btn-app bg-primary" href="http://localhost/DashboardYosuko/?controller=usuario&action=registro">
                    <i class="fas fa-users"></i> Registrar como Usuarios
                </a>
                <a class="btn btn-app bg-primary">
                    <i class="fas fa-user"></i> Registrar como Empleados
                </a>
                <a class="btn btn-app bg-primary">
                    <i class="fas fa-inbox"></i> Registrar como Proveedores
                </a>
            </div>
        <?php elseif (isset($_SESSION['datos-error'])): ?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['datos-error'] ?>
        </div>
        <?php else: ?>
            <div class="card-body register-card-body col-10 m-auto ">
            <p class="login-box-msg">Ingrese los datos</p>

            <form action="http://localhost/DashboardYosuko/?controller=persona&action=save" method="post">
                <div class="form-group">
                    <input type="number" class="form-control" name="dni" placeholder="Dni" onchange="" value="<?= isset($persona) && is_object($persona) ? $persona->dni : '' ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?= isset($persona) && is_object($persona) ? $persona->nombre : '' ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="apellido" placeholder="apellido" value="<?= isset($persona) && is_object($persona) ? $persona->apellido : '' ?>">
                </div>
                <div class="form-group">
                    <input type="date" class="form-control" name="fecha_nacimiento" placeholder="Fecha nacimiento" value="<?= isset($persona) && is_object($persona) ? $persona->fecha_nacimiento : '' ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="domicilio" placeholder="Domicilio" value="<?= isset($persona) && is_object($persona) ? $persona->domicilio : '' ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="telefono" placeholder="Telefono" value="<?= isset($persona) && is_object($persona) ? $persona->telefono : '' ?>">
                </div>

                
                <div class="row">
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            
        </div>
        <?php 
            endif; 
            utils::deleteSession("datos-correctos");
            utils::deleteSession("datos-error");
        ?>
        
    </div>
</div>