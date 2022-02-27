<?php
include "../base.php";

$ck=$User->find(['acc'=>$_POST['acc']]);
if($ck>0){ //有
    echo 1;
}else{ //沒有
    echo 0;
}
