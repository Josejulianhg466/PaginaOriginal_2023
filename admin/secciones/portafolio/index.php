<!-- include es de header, ../ es de servicios y el otro ../ es de secciones-->
<?php 

include("../../bd.php");
//SELECCIONAR REGISTROS
$sentencia=$conexion->prepare("SELECT * FROM `tbl_portafolio`");
$sentencia->execute();
//ESTA GUARDARÁ TODOS LOS REGISTROS QUE LLEGAN Y ESTÁN DENTRO DE LA TABLA SERVICIO
//DE ESO SE ENCARGA EL (PDO::FETCH_ASSOC)
$lista_portafolio = $sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php") ?>

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
                    <tr class="">
                        <td scope="col">1</td>
                        <td scope="col">SOftware de restaurante</td>
                        <td scope="col">SOftware de restaurante josejose</td>
                        <td scope="col">Imagen.jpg </td>
                        <td scope="col">jksdjaldjsjkladjklsjlkasjdksdjkdjalkdjsald</td>
                        <td scope="col">Jose</td>
                        <td scope="col">Softre</td>
                        <td scope="col">http://google.com</td>
                        <td scope="col">Editar | Eliminar</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
        
        
    </div>
    <div class="card-footer text-muted">
    <!--footer-->

    </div>
</div>

<?php include("../../templates/footer.php") ?>