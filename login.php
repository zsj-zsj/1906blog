<?php
$name=$_POST['name'];
$pwd=md5($_POST['pwd']);

$user='root';
$pass='root';
$dbh= new PDO('mysql:host=localhost;dbname=1906blog',$user,$pass);

$sql="select * from reg where name=?";

$stmt=$dbh->prepare($sql);
$stmt->bindParam(1,$name);
$stmt->execute();

$data=$stmt->fetch(PDO::FETCH_ASSOC);

if($data){
    if($pwd!=$data['pwd']){
        header('refresh:1;url=login.html');
        echo "密码不正确";die;
    }else{
        session_start();
        $_SESSION['session']=array('id'=>$data['id'],'name'=>$data['name']);

        header('refresh:1;url=article.php');
        echo "登陆成功";
    }
}else{
    header('refresh:1;url=login.html');
    echo "用户名不存在";die;
}


?>