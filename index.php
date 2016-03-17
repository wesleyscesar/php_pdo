<?php

session_start();

require_once 'conexao.php';
require_once 'CrudUsuario.php';

$cruduser = new CrudUsuario($conn);

$tbLogin = isset($_POST['tbLogin'])?$_POST['tbLogin']:'';
$tbSenha = isset($_POST['tbSenha'])?$_POST['tbSenha']:'';

$_SESSION['autenticacao'] = 0;

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if($cruduser->autenticar($tbLogin,$tbSenha) > 0) {
        $_SESSION['autenticacao'] = 1;
        header("location: list_aluno.php");
    } else {
        echo "Usuario ou Senha Invalidos";
    }
}

?>

<form action="" method="post">
    <table>
        <tr>
            <td>LOGIN <br /><input id="tbLogin"  name="tbLogin" type="text" size="5"  />&nbsp;&nbsp;</td>
            <td>SENHA <br /><input  id="tbSenha" name="tbSenha" type="password" size="5" />&nbsp;&nbsp;</td>
            <td><input type="submit" border="0" value=" Logar " style="margin-top: 17px;"/>&nbsp;&nbsp;</td>
        </tr>
    </table>
</form>

