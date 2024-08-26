
<?php session_start();
include 'connect.php';
if(isset($_POST['register'])){
    $uname = $_POST['username'];
    $password = $_POST['password'];
    if(preg_match('/^[a-zA-Z]*$/',$uname)){
        $select= $conn->query("select*from users where username='$uname'");
        if(mysqli_num_rows($select)<=0){
            $insert =$conn->query("insert into users values(null,'$uname','$password')");
            if ($insert) {
                ?>
                <script>
                    alert('registerd')
                    window.location.href='login.php'
                </script>
                <?php
            }else {
                ?>
                <script>
                    alert(' not registerd')
                    window.history.back()
                </script>
                <?php
            }
        }else {
            ?>
                <script>
                    alert('username exist')
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
        <input type="submit" value="register" name="register">
        <a href="login.php">login</a>
    </form>
</body>
</html>