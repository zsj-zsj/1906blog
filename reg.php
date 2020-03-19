<?php
$name=empty($_POST['name']) ? die('请返回输入用户名') : $_POST['name'];
$pwd=empty($_POST['pwd']) ? die('请返回输入密码') : md5($_POST['pwd']);
$email=empty($_POST['email']) ? die('请返回输入邮箱'):$_POST['email'];
$mibble=empty($_POST['mibble']) ? die('请返回输入手机号'):$_POST['mibble'];

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