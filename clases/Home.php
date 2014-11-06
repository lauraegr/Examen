<?php

class Home{

    public function preguntasAleatorias(){

        $log = new Login();

        $log->seguridadYmenu();

        $claveUs = $_SESSION['usuarioRegistrado'];

        $sqlU = "select * from usuarios where id=$claveUs";
        $consultaU = mysql_query($sqlU) or die (mysql_error());

        echo "<h1>Bienvenido (a): ".utf8_decode(mysql_result($consultaU,0,'nombre'))." tu calificaci&oacute;n actual es de: ".utf8_decode(mysql_result($consultaU,0,'calificacion'))."</h1>";

        echo '<form action="insertar" method="POST">';

        $sql = "SELECT * FROM preguntas ORDER BY RAND() LIMIT 5";
        $consulta = mysql_query($sql) or die (mysql_error());
        $cuantos = mysql_num_rows($consulta);

        for($position = 0;$position < $cuantos;$position ++) {

            echo "".mysql_result($consulta,$position,'id').")".utf8_decode(mysql_result($consulta,$position,'pregunta'))."<br>";

        }

        echo "<input type='submit' value='Guardar'>";

        echo '</form>';

    }

    public function insertarCalif($calif){

        @session_start();

        $idUsuario = $_SESSION['usuarioRegistrado'];
        $sql = "select * from usuarios where id=$idUsuario";
        $consulta = mysql_query($sql) or die (mysql_error());

        $calBase = mysql_result($consulta,0,'calificacion');

        if($calif > $calBase){

            $sql2 = "update usuarios set calificacion=$calif where id=$idUsuario;";
            $consulta2 = mysql_query($sql2) or die (mysql_error());

        }

        $_REQUEST['url']='home';

    }

    public function validarPreguntas($arregloR,$arregloI){

        $calificacionIn = 0;
        for($r = 0;$r < count($arregloR);$r ++){
            $sql = "select * from preguntas where id =".$arregloI[$r].";";
            $consulta = mysql_query($sql) or die (mysql_error());
            $respuesta = mysql_result($consulta,0,'respuesta');

            if($arregloR[$r] == $respuesta){
                $calificacionIn = $calificacionIn + 1;
            }

        }
        $h = new Home();
        $h->insertarCalif($calificacionIn);

    }

}
?>