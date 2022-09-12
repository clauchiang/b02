<fieldset>
    <legend>目前位置 : 首頁 > 問卷調查 > <?= $Que->find($_GET['id'])['text']; ?></legend>
    <table>
        <h3><?= $Que->find($_GET['id'])['text']; ?></h3>
        <?php
        $totals = ($Que->math('sum', 'total', ['subject_id' => $_GET['id']])==0) ? 1 : ($Que->math('sum', 'total', ['subject_id' => $_GET['id']]));
        $rows = $Que->all(['subject_id' => $_GET['id']]);
        foreach ($rows as $key => $row) {
            $percent = round(($row['total'] / $totals) * 100, 1);
        ?>
            <tr>
                <td style="width:40%;"><?= $key + 1; ?>.<?= $row['text']; ?></td>
                <td>
                    <div style="background-color:skyblue;width:<?= 3 * $percent; ?>px;height:20px"></div>
                </td>
                <td><?= $row['total']; ?>票(<?= $percent?>%)</td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div class="ct"><button onclick="location.href='?do=que'">返回</button></div>
</fieldset>