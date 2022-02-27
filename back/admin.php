<fieldset>
    <legend>帳號管理</legend>
    <form action="api/del_user.php" method="post">
        <table style="width:90%" class="ct">
            <tr class="clo">
                <td>帳號</td>
                <td>密碼</td>
                <td>刪除</td>
            </tr>
            <?php
            $rows = $User->all();
            foreach ($rows as $row) {
            ?>
                <tr>
                    <td><?= $row['acc'] ?></td>
                    <td><?= str_repeat('*', mb_strlen($row['pw'])); ?></td>
                    <td><input type="checkbox" name="del[]" value="<?= $row['id'] ;?>"></td>
                </tr>
            <?php
            }
            ?>
            <tr>
                <td colspan="3" class="ct">
                    <input type="submit" value="確定刪除">
                    <input type="reset" value="清空選取">
                </td>
            </tr>
        </table>
    </form>

<h1 class="ct">新增會員</h1>
        <div style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</div>
        <table>
            <tr>
                <td class="clo">帳號</td>
                <td><input type="text" id="acc" name="acc"></td>
            </tr>
            <tr>
                <td class="clo">密碼</td>
                <td><input type="password" id="pw" name="pw"></td>
            </tr>
            <tr>
                <td class="clo">確認密碼</td>
                <td><input type="password" id="pw2" name="pw2"></td>
            </tr>
            <tr>
                <td class="clo">信箱</td>
                <td><input type="text" id="email" name="email"></td>
            </tr>
            <tr>
                <td>
                    <button onclick="reg()">註冊</button>
                    <button onclick="reset()">清除</button>
                </td>
                <td></td>
            </tr>
        </table>

    <script>
        function reset() {
            // console.log($("#acc").val())
            $("#acc,#pw,#pw2,#email").val("");
        }

        function reg() {
            let user = {
                acc: $("#acc").val(),
                pw: $("#pw").val(),
                pw2: $("#pw2").val(),
                email: $("#email").val(),
            }
            if (user.acc == "" || user.pw == "" || user.pw2 == "" || user.email == "") {
                alert("不可空白");
            } else {
                if (user.pw != user.pw2) {
                    alert("密碼錯誤");
                } else {
                    $.post("api/ck_acc.php", {
                        acc: user.acc
                    }, (ck) => {
                        if (ck == 1) {
                            alert("帳號重複");
                        } else {
                            delete user.pw2;
                            $.post("api/reg.php", user, () => {
                                alert("註冊完成，歡迎加入");
                                location.reload();
                            });
                        }
                    })
                }
            }

        }
    </script>
</fieldset>