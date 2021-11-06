
<?php
$id = $_POST['id'];
$opcion = $_POST['opcion'];
$cui = $_POST['cui'];
$nombre = $_POST['nombres'];
$apellido = $_POST['apellidos'];
$date = $_POST['dateH'];
$direccion = $_POST['direccion'];
$nombreP = $_POST['nombresP'];
$nombreM = $_POST['nombresM'];
$correo = $_POST['correo'];

include ("conexion.php");
$con= conectar();

    if($opcion == "Seleccione:"){
        echo '<script language="javascript">alert("Por favor seleccione una opcion válida.");</script>';
        echo "<script> setTimeout(\"location.href='../'\",500) </script>";
    }else 
    if($opcion == "Registrar"){
        $comando = "call proc_pacientes(1, null, '".$cui."', '".$nombre."', '".$apellido."', '".$date."', '".$direccion."', '".$nombreP."', '".$nombreM."', '".$correo."', null);";
        if (($result = mysqli_query($con, $comando)) === false) {
            die(mysqli_error($con));
        }else{
            echo '<script language="javascript">alert("¡DATOS ALMACENADOS EXITOSAMENTE!");</script>';
        }
        echo "<script> setTimeout(\"location.href='../'\",500) </script>";
    }else 
    if($opcion == "Mostrar"){
        echo "<script> setTimeout(\"location.href='mostrarDatos.php'\",500) </script>";
    }else 
    if($opcion == "Modificar Por ID"){
        
        $comando = "call proc_pacientes(4, ".$id.",null,null,null,null,'".$direccion."',null,null,null,null);";
        if (($result = mysqli_query($con, $comando)) === false) {
            die(mysqli_error($con));
        }else{
            echo '<script language="javascript">alert("¡MODIFICACION APLICADA EXITOSAMENTE!");</script>';
        }
        echo "<script> setTimeout(\"location.href='mostrarDatos.php'\",500) </script>";  

    }else 
    if($opcion == "Deshabilitar Por ID"){
        $estado = 0;

    $datos= $con->query("call proc_pacientes(2, null,null,null,null,null,null,null,null,null,null);");
    while ($user = mysqli_fetch_array($datos)) {
        
        if ($id === $user ['id']) {
            if ($user ['estado'] == '0') {
                $estado = 1;
            }else{
                $estado = 0;
            }
        }
    }mysqli_close($con);

    $link = mysqli_connect("mysql5045.site4now.net", "a7c17d_web", "Alfabeto2021", "db_a7c17d_web");
    $comando = "call proc_pacientes(5, ".$id.",null,null,null,null,null,null,null,null, '".$estado."');";
    if(mysqli_query($link, $comando)){
        echo '<script language="javascript">alert("¡MODIFICACION APLICADA EXITOSAMENTE!");</script>'; 
         
    } else {
        echo "ERROR: No se ejecuto $comando. " . mysqli_error($link);
    }
    echo "<script> setTimeout(\"location.href='mostrarDatos.php'\",500) </script>";  
    }


?>



