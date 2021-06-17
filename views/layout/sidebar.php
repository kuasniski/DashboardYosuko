<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="views/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light"><?= $nombreEmpresa = "Delivery" ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex " data-toggle="dropdown">
            <div class="image">
                <?php if(isset($_SESSION['identity']) && $_SESSION['identity']->imagen_path != NULL): ?>
                    <img src="uploads/usuarios/imagen/<?=$_SESSION['identity']->imagen_path?>" class="img-circle elevation-2" alt="User Image">
                <?php else: ?>
                    <img src="uploads/usuarios/imagen/user.jpg" class="img-circle elevation-2" alt="User Image">
                <?php endif;?>
            </div>
            
            <div class="info">
                <a href="#" class="d-block"> <?= $_SESSION['identity']->nombre . " " . $_SESSION['identity']->apellido ?></a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview accordion">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-cash-register"></i>
                        <p>
                            Caja
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                         <li class="nav-item">
                            <a href="http://localhost/DashboardYosuko/?controller=caja&action=apertura" class="nav-link  ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Apertura</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link  ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cierre</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="http://localhost/DashboardYosuko/?controller=caja&action=gestion" class="nav-link  ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gestion</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Movimiento</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item has-treeview accordion">
                    <a href="#" class="nav-link active ">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>
                            Usuarios
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="http://localhost/DashboardYosuko/?controller=usuario&action=registro" class="nav-link  ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Registrar</p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="http://localhost/DashboardYosuko/?controller=usuario&action=lista" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listar</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview accordion">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>
                            Productos
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="http://localhost/DashboardYosuko/?controller=producto&action=registro" class="nav-link  ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Registrar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Movimiento</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pedidos</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-item has-treeview accordion">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>
                            Insumos
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="http://localhost/DashboardYosuko/?controller=insumo&action=registro" class="nav-link  ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Registrar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Movimiento</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pedidos al Proveedor</p>
                            </a>
                        </li>
                    </ul>
                </li>
                 <li class="nav-item has-treeview accordion">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            Proveedor
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="http://localhost/DashboardYosuko/?controller=proveedor&action=registro" class="nav-link  ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Registrar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Movimiento</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pedidos al Proveedor</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Simple Link
                            <span class="right badge badge-danger"></span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    