<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/que.php" method="post">
        <table id="table">
            <tr>
                <td class="clo">問卷名稱</td>
                <td><input type="text" name="subject"></td>
            </tr>
            <tr>
                <td class="clo">選項 <input type="text" name="opts[]"></td>
                <td class="clo"><button type="button" onclick="addFun()">更多</button></td>
            </tr>
        </table>
        <div class="ct">
            <button>新增</button> | <button type="reset">清空</button>
        </div>
    </form>
</fieldset>

<script>
    function addFun() {
        let opts = `           
                    <tr>
                        <td class="clo">選項 <input type="text" name="opts[]"></td>
                    </tr>`
        $("#table").append(opts);
    }
</script>