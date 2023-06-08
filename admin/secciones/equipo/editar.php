<!-- include es de header, ../ es de servicios y el otro ../ es de secciones-->
<?php 
include("../../bd.php");

if (isset($_GET['txtID'])) {
    //recupera los datos del ID correspondiente ( seleccionado )
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";
    $sentencia = $conexion->prepare("SELECT * FROM tbl_equipo WHERE id=:id ");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    //recupera informacion el fetch obtiene los datos de la seleccion hecha y el LAZY recupera el registro
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);
    //recupera los datos del registro
    
   
    $imagen = $registro['imagen'];
    $nombrecompleto = $registro['nombrecompleto'];
    $puesto = $registro['puesto'];
    $twitter = $registro['twitter'];
    $facebook = $registro['facebook'];
    $linkedin = $registro['linkedin'];

    
}

if($_POST){
//RECOLECCION DE DATOS
$txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";
$imagen = (isset($_FILES["imagen"]["name"])) ? $_FILES["imagen"]["name"] : "";
$nombrecompleto = (isset($_POST["nombrecompleto"])) ? $_POST["nombrecompleto"] : "";
$puesto = (isset($_POST["puesto"])) ? $_POST["puesto"] : "";
$twitter = (isset($_POST["twitter"])) ? $_POST["twitter"] : "";
$facebook = (isset($_POST["facebook"])) ? $_POST["facebook"] : "";
$linkedin = (isset($_POST["linkedin"])) ? $_POST["linkedin"] : "";

 //permite insertar los datos que estamos recibiendo
        $sentencia = $conexion->prepare("UPDATE tbl_equipo SET 
        
        nombrecompleto=:nombrecompleto,
        puesto=:puesto,
        twitter=:twitter,
        facebook=:facebook,
        linkedin=:linkedin
        WHERE ID=:id");
    
    
        $sentencia->bindParam(":nombrecompleto", $nombrecompleto);
        $sentencia->bindParam(":puesto", $puesto);
        $sentencia->bindParam(":twitter", $twitter);
        $sentencia->bindParam(":facebook", $facebook);
        $sentencia->bindParam(":linkedin", $linkedin);
        $sentencia->bindParam(":id",$txtID);
        
        try {
            $sentencia->execute();
            // Resto del código si la ejecución es exitosa
        } catch (PDOException $e) {
            // Manejo de la excepción, por ejemplo, mostrar un mensaje de error
            echo "Error al insertar datos: " . $e->getMessage();
        }
    
        $mensaje="Registro agregado con exito!!";
        header("Location:index.php?mensaje=".$mensaje);

                //$sentencia->bindParam(":imagen", $nombre_archivo_imagen);


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
                move_uploaded_file($tmp_imagen, "../../../assets/img/team/" . $nombre_archivo_imagen);
            

                //Borra las imagenes que se actualizaron por otras
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
            //actualizar img
            $sentencia = $conexion->prepare("UPDATE tbl_equipo SET imagen=:imagen WHERE id=:id");
            echo "UPDATE tbl_equipo SET imagen=:imagen WHERE id=:id ";
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




include("../../templates/header.php")?>

<div class="card">
    <div class="card-header">
        Editar personal
    </div>
    <div class="card-body">

      <!--PARA ENVIAR IMAGENES O ARCHIVOS EL multipart/form-data-->
      <form action="" method="post" enctype="multipart/form-data">

      <div class="mb-3">
        <label for="txtID" class="form-label">ID:</label>
        <input readonly value="<?php echo $txtID; ?>" type="text"
          class="form-control" name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID">
      </div>
    <div class="mb-3">
          <label for="imagen" class="form-label">Imagen:</label>
          <img width="50" src="../../../assets//img/team/<?php echo $imagen; ?>" />
          <input type="file"
            class="form-control" name="imagen" id="imagen" aria-describedby="helpId" placeholder="">
        </div>

    <div class="mb-3">
    
      <label for="nombrecompleto" class="form-label">Nombre completo</label>
      <input type="text"
        class="form-control" value="<?php echo $nombrecompleto; ?>" name="nombrecompleto" id="nombrecompleto" aria-describedby="helpId" placeholder="Nombre">
    </div>

    <div class="mb-3">
      <label for="puesto" class="form-label">Puesto</label>
      <input type="text"
        class="form-control" value="<?php echo $puesto; ?>" name="puesto" id="puesto" aria-describedby="helpId" placeholder="Puesto">
    </div>

    <div class="mb-3">
      <label for="twitter" class="form-label">Twitter</label>
      <input type="text"
        class="form-control" value="<?php echo $twitter; ?>" name="twitter" id="twitter" aria-describedby="helpId" placeholder="Twitter">
    </div>

    <div class="mb-3">
      <label for="facebook" class="form-label">Facebook</label>
      <input type="text"
        class="form-control" value="<?php echo $facebook; ?>" name="facebook" id="facebook" aria-describedby="helpId" placeholder="Facebook">
    </div>

    <div class="mb-3">
      <label for="linkedin" class="form-label">Linkedin</label>
      <input type="text"
        class="form-control" value="<?php echo $linkedin; ?>" name="linkedin" id="linkedin" aria-describedby="helpId" placeholder="Linkedin">
    </div>
    <button type="submit" class="btn btn-success">Actualizar</button>

            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>


    </form>
        
    </div>
    <div class="card-footer text-muted">

        
    </div>
</div>





<?php include("../../templates/footer.php")?>
