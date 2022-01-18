<?php

function creaserver(){
    $conn=new mysqli("127.0.0.1:3307","root", "");
    if($conn->query("CREATE DATABASE wardLockdb")===true){
        $creasrvr="Base de datos creada en MySQL";
    } else {
        $creasrvr="Atencion ".$conn->error ." ";
    }
    include ('index.html');
    $conn->close();
}

function creatablaemp(){
    $conn=new mysqli("127.0.0.1:3307","root", "","wardLockdb");
    $tabla_emp="CREATE TABLE perfil_trabajador(id_trabajador int(5) AUTO_INCREMENT PRIMARY KEY, nombre_trabajador VARCHAR(15), apellido_trabajador VARCHAR(15), puesto VARCHAR(20), area VARCHAR(15),fecha_nacimientoAAAAMMDD DATE,fecha_contratacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
    if(mysqli_query($conn,$tabla_emp)){
        $creatabempleado="Tabla perfil_trabajador fue creada en MySQL";
    }else{
        $creatabempleado="Atencion " . mysqli_error($conn);
    }
    #$creatabempleado=" Crea tabla de trabajador";
    include('index.html');
    $conn->close();
}

function creatablaalmacen(){
    $conn=new mysqli("127.0.0.1:3307","root", "","wardLockdb");
    $tabla_alm="CREATE TABLE almacenamiento(id_almacen int(2) PRIMARY KEY, id_producto INT(5), cantidad_total INT(7), id_pasillo INT(3), id_localizacion INT(5), id_nivel INT(3), caducidad_product DATE)";
    if(mysqli_query($conn,$tabla_alm)){
        $creatabalmacn="Tabla almacenamiento fue creada en MySQL";
    }else{
        $creatabalmacn="Atencion " . mysqli_error($conn);
    }
    #$creatabalmacn="Crea tabla de almacenamiento";
    include('index.html');
    $conn->close();
}

function creatabproduc(){
    $conn=new mysqli("127.0.0.1:3307","root", "","wardLockdb");
    $tabla_prod="CREATE TABLE consult_producto(id_producto INT(5) AUTO_INCREMENT PRIMARY KEY, id_entrada INT(8), cantidad_total INT(7),  caducidad_product DATE)";
    if(mysqli_query($conn,$tabla_prod)){
        $creatabproduct="Tabla consult_producto fue creada en MySQL";    
    }else{
        $creatabproduct="Atencion " . mysqli_error($conn);
    }
    #$creatabproduct="Crea tabla de consulta de producto";
    include('index.html');
    $conn->close();
}

function creatabproducin(){
    $conn=new mysqli("127.0.0.1:3307","root", "","wardLockdb");
    $tabla_prodin="CREATE TABLE ingreso_productos(id_entrada INT(5) AUTO_INCREMENT PRIMARY KEY, id_trabajador INT(8), id_pedido_in INT(7),  id_producto int(5), cantidad int(8), fecha_hora DATETIME)";
    if(mysqli_query($conn,$tabla_prodin)){
        $creatabproduin="Tabla ingreso_productos fue creada en MySQL";    
    }else{
        $creatabproduin="Atencion " . mysqli_error($conn);
    }
    #$creatabproduin="Crea tabla de ingreso de productos";
    include('index.html');
    $conn->close();
}

function creatabproducout(){
    $conn=new mysqli("127.0.0.1:3307","root", "","wardLockdb");
    $tabla_prodIntOut="CREATE TABLE egreso_int_prod(id_salida_int INT(5) AUTO_INCREMENT PRIMARY KEY, id_trabajador INT(8), id_producto INT(5), cantidad int(3), id_trabajador_rcv int(8), fecha_hora DATETIME)";
    if(mysqli_query($conn,$tabla_prodIntOut)){
        $creatabprodout="Tabla egreso_int_prod fue creada en MySQL";    
    }else{
        $creatabprodout="Atencion " . mysqli_error($conn);
    }
    #$creatabprodout="Crea tabla de egreso interno de productos";
    include('index.html');
    $conn->close();
}

function creatabproducextout(){
    $conn=new mysqli("127.0.0.1:3307","root", "","wardLockdb");
    $tabla_prodExtOut="CREATE TABLE egreso_ext_prod(id_salida_externa INT(5) AUTO_INCREMENT PRIMARY KEY, id_trabajador INT(8), id_pedido_out INT(5), id_producto int(3), cantidad int(8), fecha_hora DATETIME)";
    if(mysqli_query($conn,$tabla_prodExtOut)){
        $creatabprodextout="Tabla egreso_ext_prod fue creada en MySQL";    
    }else{
        $creatabprodextout="Atencion " . mysqli_error($conn);
    }
    #$creatabprodextout="Crea tabla de egreso externo de productos";
    include('index.html');
    $conn->close();
}

function creatabauditoria(){
    $conn=new mysqli("127.0.0.1:3307","root", "","wardLockdb");
    $tabla_auditoria="CREATE TABLE auditoria_almacen(id_audit INT(5) AUTO_INCREMENT PRIMARY KEY, cuenta_producto INT(8), prueba_localizacion INT(5), cuenta_cantidad_total int(7), fecha DATE)";
    if(mysqli_query($conn,$tabla_auditoria)){
        $creatabaudit="Tabla auditoria_almacen fue creada en MySQL";    
    }else{
        $creatabaudit="Atencion " . mysqli_error($conn);
    }
    #$creatabaudit="Crea tabla de auditoria de almacen";
    include('index.html');
    $conn->close();
}

function conectadb(){ #Establece conexion con la base de datos.
    $conn=new mysqli("127.0.0.1:3307","root", "");
    if($conn->connect_error){
        #echo "Error al conectar a la base de datos: " . $conn->connect_error. " ";
        return false;
    }
    #echo "Conexión exitosa..." ." ";
        $conn->close();
}


if(array_key_exists('creasrv',$_POST)){
    conectadb();
    creaserver();
}

if(array_key_exists('creartabalm',$_POST)){
    conectadb();
    creatablaalmacen();
}

if(array_key_exists('creartabempl',$_POST)){
    conectadb();
    creatablaemp();
}
if(array_key_exists('creartabprod',$_POST)){
    conectadb();
    creatabproduc();
}

if(array_key_exists('creartabprodin',$_POST)){
    conectadb();
    creatabproducin();
}

if(array_key_exists('creartabprodout',$_POST)){
    conectadb();
    creatabproducout();
}

if(array_key_exists('creartabprodextout',$_POST)){
    conectadb();
    creatabproducextout();
}
if(array_key_exists('creartabaudit',$_POST)){
    conectadb();
    creatabauditoria();
}
