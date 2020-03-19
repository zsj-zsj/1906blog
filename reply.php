<?php
session_start();
if(empty($_SESSION['session']['name'])){
    echo "<script>alert('登录谢谢'); location.href='login.html' </script>";
    die;
}

$reply=$_POST['reply'];
$a_id=$_SESSION['a_id']; //发送消息的用户和内容
$id=$_SESSION['session']['name'];  //回复的用户

if(empty($reply)){
    header('refresh:1;url=artindex.php');
    exit("请输入回复内容");die;
}

$user='root';
$pass='root';
$dbh= new PDO('mysql:host=127.0.0.1;dbname=1906blog',$user,$pass);

$sql="insert into reply (a_id,reply,rname) values (?,?,?)";

$stmt=$dbh->prepare($sql);
$stmt->bindParam(1,$a_id);
$stmt->bindParam(2,$reply);
$stmt->bindParam(3,$id);
$stmt->execute();

header('refresh:1;url=article.php');
echo "回复成功";

?>