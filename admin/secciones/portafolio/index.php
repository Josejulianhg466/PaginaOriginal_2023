<!-- include es de header, ../ es de servicios y el otro ../ es de secciones-->
<?php 

include("../../bd.php");
if(isset($_GET['txtID'])){
    //recupera los datos del ID correspondiente ( seleccionado )
    $txtID=( isset($_GET['txtID']) )?$_GET['txtID']:"";

    $sentencia = $conexion->prepare("SELECT imagen FROM tbl_portafolio WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);

    if(isset($registro_imagen["imagen"])){

        //elimina el archivo de la carpeta la imagen 
        if(file_exists("../../../assets/img/portfolio/".$registro_imagen["imagen"])){
            unlink("../../../assets/img/portfolio/".$registro_imagen["imagen"]);
        }

    }
    //elimina el archivo de la carpeta la imagen 
    $sentencia = $conexion->prepare("DELETE FROM tbl_portafolio WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
}
//SELECCIONAR REGISTROS
$sentencia=$conexion->prepare("SELECT * FROM `tbl_portafolio`");
$sentencia->execute();
//ESTA GUARDARÁ TODOS LOS REGISTROS QUE LLEGAN Y ESTÁN DENTRO DE LA TABLA SERVICIO
//DE ESO SE ENCARGA EL (PDO::FETCH_ASSOC)
$lista_portafolio = $sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php"); ?>

<div class="card">
    <div class="card-header">
        <!--header-->
    <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar registro</a>
    </div>
    <div class="card-body">
        <!--body-->
        <!--se agrega la tabla-->
        <div class="table-responsive-sm">
            <table class="table table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Título</th>
                        <th scope="col">Subtitulo</th>
                        <th scope="col">Imagen </th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Url</th>
                        <th scope="col">Acciones</th>

            	

                    </tr>
                </thead>
                <tbody>
                   

                        <?php foreach ($lista_portafolio as $registros){ ?>
                    <tr class="">
                        <td scope="col"><?php echo $registros['ID']; ?></td>
                        <td scope="col"><?php echo $registros['titulo']; ?></td>
                        <td scope="col"><?php echo $registros['subtitulo']; ?></td>
                        <td scope="col">
                            <img width="50" src="../../../assets//img/portfolio/<?php echo $registros['imagen'];?>" /> 
                        </td>
                        <td scope="col"><?php echo $registros['descripcion']; ?></td>
                        <td scope="col"><?php echo $registros['cliente']; ?></td>
                        <td scope="col"><?php echo $registros['categoria']; ?></td>
                        <td scope="col"><?php echo $registros['url']; ?></td>
                        <td scope="col">
                            
                        <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registros['ID']; ?>" role="button">Editar</a>
                                |
                                <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registros['ID']; ?>" role="button">Eliminar</a>
                        </td>
                    </tr>
                    <?php }?>
                    
                </tbody>
            </table>
        </div>
        
        
    </div>
    <div class="card-footer text-muted">
    <!--footer-->

    </div>
</div>

<?php include("../../templates/footer.php"); ?>