<?php
require_once 'Crud.php';

try{
    $conn = new \PDO("mysql:host=localhost;dbname=pdo_bd","root","t2ic0l02"); // CONEXÃO COM O BD
} catch (\PDOException $e) {
    die("não foi possivel estabelecer a conexão");
}

$crud = new Crud($conn);

$Id = isset($_GET['id'])?$_GET['id']:'';

$tbIdAluno = isset($_POST['idaluno'])?$_POST['idaluno']:'';
$tbNome = isset($_POST['tbNome'])?$_POST['tbNome']:'';
$tbNota = isset($_POST['tbNota'])?$_POST['tbNota']:'';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if($tbIdAluno > 0){ // ALTERA ALUNO

        $crud->setNome($tbNome);
        $crud->setNota($tbNota);

        if($crud->alterar($tbIdAluno)) header("location: index.php");

    } else { // INSERE ALUNO

        $crud->setNome($tbNome);
        $crud->setNota($tbNota);

        if($crud->inserir()) header("location: index.php");

    }

} else {

    if($Id != ""){
        $result = $crud->find($Id);

        $tbNome = $result['nome'];
        $tbNota = $result['nota'];

    }

}
?>

<form action="" method="post">

    <input id="idaluno" name="idaluno" type="hidden" value="<?php echo $Id;?>" />

    <table>
        <tr>
            <td>Nome <br /><input id="tbNome"  name="tbNome" type="text" size="10" value="<?php echo $tbNome ?>" />&nbsp;&nbsp;</td>
            <td>Nota<br /><input  id="tbNota" name="tbNota" type="text" size="2" value="<?php echo $tbNota ?>" />&nbsp;&nbsp;</td>
        </tr>
    </table>

    <table>
        <tr>
            <td>
                <?php if($Id > 0){ ?>
                    <input type="submit" border="0" value=" Alterar " style="margin-top: 11px;" class="botao"/>&nbsp;&nbsp;
                <?php } else { ?>
                    <input type="submit" border="0" value=" Adicionar " style="margin-top: 11px;" class="botao"/>&nbsp;&nbsp;
                <?php } ?>
            </td>
        </tr>
    </table>

</form>
