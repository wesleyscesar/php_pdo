<?php 

class CrudUsuario
{

	private $db;
	private $id;
    private $login;
    private $senha;

	public function __construct(\PDO $db)
	{
		$this->db = $db;
	}

    public function autenticar($login,$senha){
        $query = "SELECT * FROM usuarios WHERE login = :login and senha = :senha";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':login', $login, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->rowCount();

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
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

}
