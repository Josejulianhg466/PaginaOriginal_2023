<!-- include es de header, ../ es de servicios y el otro ../ es de secciones-->
<?php 
include("../../bd.php");

if (isset($_GET['txtID'])) {
    //borrar dicho registro con el ID correspondiente
    echo $_GET['txtID'];

    //recibe el dato, verifica si existe y si no lo deja en blanco
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";

    $sentencia = $conexion->prepare("DELETE FROM tbl_usuarios WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
}


//SELECCIONAR REGISTROS
$sentencia=$conexion->prepare("SELECT * FROM `tbl_usuarios`");
$sentencia->execute();
//ESTA GUARDARÁ TODOS LOS REGISTROS QUE LLEGAN Y ESTÁN DENTRO DE LA TABLA SERVICIO
//DE ESO SE ENCARGA EL (PDO::FETCH_ASSOC)
$lista_usuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);


include("../../templates/header.php") ?>

<div class="card">
    <div class="card-header">

    <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar registro</a>

    </div>
    <div class="card-body">
        
    <div class="table-responsive-sm">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Usuario</th>
                <th scope="col">Correo</th>
                <th scope="col">Contraseña</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>

        <?php foreach ($lista_usuarios as $registros){ ?>
            <tr class="">
                <td scope="row"><?php echo $registros['usuario']; ?></td>
                <td><?php echo $registros['correo']; ?></td>
                <td><?php echo $registros['password']; ?></td>
                <td><a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registros['id']; ?>" role="button">Editar</a>
                    |
                    <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registros['id']; ?>" role="button">Eliminar</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

    </div>
    <div class="card-footer text-muted">
        
    </div>
</div>





<?php include("../../templates/footer.php") ?>