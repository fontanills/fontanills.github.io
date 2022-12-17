<!DOCTYPE html>

<link type="text/css" rel="stylesheet" href="../css/template.css" />

<script type="text/javascript" src="jquery.js" ></script>

<script>
	
	function begin_buttons()
	{
		document.getElementById('home_button').addEventListener('mouseover', change_home, false);
		document.getElementById('home_button').addEventListener('mouseout', restore_home, false);
		
		document.getElementById('who_button').addEventListener('mouseover', change_who, false);
		document.getElementById('who_button').addEventListener('mouseout', restore_who, false);
		
		document.getElementById('advisers_button').addEventListener('mouseover', change_advisers, false);
		document.getElementById('advisers_button').addEventListener('mouseout', restore_advisers, false);
		
		document.getElementById('converter_button').addEventListener('mouseover', change_converter, false);
		document.getElementById('converter_button').addEventListener('mouseout', restore_converter, false);
		
		document.getElementById('download_button').addEventListener('mouseover', change_download, false);
		document.getElementById('download_button').addEventListener('mouseout', restore_download, false);
	}
	
	function change_home()
	{
		document.getElementById('home_button').src="../botones/boton_inicio(2).png";
	}
	function restore_home()
	{
		document.getElementById('home_button').src="../botones/boton_inicio(1).png";
	}
	
	function change_who()
	{
		document.getElementById('who_button').src="../botones/boton_quienes(2).png";
	}
	function restore_who()
	{
		document.getElementById('who_button').src="../botones/boton_quienes(1).png";
	}
	
	function change_advisers()
	{
		document.getElementById('advisers_button').src="../botones/boton_asesores(2).png";
	}
	function restore_advisers()
	{
		document.getElementById('advisers_button').src="../botones/boton_asesores(1).png";
	}
	
	function change_converter()
	{
		document.getElementById('converter_button').src="../botones/boton_convertir(2).png";
	}
	function restore_converter()
	{
		document.getElementById('converter_button').src="../botones/boton_convertir(1).png";
	}
	
	function change_download()
	{
		document.getElementById('download_button').src="../botones/boton_descargas(2).png";
	}
	function restore_download()
	{
		document.getElementById('download_button').src="../botones/boton_descargas(1).png";
	}
	
	function item_ajax()
	{
		xmlhttp = false;
		try 
		{
			xmlhttp = new ActiveXObject('Msxml2.XMLHTTP');
		} 
		catch (e) 
		{
			try 
			{
				xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
			} 
			catch (E) 
			{
				xmlhttp = false; 
			}
		}
		if (!xmlhttp && typeof XMLHttpRequest!='undefined') 
		{
			xmlhttp = new XMLHttpRequest();
		}
		return xmlhttp;
	}
	
	function send_data()
	{
		//Recogemos los valores introducidos en los campos de texto
		email_user = document.form.email_user.value;
		pass_user = document.form.pass_user.value;
			
		//instanciamos el objetoAjax
		ajax = item_ajax();
		
		//Abrimos una conexión AJAX pasando como parámetros el método de envío, y el archivo que realizará las operaciones deseadas
		ajax.open('POST', '../php/confirm_login.php', true);
		
		//cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
		ajax.onreadystatechange = function() 
		{
			//Cuando se completa la petición, mostrará los resultados
			if (ajax.readyState == 4)
			{   
				//El método responseText() contiene el texto de nuestro 'confirm_login.php'. Por ejemplo, cualquier texto que mostremos por un 'echo'
				document.getElementById('val_email_user').innerHTML = (ajax.responseText);
				document.getElementById('val_pass_user').innerHTML = (ajax.responseText);
				document.getElementById('val_login_user').innerHTML = (ajax.responseText);
				word_val= (ajax.responseText);
				
				if(word_val.includes('estudiante') == true)
				{
					document.getElementById('login_button').click();
					sessionStorage.clase = "student";
				}
				
				if(word_val.includes('profesor') == true)
				{
					document.getElementById('login_button').click();
					sessionStorage.clase = "professor";
				}
			}
		}
		//Llamamos al método setRequestHeader indicando que los datos a enviarse están codificados como un formulario
		ajax.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		
		//enviamos las variables a 'confirm_login.php'
	
		ajax.send('&email_user='+email_user+'&pass_user='+pass_user)
	}
	
</script>

<style type="text/css">
	
	span#val_email_user span.val_pass_user, span#val_email_user span.val_login_user, span#val_email_user span.success_login {display:none;}
	span#val_pass_user span.val_email_user, span#val_pass_user span.val_login_user, span#val_pass_user span.success_login {display:none;}
	span#val_login_user span.val_email_user, span#val_login_user span.val_pass_user, span#val_login_user span.success_login {display:none;}
	
	#div_logo
	{
	margin:0px auto;
	width: 950px;
	height: 95px;
	margin-bottom: 60px;
	}
	
	#img_logo
	{
	width:420px; 
	height:150px;
	}
	
	#container
	{
	margin:0px auto;
	font-size:1em;
	width: 950px;
	height: 350px; 	
	z-index: 0;
	background: #FFFFFF;
	border-left: 1.5px solid #205791;
	border-right: 1.5px solid #205791;
	border-top: 1px solid white;
	border-radius: 0px 0px 10px 10px;
	-moz-border-radius: 0px 0px 10px 10px;
	-webkit-border-radius: 0px 0px 10px 10px;
	box-shadow: 0px 0px 15px #000;
	margin-top: 0px !important;
	margin-bottom: -10px;
	font-size:1em;
	}
	
	#form_div
	{
	margin-left:350px;
	margin-right:10px;
	margin-top: 200px;
	margin-bottom: 0;
	}
	
	@media screen and (max-width:1024px) and (max-height: 1366px)
	{
	#div_logo
	{
	margin:0px auto;
	width: 100%;
	height: 100%;
	margin-bottom: 0%;
	}
	
	#img_logo
	{
	width:48%;
	height:40%;
	}
	
	#container 
	{
	width:100%;
	height: 100%;
	}
	
	#buttons_up
	{
	width:100%;
	height:100%;
	}
	
	#home_button
	{
	width:20%;
	height:100%;
	}
	
	#converter_button
	{
	width:20%;
	height:100%;
	}
	
	#download_button
	{
	width:20%;
	height:100%;
	}
	
	#who_button
	{
	width:20%;
	height:100%;
	}
	
	#advisers_button
	{
	width:20%;
	height:100%;
	}
	}
	
	@media screen and (max-width:768px) and (max-height: 1024px)
	{
	#div_logo
	{
	margin:0px auto;
	width: 100%;
	height: 100%;
	margin-bottom: 0%;
	}
	
	#img_logo
	{
	width:48%;
	height:40%;
	}
	
	#container 
	{
	width:100%;
	height: 100%;
	}
	
	#buttons_up
	{
	width:100%;
	height:100%;
	}
	
	#home_button
	{
	width:20%;
	height:100%;
	}
	
	#converter_button
	{
	width:20%;
	height:100%;
	}
	
	#download_button
	{
	width:20%;
	height:100%;
	}
	
	#who_button
	{
	width:20%;
	height:100%;
	}
	
	#advisers_button
	{
	width:20%;
	height:100%;
	}
	}
	
	@media screen and (max-width: 480px) and (max-height: 900px)
	{
	#div_logo
	{
	margin:0px auto;
	width: 100%;
	height: 100%;
	margin-bottom: 0%;
	}
	
	#img_logo
	{
	width:48%;
	height:50%;
	}
	
	#container 
	{
	width:100%;
	height: 100%;
	}
	
	#buttons_up
	{
	width:100%;
	height:100%;
	}
	
	#home_button
	{
	width:20%;
	height:100%;
	}
	
	#converter_button
	{
	width:20%;
	height:100%;
	}
	
	#download_button
	{
	width:20%;
	height:100%;
	}
	
	#who_button
	{
	width:20%;
	height:100%;
	}
	
	#advisers_button
	{
	width:20%;
	height:100%;
	}
	}
</style>

<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<meta name="title" content="Ingresar">
        <meta name="description" content="Pagina del Sistema SWROCI">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Ingresar</title>
	</head>
	
	<body onload="begin_buttons()">
		<div id="div_logo">
			<img id='img_logo' src="../imagenes/logo_una.png"/>
		</div>
		<div id="buttons_up">
			<a href='../index.html'>
				<img id="home_button" src="../botones/boton_inicio(1).png"  width="128" height="63"  />
			</a>
			<a href='convertir.html' style="margin-left:-5px">
				<img id="converter_button" src="../botones/boton_convertir(1).png"  width="128" height="63"  />
			</a>
			<a href='materias.html' style="margin-left:-5px">
				<img id="download_button" src="../botones/boton_descargas(1).png"  width="128" height="63"  />
			</a>
			<a href='quienes.html' style="margin-left:-5px">
				<img id="who_button" src="../botones/boton_quienes(1).png"  width="128" height="63"  />
			</a>
			<a href='asesores.html' style="margin-left:-5px">
				<img id="advisers_button" src="../botones/boton_asesores(1).png"  width="128" height="63"  />
			</a>
		</div>
		
		<div id="container">
			<div id="form_div">
				<form name='form' onSubmit='send_data(); return false'>
					
					Correo: <input type='text' name='email_user' id='email_user'>
					<span id='val_email_user' style='color:red;'></span>
					<p></p>
					
					Contrase&#241;a: <input type='password' name='pass_user' id='pass_user'>
					<span id='val_pass_user' style='color:red;'></span>
					<p></p>
					
					<span id='val_login_user' style='color:red;'></span>
					<p></p>
					
					<input type='submit' value='Ingresar'>
				</form>
			</div>
		</div>
		<a id="login_button" href='materias.html'>
		</a>
	</body>
</html>

