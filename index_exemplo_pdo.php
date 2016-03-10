<?php

// TRATANDO EXCEPTIONS

try{
    $conn = new \PDO("mysql:host=localhost;dbname=pdo_bd","root","t2ic0l02"); // CONEXÃO COM O BD

    #TODOS ALUNOS
    echo " Listando todos Alunos <br><hr>";

    $query = "select * from alunos";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    foreach ($stmt->fetchAll(PDO::FETCH_OBJ) as $alunos) {
        echo $alunos->nome . "<br>";
    }

    #ALUNOS COM A MAIOR NOTA
    echo " <br>Listando 3 Alunos com a maior nota <br><hr>";

    $query = "select MAX(nota) as nota from alunos";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_OBJ);

    $nota = $result->nota;

    $query = "select * from alunos where nota = :nota";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':nota',$nota, PDO::PARAM_INT);
    $stmt->execute();

    foreach ($stmt->fetchAll(PDO::FETCH_OBJ) as $alunos) {
        echo $alunos->nome . "<br>";
    }


} catch(\PDOException $e){
    echo "nao foi possivel conectar ao banco de dados:" . $e->getCode().":".$e->getMessage();
}
