<?php
/*!
2015-01-05
增加了 lazyload 支持

2014-11-03
增加了 roundabout 旋转焦点图
*/



// 批量创建 瓦片模块
// $num : 要循环的个数
// $dib : 是否 inline-block 布局
// $imgWidth : 内嵌图片的宽度
// $imgHeight : 内嵌图片的高度
//----------------------------------------------------------------------------------------------------------------------

// 生成
function createModTile($num, $dib = '', $imgWidth, $imgHeight, $lazy = true){
    if($lazy == true){
        $src = "           <img class=\"lazy-load\" src=\"img/null.gif\" data-src=\"//lorempixel.com/".$imgWidth."/".$imgHeight."/\" alt=\"\">\n";
    }else{
        $src = "           <img src=\"//dummyimage.com/".$imgWidth."x".$imgHeight."/666/ccc\" alt=\"\">\n";
    }

    for ($i = 0; $i < $num; $i++) {
        echo "<div class=\"mod mod-tile ".$dib."\">\n".
            "    <figure class=\"media\">\n".
            "       <a href=\"javascript:;\">\n";
            // "           <img src=\"//dummyimage.com/".$imgWidth."x".$imgHeight."/666/ccc\" alt=\"\">\n".
        echo $src;
        echo "       </a>\n".
            "       <p class=\"caption\"><a href=\"javascript:;\">标题标题标题标题标题标题标题标题标题标题标题标题标题标题标题</a></p>\n".
            "    </figure>\n".
            "</div>\n";
    }
};


// 创建
function addModTile($num = 1, $dib = '', $imgWidth=100, $imgHeight=100, $lazy = true){
    echo "<!-- 瓦片模块 这里一共输出了 ".$num." 组。 -->";
    if($dib == "dib"){
        echo "<div class=\"unit row\">";
        createModTile($num, $dib, $imgWidth, $imgHeight, $lazy);
        echo "</div>";
    }else if($dib == ""){
        createModTile($num, $dib, $imgWidth, $imgHeight, $lazy);
    }
    echo "<!-- /瓦片模块输出结束啦 -->";
};





// 批量创建 列表模块
// $num : 要循环的个数
// $dib : 是否 inline-block 布局
// $length : 新闻的条数，默认 10 条
//----------------------------------------------------------------------------------------------------------------------

// 生成
function createModList($num, $dib = '', $length = 10){
    $listContent = [
        "国土部不动产登记工作领导小组成立 胡存智任组长 明确重点",
        "陈竺等三官员登记捐献器官意愿图 赵白鸽谈器官捐献工作",
        "北京“最严大气污染防治条例”实施满月 环保系统立案百起",
        "第十二届全国见义勇为英雄模范表彰活动进入公示投票阶段",
        "湖南干部子女违规调入事业单位 22人被问责 两任书记被免职",
        "谁主力?东海舰队精锐航空兵曝光 空军学员驾机实弹打靶",
        "中国高校被指“走偏”：为评重点学科弄虚作假大搞公关",
        "别笑“茶叶蛋” 也许你不懂台湾：关于台湾的十个半懂不懂",
        "用宽容和爱圆“星星的孩子”上学梦 这样一群家长 书香温暖",
        "习近平抵京 [图解新闻]访欧11天 创新公共外交实践 拉近与"
    ];

    for ($i = 0; $i < $num; $i++) {
        echo "<div class=\"mod mod-list ".$dib."\">\n".
            "    <ul>\n";

            for ($j=0; $j < $length; $j++) {
                echo "        <li class=\"item\">\n".
                    "            <a href=\"javascript:;\" title=\"".$listContent[$j]."\">"."$listContent[$j]"."</a>\n".
                    "        </li>\n";
            }

        echo "    </ul>\n".
        "</div>\n";
    }
};

// 创建
function addModList($num = 1, $dib = '', $length){
    echo "<!-- 列表模块 这里一共输出了 ".$num." 组，每组输出了 ".$length." 行文字。 -->";
    if($dib == "dib"){
        echo "<div class=\"unit row\">";
        createModList($num, $dib, $length);
        echo "</div>";
    }else{
        createModList($num, $dib, $length);
    }
    echo "<!-- /列表模块输出结束啦 -->";
}




// 批量创建 卡片模块
//----------------------------------------------------------------------------------------------------------------------
// <div class="mod mod-card">
//     <section class="article">
//         <time>2014-09-15</time>
//         <h3 class="topic"><a href="#">亚运中国代表团成立 孙杨林丹领衔897运动员名单</a></h3>
//         <p class="media"><a href="javascript:;"><img src="http://dummyimage.com/150x100/ccc/666" alt=""></a></p>
//         <p class="abstract">
//             记者寒冰报道 这次仁川亚运会中国女足喊出夺冠口号，多少与强劲对手日本队几乎只派来半支主力班底有关。亚运会班底，球迷们熟悉的日本女足主力只有宫间绫、阪口梦穂、川澄奈穗美和后卫岩清水梓是绝对主力，国家队经验不超过10场的新人就有8人，几乎占了全队班底的一半。<a href="#">[详细]</a>
//         </p>
//     </section>
// </div>


// 生成
function createModCard($num, $dib='', $imgWidth, $imgHeight, $withTime = true, $lazy = true){
    for ($i = 0; $i < $num; $i++) {

        if($lazy == true){
            $src = "           <img class=\"lazy-load\" src=\"img/null.gif\" data-src=\"//lorempixel.com/".$imgWidth."/".$imgHeight."/\" alt=\"\">\n";
        }else{
            $src = "           <img src=\"//dummyimage.com/".$imgWidth."x".$imgHeight."/666/ccc\" alt=\"\">\n";
        }

        echo "<div class=\"mod mod-card ".$dib."\">\n".
            "   <section class=\"article\">\n";

        if($withTime === true){
            echo "       <time>".date("Y年m月d日")."</time>\n";
        }

        echo "       <h3 class=\"topic\"><a href=\"javascript:;\">亚运中国代表团成立 孙杨林丹领衔897运动员名单</a></h3>\n";

        if($imgWidth !== 0 || $imgHeight !== 0) {
            echo "       <p class=\"media\"><a href=\"javascript:;\">".$src."</a></p>\n";
        }

        echo "       <p class=\"abstract\">\n".
            "           记者寒冰报道 这次仁川亚运会中国女足喊出夺冠口号，多少与强劲对手日本队几乎只派来半支主力班底有关。亚运会班底，球迷们熟悉的日本女足主力只有宫间绫、阪口梦穂、川澄奈穗美和后卫岩清水梓是绝对主力，国家队经验不超过10场的新人就有8人，几乎占了全队班底的一半。<span class=\"more\"><a href=\"javascript\">[详细]</a></span>\n".
            "       </p>\n".
            "   </section>\n".
            "</div>\n";
    }
};

// 创建
function addModCard($num = 1, $dib = '', $imgWidth, $imgHeight,$withTime = true, $lazy){
    echo "<!-- 卡片模块 这里一共输出了 ".$num." 组。 -->";
    if($dib == "dib"){
        echo "<div class=\"unit row\">";
        createModCard($num, $dib, $imgWidth, $imgHeight,$withTime, $lazy);
        echo "</div>";
    }else{
        createModCard($num, $dib, $imgWidth, $imgHeight,$withTime, $lazy);
    }
    echo "<!-- /卡片模块输出结束啦 -->";
};





// 批量创建 传统的标题组，一般用在传统专题顶部焦点图的右侧
// $num : 要创建几组？
// $type : 是传统的三组标题？还是标题加摘要？目前支持这两种形式
//----------------------------------------------------------------------------------------------------------------------

// type 1
// <div class="mod mod-topics">
//     <section class="topics topics-1"><a href="javascript:;">“2013新华年度车评选”结果正式揭晓</a></section>
//     <section class="topics topics-2"><a href="javascript:;">新能源车步入政策年 私人市场何时破局</a></section>
//     <section class="topics topics-3"><a href="javascript:;">政策让新能源车市场更明朗 私人购买新能源车需时间检验</a></section>
// </div>

// type 2
// <div class="mod mod-topics">
//     <section class="topics topics-1"><a href="javascript:;">“2013新华年度车评选”结果正式揭晓</a></section>
//     <p class="abstract">记者寒冰报道 这次仁川亚运会中国女足喊出夺冠口号，多少与强劲对手日本队几乎只派来半支主力班底有关。亚运会班底，球迷们熟悉的日本女足主力只有宫间绫、阪口梦穂、川澄奈穗美和后卫岩清水梓是绝对主力，国家队经验不超过10场的新人就有8人，几乎占了全队班底的一半。<span class=\"more\"><a href=\"javascript\">[详细]</a></span>\n</p>
// </div>



function createModTopics($num, $type){
    echo "<div class=\"mod mod-topics\">";
    if($type === 'abstract'){
        echo "    <section class=\"topics\"><a href=\"javascript:;\">2015年国际赛事指南：世巡赛篇</a></section>\n".
             "    <p class=\"abstract\">这场比赛将会是前环法冠军卡德尔·埃文斯的世巡赛告别之战，他将在家乡父老的掌声和呐喊声中结束自己世巡赛的舞台（备注：埃文斯的告别赛将会是一周之后以其命名的Cadel Evans Great Ocean Road Race，这是被UCI评为1.1级新的单日赛）。<span class=\"more\"><a href=\"javascript\">[详细]</a></span>\n</p>\n";
    }else{
        echo "    <section class=\"topics topics-1\"><a href=\"javascript:;\">外媒观点：2014年国际公路车坛十大低潮</a></section>\n".
             "    <section class=\"topics topics-2\"><a href=\"javascript:;\">外媒观点：2014国际公路自行车坛十大亮点</a></section>\n".
             "    <section class=\"topics topics-3\"><a href=\"javascript:;\">郭爽获UCI场地自行车世界杯伦敦站凯林赛冠军</a></section>\n";
    };
    echo "</div>";
};


function addModTopics($num, $type){
    if($type === 'abstract') {
        echo "<!-- 标题 + 摘要模块，一共输出了 ".$num." 组。-->";
        for($i = 0; $i < $num; $i++){
            createModTopics($num, $type = 'abstract');
        }
    }else{
        echo "<!-- 传统的三组标题模块，一共输出了 ".$num." 组。-->";
        for($i = 0; $i < $num; $i++){
            createModTopics($num, $type);
        }
    }
    echo "<!-- /标题组模块输出结束啦 -->";
};



// 批量创建 原生页签结构
// $num : 标签页组的个数
// $id：指定个 id 用于 hook
//----------------------------------------------------------------------------------------------------------------------
function addNativeTabs($num, $id){
    echo "<div class=\"native-tabs\" id=\"".$id."\">\n".
        "    <ul class=\"tab-hds\">\n";

    for ($i = 0; $i < $num; $i++) {
        echo "        <li data-role=\"tab-hd\">按钮 ".$i."</li>\n";
    }

    echo "    </ul>\n";

    for ($j = 0; $j < $num; $j++) {
        echo "    <div class=\"tab-bd\" data-role=\"tab-bd\">\n".
            "        <p>内容 ".$j."</p>\n".
            "    </div>\n";
    }

    echo "</div>\n";
};




// 快速创建 原生旋转木马
// $num : 页数
// $imgWidth :
// $imgHeight :
// $id :
//----------------------------------------------------------------------------------------------------------------------
function addNativeCarousel($num = 5, $id = '', $imgWidth = 610, $imgHeight = 265, $caption = false, $lazy = true){

    if($caption){
        $captionContnt = "<p class=\"caption\"><a href=\"javascript:;\">外媒观点：2014国际公路自行车坛十大亮点</a></p>";
    }else{
        $captionContnt = "";
    };

    if($lazy){
        $src = "           <img class=\"lazy-load\" src=\"img/null.gif\" data-src=\"//lorempixel.com/".$imgWidth."/".$imgHeight."/\" alt=\"\">\n";
    }else{
        $src = "           <img src=\"//dummyimage.com/".$imgWidth."x".$imgHeight."/666/ccc\" alt=\"\">\n";
    }

    echo "<div id=\"".$id."\" class=\"native-carousel\">\n".
        "    <ul class=\"list\">\n";

    for ($i = 0; $i < $num; $i++) {
        echo "<li class=\"item\">".
            "<a href=\"javascript:;\">".$src."</a>".
            $captionContnt.
            "</li>";
    }

    echo "    </ul>\n".
        "</div>\n";
};





// 创建 Roundable 旋转焦点图
// 这个脚本的尺寸设置，基本上都在 css 文件里，所以这里也就设置图片的个数
//----------------------------------------------------------------------------------------------------------------------
/*
<div class="roundabout roundabout-1">
    <div class="roundabout_box roundabout_box-1">
        <span class="prev">&nbsp;</span>
        <span class="next">&nbsp;</span>
        <ul id="roundabout_list-1">
            <li>
                <div class="roundabout_inbox">
                    <img src="//dummyimage.com/520x335/c30/fff/" />
                    <p class="caption">
                        <a href="javascript">标题标题标题标题标题标题5</a>
                    </p>
                </div>
            </li>
        </ul>
    </div>
</div>
*/

function addRoundabout($num = 5, $id, $lazy = true){

    $imgWidth = "520";
    $imgHeight = "335";

    if($lazy == true){
        $src = "           <img class=\"lazy-load\" src=\"img/null.gif\" data-src=\"//lorempixel.com/".$imgWidth."/".$imgHeight."/\" alt=\"\">\n";
    }else{
        $src = "           <img src=\"//dummyimage.com/".$imgWidth."x".$imgHeight."/666/ccc\" alt=\"\">\n";
    }

    echo "<div class=\"roundabout\">\n".
        "    <div class=\"roundabout_box\">\n".
        "        <span class=\"prev\">&nbsp;</span>\n".
        "        <span class=\"next\">&nbsp;</span>\n".
        "        <ul id=\"" . $id . "\">\n";

    for ($i = 0; $i < $num; $i++) {
        echo "            <li class=\"item\">\n".
             "                <div class=\"roundabout_inbox\">\n";
             // "                    <img src=\"//dummyimage.com/520x335/c30/fff/\" />\n".
        echo $src;
        echo "                    <p class=\"caption\"><a href=\"javascript\">外媒观点：2014国际公路自行车坛十大亮点</a></p>\n".
             "                </div>\n".
             "            </li>\n";
    }

    echo "        </ul>\n    </div>\n</div>";
};

?>