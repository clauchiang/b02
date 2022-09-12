<?php
include_once "../base.php";

$user = $User->find(['acc'=>$_POST['acc']]);

if(!empty($user)){
    echo 1;
}else{
    echo 0;
}

?>