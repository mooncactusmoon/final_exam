<?php
include "../base.php";
dd($_POST);
foreach($_POST['id'] as $key=>$id){
    if(isset($_POST['del']) && in_array($id,$_POST['del'])){
        $News->del($id);
    }else{
        $news=$News->find($id);
        $news['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
    }
    $News->save($news);
}

to("../back.php?do=news")

?>