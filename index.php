<?php
  ob_start();
$page_title="Inicio de sesion";
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true)) { 
    $user_id=$_SESSION['user_id'];
    $current_user1 = find_by_id('users',$user_id);
  if($current_user1['user_level']==1){
      redirect('admin/panel.php');
     }else{
     redirect('cliente/form-init.php',false);
   }
  }
?>
 <?php include_once('layouts/header.php'); ?>

<div class="container-fluid" >

	<div class="text-center" style="margin-top: 50px">
    <img src="libs/images/1.png" class="img-fluid" style="height: 30%" alt="Responsive image">
  
</div>
	<div class="container">
    <div class="text-center" >
       <h1>Bienvenido</h1>
       <p>Iniciar sesión </p>
     </div>
     <?php echo display_msg($msg); ?>
      <form method="post" action="auth.php" >
        <div class="form-group">
              <label for="username" class="control-label" style="color:white">Usuario</label>
              <input type="name" class="form-control" name="username" placeholder="Usuario">
        </div>
        <div class="form-group">
            <label for="Password" class="control-label" style="color:white">Contraseña</label>
            <input type="password" name= "password" class="form-control" placeholder="Contraseña">
        </div>
        <div class="form-group text-right">
                <button type="submit" class="btn btn-success  pull-right">Entrar</button>
        </div>
		  </div>
    </form>
</div>

</div>


<?php include_once('layouts/footer.php'); ?>
