<?php
include "../base.php";

$ck=$User->math('count','*',['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
if($ck>0){ //有
    $_SESSION['login']=$_POST['acc'];
    echo 1;
}else{ //沒有
    echo 0;
}
