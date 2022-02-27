<fieldset>
    <legend>目前位置 : 首頁 > 最新文章區</legend>
    <table class="ct" style="width:90%">
        <tr>
            <td width="30%">標題</td>
            <td width="60%">內容</td>
            <td></td>
        </tr>
        <?php
            $all=$News->math('count','*',['sh'=>1]);
            $div=5;
            $pages=ceil($all/$div);
            $now=$_GET['p']??'1';
            $start=($now-1)*$div;
            $rows=$News->all(['sh'=>1]," limit $start,$div");

            foreach($rows as $row){
             $checked=($row['sh']==1)?'checked':'';
            ?>
        <tr>
            <td class="clo"><?=$row['title'];?></td>
            <td class="switch">
                <div class="short"><?=mb_substr($row['text'],0,20);?></div>
                <div class="full" style="display:none"><?=$row['text'];?></div>
            </td>
            <td>
                <?php
                if(isset($_SESSION['login'])){
                    $good=$Log->math('count','*',['user'=>$_SESSION['login'],'news'=>$row['id']]);
                    if($good>0){
                        echo "<a class='g' data-news='{$row['id']}' data-user='{$_SESSION['login']}' data-type='2'>收回讚</a>";
                    }else{
                        echo "<a class='g' data-news='{$row['id']}' data-user='{$_SESSION['login']}' data-type='1'>讚</a>";
                    }
                }
                ?>

            </td>
        </tr>
        <?php
             }
            ?>
    </table>
    <div>
            <?php
            if(($now-1)>0){
                $prev=$now-1;
                echo "<a href='?do=news&p=$prev'> < </a>";
            }
            for($i=1;$i<=$pages;$i++){
                $fz=($i==$now)?'20px':'16px';
                echo "<a href='?do=news&p=$i' style='font-size:$fz;'> $i </a>";
            }
            if(($now+1)<=$pages){
                $next=$now+1;
                echo "<a href='?do=news&p=$next'> > </a>";
            }
            ?>
        </div>
</fieldset>

<script>
    $(".switch").on('click',function(){
        $(this).parent().find(".short,.full").toggle();
    });
    $(".g").on('click',function(){
        let news=$(this).data('news');
        let user=$(this).data('user');
        let type=$(this).data('type');
        $.post("api/log.php",{type,user,news},()=>{
            location.reload();
        })

    })
</script>