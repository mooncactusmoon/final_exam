<fieldset>
    <legend>忘記密碼</legend>
    <div>請輸入信箱以查詢密碼</div>
    <div><input type="text" name="email" id="email"></div>
    <div id="res"></div>
    <div><button onclick="find()">尋找</button></div>
</fieldset>
<script>
    function find(){
        $.post("api/forget.php",{email:$("#email").val()},(res)=>{
            $("#res").html(res);
        })
    }
</script>