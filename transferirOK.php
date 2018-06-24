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
            $sql = "SELECT saldo From contas Where id= :remetente";
            $prepareQuery =  $conn->prepare($sql);
            $prepareQuery->bindParam(":remetente",$_POST['idr'],PDO::PARAM_INT);
            $prepareQuery->execute();

           if ($row = $prepareQuery->fetch(PDO::FETCH_ASSOC)) {
                if($row['saldo'] >= $_POST["valor"]){
                    //retirar
                    $updateRemetenteSQL = "UPDATE contas Set saldo = saldo - :valor Where id = :remetente";
                    $updateRemetentePrepareQuery->bindParam(":valor",$_POST['valor'],PDO::PARAM_STR);
                    
                    $updateRemetentePrepareQuery->bindParam(":remetente",$_POST['idr'],PDO::PARAM_INT);
                    $updateRemetentePrepareQuery->execute();
                    
                    if($updateRemetenteQuery->rowCount() > 0){

                        //Adicionar
                        $updateDestinatarioSQL = "UPDATE contas Set saldo = saldo + :valor Where id = :destinatario";
                        $updateDestinatarioPrepareQuery->bindParam(":valor",$_POST['valor'],PDO::PARAM_STR);
                        $updateDestinatarioPrepareQuery->bindParam(":destinatario",$_POST['idd'],PDO::PARAM_INT);
                        $updateDestinatarioPrepareQuery->execute();

                        if($updateDestinatarioQuery->rowCount() > 0){
                            echo"Transferencia OK!";
                        }
                    }                    
                }
            }
        }
    }
    
}