<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Ingreso de Docente</title>
</head>
<body>
    
    <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="../index.php">
        <img src="../img/LOGO1.png" alt="imgLogo" width="100" height="100" class="d-inline-block align-text-center">
        Colegio Cristobal Colón
        </a>
    </div>
    </nav>

    <div class="container-md p-5">
        <center><h2>Registrar Nuevo Docente</h2></center>
    </div>

    <div class="container-md p-3 border border-1 rounded-3 mb-5">
        <form action="">
        <div class="row">
            <div class="col-6 mb-3">
                <label for="inputNombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="inputName">
            </div>
            <div class="col-6 mb-3">
                <label for="inputApellido" class="form-label">Apellido:</label>
                <input type="text" class="form-control" id="inputLastName">
            </div>
        </div>

        <div class="row">
            <div class="col-3 mb-3">
                <label for="inputDui" class="form-label">DUI:</label>
                <input type="number" class="form-control" id="inputDUI">
            </div>
            <div class="col-3 mb-3">
                <label for="inputNit" class="form-label">Nit:</label>
                <input type="number" class="form-control" id="inputNit">
            </div>
            <div class="col-3 mb-3">
                <label for="inputTelMovil" class="form-label">Telefono Movil:</label>
                <input type="number" class="form-control" id="inputTelMovil">
            </div>
            <div class="col-3 mb-3">
            <label for="inputTelFijo" class="form-label">Telefono Fijo:</label>
            <input type="number" class="form-control" id="inputTelFijo">
        </div>
        </div>

        <div class="mb-3">
            <label for="inputDirec" class="form-label">Dirección:</label>
            <input type="text" class="form-control" id="inputDirec">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Correo electrónico:</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Debe ingresar un correo electrónico valido</div>
        </div>
        
        <div class="row">
            <div class="col-4 mb-3">
                <label for="inputTelFijo" class="form-label">Sexo:</label>
                <select class="form-select" aria-label="Default select example">
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                </select>
            </div>
            <div class="col-4 mb-3">
                <label for="inputNaci" class="form-label">Fecha de Nacimiento:</label>
                <input type="text" class="form-control" id="inputNaci">
            </div>
            <div class="col-4 mb-3">
                <label for="inputEdad" class="form-label">Edad:</label>
                <input type="number" class="form-control" id="inputEdad">
            </div>
        </div>
        <div class="row">
            <label for="inputAsig1" class="form-label">Asignaturas:</label>
            <div class="col-4 mb-3">
                <input type="text" class="form-control" id="inputAsig1">
            </div>
            <div class="col-4 mb-3">
                <input type="text" class="form-control" id="inputAsig2">
            </div>
            <div class="col-4 mb-3">
                <input type="text" class="form-control" id="inputAsig3">
            </div>
        </div>
        <div class="row">
            <div class="col-2 mb-3">
                <label for="inputHorasTrabajadas" class="form-label">Horas rabajadas:</label>
                <input type="number" class="form-control" id="inputEdad">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>