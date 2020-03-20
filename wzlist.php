<?php
$user='root';
$pass='root';
$dbh= new PDO('mysql:host=127.0.0.1;dbname=1906blog',$user,$pass);

$sql="select * from wz";

$stmt=$dbh->prepare($sql);
$stmt->execute();

while($arr=$stmt->fetch(PDO::FETCH_ASSOC)){
    $data[]=$arr;
};

?>

<?php foreach($data as $k=>$v) { ?>
    <a href='wzdetails.php?id=<?php echo $v['w_id'];?>'><?php echo $v['w_name'];?><br></a>
<?php } ?>