<?php
$id=$_POST['w_id'];
$aa=$_POST['wz_zz'];
$bb=$_POST['wz_name'];
$time=date('Y-m-d H:i:s');
$user='root';
$pass='root';
$dbh= new PDO('mysql:host=127.0.0.1;dbname=1906blog',$user,$pass);

$sql="insert into wzdetails (w_id,wz_zz,wz_name,wz_time) values (?,?,?,?) ";
$stmt=$dbh->prepare($sql);
$stmt->bindParam(1,$id);
$stmt->bindParam(2,$aa);
$stmt->bindParam(3,$bb);
$stmt->bindParam(4,$time);
$stmt->execute();

header('refresh:1;url=wzdetailsadd.php');
echo "添加成功";

?>