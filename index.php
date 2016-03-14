<?php 

require_once 'Crud.php';

try{
    $conn = new \PDO("mysql:host=localhost;dbname=pdo_bd","root","t2ic0l02"); // CONEXÃO COM O BD
} catch (\PDOException $e) {
	die("não foi possivel estabelecer a conexão");
}

$Id = isset($_GET['id'])?$_GET['id']:'';

$IdAluno = isset($_POST['idaluno'])?$_POST['idaluno']:'';

$crud = new Crud($conn);

if($_SERVER["REQUEST_METHOD"] == "POST") {

	if($IdAluno != ""){ // FUNÇÃO PARA EXCLUIR O ALUNO
	}

} else {

	if($Id != ""){
		$crud->deletar($Id);
	}
}

?>
<form id="form" name="_form" action="" method="post">

	<input id="idaluno" name="idaluno" type="hidden" value="<?php echo $Id ?>" />

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
				$crud->listar();
			?>
			</tbody>
		</thead>
	</table>

	<table width="100%" cellspacing="10" cellpadding="0" style="font-size: 20px;">
		<tr>
			<td align="right"><a href="form.php">Novo Aluno</a></td>
		</tr>
	</table>
</form>