<!-- include es de header, ../ es de servicios y el otro ../ es de secciones-->
<?php 
include("../../bd.php");


if(isset($_GET['txtID'])){
 //recupera los datos del ID correspondiente ( seleccionado )
 $txtID=( isset($_GET['txtID']) )?$_GET['txtID']:"";

 $sentencia = $conexion->prepare("SELECT imagen FROM tbl_equipo WHERE id=:id");
 $sentencia->bindParam(":id", $txtID);
 $sentencia->execute();
 $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);

 if(isset($registro_imagen["imagen"])){

     //elimina el archivo de la carpeta la imagen 
     if(file_exists("../../../assets/img/team/".$registro_imagen["imagen"])){
         unlink("../../../assets/img/team/".$registro_imagen["imagen"]);
     }

 }
 //elimina el archivo de la carpeta la imagen 
 $sentencia = $conexion->prepare("DELETE FROM tbl_equipo WHERE id=:id");
 $sentencia->bindParam(":id", $txtID);
 $sentencia->execute();
}

//SELECCIONAR REGISTROS
$sentencia=$conexion->prepare("SELECT * FROM `tbl_equipo`");
$sentencia->execute();
//ESTA GUARDARÁ TODOS LOS REGISTROS QUE LLEGAN Y ESTÁN DENTRO DE LA TABLA SERVICIO
//DE ESO SE ENCARGA EL (PDO::FETCH_ASSOC)
$lista_entradas = $sentencia->fetchAll(PDO::FETCH_ASSOC);

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
                    <th scope="col">ID</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Puesto</th>
                    <th scope="col">Redes Sociales</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($lista_entradas as $registros){ ?>
                <tr class="">
                    <td><?php echo $registros['ID']; ?></td>
                    <td><img width="50" src="../../../assets/img/team/<?php echo $registros['imagen'];?>" /></td>
                    <td><?php echo $registros['nombrecompleto']; ?></td>
                    <td><?php echo $registros['puesto']; ?></td>
                    <td>
                    <?php echo $registros['twitter']; ?>
                    <br>
                    <?php echo $registros['facebook']; ?>
                    <br>
                    <?php echo $registros['twitter']; ?>
                    </td>
                    
                    
                    <td>
                        <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registros['ID']; ?>" role="button">Editar</a>
                                |
                        <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registros['ID']; ?>" role="button">Eliminar</a>
                    </td>
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