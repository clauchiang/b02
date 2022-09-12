<?php
include_once "../base.php";

dd($_POST);

foreach($_POST['id'] as $id){
    if(isset($_POST['del']) && in_array($id,$_POST['del'])){
        $News->del($id);
    }else{
        $news = $News->find($id);
        $news['hidden'] = (isset($_POST['hidden']) && in_array($id,$_POST['hidden']))?1:0;
        $News->save($news);
    }
}

to("../back.php?do=news");

?>