<?php 

session_start();


if (isset($_SESSION['usuario'])&&($_SESSION['tipo'] != 'admin')) {
	header('Location:panel_user.php');
}

if (isset($_SESSION['usuario'])%%($_SESSION['tipo'] == 'admin')) {
	//cambiar a panel_admin futuro
	header('Location:panel_user.php');
}

require 'funciones.php';


$errores = '';


if (($_SERVER['REQUEST_METHOD'] =='POST')&&( $_POST['usuario'] != null)){


    $usuario = filter_var(limpiar($_POST['nick']), FILTER_SANITIZE_STRING);
    $pass = limpiar($_POST['pass']);
    //$pass = hash('sha512', $pass);

    try {

        $conexion = new PDO('mysql:host=localhost ;dbname=fish_market','root','');


    }catch(PDOException $e){

       echo "Error:" .$e->getMessage();;
    }

    $statement = $conexion->prepare('SELECT * FROM usuarios WHERE nick_user= :usuario AND pass= :passw');

    $statement->execute(array(
        ':usuario' => $usuario,
        ':passw' => $pass
    ));

    $resultado = $statement->fetch();
    if($resultado !== false){
        $_SESSION['usuario'] = $usuario;
        $_SESSION['tipo'] = $resultado['tipo'];

                if ($_SESSION['tipo'] == 'admin') {
                	//cambiar a panel_admin futuro
                    header('Location: panel_user.php');
                     }
                     
                     else
                     {
                    header('Location: panel_user.php');
                     }
                 








    } else{

        $errores .='<li>La contrasenia y/o usuario son incorrectos</li>';
    }

    
    


}



include ("../vistas/login.html");













>