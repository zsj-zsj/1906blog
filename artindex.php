<?php
session_start();
if(empty($_SESSION['session']['name'])){
    echo "<script>alert('登录谢谢'); location.href='login.html' </script>";
    die;
}

$user='root';
$pass='root';
$dbh= new PDO('mysql:host=localhost;dbname=1906blog',$user,$pass);

$sql="select * from  article join reg on reg.id=article.id";

// echo $sql;
$stmt=$dbh->prepare($sql);

$stmt->execute();

while($arr=$stmt->fetch(PDO::FETCH_ASSOC)){
    $data[]=$arr;
}
?>

<table>
    <tr>
        <td>发表用户</td>
        <td>发表内容</td>
    </tr>
    <?php foreach($data as $k=>$v) { ?>
    <tr>
        <td><?php echo $v['name'];?></td>
        <td><?php echo $v['content'];?></td>
        <td><a href="repadd.php?id=<?php echo $v['a_id']?>">回复</a></td>
    </tr>
    <?php } ?>
</table>