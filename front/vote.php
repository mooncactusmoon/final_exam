<?php 
$row=$Que->find($_GET['id']);
$opts=$Que->all(['parent'=>$_GET['id']]);
?>
<fieldset>
    <legend>目前位置 : 首頁 > 問卷調查 > <?=$row['text'];?></legend>

    <h3><?=$row['text'];?></h3>

    <form action="api/vote.php" method="post">
        <?php
        foreach($opts as $opt){
            echo "<p><input type='radio' name='opt' value='{$opt['id']}'>{$opt['text']}</p>";
        }
        ?>
        <input type="submit" value="我要投票">
    </form>
        
</fieldset>