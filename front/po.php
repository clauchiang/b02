<style>
    .type{
        color: blue;
        cursor: pointer;
    }
    .type:hover{
        text-decoration: underline;
        text-underline-offset: 4px;
    }
</style>
<p>目前位置 : 首頁 > 分類網誌 > <span id="header">健康新知</span></p>
<div style="display: flex;">
<fieldset style="width: 15%;">
    <legend>分類網誌</legend>
    <p class="type">健康新知</p>
    <p class="type">菸害防制</p>
    <p class="type">癌症防治</p>
    <p class="type">慢性病防治</p>   
</fieldset>

<fieldset style="width: 80%;">
    <legend>文章列表</legend>
    <div class="main">

    </div>
</fieldset>

</div>

<script>

    typeList("健康新知");

    $(".type").on("click",function(){
        let type = $(this).text();
        $("#header").text(type);
        typeList(type);
    })

    function typeList(type){
        $.post("./api/type_list.php",{type},(list)=>{
            $(".main").html(list);
        })
    }

    function newsList(id){
        $.post("./api/news_list.php",{id},(news)=>{
            $(".main").html(news);
        })
    }
</script>