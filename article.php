<?php

session_start();
if(empty($_SESSION['session']['name'])){
    echo "<script>alert('登录谢谢'); location.href='login.html' </script>";
    die;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>欢迎<b style="color:red"><?php echo $_SESSION['session']['name'];?></b>登录发表文章页面</b></h3><br>
    请输入发表内容：<br>
    <form action="addart.php" method="post">
        <textarea name="content" cols="30" rows="10"></textarea><br>
        <input type="submit" value="发表">
    </form>
   
    <a href="artindex.php">查看文章</a>
    <a href="repindex.php">查看回复</a>
</body>
</html>

