<?php

$usr=$_POST['usr'];
$psw=$_POST['psw'];

$conn=mysqli_connect("127.0.0.1:3307","root", "","wardLockdb");
if($conn->connect_error){
    die("Conexion fallida: ".$conn->connect_error);
}

$consulta1="SELECT * FROM perfil_trabajador WHERE id_trabajador='$usr'";
$resultado1=mysqli_query($conn,$consulta1);
$consulta2="SELECT * FROM perfil_trabajador WHERE fecha_nacimientoAAAAMMDD='$psw'";
$resultado2=mysqli_query($conn,$consulta2);

$filas1=mysqli_num_rows($resultado1);
$filas2=mysqli_num_rows($resultado2);

if($filas1){
    if($filas2){
        session_start();
        include("cuenta.html");
            $_SESSION["usuario"]=$usr;
        header("Location:cuenta.html");
    }
    else{include("index.html");}
}


// Cerrar conexión
mysqli_free_result($resultado1);mysqli_free_result($resultado2);mysqli_close($conn);

?>