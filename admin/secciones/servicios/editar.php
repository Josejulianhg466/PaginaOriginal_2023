<!-- include es de header, ../ es de servicios y el otro ../ es de secciones-->
<?php 
include("../../bd.php");

if(isset($_GET['txtID'])){

    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia=$conexion->prepare("SELECT * FROM tbl_servicios WHERE id=:id ");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    //recupera informacion el fetch obtiene los datos de la seleccion hecha y el LAZY recupera el registro
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);
    
    $icono=$registro['icono'];
    $titulo=$registro['titulo'];
    $descripcion=$registro['descripcion'];
}
if($_POST){
    print_r($_POST);
    //todo lo de abajo es para actualizar la información
    $txtID=(isset($_POST['$txtID']))?$_POST['$txtID']:"";
    $icono=(isset($_POST['icono']))?$_POST['icono']:"";
    $titulo=(isset($_POST['titulo']))?$_POST['titulo']:"";
    $descripcion=(isset($_POST['descripcion']))?$_POST['descripcion']:"";

    $sentencia=$conexion->prepare("UPDATE tbl_servicios  
    SET 
    icono=:icono,
    titulo=:titulo, 
    descripcion=:descripcion
    WHERE id=:id ");

    $sentencia->bindParam(":icono",$icono);
    $sentencia->bindParam(":titulo",$titulo);
    $sentencia->bindParam(":descripcion",$descripcion);
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();

    $mensaje="Registro modificado con exito!!";
    header("Location:index.php?mensaje=".$mensaje);

}

include("../../templates/header.php")?>

<!--bs5-card-head-footer-->
<div class="card">
    <div class="card-header">
        Editar servicio
    </div>
    <div class="card-body">
        <!--enctype sirve para enviar archivos-->
        <form action="" enctype="multipart/form-data" method="post">

            <!--Bs5-form-inpunt-->
            <div class="mb-3">
            <label for="txtID" class="form-label">ID:</label>
            <!--Recuerda que echo $txtID hace que se direccione la información hacia donde lo requerimos en este caso ID-->
            <input readonly value="<?php echo $txtID;?>" type="text" 
            class="form-control" name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID">
            
            </div>
            <!--Bs5-form-inpunt-->
            <div class="mb-3">
                <label for="icono" class="form-label">Icono:</label>
                <input value="<?php echo $icono;?>" type="text" class="form-control" name="icono" id="icono" aria-describedby="helpId" placeholder="icono">
            </div>

            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input value="<?php echo $titulo;?>" type="text" class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="titulo">
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <input value="<?php echo $descripcion;?>" type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="descripcion">
            </div>

            <!--submit para enviar toda la información del formulario-->
            
            
            <button type="submit" class="btn btn-success">Actualizar</button>

            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

        </form>


    </div>
    <div class="card-footer text-muted">

    </div>
</div>

<?php include("../../templates/footer.php")?>