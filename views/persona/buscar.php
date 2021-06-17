
        <div class="container-fluid">

            <div class="card-body register-card-body col-10 m-auto">
                <div class="alert alert-warning c-w" role="alert">
                    <h3>Para poder registrar un usuario primero debe registrar la persona.</h3><br/>
                    <p>Ingrese el dni de la presona que desea dar de alta como usuario</p>

                </div>
                <form action="http://localhost/DashboardYosuko/?controller=persona&action=getOne" method="POST">

                    <label>Buscar Persona</label>
                    <div class="form-group">
                        <input type="number"  name="BuscarDni" class="form-control" placeholder="Ingrese DNI" onchange="">
                    </div>
                </form>

                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger" role="alert">
                        <h4><?=$_SESSION['error']?></h4> Para registrarlo <a href="http://localhost/DashboardYosuko/?controller=persona&action=registro" class="alert-link">haga click aqui</a> 
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php utils::deleteSession('error')?>