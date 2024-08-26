
<?php



include '../connect.php';
$select= $conn->query("select*from product");
$selectin = $conn->query("select sum(totalprice) from stockin");
$selectout = $conn->query("select sum(totalprice) from stockout");
$totin =mysqli_fetch_array($selectin); 
$totout= mysqli_fetch_array($selectout);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="head">stock status</div>
        <div class="print">print</div>
    <div class="table">
        <table>
            <tr>
                <th>priduct id </th>
                <th>product name</th>
                <th>total quantity in</th>
                <th>total quantity out</th>
                <th>total remain quantity</th>
            </tr>
            <tr>
                <?php
                
                $y=1; foreach($select as $x){
                 
                    $select = $conn->query("select sum(quantity) from stockin  where pid='{$x['id']}'");
                    $select2 = $conn->query("select sum(quantity) from stockout  where pid='{$x['id']}'");
                    $qty = mysqli_fetch_array($select);
                    $qty2 = mysqli_fetch_array($select2);
                    $quantity=$qty['sum(quantity)']-$qty2['sum(quantity)'];
                    ?>
                <td><?=$y++?></td>
                <td><?=$x['productname']?></td>
                <td><?=$qty['sum(quantity)']==null?"0":$qty['sum(quantity)']?></td>
                <td><?=$qty2['sum(quantity)']==null?"0":$qty2['sum(quantity)']?></td>
                <td><?=$quantity?></td>
            </tr>
            <?php } ?>
            <tr><th>totalin price</th><th colspan="4"><?=$totin['sum(totalprice)'];?>frw</th></tr>
            <tr><th>totalout price</th><th colspan="4"><?=$totout['sum(totalprice)'];?>frw</th></tr>
            <tr><th>profit</th><th colspan="4"><?=$totin['sum(totalprice)']-$totout['sum(totalprice)'];?>frw</th></tr>
        </table>
    </div>

</body>
</html>