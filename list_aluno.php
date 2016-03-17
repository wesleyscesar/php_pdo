<?php

session_start();

if($_SESSION['autenticacao'] > 0) {

	require_once 'conexao.php';
	require_once 'Crud.php';


	$Id = isset($_GET['id']) ? $_GET['id'] : '';

	$IdAluno = isset($_POST['idaluno']) ? $_POST['idaluno'] : '';

	$tbNome = isset($_POST['tbNome']) ? $_POST['tbNome'] : '';

	$crud = new Crud($conn);

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

	} else {
		if ($Id != "") {
			$crud->deletar($Id);
		}
	}
} else {
	echo "logue no sistema";
}
?>
<form id="form" name="_form" action="" method="post">

	<input id="idaluno" name="idaluno" type="hidden" value="<?php echo $Id ?>" />

	Nome: <input id="tbNome" name="tbNome" type="text" value="<?php echo $tbNome ?>" />

    <input type="submit" border="0" value=" Pesquisar " style="margin-top: 17px;"/>
	<table width="100%" cellspacing="2" cellpadding="0" style="font-size: 14px;">
		<thead>
			<tr>
				<th width="15%">Aluno</th>
				<th width="15%">Nota</th>
				<th width="1%"></th>
				<th width="1%"></th>
			</tr>
			<tbody>
			<?php
                if($tbNome != "") {
                    $crud->pesqAluno($tbNome);
                } else {
                    $crud->listar();
                }
			?>
			</tbody>
		</thead>
	</table>

	<table width="100%" cellspacing="10" cellpadding="0" style="font-size: 20px;">
		<tr>
			<td align="right"><a href="form_alunos.php">Novo Aluno</a></td>
		</tr>
	</table>
</form>