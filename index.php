<h1>Banco Inter</h1>
<table width="100%" border="1">
<tr><td>Id</td><td>Cliente</td><td>Saldo</td><td>Transferir</td><td>Deletar</td></tr>
<?php
try{
    $conn = new PDO('mysql:host=localhost;dbname=pdo','root','root');

    $sql = "Select * From contas";

    foreach ($conn->query($sql) As $row) {
        
        echo"<tr>";
        echo"<td>".$row['id']."</td>";
        echo"<td>".$row['nome']."</td>";
        echo"<td>".$row['saldo']."</td>";
        echo"<td><a href='transferir.php?id=".$row['id']."'>Transferir Valores</a></td>";
        echo"<td><a href='deletar.php?id=".$row['id']."'>X</a></td>";
        echo"</tr>";

    }

}catch(PDOException $e){

    echo"Ocorreu um erro ao conectar ao banco:".$e->getMessage();
}
?>
</table>
<a href="novaConta.php">Nova Conta</a>