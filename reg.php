<?php
$name=$_POST['name'];
$pwd=md5($_POST['pwd']);
$email=$_POST['email'];
$mibble=$_POST['mibble'];

if(empty($name)){
    header('refresh:1;url=reg.html');
    echo "请输入用户名";die;  
}

$user='root';
$pass='root';

$dbh = new PDO('mysql:host=localhost;dbname=1906blog', $user, $pass);

$sql="insert into reg (name,pwd,email,mibble) values (?,?,?,?)";

$stmt=$dbh->prepare($sql);
$stmt->bindParam(1,$name);
$stmt->bindParam(2,$pwd);
$stmt->bindParam(3,$email);
$stmt->bindParam(4,$mibble);

$stmt->execute();

header('refresh:1;url=login.html');
echo "注册成功";
?>