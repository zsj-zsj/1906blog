<?php 
session_start();
if(empty($_SESSION['session']['name'])){
    echo "<script>alert('登录谢谢'); location.href='login.html' </script>";
    die;
}

$user='root';
$pass='root';
$dbh= new PDO('mysql:host=127.0.0.1;dbname=1906blog',$user,$pass);

$sql="select * from article INNER JOIN reply ON reply.a_id=article.a_id INNER JOIN reg ON reg.id=article.id";
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
        <td>回复用户</td>
        <td>回复内容</td>
    </tr>
    <?php foreach($data as $k=>$v) { ?>
    <tr>
        <td><?php echo $v['name'];?></td>
        <td><?php echo $v['content'];?></td>
        <td><?php echo $v['rname'];?></td>
        <td><?php echo $v['reply'];?></td>
    </tr>
    <?php } ?>
</table>