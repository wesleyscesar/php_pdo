<?php

$conn = "";

try{
    $conn = new \PDO("mysql:host=localhost;dbname=pdo_bd","root","t2ic0l02"); // CONEXÃO COM O BD
} catch (\PDOException $e) {
    die("não foi possivel estabelecer a conexão");
}
