<?php
include "../base.php";

$que=$Que->find($_POST['opt']);
$que['count']++;
$subject=$Que->find($que['parent']);
$subject['count']++;

$Que->save($que);
$Que->save($subject);

to("../index.php?do=result&id=".$subject['id']);
?>