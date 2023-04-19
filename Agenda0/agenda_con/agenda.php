<?php include 'template/header.php' ?> 

<?php
include_once "model/conexion.php";
$sentencia = $bd -> query("select * from persona");
$persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>



<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <!-- Inicio alerta -->
                <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta' ){
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                 <strong>Error!</strong> Rellena todos los campos.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>

                <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado' ){
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                 <strong>Registrado!</strong> Se agrego el contacto.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>

                <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error' ){
                ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                 <strong>Error!</strong> Vuelve a intentarlo.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>
                
                <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                 <strong>Cambiado!</strong> El contacto se ha actualizado.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>

                <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
                ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                 <strong>Eliminado!</strong> El contacto se ha eliminado.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>

                <!-- Final alerta -->
                <div class="card-hearder">
                    Lista de contactos
                </div>
                <div class="p-4">
                        <table class="table aling-middle">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Email address</th>
                                    <th scope="col" colspan="2">Modify</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php
                                     foreach($persona as $dato){ 
                                 ?>

                                <tr class="">
                                    <td scope="row"><?php echo $dato->codigo; ?></td>
                                    <td><?php echo $dato->nombre; ?></td>
                                    <td><?php echo $dato->apellido; ?></td>
                                    <td><?php echo $dato->email; ?></td>
                                    <td><a class="text-success" href="editar.php?codigo=<?php echo $dato->codigo; ?>"> <i class="bi bi-pencil-square"></i> </a></td>
                                    <td><a onclick="return confirm('Estas seguro de que quieres eliminar?');" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->codigo; ?>"> <i class="bi bi-trash"></i> </a></td>
                                </tr>

                                <?php
                                    }
                                 ?>

                            </tbody>
                        </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar contactos:
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                        <label class="form-label">First Name: </label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Last Name: </label>
                        <input type="text" class="form-control" name="txtApellido" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email: </label>
                        <input type="text" class="form-control" name="txtCorreo" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mobile #</label>
                        <input type="number" class="form-control" name="txtNumero" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?> 