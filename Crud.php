<?php 

class Crud
{

	private $db;
	private $id;
    private $nome;
    private $nota;

	public function __construct(\PDO $db)
	{
		$this->db = $db;
	}

	public function listar()
	{
		$query = "select * from alunos";

        $stmt = $this->db->query($query);

        foreach ($stmt->fetchAll(\PDO::FETCH_ASSOC) as $item) {
            echo '<tr cellspacing="2" cellpadding="0" style="font-size: 13px;">';
            echo '<td align="center">' . $item["nome"] . '</td>';
            echo '<td align="center">' . $item["nota"] . '</td>';
            echo '<td align="center"><a href="form.php?id=' . $item["id"] . '">Editar</a></td>';
            echo '<td align="center"><a href="index.php?id=' . $item["id"] . '">Excluir</a></td>';
            echo '</tr>';
        }

    }

	public function inserir()
	{
		$query = "Insert into alunos(nome,nota) values(:nome, :nota)";

        $stmt = $this->db->prepare($query);
		$stmt->bindValue(':nome', $this->getNome());
		$stmt->bindValue(':nota', $this->getNota());
		if($stmt->execute())
		{
			return true;
		}
	}

	public function alterar($id)
	{
	    $query = "update alunos set nome = :nome, nota = :nota where id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':nome', $this->getNome());
        $stmt->bindValue(':nota', $this->getNota());
        if($stmt->execute())
        {
            return true;
        }
    }

	public function deletar($id)
	{
        $query = "delete from alunos where id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();

    }

    public function find($id){
        $query = "SELECT * FROM alunos WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);

    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * @param mixed $email
     */
    public function setNota($nota)
    {
        $this->nota = $nota;
        return $this;
    }

}
