<?php
        require_once("../class/classDocente.php");
        
        if(isset($_POST['registrar'])){
            session_start();

            if (!isset($_SESSION['docentes'])) {
                $_SESSION['docentes'] = array();
            }

            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $fechaNacimiento = $_POST['fechaNacimiento'];

            $docente = new Docente($nombre, $apellido, $fechaNacimiento);
            $docente->nombre = $nombre;
            $docente->apellido = $apellido;
            $docente->dui = $_POST['dui'];
            $docente->nit = $_POST['nit'];
            $docente->telMovil = $_POST['telMovil'];
            $docente->telFijo = $_POST['telFijo'];
            $docente->direccion = $_POST['direccion'];
            $docente->correo = $_POST['correo'];
            $docente->sexo = $_POST['sexo'];
            $docente->fechaNacimiento = $fechaNacimiento;
            $docente->materia1 = $_POST['materia1'];
            $docente->materia2 = $_POST['materia2'];
            $docente->materia3 = $_POST['materia3'];
            $docente->horasTrabajadas = $_POST['horasTrabajadas'];
            $docente->pagoHoraTrabajada = $_POST['pagoHoras'];

            $docente->generarCodigo();
            $docente->calcularEdad();
            $docente->calcularEsMayor();
            $docente->calcularSalario();

            array_push($_SESSION['docentes'], $docente);

            //var_dump($docente);

        }

    ?>


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
        <form method="POST">
        <div class="row">
            <div class="col-6 mb-3">
                <label for="inputNombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="inputName" name="nombre">
            </div>
            <div class="col-6 mb-3">
                <label for="inputApellido" class="form-label">Apellido:</label>
                <input type="text" class="form-control" id="inputLastName" name="apellido">
            </div>
        </div>

        <div class="row">
            <div class="col-3 mb-3">
                <label for="inputDui" class="form-label">DUI:</label>
                <input type="number" class="form-control" id="inputDUI" name="dui">
            </div>
            <div class="col-3 mb-3">
                <label for="inputNit" class="form-label">Nit:</label>
                <input type="number" class="form-control" id="inputNit" name="nit">
            </div>
            <div class="col-3 mb-3">
                <label for="inputTelMovil" class="form-label">Telefono Movil:</label>
                <input type="number" class="form-control" id="inputTelMovil" name="telMovil">
            </div>
            <div class="col-3 mb-3">
            <label for="inputTelFijo" class="form-label">Telefono Fijo:</label>
            <input type="number" class="form-control" id="inputTelFijo" name="telFijo">
        </div>
        </div>

        <div class="mb-3">
            <label for="inputDirec" class="form-label">Dirección:</label>
            <input type="text" class="form-control" id="inputDirec" name="direccion">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Correo electrónico:</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="correo">
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
                <input type="text" class="form-control" id="inputNaci" name="fechaNacimiento">
            </div>
        </div>
        <div class="row">
            <label for="inputAsig1" class="form-label">Asignaturas:</label>
            <div class="col-4 mb-3">
                <input type="text" class="form-control" id="inputAsig1" name="materia1">
            </div>
            <div class="col-4 mb-3">
                <input type="text" class="form-control" id="inputAsig2" name="materia2">
            </div>
            <div class="col-4 mb-3">
                <input type="text" class="form-control" id="inputAsig3" name="materia3">
            </div>
        </div>
        <div class="row">
            <div class="col-2 mb-3">
                <label for="inputHorasTrabajadas" class="form-label">Horas trabajadas:</label>
                <input type="number" class="form-control" id="inputEdad" name="horasTrabajadas">
            </div>
                <label for="inputHorasTrabajadas" class="form-label">Pago por horas Trabajadas:</label>
                <input type="number" class="form-control" id="inputEdad" name="pagoHoras">
            </div>
        </div>

        <button type="submit" class="btn btn-primary" name="registrar">Registrar</button>
        </form>
    </div>

    <?php try{ 
        if (empty($_SESSION['docentes'])) {
            throw new Exception("Ingrese un registro para mostrar datos ");
        }
        ?>
        <table>
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
                    <th>Materia 1: </th>
                    <th>Materia 2: </th>
                    <th>Materia 3: </th>
                    <th>¿Es Mayor Edad?</th>
                    <th>Horas Trabajadas: </th>
                    <th>Pago por horas trabajadas: </th>
                    <th>Salario </th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($_SESSION['docentes'] as $docentes): ?>
                <tr>
                    <td><?php echo $docentes->codDocente;?></td>
                    <td><?php echo $docentes->nombre;?></td>
                    <td><?php echo $docentes->apellido;?></td>
                    <td><?php echo $docentes->dui;?></td>
                    <td><?php echo $docentes->nit;?></td>
                    <td><?php echo $docentes->direccion;?></td>
                    <td><?php echo $docentes->correo;?></td>
                    <td><?php echo $docentes->telMovil;?></td>
                    <td><?php echo $docentes->telFijo;?></td>
                    <td><?php echo $docentes->sexo;?></td>
                    <td><?php echo $fechaNacimiento;?></td>
                    <td><?php echo $docentes->edad;?></td>
                    <td><?php echo $docentes->materia1;?></td>
                    <td><?php echo $docentes->materia2;?></td>
                    <td><?php echo $docentes->materia3;?></td>
                    <td><?php echo $docentes->esMayorEdad;?></td>
                    <td><?php echo $docentes->horasTrabajadas;?></td>
                    <td><?php echo $docentes->pagoHoraTrabajada;?></td>
                    <td><?php echo $docentes->salario;?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    <?php 
    } catch (Exception $r){
        echo "Ingrese un registro para mostrar datos";
    }
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>