<?php

$conn = new PDO('mysql:host=lcalhost;dbname=pdo',"root","root");

$SQL = "UPDATE contas Set nome = :nome, saldo = :valor Where id = :id";

$conn->beginTransaction();

$nome = "Gomes";
$saldo = 200;
$id = 3;

$prepareQuery->bindParam(":nome",$nome,PDO::PARAM_STR);
$prepareQuery->bindParam(":saldo",$saldo,PDO::PARAM_STR);
$prepareQuery->bindParam(":id",$id,PDO::PARAM_INT);
$prepareQuery->execute();

$conn->commit();
$conn->rollBack();