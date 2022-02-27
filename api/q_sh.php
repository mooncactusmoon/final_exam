<?php
include "../base.php";
$que=$Que->find($_POST['id']);

if($que['sh']==1){
    $que['sh']=0;
}else{
    $que['sh']=1;
}

$Que->save($que);