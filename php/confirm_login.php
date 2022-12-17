<?php
	
	include('abre_conexion.php');
	
	$email_user=$_POST['email_user'];
	$pass_user=$_POST['pass_user'];
	
	$general_error='false';
	
	$traffic='no';
	
	if(trim($email_user) == '')
	{
		echo"<span class='val_email_user'> *Campo vacio</span>";
		$general_error='true';
	}
	
	if(trim($pass_user) == '')
	{
		echo"<span class='val_pass_user'> *Campo vacio</span>";
		$general_error='true';
	}
	
	if($general_error == 'false')
	{
		$conexion=mysqli_connect($host,$user,$pw) or die('problema al conectar el host');
		mysqli_select_db($conexion,$bd) or die('problema al conectar la bd');
		$query = 'SELECT * FROM usuarios';
		$select =  mysqli_query($conexion,$query);
		
		while ($fila = mysqli_fetch_array($select))
		if(strcmp($email_user,$fila['correo']) == 0 && strcmp($pass_user,$fila['clave']) == 0)
		{
			$traffic='yes';
			if($fila['clase'] == 'estudiante') 
			echo"<span class='success_login'>estudiante</span>";
			
			if($fila['clase'] == 'profesor') 
			echo"<span class='success_login'>profesor</span>";
		}
		if($traffic == 'no')
		{
			echo"<span class='val_login_user'> *Usuario inválido</span>";
		}
		
		mysqli_close($conexion);
	}
	
?>  