
<!DOCTYPE html>
<html>
<head>
	<title>DATOS ALMACENADOS DE LA BD</title>
</head>
<body>

<br>

	<table border="1" >
		<tr>
			<td>ID</td>
			<td>DPI</td>
			<td>NOMBRE</td>
			<td>APELLIDO</td>
			<td>FECHA</td>
            <td>DIRECCION</td>
            <td>NOMBRE PADRE</td>
            <td>NOMBRE MADRE</td>
            <td>CORREO</td>
            <td>ESTADO</td>
		</tr>

		<?php 
        include ("conexion.php");
        $con= conectar();
		$sql="call proc_pacientes(2, null,null,null,null,null,null,null,null,null,null);";
		$result=mysqli_query($con,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr>
			<td><?php echo $mostrar['id'] ?></td>
			<td><?php echo $mostrar['cui'] ?></td>
			<td><?php echo $mostrar['nombresCompletos'] ?></td>
			<td><?php echo $mostrar['apellidosCompletos'] ?></td>
			<td><?php echo $mostrar['fechaNacimiento'] ?></td>
            <td><?php echo $mostrar['direccion'] ?></td>
            <td><?php echo $mostrar['nombresPadre'] ?></td>
            <td><?php echo $mostrar['nombresMadre'] ?></td>
            <td><?php echo $mostrar['correoElectronico'] ?></td>
            <?php 
            if ($mostrar['estado'] == '1') { ?>
                <td><?php echo 'activo' ?></td>
        <?php }else{	 ?>
                <td><?php echo 'inactivo' ?></td>
                <?php 
	}
	 ?>
            
            
		</tr>
	<?php 
	}
	 ?>
	</table>
<br>
    <a href="../">INICIO</a>

</body>
</html>