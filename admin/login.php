<?php /*Conección a la base de datos */
include("./bd.php")
?>

<!doctype html> <!-- se colocó !bs5 para agregar config de bootstrap-->
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    
      <!--bs5-grid-defauld-->
      <div class="container">
        <div class="row">
          <div class="col-4">
            <!--Esta parte está bacía en la otra 
            parte es que va el login, este bs5 dividío 
          las vistas en dos columnas esta es la vacía y la otra
        tiene el login-->
          </div>
          <div class="col-4">
            <!--Esta es la otra columna y aquí va el login-->
          <!--- bs5-card-head-foot-->
            <div class="card">
              <div class="card-header">
                Login
              </div>
              <div class="card-body">
                
              <!--form post-->
                <form action="" method="post">
                  
                <!--bs5-form-input-->
                  <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text"
                      class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="">
                    
                  </div>
                  <!--bs5-form-input-->
                  <div class="mb-3">
                    <label for="contrasenia" class="form-label">Contraseña</label>
                    <input type="password"
                      class="form-control" name="contrasenia" id="contrasenia" aria-describedby="helpId" placeholder="">
                  </div>

                  <!--bs5-button-a-->
                  <a name="" id="" class="btn btn-primary" href="index.php" role="button">Entrar</a>
                </form>

              </div>
              <div class="card-footer text-muted">
                <!--parte vacío del footer-->
              </div>
            </div>

          </div>
          
        </div>
      </div>

  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>