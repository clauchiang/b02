<?php
include_once "../base.php";

$row = $News->find($_POST['id']);

echo nl2br($row['content']);

?>