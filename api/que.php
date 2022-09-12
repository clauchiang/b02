<?php
include_once "../base.php";

$subject = [];
$subject['text'] = $_POST['subject'];
$subject['subject_id'] = 0;
$Que->save($subject);
$suj = $Que->find(['text'=>$_POST['subject']]);

if(isset($_POST['opts'])){
    foreach($_POST['opts'] as $opt){
        $data = [];
        $data['text'] = $opt;
        $data['subject_id'] = $suj['id'];
        $Que->save($data);
    }
}

to("../back.php?do=que");

?>