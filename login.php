<?php session_start();
include 'connect.php';
if(isset($_POST['login'])){
    $uname = $_POST['username'];
    $password = $_POST['password'];
    if(preg_match('/^[a-zA-Z]*$/',$uname)){
        $select= $conn->query("select*from users where username='$uname' and password='$password'");
        if(mysqli_num_rows($select)>0){
            $row = mysqli_fetch_array($select);
            $_SESSION['userid']=$row['useid'];
            $_SESSION['username']=$row['username'];
            ?>
                <script>
                    alert('login sussessfully')
                    window.location.href='php/home.php'
                </script>
                <?php
        }else {
            ?>
                <script>
                    alert('login failed')
                    window.history.back()
                </script>
                <?php
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <div class="header">berwa shop information system</div>
    <form action="#" method="post">
        <label for="">username</label>
        <input type="text" name="username" id="">
        <label for="">password</label>
        <input type="password" name="password" id="">
        <input type="submit" value="login" name="login">
        <a href="register.php">create account</a>
    </form>
</body>
</html>