<fieldset>
    <legend>目前位置 : 首頁 > 問卷調查 > <?= $Que->find($_GET['id'])['text']; ?></legend>
    <table>
        <form action="./api/vote.php" method="post">
            <h3><?= $Que->find($_GET['id'])['text']; ?></h3>
            <?php
            $rows = $Que->all(['subject_id' => $_GET['id']]);
            foreach ($rows as $key => $row) {
            ?>
                <tr>
                    <td><input type="radio" name="id" value="<?= $row['id']; ?>" required></td>
                    <td><?= $row['text']; ?></td>
                </tr>
            <?php
            }
            ?>
    </table>
    <div class="ct"><button type="submit">我要投票</button></div>
    </form>
</fieldset>