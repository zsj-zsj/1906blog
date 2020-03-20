<?php
$id=$_GET['id'];
$user='root';
$pass='root';
$dbh= new PDO('mysql:host=127.0.0.1;dbname=1906blog',$user,$pass);

$sql="select * from wzdetails where w_id=?";

$stmt=$dbh->prepare($sql);
$stmt->bindParam(1,$id);
$stmt->execute();

while($arr=$stmt->fetch(PDO::FETCH_ASSOC)){
    $data[]=$arr;  
};

?>
<table>
    <tr>
        <td>文章名称</td>
        <td>文章作者</td>
        <td>添加时间</td>
    </tr>
    <?php foreach($data as $k=>$v) { ?>
    <tr>
        <td><?php echo $v['wz_name'];?></td>
        <td><?php echo $v['wz_zz'];?></td>
        <td><?php echo $v['wz_time'];?></td>
    </tr>
    <?php } ?>
</table>