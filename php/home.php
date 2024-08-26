<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header("location:../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/form-table.css">
</head>
<body>
<div class="header">berwa shop  information system</div>
<div class="body">
    <div class="left">
        <a href="?product">product</a>
         <a href="?status">stock</a>
        <a href="?repoin">report stockin</a>
        <a href="?repoout">report stockout</a>
        <a href="logout.php">logout(<?=$_SESSION['username']?>)</a>
    </div>
    <div class="right">
        <?php
        if(isset($_GET['product'])){include 'product.php';}
        elseif(isset($_GET['repoin'])){include 'stockin.php';}
        elseif(isset($_GET['repoout'])){include 'stockout.php';}
        elseif(isset($_GET['status'])){include 'status.php';}
        else{include 'product.php';}
        ?>
    </div>
</div>
<div class="footer">berwa shop information system&copycopyright</div>
</body>
<script src="../js/jquery-3.6.3.js"></script>
<script src="html2.js"></script>
<script src="../js/js1.js"></script>
<script>
//    let a = document.querySelector('table')
//     // html2pdf().from(a).save()
//    $(document).ready(()=>{
//     html2pdf().from(a).save()
//    })
</script>

</html>