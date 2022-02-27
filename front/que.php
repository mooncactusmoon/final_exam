<fieldset>
    <legend>目前位置 : 首頁 > 問卷調查</legend>
    <table style="width:90%;margin:auto" class="ct">
        <tr class="clo ct">
            <td width="60%">問卷名稱</td>
            <td width="10%">投票總數</td>
            <td width="10%">結果</td>
            <td width="20%">狀態</td>
        </tr>
        <?php
        $rows = $Que->all(['parent' => 0,'sh'=>1]);
        foreach ($rows as $row) {
        ?>
            <tr>
                <td><?= $row['text']; ?></td>
                <td><?= $row['count']; ?></td>
                <td>
                    <a href="?do=result&id=<?=$row['id'];?>">結果</a>
                </td>
                <td>
                    <?php
                    if(isset($_SESSION['login'])){
                        echo "<a href='?do=vote&id={$row['id']}'>參與投票</a>";
                    }else{
                        echo "請先登入";
                    }
                    
                    ?>
                    
                </td>
            </tr>
        <?php }
        ?>
    </table>
    
</fieldset>