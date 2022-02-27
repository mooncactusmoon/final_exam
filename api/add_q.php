<?php
include "../base.php";
dd($_POST);
if(isset($_POST['subject'])){
    $Que->save(['text'=>$_POST['subject'],'parent'=>0]);
    $parent=$Que->math("max","id");

    if(isset($_POST['opt'])){
        foreach($_POST['opt'] as $opt){
            if($opt!=""){
                $Que->save(['text'=>$opt,'parent'=>$parent]);
            }
        }
    }
}
to("../back.php?do=que");
?>