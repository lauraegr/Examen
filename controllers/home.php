<?php

$usuario = new Login();
$home = new Home();

$variables = array('preguntas'=>$home->preguntasAleatorias(),'seguridad'=>$usuario->seguridadYmenu());

view('home',$variables);

?>