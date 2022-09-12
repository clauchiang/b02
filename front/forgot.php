<fieldset>
    <legend>忘記密碼</legend>
    <p>請輸入信箱以查詢密碼</p>
    <input type="email" name="email" id="email">
    <p id="result"></p>
    <button onclick="findFun()">尋找</button>
</fieldset>

<script>

    function findFun(){
        let email = $("#email").val();
        $.post("./api/find_pw.php",{email},(pw)=>{
            $("#result").text(pw);
        })
    }
</script>