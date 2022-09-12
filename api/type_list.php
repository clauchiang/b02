<?php
include_once "../base.php";

$typeArr = [];
$typeArr = ['健康新知'=>'1','菸害防制'=>'2','癌症防治'=>'3','慢性病防治'=>'4'];

$type = $typeArr[$_POST['type']];

$rows = $News->all(['hidden'=>1,'type'=>$type]);

foreach($rows as $row){
    echo "<p> <a href='javascript:newsList({$row['id']})'>". $row['title'] ."</a> </p>";
}

?>