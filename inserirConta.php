<?php
if(isset($_POST['nome'])){

    $conn = new PDO('mysql:host=lcalhost;dbname=pdo',"root","root");        

    $SQL = "INSERT Into contas Values(:nome, :saldo)";
    $prepareQuery = $conn->prepare($SQL);
    $prepareQuery->bindParam(":nome",$_POST['nome'],PDO::PARAM_STR);
    $prepareQuery->bindParam(":saldo",$_POST['saldo'],PDO::PARAM_STR);
    $prepareQuery->execute();


    if($prepareQuery->rowCount() > 0){

          echo "Conta cadastrada com sucesso!";  
    }
}

?>