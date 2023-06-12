<!-- include es de header, ../ es de servicios y el otro ../ es de secciones-->
<?php
include("../../bd.php");

if ($_POST) {

    /*SI recibimos(isset) el dato de POST que sería icono, vamos a asignar el valor 
    de lo contrario no hacemos nada ("")*/
    //RECEPCIONAMOS LOS VALORES DEL FORMULARIO
    $nombreconfiguracion = (isset($_POST['nombreconfiguracion'])) ? $_POST['nombreconfiguracion'] : "";
    $valor = (isset($_POST['valor'])) ? $_POST['valor'] : "";

    $sentencia = $conexion->prepare("INSERT INTO `tbl_configuraciones` (`ID`,`nombreconfiguracion`,`valor`) 
    VALUES (NULL, :nombreconfiguracion, :valor);");

    $sentencia->bindParam(":nombreconfiguracion", $nombreconfiguracion);
    $sentencia->bindParam(":valor", $valor);


    $sentencia->execute();
    $mensaje = "Registro agregado con exito!!";
    header("Location:index.php?mensaje=" . $mensaje);
}

include("../../templates/header.php") ?>

<div class="card">
    <div class="card-header">
        Configuracion
    </div>
    <div class="card-body">

        <!--from: post para agregar eso-->
        <form action="" method="post">


            <div class="mb-3">
                <label for="nombreconfiguracion" class="form-label">Nombre:</label>
                <input type="text" class="form-control" name="nombreconfiguracion" id="nombreconfiguracion" aria-describedby="helpId" placeholder="Nombre de la configuracion">
            </div>

            <div class="mb-3">
                <label for="valor" class="form-label">Valor:</label>
                <input type="text" class="form-control" name="valor" id="valor" aria-describedby="helpId" placeholder="Nombre del valor">

            </div>

            <button type="submit" class="btn btn-success">Agregar</button>

            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>


        </form>

    </div>
    <div class="card-footer text-muted">

    </div>
</div>


<?php include("../../templates/footer.php") ?>