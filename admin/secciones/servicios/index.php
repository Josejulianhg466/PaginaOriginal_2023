<!-- include es de header, ../ es de servicios y el otro ../ es de secciones-->
<?php include("../../templates/header.php") ?>

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
                    <tr class="">
                        <td>1</td>
                        <td>fa-book</td>
                        <td>Tutoría</td>
                        <td>Servicios de tutoría de programación</td>
                        <td>Editar|Eliminar</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
    </div>
    <div class="card-footer text-muted">
        <!--seccion vacía-->
    </div>
</div>

<?php include("../../templates/footer.php") ?>