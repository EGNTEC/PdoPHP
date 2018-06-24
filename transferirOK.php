<?php

if(isset($_POST['idr'])){

    $conn = new PDO('mysql:host=localhost;dbname=pdo','root','root');

    $sql = "SELECT Count(*) From contas Where id = :destinatario";
    $prepareQuery =  $conn->prepare($sql);
    $prepareQuery->bindParam(":destinatario",$_POST['idd'],PDO::PARAM_INT);
    $prepareQuery->execute();

    if($prepareQuery->fetchColumn() > 0){
        $sql = "SELECT Count(*) From contas Where id = :remetente";
        $prepareQuery =  $conn->prepare($sql);
        $prepareQuery->bindParam(":remetente",$_POST['idr'],PDO::PARAM_INT);
        $prepareQuery->execute();

        if($prepareQuery->fetchColumn() > 0){
            $sql = "SELECT saldo From contas Where id=".$_POST['idr'];
            
            foreach ($conn->query($sql) As $row) {
                if($row['saldo'] >= $_POST["valor"]){
                    //retirar
                    $updateRemetenteSQL = "UPDATE contas Set saldo = saldo - ".$_POST["valor"]." Where id =".$_POST['idr'];
                    $updateRemetenteQuery = $conn->query($updateRemetenteSQL);
                    
                    if($updateRemetenteQuery->rowCount() > 0){

                        //Adicionar
                        $updateDestinatarioSQL = "UPDATE contas Set saldo = saldo + ".$_POST["valor"]." Where id =".$_POST['idd'];
                        $updateDestinatarioQuery = $conn->query($updateDestinatarioSQL);

                        if($updateDestinatarioQuery->rowCount() > 0){
                            echo"Transferencia OK!";
                        }
                    }                    
                }else{
                    echo"Transferencia NAO OK!";
                }
            }
        }
    }
    
}