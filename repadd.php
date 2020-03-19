<?php
$id=intval($_GET['id']);
session_start();
$_SESSION['a_id']=$id;
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
    <form action="reply.php" method="post">
        回复内容<br>
        <textarea name="reply" cols="30" rows="10"></textarea><br>
        <input type="submit" value="回复">
    </form>
</body>
</html>