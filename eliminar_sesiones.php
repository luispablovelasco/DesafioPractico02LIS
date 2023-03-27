<?php
session_start();

if(isset($_SESSION['personal'])){
    unset($_SESSION['personal']);
}
if(isset($_SESSION['docentes'])){
    unset($_SESSION['docentes']);
}
if(isset($_SESSION['estudiantes'])){
    unset($_SESSION['estudiantes']);
}

header('Location: index.php');
exit();