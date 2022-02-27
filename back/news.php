<fieldset>
    <legend>最新文章管理</legend>
    <button onclick="location.href='?do=add_news'">新增文章</button>
    <form action="api/edit_news.php" method="post">
        <table class="ct" style="width:90%">
            <tr>
                <td>編號</td>
                <td>標題</td>
                <td>顯示</td>
                <td>刪除</td>
            </tr>
            <?php
            $all=$News->math('count','*');
            $div=3;
            $pages=ceil($all/$div);
            $now=$_GET['p']??'1';
            $start=($now-1)*$div;
            $rows=$News->all(" limit $start,$div");

            foreach($rows as $row){
             $checked=($row['sh']==1)?'checked':'';
            ?>
            <tr>
                <td class='clo'><?=$row['id']?></td>
                <td><?=$row['title'];?></td>
                <td><input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=$checked;?>></td>
                <td><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></td>
                <input type="hidden" name="id[]" value="<?=$row['id'];?>">
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
        <input type="submit" value="確定修改">
    </form>
</fieldset>