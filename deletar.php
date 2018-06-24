<?php
if(isset($_GET['id'])){

    $conn = new PDO('mysql:host=lcalhost;dbname=pdo',"root","root");        

    $SQL = "DELETE contas Where id = :id";
    $prepareQuery = $conn->prepare($SQL);
    $prepareQuery->bindParam(":id",$_POST['id'],PDO::PARAM_INT);
    $prepareQuery->execute();


    if($prepareQuery->rowCount() > 0){

          echo "Conta deletada com sucesso!";  
    }
}

?>