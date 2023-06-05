<!-- include es de header, ../ es de servicios y el otro ../ es de secciones-->
<?php
include("../../bd.php");
//SELECCIONAR REGISTROS
$sentencia = $conexion->prepare("SELECT * FROM `tbl_servicios`");
$sentencia->execute();
//ESTA GUARDARÁ TODOS LOS REGISTROS QUE LLEGAN Y ESTÁN DENTRO DE LA TABLA SERVICIO
//DE ESO SE ENCARGA EL (PDO::FETCH_ASSOC)
$lista_servicios=$sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php")

?>

Listar servicios

<!--bs5-card-head-footer-->
<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar registro</a>
        SERVICIOS
    </div>
    <div class="card-body">

        <!-- bs5-table-defauld-->
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Icono</th>
                        <th scope="col">Título</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>

                <!--el foreach va a leer la lista de servicios como si fueran registros
                y con eso podremos ver la información dentro de la tabla-->
                    <?php foreach($lista_servicios as $registros){ ?>
                    <tr class="">
                        <td><?php echo $registros['ID'];?></td>
                        <td><?php echo $registros['icono'];?></td>
                        <td><?php echo $registros['titulo'];?></td>
                        <td><?php echo $registros['descripcion'];?></td>
                        
                        <td>
                        <a name="" id="" class="btn btn-info" href="#" role="button">Editar</a>   
                        |
                        <a name="" id="" class="btn btn-danger" href="#" role="button">Eliminar</a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>

    </div>
    <div class="card-footer text-muted">
        <!--seccion vacía-->
    </div>
</div>

<?php include("../../templates/footer.php") ?>