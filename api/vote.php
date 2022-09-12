<?php
include_once "../base.php";

$vote = $Que->find($_POST['id']);
$vote['total']++;
$subject = $Que->find(['id'=>$vote['subject_id']]);
$subject['total']++;
$Que->save($subject);
$Que->save($vote);

to("../index.php?do=result&id={$vote['subject_id']}");

?>