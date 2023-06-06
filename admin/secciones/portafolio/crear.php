<!-- include es de header, ../ es de servicios y el otro ../ es de secciones-->
<?php 

include("../../bd.php");
if($_POST){
    
    /*SI recibimos(isset) el dato de POST que sería icono, vamos a asignar el valor 
    de lo contrario no hacemos nada ("")*/
     //RECEPCIONAMOS LOS VALORES DEL FORMULARIO
    $titulo=(isset($_POST['titulo']))?$_POST['titulo']:"";
    $subtitulo=(isset($_POST['subtitulo']))?$_POST['subtitulo']:"";
    $imagen=(isset($_FILES["imagen"]["name"]))?$_FILES["imagen"]["name"]:"";
    $descripcion=(isset($_POST['descripcion']))?$_POST['descripcion']:"";
    $cliente=(isset($_POST['cliente']))?$_POST['cliente']:"";
    $categoria=(isset($_POST['categoria']))?$_POST['categoria']:"";
    $url=(isset($_POST['url']))?$_POST['url']:"";
    
    //permite insertar los datos que estamos recibiendo
    $sentencia=$conexion->prepare("INSERT INTO `tbl_portafolio` (`ID`, `titulo`, `subtitulo`, `imagen`, `descripcion`, `cliente`, `categoria`, `url`) VALUES (NULL, 'fdsfsafdsafd', 'fdsfdsafds', 'futbol-1-kU3C--1200x630@abc.jpg', 'gfdsgfdgfgds', 'gfdsgfdsgfd', 'gfdsgfdsg', 'gdsgfdgsfdgsfds'); ");
    $sentencia->execute();
}
include("../../templates/header.php"); ?>


<div class="card">
    <div class="card-header">
        Producto del portafolio
    </div>
    <div class="card-body">
        <!--adjuntar una imagen-->
        <form action="" enctype="multipart/form-data" method="post">

            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="titulo">

            </div>
            <div class="mb-3">
                <label for="subtitulo" class="form-label">Subtitulo:</label>
                <input type="text" class="form-control" name="subtitulo" id="subtitulo" aria-describedby="helpId" placeholder="Subtitulo">

            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen:</label>
                <input type="file" class="form-control" name="imagen" id="imagen" placeholder="imagen" aria-describedby="fileHelpId">

            </div>

            <div class="mb-3">
                <label for="Descripcion" class="form-label">Descripción:</label>
                <input type="text" class="form-control" name="Descripcion" id="Descripcion" aria-describedby="helpId" placeholder="Descripcion">
            </div>

            <div class="mb-3">
                <label for="cliente" class="form-label">Cliente:</label>
                <input type="text" class="form-control" name="cliente" id="cliente" aria-describedby="helpId" placeholder="Cliente">
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria</label>
                <input type="text" class="form-control" name="categoria" id="categoria" aria-describedby="helpId" placeholder="Categoría">
            </div>

            <div class="mb-3">
                <label for="url" class="form-label">URL:</label>
                <input type="text" class="form-control" name="url" id="url" aria-describedby="helpId" placeholder="URL del proyecto">
            </div>

            <button type="submit" class="btn btn-success">Agregar</button>

            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

        </form>

    </div>
    <div class="card-footer text-muted">

    </div>
</div>

<?php include("../../templates/footer.php") ?>