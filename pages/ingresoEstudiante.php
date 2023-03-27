<?php
        require_once("../class/classEstudiante.php");
        
        if(isset($_POST['registrar'])){
            session_start();

            if (!isset($_SESSION['estudiantes'])) {
                $_SESSION['estudiantes'] = array();
            }

            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $fechaNacimiento = $_POST['fechaNacimiento'];

            $estudiante = new Estudiante($nombre, $apellido, $fechaNacimiento);
            $estudiante->nombre = $nombre;
            $estudiante->apellido = $apellido;
            $estudiante->dui = $_POST['dui'];
            $estudiante->nit = $_POST['nit'];
            $estudiante->telMovil = $_POST['telMovil'];
            $estudiante->telFijo = $_POST['telFijo'];
            $estudiante->direccion = $_POST['direccion'];
            $estudiante->correo = $_POST['correo'];
            $estudiante->sexo = $_POST['sexo'];
            $estudiante->fechaNacimiento = $fechaNacimiento;
            $estudiante->nota1 = $_POST['nota1'];
            $estudiante->nota2 = $_POST['nota2'];
            $estudiante->nota3 = $_POST['nota3'];

            $estudiante->generarCodigo();
            $estudiante->calcularEdad();
            $estudiante->calcularEsMayor();
            $estudiante->calcularPromedio();

            array_push($_SESSION['estudiantes'], $estudiante);

            //var_dump($estudiante);

        }

    ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Ingreso de Estudiante</title>
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
        <center><h2>Registrar Nuevo Estudiante</h2></center>
    </div>

    <div class="container-md p-3 border border-1 rounded-3">
        <form method="POST">
            <div class="row">
                <div class="col-6 mb-3">
                    <label for="inputNombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="inputName" name="nombre" required>
                </div>
                <div class="col-6 mb-3">
                    <label for="inputApellido" class="form-label">Apellido:</label>
                    <input type="text" class="form-control" id="inputLastName" name="apellido" required>
                </div>
            </div>

            <div class="row">
                <div class="col-3 mb-3">
                    <label for="inputDui" class="form-label">DUI:</label>
                    <input type="text" class="form-control" id="inputDUI" name="dui" required maxlength="9" pattern="[0-9]{9}">
                    <div id="emailHelp" class="form-text">Ingrese sin el guión</div>
                </div>
                <div class="col-3 mb-3">
                    <label for="inputNit" class="form-label">NIT:</label>
                    <input type="text" class="form-control" id="inputNit" name="nit" required maxlength="14" pattern="[0-9]{14}">
                    <div id="emailHelp" class="form-text">Ingrese sin los guiones</div>
                </div>
                <div class="col-3 mb-3">
                    <label for="inputTelMovil" class="form-label">Telefono Movil:</label>
                    <input type="text" class="form-control" id="inputTelMovil" name="telMovil" maxlength="8" pattern="[0-9]{8}" required>
                </div>
                <div class="col-3 mb-3">
                    <label for="inputTelFijo" class="form-label">Telefono Fijo:</label>
                    <input type="text" class="form-control" id="inputTelFijo" name="telFijo" maxlength="8" pattern="[0-9]{8}" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="inputDirec" class="form-label">Dirección:</label>
                <input type="text" class="form-control" id="inputDirec" name="direccion" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Correo electrónico:</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="correo" required>
                <div id="emailHelp" class="form-text">Debe ingresar un correo electrónico valido</div>
            </div>
            
            <div class="row">
                <div class="col-4 mb-3">
                    <label for="inputTelFijo" class="form-label">Sexo:</label>
                    <select class="form-select" aria-label="Default select example" name="sexo">
                        <option value="Hombre">Hombre</option>
                        <option value="Mujer">Mujer</option>
                    </select>
                </div>
                <div class="col-4 mb-3">
                    <label for="inputNaci" class="form-label">Fecha de Nacimiento:</label>
                    <input type="text" class="form-control" id="inputNaci" name="fechaNacimiento" required>
                    <div id="emailHelp" class="form-text">Formato: Año-Mes-Día o día/mes/año</div>
                </div>
            </div>
            <div class="row">
                <label for="inputNotas" class="form-label">Notas:</label>
                <div class="col-4 mb-3">
                    <input type="text" class="form-control" id="inputNota1" name="nota1" required>
                </div>
                <div class="col-4 mb-3">
                    <input type="text" class="form-control" id="inputNota2" name="nota2" required>
                </div>
                <div class="col-4 mb-3">
                    <input type="text" class="form-control" id="inputNota3" name="nota3" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary" name="registrar">Registrar</button>
        </form>
    </div>
    
    <center>
        <div class="container-md p-5">
        <?php try{ 
            if (empty($_SESSION['estudiantes'])) {
                throw new Exception("Ingrese un registro para mostrar datos ");
            }
        ?>
        </div>
    </center>
    
        <div class="container-fluid p-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Código: </th>
                        <th>Nombre: </th>
                        <th>Apellido: </th>
                        <th>DUI: </th>
                        <th>NIT: </th>
                        <th>Dirección: </th>
                        <th>Correo Electrónico: </th>
                        <th>Telefono Movil: </th>
                        <th>Telefono Fijo: </th>
                        <th>Sexo: </th>
                        <th>Fecha Nacimiento: </th>
                        <th>Edad: </th>
                        <th>Nota 1: </th>
                        <th>Nota 2: </th>
                        <th>Nota 3: </th>
                        <th>¿Es Mayor Edad?</th>
                        <th>Nota Promedio: </th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($_SESSION['estudiantes'] as $estudiantes): ?>
                    <tr>
                        <td><?php echo $estudiantes->codEstudiante;?></td>
                        <td><?php echo $estudiantes->nombre;?></td>
                        <td><?php echo $estudiantes->apellido;?></td>
                        <td><?php echo $estudiantes->dui;?></td>
                        <td><?php echo $estudiantes->nit;?></td>
                        <td><?php echo $estudiantes->direccion;?></td>
                        <td><?php echo $estudiantes->correo;?></td>
                        <td><?php echo $estudiantes->telMovil;?></td>
                        <td><?php echo $estudiantes->telFijo;?></td>
                        <td><?php echo $estudiantes->sexo;?></td>
                        <td><?php echo $fechaNacimiento;?></td>
                        <td><?php echo $estudiantes->edad;?> Años</td>
                        <td><?php echo $estudiantes->nota1;?></td>
                        <td><?php echo $estudiantes->nota2;?></td>
                        <td><?php echo $estudiantes->nota3;?></td>
                        <td><?php echo $estudiantes->esMayorEdad;?></td>
                        <td><?php echo $estudiantes->notaPromedio;?></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    <?php 
    } catch (Exception $r){
        echo "Ingrese un registro para mostrar datos";
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>