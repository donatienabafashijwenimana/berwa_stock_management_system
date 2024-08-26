<?php
include '../connect.php';
if(!isset($_SESSION['id']))
  header('location:../log/login.php');

$select1 = $conn->query("select*from funiture,import where
 import.funitureid=funiture.furnitureid");
if (isset($_POST['generate'])) {
 
 if ($_POST['generate'] =='generated') {
    $select1 = $conn->query("select*from funiture,import where
 import.funitureid=funiture.furnitureid and importdate='{$_POST['date1']}'");
 }
 if ($_POST['generate']=='generatew') {
    $select1 = $conn->query("select*from funiture,import where
 import.funitureid=funiture.furnitureid and import.importdate between '{$_POST['sdate']}' and '{$_POST['edate']}'");
 }
 if ($_POST['generate']== 'generatem') {
    $select1 = $conn->query("select* from funiture,import where import.funitureid=funiture.furnitureid
     and month(importdate)='{$_POST['date2']}'");
 }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/table.css">
</head>

<body>
    <div class="report">
        <form action="dashboard.php?importr" method="post">
            <p>
                <u>daily report</u>
                <label for="">date</label>
                <input type="date" name="date1" id="">
                <input type="submit" value="generated" name="generate">
            </p>
            <p>
                <u>weekly report</u><br>
                <input type="date" name="sdate" id=""><br>
                <input type="date" name="edate" id="">
                <input type="submit" value="generatew" name="generate">
            </p>
            <p>
                <u>monthly report</u><br>
                <select name="date2" id="">
                <?php for ($i=1; $i <=12 ; $i++) { 
                    ?>
                    <option value="<?=$i?>"><?=$i?></option>
                    <?php
                }
                ?>
                </select>
                <input type="submit" value="generatem"name="generate">
            </p>
        </form>
        <div class="print">print</div>
    </div>
    <div class="table">

        <div class="heads">imported furniture report</div>
        <?php if (mysqli_num_rows($select1)>0){?>
           <table border="1">

                <thead>
                    <td>furniture</td>
                    <td>date</td>
                    <td>quantity</td>
                </thead>
                <?php foreach($select1 as $x){?>
                <tr>
                    <td><?=$x['furniturename'];?></td>
                    <td><?=$x['importdate'];?></td>
                    <td><?=$x['qty'];?></td>
                </tr>
                <?php }?>
            </table>
            <?php }else echo "<h1> no result found</h1>";?>
    </div>
</body>
<script src="../js/jquery-3.6.3.js"></script>
<script src="../js/js1.js"></script>
</html>