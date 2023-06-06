<!-- include es de header, ../ es de servicios y el otro ../ es de secciones-->
<?php 
include("../../bd.php");
//envía información 
if($_POST){

    /*SI recibimos(isset) el dato de POST que sería icono, vamos a asignar el valor 
    de lo contrario no hacemos nada ("")*/
     //RECEPCIONAMOS LOS VALORES DEL FORMULARIO
    $icono=(isset($_POST['icono']))?$_POST['icono']:"";
    $titulo=(isset($_POST['titulo']))?$_POST['titulo']:"";
    $descripcion=(isset($_POST['descripcion']))?$_POST['descripcion']:"";

    $sentencia=$conexion->prepare("INSERT INTO `tbl_servicios` (`ID`,`icono`,`titulo`, `descripcion`) 
    VALUES (NULL, :icono, :titulo, :descripcion);");

    $sentencia->bindParam(":icono",$icono);
    $sentencia->bindParam(":titulo",$titulo);
    $sentencia->bindParam(":descripcion",$descripcion);

    $sentencia->execute();
    $mensaje="Registro agregado con exito!!";
    header("Location:index.php?mensaje=".$mensaje);
}
include("../../templates/header.php");
?>


<!--bs5-card-head-footer-->
<div class="card">
    <div class="card-header">
        Crear servicio
    </div>
    <div class="card-body">
        <!--enctype sirve para enviar archivos-->
        <form action="" enctype="multipart/form-data" method="post">

            <!--Bs5-form-inpunt-->
            <div class="mb-3">
                <label for="icono" class="form-label">Icono:</label>
                <input type="text" class="form-control" name="icono" id="icono" aria-describedby="helpId" placeholder="icono">
            </div>

            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="titulo">
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="descripcion">
            </div>

            <!--submit para enviar toda la información del formulario-->
            
            
            <button type="submit" class="btn btn-success">Agregar</button>

            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

        </form>


    </div>
    <div class="card-footer text-muted">

    </div>
</div>

<?php include("../../templates/footer.php") ?>