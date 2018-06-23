<?php

if(isset($_POST['idr'])){


    $conn = new PDO('mysql:host=localhost;dbname=pdo','root','root');

    $sql = "Select id From contas Where id=".$_POST['idd'];
    $query =  $conn->query($sql)->fetchAll();

    if(count($query) > 0){
        $sql = "Select id From contas Where id".$_POST['idr'];
        $query =  $conn->query($sql)->fetchAll();


        if(count($query) > 0){
            $sql = "Select saldo From contas Where id".$_POST['idr'];
            
            foreach ($conn->query($sql) As $row) {
                if($row['saldo'] >= $_POST["valor"]){

                    echo"Transferencia OK!";
                }else{
                    echo"Transferencia NAO OK!";
                }
            }
        }
    }
    
}