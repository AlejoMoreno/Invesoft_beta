<html>
<head>
	<title>Osmed Registro</title>
	<?php include('html/encabezado.php');?>
</head>
<body>
	<section id="content-login">
		<img src="imagenes/logo-wakusoft2.png">
		<div id="formulario-login">

			<form action="php/login-r.php" method="post" class="login">
				<h2>Bienvenido a INVENSOFT</h2><hr>
				<div><label>Bodega a trabajar:</label>
				<?php
			    include_once "php/conexion.php"; 
	            $conexion= conexion();

			    $bill_bodegas = mysqli_query($conexion,"SELECT * FROM bodegas") or die(mysqli_error($conexion));
			    echo '
		                <select name="idbodegasc" id="idbodegasc">
		        	       <option value="">Seleccione Bodegas</option>';
		                 
		                while ($row = $bill_bodegas->fetch_assoc()) { 
		                    echo '<option value="'.$row['idbodegas'].'" >'.$row['nombre'].'</option>';
		                }
		                echo '</select>&nbsp;</div>           


			    ';?>
			    <div><label>Username</label><input name="username" id="username" type="text" ></div> 
			    <div><label>Password</label><input name="password" id="password" type="password"></div>
 




			    <input type="button" id="boton" name="enviar" value="Login" href="javascript:;" onClick="loginuser($('#idbodegasc').val(),$('#username').val(), $('#password').val());return false;">
			   
			</form> 

			<div id="resultado">HOLA</div>

			<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script> 
			<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
			<script>
			function loginuser(idbodegasc, username, password){
			    var parametros = {
			            "idbodegasc" : idbodegasc,
			            "username" : username,
			            "password" : password
			            
			    };
			    $.ajax({
			            data:  parametros,
			            url:   'php/login-r.php',
			            type:  'post',
			            beforeSend: function () {
			                    $("#resultado").html("Procesando, espere por favor...<center><img src='imagenes/gif-load.gif'/></center>");
			                    $('#idbodegasc').val("");
			                    $('#username').val("");
			            		$('#password').val("");
			            		
			            },
			            success:  function (response) {
			                $("#resultado").html(response);
			            }
			    });
			}

			</script>

		</div>
	</section>
	<section id="final">
		<div id="texto">by wakusoft. ©2016 <hr><a href="#">Políticas</a>|<a href="#">Derechos</a>|<a href="html/ManualInvensoft.pdf">Manual usuario INVENSOFT</a></div>

	</section>
</body>
</html>

<style type="text/css">
#texto{
	margin-top: 30px;
	margin-left: 41%;
	float: left;
	font-size: 15px;
	text-align: center;
}
#final{
	color: white;
	float: left;
	background-color: rgba(26, 26, 77, 1);
	width: 100%;
	height: 15%;
	margin-top: 15%;
}
#formulario-login{
	float: left;
	width: 65%;
	height: 40%;
	padding: 4% 1% 1% 8%;
}
#boton{
	color: black;
	background: #d9d9d9;
	border: 2px solid rgba(26, 26, 77, 1);
}
#boton:hover{
	color: #F9F9F9;
	background: rgba(26, 26, 77, 1);
}
#content-login img {
	float: left;
	width: 20%;
	padding: 10% 1% 1% 5%;
}
#content-login{
	position: relative;
	width: 60%;
	height: 60%;
	left: 25%;
	top: 10%;
	border-radius: 10px 10px 10px 10px;
	-moz-border-radius: 10px 10px 10px 10px;
	-webkit-border-radius: 10px 10px 10px 10px;
	border: 1px solid rgba(26, 26, 77, 1);
	background: white;
	padding-right: 30px;
}
input,select {
	outline: none;
    display: block;
    width: 98%;
	border: 1px solid #d9d9d9;
	margin: 10px 10px 20px;
	padding: 10px 15px 10px 10px;
}
input:focus,select:focus{
	border: 2px solid rgba(26, 26, 77, 1);
}
</style>