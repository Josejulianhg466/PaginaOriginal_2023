<?php 
session_start();
$url_base="https://localhost/website/admin/"; 
if(!isset($_SESSION['usuario'])){
    header("Location:".$url_base."login.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>ADMINISTRADOR DEL SITIO WEB</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    
    <!--para las alertas-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <header>
        <!-- place navbar here -->
        <!--se agrega un nabvar con bs5-navbar-minimal-a -->
        <nav class="navbar navbar-expand navbar-light bg-light">
            <div class="nav navbar-nav">
                <a class="nav-item nav-link active" href="#" aria-current="page">ADMINISTRADOR <span class="visually-hidden">(current)</span></a>
                <a class="nav-item nav-link" href="<?php echo $url_base;?>secciones/servicios/">SERVICIOS</a>
                <a class="nav-item nav-link" href="<?php echo $url_base;?>secciones/portafolio/">PORTAFOLIO</a>
                <a class="nav-item nav-link" href="<?php echo $url_base;?>secciones/entradas/">ENTRADAS</a>
                <a class="nav-item nav-link" href="<?php echo $url_base;?>secciones/equipo/">EQUIPO</a>
                <a class="nav-item nav-link" href="<?php echo $url_base;?>secciones/configuraciones/">CONFIGURACIONES</a>
                <a class="nav-item nav-link" href="<?php echo $url_base;?>secciones/usuarios/">USUARIOS</a>
                <a class="nav-item nav-link" href="<?php echo $url_base;?>cerrar.php">CERRAR SESIÓN</a>
            </div>
        </nav>
    </header>
    <main class="container">
        <br/>

        <script>
            <?php if (isset($_GET['mensaje'])){?>

        Swal.fire({icon:"success",title:"<?php echo $_GET['mensaje']; ?>"});
                <?php } ?>
        </script>