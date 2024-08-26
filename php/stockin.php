
<?php
include '../connect.php';
$select = $conn->query("select*,sum(totalprice),sum(quantity) from stockin ,product where product.id=stockin.pid 
group by id,date");
$selecttot = $conn->query("select sum(totalprice) from stockin order by date desc");
$tot = mysqli_fetch_array($selecttot);




if (isset($_POST['gen'])){
    if($_POST['gen'] == "genereteday"){
        $select = $conn->query("select*,sum(totalprice),sum(quantity) from stockin ,product where product.id=stockin.pid 
         and date='{$_POST['date']}' group by id,date");
        $selecttot = $conn->query("select sum(totalprice) from stockin where date='{$_POST['date']}'");
        $tot = mysqli_fetch_array($selecttot);
    }
    if($_POST['gen'] == "generateweek"){
        $select = $conn->query("select*,sum(totalprice),sum(quantity) from stockin ,product where product.id=stockin.pid 
        and date between '{$_POST['sdate']}' and '{$_POST['edate']}' group by id,date order by date desc");
        $selecttot = $conn->query("select sum(totalprice) from stockin where date between '{$_POST['sdate']}' and '{$_POST['edate']}'");
        $tot = mysqli_fetch_array($selecttot);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="head">stockin</div>
    <div class="report" >
        <form action="#" method="post">
            <p>
                <u>daily report</u>
                <input type="date" name="date" id="">
                <input type="submit" value="genereteday" name="gen">
            </p>
            <p>
                <u>weekly report</u>
                <input type="date" name="sdate" id="">
                <input type="date" name="edate" id="">
                <input type="submit" value="generateweek" name='gen'>
            </p>
            <div class="print">print</div>
        </form>
    </div>
    <div class="table" style='margin-left:23%'>
     <?php if(mysqli_num_rows($select)>0){?>
        <table  width='100px'>
            <tr>
                <th>priduct id </th>
                <th>product name</th>
                <th>date</th>
                
                <th>sum(quantity)</th>
                <th>totalprice</th>
            </tr>
            <?php $y=1; foreach($select as $x){?>
            <tr>
                <td><?=$y++?></td>
                <td><?=$x['productname']?></td>
                <td><?=$x['date']?></td>
                <td><?=$x['quantity']?></td>
                <td><?=$x['sum(totalprice)']?>frw</td>
            </tr>
            <?php }?>
            <tr>
                <th>totalprice</th>
                <th colspan="4"><?=$tot['sum(totalprice)']?>frw</th>
            </tr>
            </table>
            <?php }else echo "<h1>!!!!no result found</h1>"?>
     </div>
</body>
</html>