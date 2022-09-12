<?php
include_once "../base.php";

$user = $User->find(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);

if(!empty($user)){
    $_SESSION['user'] = $_POST['acc'];
    echo 1;
}else{
    echo 0;
}

?>