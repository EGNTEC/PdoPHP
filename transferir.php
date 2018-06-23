<h1>Transferir</h1>
<form action="transferirOK.php" method="post">
    <table>
        <tr>
            <td>Id remetente:</td>
            <td><input type="text" value="<?php echo $_GET["id"] ?>" name="idr"></td>
        </tr>
        <tr></tr>
        <tr>
            <td>Id destinatario:</td>
            <td><input type="text" name="idd"></td>
        </tr>
        <tr></tr>
        <tr>
            <td>Valor:</td>
            <td><input type="text" name="valor"></td>
        </tr>
        <tr></tr>
        <tr>
            <td><input type="submit" value="Transferir"></td>
        </tr>
    
    </table>

</form>