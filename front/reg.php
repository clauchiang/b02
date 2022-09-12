<fieldset>
    <legend>會員註冊</legend>
    <p style="color: red;">*請設定您要註冊的帳號及密碼（最長12個字元）</p>
    <table>
        <tr>
            <td class="clo">Step1: 登入帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td class="clo">Step2: 登入密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="clo">Step3: 再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td class="clo">Step4: 信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td><button onclick="regFun()">註冊</button> <button onclick="resetFun()">清除</button></td>
        </tr>
    </table>
</fieldset>

<script>
    function regFun() {
        let acc = $("#acc").val();
        let pw = $("#pw").val();
        let pw2 = $("#pw2").val();
        let email = $("email").val();

        if (acc == "" || pw == "" || pw2 == "" || email == "") {
            alert("不可空白");
        } else {
            if (pw != pw2) {
                alert("密碼錯誤");
            } else {
                $.post("./api/ck_acc.php", {acc}, (res) => {
                    if (parseInt(res) !== 1) {
                        $.post("./api/reg.php", {acc,pw,email}, () => {
                            alert("註冊完成，歡迎加入");
                            location.href = "?do=login";
                        })
                    } else {
                        alert("帳號重複");
                    }
                })

            }
        }

    }
</script>