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

<form action="wzadd.php" method="post">
    文章名称<input type="text" name="wz_name"><br>
    文章类别<select name="w_id">
                <option value="">请选择</option>
                <?php foreach($data as $k=>$v){?>
                <option value="<?php echo $v['w_id'];?>"><?php echo $v['w_name'];?></option>
                <?php } ?>
            </select><br>
    文章作者<input type="text" name="wz_zz"><br>
    <input type="submit" value="添加">
</form>