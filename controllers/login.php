<?php

$login = new Login();

$variables = array('formulario'=>$login->formularioLogin());

view('login',$variables);

?>