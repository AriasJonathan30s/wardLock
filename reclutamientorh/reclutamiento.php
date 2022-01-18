<?php


function regtraba(){
    $conn= new mysqli("127.0.0.1:3307","root", "");
    $nomb=$_POST['nombre'];
    $ape=$_POST['apellido'];
    $pos=$_POST['puesto'];
    $area=$_POST['area'];
    $nac=$_POST['fechanac'];
    $advice="";
    $conn=new mysqli("127.0.0.1:3307","root", "","wardLockdb");
    $sql="INSERT INTO perfil_trabajador(nombre_trabajador,apellido_trabajador,puesto,area,fecha_nacimientoAAAAMMDD)
    VALUES('$nomb','$ape','$pos','$area','$nac')";
    if($conn->query($sql)===TRUE){
        $conn->close();
        return "Registro capturado.";
        
    } else{
        return "Atencion: ".$sql."<br>".$conn->error;
        
    }
}

function consulta($advice){
    $conn=new mysqli("127.0.0.1:3307","root", "","wardLockdb");
    $sql="SELECT * FROM perfil_trabajador ORDER BY id_trabajador DESC LIMIT 1";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $idtrab=$row["id_trabajador"];
    $nomb=$row["nombre_trabajador"];
    $ape=$row["apellido_trabajador"];
    $pos=$row["puesto"];
    $area=$row["area"];
    $fech=$row["fecha_contratacion"];
    $nac=$row["fecha_nacimientoAAAAMMDD"];
    $post=$advice;
    include('index.html');
    $conn->close();
}

function conectadb(){ #Establece conexion con la base de datos.
    $conn=new mysqli("127.0.0.1:3307","root","");
    if($conn->connect_error){
        return false;
    }
    $conn->close();
}



if(array_key_exists('regtrab',$_POST)){
    conectadb();
    $advice=regtraba();
    consulta($advice);
    
}
?>