<?php
$content=$_POST['content'];
if(empty($content)){
    header('refresh:1;url=article.php');
    echo "请写内容";die;
}

session_start();
$id=$_SESSION['session']['id'];

$user='root';
$pass='root';
$dbh= new PDO('mysql:host=127.0.0.1;dbname=1906blog',$user,$pass);

$sql="insert into article (id,content) values (?,?) ";

$stmt=$dbh->prepare($sql);
$stmt->bindParam(1,$id);
$stmt->bindParam(2,$content);
$stmt->execute();

header('refresh:1;url=article.php');
echo "发表成功";
?>