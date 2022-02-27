<fieldset>
    <legend>問卷表列</legend>
    <button onclick="location.href='?do=add_q'">新增問卷</button>
    <table style="width:90%;margin:auto" class="ct">
        <tr class="clo ct">
            <td width="80%">問卷名稱</td>
            <td width="10%">投票數</td>
            <td width="10%">開放</td>
        </tr>
        <?php
        $rows = $Que->all(['parent' => 0]);
        foreach ($rows as $row) {
        ?>
            <tr>
                <td><?= $row['text']; ?></td>
                <td><?= $row['count']; ?></td>
                <td>
                    <button class="q_sh" data-id='<?= $row['id']; ?>'><?=($row['sh']==1)?'開啟中':'關閉中';?></button>
                </td>
            </tr>
        <?php }
        ?>
    </table>
</fieldset>

<script>
$(".q_sh").on("click",function(){
    let id=$(this).data('id');
    $.post("api/q_sh.php",{id},()=>{
        location.reload();
    })
})

</script>