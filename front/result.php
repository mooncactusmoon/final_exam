<?php
$row = $Que->find($_GET['id']); //標題
$opts = $Que->all(['parent' => $_GET['id']]);
?>
<fieldset>
    <legend>目前位置 : 首頁 > 問卷調查 > <?= $row['text']; ?></legend>

    <h3><?= $row['text']; ?></h3>
    <?php
    foreach ($opts as $key => $opt) {
        $total = ($row['count'] > 0) ? $row['count'] : 1;
        $rate = round($opt['count'] / $total, 2);
        $length = 80 * $rate;
    ?>
        <div style="display:flex;margin:10px 5px;">
            <div style="width:40%">
                <sapn style='font-weight:bolder'><?= $key + 1 ?>.</sapn>
                <?= $opt['text']; ?>
            </div>
            <div style="width:60%;">
                <div style="display:inline-block;height:25px;background:#CCC;width:<?= $length; ?>%">
                </div>
                <?= $opt['count'] ?>票(<?= $rate * 100 ?>%);
            </div>
        </div>
    <?php
    }
    ?>
    <div class="ct">
        <button onclick="location.href='?do=que'">返回</button>

    </div>

</fieldset>