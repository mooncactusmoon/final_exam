<?php
include "../base.php";

$news=$News->find($_POST['news']);
switch($_POST['type']){
    case 1: //按下讚讚
        $news=$News->find($_POST['news']);
        $news['good']++;
        $News->save($news);
        $Log->save(['news'=>$_POST['news'],'user'=>$_SESSION['login']]);
    break;
    case 2: //取消讚讚
        $news=$News->find($_POST['news']);
        $news['good']--;
        $News->save($news);
        $Log->del(['news'=>$_POST['news'],'user'=>$_SESSION['login']]);
    break;  
}