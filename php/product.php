
<?php
include '../connect.php';
$select= $conn->query("select*from product");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="head">product</div>
    <div class="table">
        <table>
            <tr>
                <th>priduct id </th>
                <th>product name</th>
                <th>quantity</th>
                <th colspan='4'>action<a class="add" href='?add'>add</a></th>
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
                <td><?=$quantity?></td>
                <td ><a href="?idu=<?=$x['id'];?>"><button class='up'>update</button></a></td>
                <td><a href="add.php?idd=<?=$x['id'];?>"> <button class='del'
                onclick="return confirm('are you sure you want to delete <?=$x['productname']?>')">
                delete</button></a></td>
                <td><a href="?in=<?=$x['id'];?>"><button class="in">in</button></a></td>
                <td><a href="?out=<?=$x['id'];?>"><button class="in">out</button></a></td>
            </tr>
            <?php } ?>
            
        </table>
    </div>
   
    <div class="<?php if(isset($_GET['add']))echo "form";else echo "formh"?>">
        <form action="add.php" method="post"><a href='?product' class="close">&times;</a>
            <label for="">product name</label>
            <input type="text" name="productname" id="">
            <input type="submit" value="record" name="insertproduct">
        </form>
    </div>
    <div class="<?php if(isset($_GET['idu']))echo "form";else echo "formh"?>">
        <?php $select = $conn->query("select*from product where id='{$_GET['idu']}'");
        $row=mysqli_fetch_array($select);?>
        <form action="add.php" method="post"><a href='?product' class="close">&times;</a>
        <input type="hidden" name="id" value="<?=$_GET['idu']?>">
            <label for="">product name</label>
            <input type="text" name="productname" id="" value="<?=$row['productname']?>">
            <input type="submit" value="record" name="updateproduct">
        </form>
    </div>
    <div class="<?php if(isset($_GET['in']))echo "form";else echo "formh"?>">
        <form action="add.php" method="post"><a href='?product' class="close">&times;</a>
        <input type="hidden" name="pid" value='<?=$_GET['in']?>'>
            <label for="">quantity</label>
            <input type="number" name="qty"  min="1">
            <label for="">unit price</label>
            <input type="number" name="uprice" min="1">
            
            <input type="submit" value="stockout" name="stockin">
        </form>
    </div>

    <div class="<?php if(isset($_GET['out']))echo "form";else echo "formh"?>">
        <form action="add.php" method="post"><a href='?product' class="close">&times;</a>
        <input type="hidden" name="pid" value='<?=$_GET['out']?>'>
            <label for="">quantity</label>
            <input type="number" name="qty" min="1" required>
            <label for="">unit price</label>
            <input type="number" name="uprice" min="1" required>
            
            <input type="submit" value="stockout" name="stockout" onclick=
            "return confirm('are you sure you want to continue this application')">
        </form>
    </div>
    
</body>
</html>