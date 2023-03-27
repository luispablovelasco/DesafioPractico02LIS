    <?php
        require_once("../class/classAdministrativo.php");
        
        if(isset($_POST['registrar'])){
            session_start();

            if (!isset($_SESSION['personal'])) {
                $_SESSION['personal'] = array();
            }

            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $fechaNacimiento = $_POST['fechaNacimiento'];
            $fechaInicioTrabajo = $_POST['fechaInicio'];

            $administracion = new Administrativo($nombre, $apellido, $fechaNacimiento, $fechaInicioTrabajo);
            $administracion->nombre = $nombre;
            $administracion->apellido = $apellido;
            $administracion->dui = $_POST['dui'];
            $administracion->nit = $_POST['nit'];
            $administracion->telMovil = $_POST['telMovil'];
            $administracion->telFijo = $_POST['telFijo'];
            $administracion->direccion = $_POST['direccion'];
            $administracion->correo = $_POST['correo'];
            $administracion->sexo = $_POST['sexo'];
            $administracion->fechaNacimiento = $fechaNacimiento;
            $administracion->dependencia = $_POST['dependencia'];
            $administracion->funcion = $_POST['funcion'];
            $administracion->salarioMensual = $_POST['salario'];

            $administracion->generarCodigo();
            $administracion->calcularEdad();
            $administracion->calcularJubilacion($fechaInicioTrabajo);

            array_push($_SESSION['personal'], $administracion);

            //var_dump($administracion);

        }

    ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Ingreso de Personal</title>
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
        <center><h2>Registrar Nuevo Personal</h2></center>
    </div>

    <div class="container-md p-3 border border-1 rounded-3">
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
            <div class="col-4 mb-3">
                <label for="inputNaci" class="form-label">Fecha que empezo a trabajar: </label>
                <input type="text" class="form-control" id="inputNaci" name="fechaInicio">
            </div>
        </div>
        <div class="row">
            <div class="col-4 mb-3">
                <label for="inputDepend" class="form-label">Dependecia:</label>
                <input type="text" class="form-control" id="inputDepend" name="dependencia">
            </div>
            <div class="col-4 mb-3">
                <label for="inputFunc" class="form-label">Función que realiza:</label>
                <input type="text" class="form-control" id="inputFunc" name="funcion">
            </div>
            <div class="col-4 mb-3">
                <label for="inputFunc" class="form-label">Salario Mensual</label>
                <input type="text" class="form-control" id="inputFunc" name="salario">
            </div>
        </div>


        <button type="submit" class="btn btn-primary" name="registrar">Registrar</button>
        </form>
    </form>
    </div>

    <?php try{ 
        if (empty($_SESSION['personal'])) {
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
                    <th>Telefono Movil: </th>
                    <th>Telefono Fijo: </th>
                    <th>Dirección: </th>
                    <th>Correo Electrónico: </th>
                    <th>Sexo: </th>
                    <th>Fecha Nacimiento: </th>
                    <th>Dependencia: </th>
                    <th>Función Realiza: </th>
                    <th>Salario </th>
                    <th>Edad: </th>
                    <th>Años Trabajados: </th>
                    <th>¿Listo para jubilarse?: </th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($_SESSION['personal'] as $personal): ?>
                <tr>
                    <td><?php echo $personal->codEmpleado;?></td>
                    <td><?php echo $personal->nombre;?></td>
                    <td><?php echo $personal->apellido;?></td>
                    <td><?php echo $personal->dui;?></td>
                    <td><?php echo $personal->nit;?></td>
                    <td><?php echo $personal->telMovil;?></td>
                    <td><?php echo $personal->telFijo;?></td>
                    <td><?php echo $personal->direccion;?></td>
                    <td><?php echo $personal->correo;?></td>
                    <td><?php echo $personal->sexo;?></td>
                    <td><?php echo $fechaNacimiento;?></td>
                    <td><?php echo $personal->dependencia;?></td>
                    <td><?php echo $personal->funcion;?></td>
                    <td><?php echo $personal->salarioMensual;?></td>
                    <td><?php echo $personal->edad;?></td>
                    <td><?php echo $personal->añosTrabajados;?></td>
                    <td><?php echo $personal->jubilar;?></td>
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