<?php
include "../base.php";
dd($_POST);
if(isset($_POST['del'])){
    foreach($_POST['del'] as $id){
        $User->del($id);
    }
}

to("../back.php?do=admin");
?>