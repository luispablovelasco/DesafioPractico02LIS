<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Desafío Practico 2 LIS</title>
</head>
<body>
    
    <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
        <img src="img/LOGO1.png" alt="imgLogo" width="100" height="100" class="d-inline-block align-text-center">
        Colegio Cristobal Colón
        </a>
    </div>
    </nav>

    <div class="container-md p-5">
        <center><h2>Formulario de Registro</h2></center>
    </div>

    <div class="container-md p3">
    <h3><center>Seleccione una opciona para ingresar datos:<center></h3>
    <center>
    <div class="d-grid gap-2 col-6 mx-auto">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Elija una opción
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="pages/ingresoEstudiante.php">Estudiante</a></li>
                <li><a class="dropdown-item" href="pages/ingresoDocente.php">Docente</a></li>
                <li><a class="dropdown-item" href="pages/ingresoPersonal.php">Personal Administrativo</a></li>
                
            </ul>
        </div>
        <form method="post" action="eliminar_sesiones.php">
            <button type="submit" class="btn btn-primary">Eliminar Registros</button>
        </form>
    </div>
    <center>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>