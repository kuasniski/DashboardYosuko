<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Listado de Usuarios</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="http://localhost/DashboardYosuko/">home</a></li>
                    <li class="breadcrumb-item active">Listado de usuarios</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="card">
        <div class="card-header">
            <form action="http://localhost/DashboardYosuko/?controller=usuario&action=buscar" method="post">
                <div class="input-group">
                    <input type="search" class="form-control form-control-lg" placeholder="buscar usuario..." name="nombre">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-lg btn-default">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered" style="text-align: center;">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Email</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Dni</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Fecha de Nacimiento</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($usu = $usuarios->fetch_object()): ?>
                        <tr id="fila">
                            <td id="lista"><?= $usu->id ?>.</td>
                            <td id="lista"><?= $usu->nombre ?></td>
                            <td id="lista"><?= $usu->apellido ?></td>
                            <td id="lista"><?= $usu->email ?></td>
                            <td id="lista"><?= $usu->direccion ?></td>
                            <td id="lista"><?= $usu->dni ?></td>
                            <td id="lista"><?= $usu->telefono ?></td>
                            <td id="lista"><?= $usu->fecha_nacimiento ?></td>
                            <td>
                                <a type="button" class="btn btn-block btn-info btn-sm" href="http://localhost/DashboardYosuko/?controller=usuario&action=editar&id=<?= $usu->id ?>">Editar</a>
                                <button action = "#" type="button" class="btn btn-block btn-danger btn-sm">Eliminar</button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">«</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">»</a></li>
            </ul>
        </div>
    </div>