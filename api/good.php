<?php
include_once "../base.php";

$good = [];
switch($_POST['type']){
    case "讚":
        $news = $News->find(['id'=>$_POST['id']]);
        $news['good']++;
        $good['user'] = $_SESSION['user'];
        $good['news'] = $_POST['id'];
        $News->save($news);
        $Log->save($good);
    break;
    case "收回讚":
        $news = $News->find(['id'=>$_POST['id']]);
        $news['good']--;
        $good['user'] = $_SESSION['user'];
        $good['news'] = $_POST['id'];
        $News->save($news);
        $Log->del($good);
    break;
}

?>