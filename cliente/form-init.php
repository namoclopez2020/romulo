<html>
<header>
	<?php require('../includes/load.php');
	 include('layouts/header.php');
	?>
</header>
<nav><?php include('layouts/nav.php') ?>
</nav>
<body>
	<div class="container">
		<br>
		<?php echo display_msg($msg); ?>
		<br>
		<h1>Registro de cliente</h1>
		<hr>
		<form action="form-init-process.php" method="POST" >
		<div class="form-group">
			<input type="text" name="nombre" placeholder="Nombre" required>
		</div>
		<div class="form-group">
			<input type="text" name="apellidos" placeholder="Apellidos" required>
		</div>
		<div class="form-group">
			<input type="text" name="celular" placeholder="Numero de contacto" required>
		</div>
		<div class="form-group">
			<input type="text" name="email" placeholder="Email" required>
		</div>
		<div class="form-group">
			<input type="submit" name="enviar" value="Aceptar" class="btn btn-success">
		</div>


	</form>

	</form>
	</div>
</body>
<footer>
	<?php include ('layouts/footer.php');?>
</footer>
</html>