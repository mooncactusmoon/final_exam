<fieldset>
    <legend>會員登入</legend>
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
            <td>
                <button onclick="login()">登入</button>
                <button onclick="reset()">清除</button>
            </td>
            <td>
                <a href="?do=forget">忘記密碼</a>|<a href="?do=reg">尚未註冊</a>
            </td>
        </tr>
    </table>
</fieldset>
<script>
    function reset(){
        // console.log($("#acc").val())
        $("#acc,#pw,#pw2,#email").val("");
    }
    function login(){
        $.post("api/ck_acc.php",{acc:$("#acc").val()},(ck)=>{
            if(ck==0){
                alert("查無帳號");
                reset();
            }else{
                $.post("api/ck_pw.php",{acc:$("#acc").val(),pw:$("#pw").val()},(ck)=>{
                    if(ck==0){
                        alert("密碼錯誤");
                        reset();
                    }else{
                        if($("#acc").val()=='admin'){
                            location.href="back.php";
                        }else{
                            location.href="index.php";
                        }
                    }
                })
            }
        })
    }
</script>