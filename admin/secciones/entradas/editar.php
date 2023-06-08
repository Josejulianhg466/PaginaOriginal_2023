<!-- include es de header, ../ es de servicios y el otro ../ es de secciones-->
<?php 
include("../../bd.php");

if (isset($_GET['txtID'])) {
    //recupera los datos del ID correspondiente ( seleccionado )
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";
    $sentencia = $conexion->prepare("SELECT * FROM tbl_entradas WHERE id=:id ");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    //recupera informacion el fetch obtiene los datos de la seleccion hecha y el LAZY recupera el registro
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);
    //recupera los datos del registro
    
    $fecha = $registro['fecha'];
    $titulo = $registro['titulo'];
    $imagen = $registro['imagen'];
    $descripcion = $registro['descripcion'];
    
}

if($_POST){
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";
    $fecha = (isset($_POST["fecha"])) ? $_POST["fecha"] : "";
    $titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : "";
    $descripcion = (isset($_POST["descripcion"])) ? $_POST["descripcion"] : "";

    $sentencia = $conexion->prepare("UPDATE `tbl_entradas` 
    SET fecha=:fecha,titulo=:titulo,descripcion=:descripcion WHERE id=:id");

    $sentencia->bindParam(":fecha", $fecha);
    $sentencia->bindParam(":titulo", $titulo);
    $sentencia->bindParam(":descripcion", $descripcion);
    $sentencia->bindParam(":id", $txtID);
    try {
        $sentencia->execute();
        // Resto del código si la ejecución es exitosa
    } catch (PDOException $e) {
        // Manejo de la excepción, por ejemplo, mostrar un mensaje de error
        echo "Error al insertar datos: " . $e->getMessage();
    }


        // si hay una imagen 
        if ($_FILES["imagen"]["tmp_name"] != "") {
            //obtiene datos de la imagen
            $imagen = (isset($_FILES["imagen"]["name"])) ? $_FILES["imagen"]["name"] : "";
            //actualiza el nombre mediante la feaha que lo cambia le agrega un numero mas
            $fecha_imagen = new DateTime();
            $nombre_archivo_imagen = ($imagen != "") ? $fecha_imagen->getTimestamp() . "_" . $imagen : "";
            //envia la imagen hacia esa ruta definida
            $tmp_imagen = $_FILES["imagen"]["tmp_name"];
            
                //portafolio, secciones, admin que son los ../../../
                move_uploaded_file($tmp_imagen, "../../../assets/img/about/" . $nombre_archivo_imagen);
            

                //Borra las imagenes que se actualizaron por otras
        $sentencia = $conexion->prepare("SELECT imagen FROM tbl_entradas WHERE id=:id");
        $sentencia->bindParam(":id", $txtID);
        $sentencia->execute();
        $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);
        
        if(isset($registro_imagen["imagen"])){
            //elimina el archivo de la carpeta la imagen 
            if(file_exists("../../../assets/img/about/".$registro_imagen["imagen"])){
                unlink("../../../assets/img/about/".$registro_imagen["imagen"]);
            }
        }
            //actualizar img
            $sentencia = $conexion->prepare("UPDATE tbl_entradas SET imagen=:imagen WHERE id=:id");
            echo "UPDATE tbl_entradas SET imagen=:imagen WHERE id=:id ";
            echo $txtID;
    
            print_r($_POST);
    
            $sentencia->bindParam(":imagen", $nombre_archivo_imagen);
            $sentencia->bindParam(":id", $txtID);
            $sentencia->execute();
            $imagen=$nombre_archivo_imagen;
        }
        
        $mensaje="Registro modificado con exito!!";
    header("Location:index.php?mensaje=".$mensaje);

}


include("../../templates/header.php");?>


<div class="card">
    <div class="card-header">
        Entradas
    </div>
    <div class="card-body">

    <!--PARA ENVIAR IMAGENES O ARCHIVOS EL multipart/form-data-->
    <form action="" method="post" enctype="multipart/form-data">

        <div class="mb-3">
          <label for="txtID" class="form-label">ID:</label>
          <input type="text"
            class="form-control" readonly value="<?php echo $txtID; ?>" name="txtID" id="txtID" aria-describedby="helpId" placeholder="">
                            <!--readonly hace que el usuario no edite el ID-->        
        </div>

    <div class="mb-3">
      <label for="fecha" class="form-label">Fecha:</label>
      <input type="date"
        class="form-control" value="<?php echo $fecha; ?>" name="fecha" id="fecha" aria-describedby="helpId" placeholder="">
      
    </div>

    <div class="mb-3">
      <label for="titulo" class="form-label">Titulo:</label>
      <input type="text"
        class="form-control" value="<?php echo $titulo; ?>" name="titulo" id="titulo" aria-describedby="helpId" placeholder="titulo">
    </div>
    <div class="mb-3">
      <label for="descripcion" class="form-label">Descripcion:</label>
      <input type="text"
        class="form-control" value="<?php echo $descripcion; ?>"name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripcion">
      
    </div>

    <div class="mb-3">
      <label for="imagen" class="form-label">Imagen:</label>
      <img width="50" src="../../../assets//img/about/<?php echo $imagen; ?>" />
      <input type="file"
        class="form-control" name="imagen" id="imagen" aria-describedby="helpId" placeholder="Imagen">
      
    </div>

        <button type="submit" class="btn btn-success">Actualizar</button>

        <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>


    </form>

        


    </div>
    <div class="card-footer text-muted">
      
    </div>
</div>


<?php include("../../templates/footer.php");?>