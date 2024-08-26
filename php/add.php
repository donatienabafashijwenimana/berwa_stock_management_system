<?php
  include '../connect.php';
  if (isset($_POST['insertproduct'])) {
   $pname= $_POST['productname'];
   $select = $conn->query("select*from product where productname='$pname'");
   
   if(mysqli_num_rows($select)<=0){
    $insert= $conn->query("insert into product values(null,'$pname')");
    if ($insert) {
        ?>
        <script>
            alert("product inserted")
            window.location.href='home.php'
        </script>
        <?php
    }
   } else {
    ?>
        <script>
            alert("product exist")
            wondow.history.back()
        </script>
        <?php
   }
  }

  if (isset($_POST['updateproduct'])) {
    $id= $_POST['id'];
    $pname= $_POST['productname'];
    $select = $conn->query("select*from product where productname='$pname' and id<>'$id'");
    
    if(mysqli_num_rows($select)<=0){
     $insert= $conn->query("update product set productname='$pname' where id='$id'");
     if ($insert) {
         ?>
         <script>
             alert("product updated")
             window.location.href='home.php'
         </script>
         <?php
     }
    } else {
     ?>
         <script>
             alert("product exist")
             wondow.history.back()
         </script>
         <?php
    }
   }




  if (isset($_POST['stockin'])) {
    $pid = $_POST['pid'];
    $qty =$_POST['qty'];
    $uprice =$_POST['uprice'];
    $tprice = $uprice*$qty;
    $insert = $conn->query("insert into stockin values('$pid',current_date(),'$qty','$uprice','$tprice')");
    if ($insert) {
        ?>
        <script>
            alert("product in recorded")
            window.location.href='home.php'
        </script>
        <?php
    }else {
        ?>
        <script>
            alert("product not recorded")
            window.location.href='home.php'
        </script>
        <?php
    }
  }




  
  if (isset($_POST['stockout'])) {
    $pid = $_POST['pid'];
    $qty = $_POST['qty'];
    $uprice =$_POST['uprice'];
    $tprice = $uprice*$qty;
    
    $select = $conn->query("select sum(quantity) from stockin  where pid='$pid'");
    $select2 = $conn->query("select sum(quantity) from stockout  where pid='$pid'");
    $qtya = mysqli_fetch_array($select);
    $qty2 = mysqli_fetch_array($select2);
    $quantity= $qtya['sum(quantity)']-$qty2['sum(quantity)'];
    if ($quantity>=$qty) {
    
    $insert = $conn->query("insert into stockout values('$pid',current_date(),'$qty','$uprice','$tprice')");
    if ($insert) {
        ?>
        <script>
            alert("product out recorded")
            window.location.href='home.php'
        </script>
        <?php
    }else {
        ?>
        <script>
            alert("product out not recorded")
            window.location.href='home.php'
        </script>
        <?php
    }
}else{
    ?>
        <script>
            alert("not enough quantity")
            window.location.href='home.php'
        </script>
        <?php
}
  }
  if (isset($_GET['idd'])) {
    $delete = $conn->query("delete from product where id='{$_GET['idd']}'");
    if ($delete) {
        ?><script>alert("deleted"); window.location.href='home.php'</script><?php
    }
  }
   ?>