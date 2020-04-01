<?php 
include ('../includes/load.php');

if($_POST['nombre']=="" || $_POST['apellidos']=="" || $_POST['celular']=="" || $_POST['email']=="") {
	$session->msg("d", "Rellene todos los campos");
	redirect('form-init.php',false);
}

$nombre=remove_junk($db->escape($_POST['nombre']));
$apellido=remove_junk($db->escape($_POST['apellidos']));
$celular= remove_junk($db->escape($_POST['celular']));
$email=remove_junk($db->escape($_POST['email']));

$username=$email;
$password_vista="12345678";
//la funcion shq es de php y se encarga encriptar este dato para luego insertarlo e la db de manera que ayude anuestra sefuridad
$password= sha1('12345678');
$nivel=2;
//en este bloque validamos que email no repita 
$validacion="SELECT COUNT(*) AS cuenta from user where username='{$email}'";
$cont=$db->query($validacion);
$count=$db->fetch_array($cont);
$cuenta=$count['cuenta'];

if($cuenta>0){
	$session->msg('d',"El email ya se encuentra registrado");
	redirect('form-init.php',false);
}
//aca procedemos con la hacer la insercion luego de validador el email
$sql="INSERT INTO user (username,password,nivel_usuario) VALUES ('{$username}','{$password}',{$nivel})";
$db->query($sql);

$consulta="SElECT id_user FROM user where username='$username'";
$datos=$db->query($consulta);
while($data=$db->fetch_array($datos)){
	$id_user=$data['id_user'];
}
$sql_cliente="INSERT INTO cliente (nombre_cliente,apellido_cliente,id_usuario,celular_cliente,email_cliente) VALUES ('{$nombre}','{$apellido}',{$id_user},'{$celular}','{$email}')";
if($db->query($sql_cliente) && $db->affected_rows()==1){
	$session->msg('s','Usuario registrado correctamente');
	redirect('panel.php',false);
}
else{
	$session->msg('s','Error al registrar cliente');
	redirect('form-init.php',false);
}

?>