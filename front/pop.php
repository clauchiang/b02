<fieldset>
    <legend>目前位置 : 首頁 > 人氣文章區</legend>
    <table>
        <tr>
            <td style="width: 30%;">標題</td>
            <td style="width: 50%;">內容</td>
            <td>人氣</td>
        </tr>
        <?php
        $all = $News->math('count','id',['hidden'=>1]);
        $div = 5;
        $pages = ceil($all / $div);
        $now = $_GET['p']??1;
        $start = ($now - 1)*$div;
        $rows = $News->all(['hidden' => 1]," ORDER by `good` desc limit $start,$div");
        foreach ($rows as $row) {
        ?>
            <tr>
                <td class="clo"><?=$row['title'];?></td>
                <td>
                    <span class="short"><?=mb_substr($row['content'],0,20);?>...</span>
                    <div class="modal" style="display: none;"><?=nl2br($row['content']);?></div>
                </td>
                <td>
                    <span class="num"><?=$row['good'];?></span>個人說讚<img src="./img/02B03.jpg" style="width: 20px;">
                    <?php
                    if(isset($_SESSION['user'])){
                        $good = $Log->find(['news'=>$row['id'],'user'=>$_SESSION['user']]);
                        if(!empty($good)){
                            echo "<a class='great'href='#' data-id='{$row['id']}'>收回讚</a>";
                        }else{
                            echo "<a class='great'href='#' data-id='{$row['id']}'>讚</a>";
                        }
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div>
        <?php
        if(($now - 1) >0){
            $p = $now - 1;
            echo "<a href='?do=pop&p=$p' > < </a>";
        }
        for($i=1;$i<=$pages;$i++){
            $size = ($now == $i)?"24px":"";
            echo "<a href='?do=pop&p=$i' style='font-size:$size' > $i </a>";
        }
        if(($now + 1) <= $pages){
            $p = $now + 1;
            echo "<a href='?do=pop&p=$p' > > </a>";
        }
        ?>
    </div>
</fieldset>

<script>
    $(".great").on("click",function(){
        let type = $(this).text();
        let num = parseInt($(this).siblings("span").text());
        let id = $(this).data('id');

        $.post("./api/good.php",{type,id},()=>{
            if(type === "讚"){
                $(this).text("收回讚");
                $(this).siblings("span").text(num+1);
            }else{
                $(this).text("讚");
                $(this).siblings("span").text(num-1);
            }
        })
    })

    $(".clo, .short").on("mouseenter",function(){
        $(this).parent().find(".modal").show();
    })
    $(".clo, .short").on("mouseleave",function(){
        $(this).parent().find(".modal").hide();
    })
</script>