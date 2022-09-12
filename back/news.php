<fieldset>
    <legend>最新文章管理</legend>
    <form action="./api/news.php" method="post">
        <table>
            <tr>
                <td style="width: 2%;">編號</td>
                <td style="width: 60%;">標題</td>
                <td>顯示</td>
                <td>刪除</td>
            </tr>
            <?php
            $all = $News->math('count', 'id');
            $div = 3;
            $pages = ceil($all / $div);
            $now = $_GET['p'] ?? 1;
            $start = ($now - 1) * $div;
            $rows = $News->all(" limit $start,$div");
            foreach ($rows as $key => $row) {
            ?>
                <tr>
                    <td class="clo"><?= $start + 1 + $key; ?>.</td>
                    <td class="ct"><?= $row['title']; ?></td>
                    <td><input type="checkbox" name="hidden[]" value="<?= $row['id']; ?>" <?= ($row['hidden'] == 1) ? "checked" : ""; ?>></td>
                    <td><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
                    <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                </tr>
            <?php
            }
            ?>
        </table>
        <div class="ct">
            <?php
            if (($now - 1) > 0) {
                $p = $now - 1;
                echo "<a href='?do=news&p=$p' > < </a>";
            }
            for ($i = 1; $i <= $pages; $i++) {
                $size = ($now == $i) ? "24px" : "";
                echo "<a href='?do=news&p=$i' style='font-size:$size' > $i </a>";
            }
            if (($now + 1) <= $pages) {
                $p = $now + 1;
                echo "<a href='?do=news&p=$p' > > </a>";
            }
            ?>
        </div>
        <div class="ct">
            <button>確定修改</button>
        </div>
    </form>
</fieldset>