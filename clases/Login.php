<?php

class Login{

    public function validar($usuario,$contrasena){

        $sql = "SELECT * FROM usuarios WHERE usuario = '".$usuario."' AND contrasena = '".$contrasena."';";
        $consulta = mysql_query($sql) or die (mysql_error());
        $cuantos = mysql_num_rows($consulta);
        if($cuantos == 0){

            echo "<div class='alert alert-danger' role='alert'>";
            echo "<br>";
            echo "<center><strong>Los datos son incorrectos</strong></center>";
            echo "<br>";
            echo "</div>";

            $_REQUEST['url']='login';

        }else{

            @session_start();
            $claveUsuario = mysql_result($consulta,0,'id');
            $_SESSION['usuarioRegistrado'] = $claveUsuario;

            $_REQUEST['url']='home';

        }

    }

    public function formularioLogin(){

        echo "<div class='table-responsive'>";

        echo '<form action="inicio" method="POST">';

        echo "<table class='table table-hover'>";

        echo "<tr>";

        echo "<td align='right'><strong>Usuario</strong></td>";

        echo "<td><input type='text' name='user'></td>";

        echo '</tr>';

        echo "<tr>";

        echo "<td align='right'><strong>Contrase&ntilde;a</strong></td>";

        echo "<td><input type='password' name='pass'></td>";

        echo '</tr>';

        echo "<tr>";

        echo "<td colspan='2' style='padding-left: 500px;'><input type='submit' value='Entrar'></td>";

        echo '</tr>';

        echo '</table>';

        echo '</form>';

        echo "</div>";

    }

    public function seguridadYmenu(){

        @session_start();
        @$claveUs = $_SESSION['usuarioRegistrado'];
        if($claveUs == ""){

            print "<meta http-equiv='refresh'content='0;url=login'>";
            exit;

        }else{

            require ('templates/headerHome.php');

        }

    }

    public function cerrarSesion(){

        @session_start();
        session_unset();
        session_destroy();

        $_REQUEST['url']='login';

    }

}
?>