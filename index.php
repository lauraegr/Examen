<?php

require 'conexion/BD.php';
require 'clases/Login.php';
require 'clases/Home.php';
require 'helpers.php';

$homeI = new Home();
$login = new Login();

if(isset($_REQUEST['url'])){

    switch($_REQUEST['url']){

        case "inicio":
            $login->validar($_REQUEST['user'],$_REQUEST['pass']);
            break;

        case "cerrar":
            $login->cerrarSesion();
            break;

        case "insertar":

            $arregloR = array();
            $arregloI = array();
            if(isset($_REQUEST['p1'])){
                array_push($arregloR,$_REQUEST['p1']);
                array_push($arregloI,1);
            }
            if(isset($_REQUEST['p2'])){
                array_push($arregloR,$_REQUEST['p2']);
                array_push($arregloI,2);
            }
            if(isset($_REQUEST['p3'])){
                array_push($arregloR,$_REQUEST['p3']);
                array_push($arregloI,3);
            }
            if(isset($_REQUEST['p4'])){
                array_push($arregloR,$_REQUEST['p4']);
                array_push($arregloI,4);
            }
            if(isset($_REQUEST['p5'])){
                array_push($arregloR,$_REQUEST['p5']);
                array_push($arregloI,5);
            }
            if(isset($_REQUEST['p6'])){
                array_push($arregloR,$_REQUEST['p6']);
                array_push($arregloI,6);
            }
            if(isset($_REQUEST['p7'])){
                array_push($arregloR,$_REQUEST['p7']);
                array_push($arregloI,7);
            }
            if(isset($_REQUEST['p8'])){
                array_push($arregloR,$_REQUEST['p8']);
                array_push($arregloI,8);
            }
            if(isset($_REQUEST['p9'])){
                array_push($arregloR,$_REQUEST['p9']);
                array_push($arregloI,9);
            }
            if(isset($_REQUEST['p10'])){
                array_push($arregloR,$_REQUEST['p10']);
                array_push($arregloI,10);
            }
            if(isset($_REQUEST['p11'])){
                array_push($arregloR,$_REQUEST['p11']);
                array_push($arregloI,11);
            }
            if(isset($_REQUEST['p12'])){
                array_push($arregloR,$_REQUEST['p12']);
                array_push($arregloI,12);
            }
            if(isset($_REQUEST['p13'])){
                array_push($arregloR,$_REQUEST['p13']);
                array_push($arregloI,13);
            }

            if($arregloI != null and $arregloR != null){

                $homeI->validarPreguntas($arregloR,$arregloI);

            }else{

                $_REQUEST['url']='home';

                echo "<div class='alert alert-danger' role='alert'>";
                echo "<br>";
                echo "<center><strong>Debes de contestar todas las preguntas</strong></center>";
                echo "<br>";
                echo "</div>";

            }

            break;

    }

}

if(empty($_REQUEST['url'])){

    $_REQUEST['url']='login';
    controller($_REQUEST['url']);

}else{

    controller($_REQUEST['url']);

}
require 'templates/footer.php';
?>