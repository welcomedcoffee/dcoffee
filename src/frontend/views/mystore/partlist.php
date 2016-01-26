<?php
/**
 * Created by PhpStorm.
 * User: 王明东
 * Date: 2016/1/21
 * Time: 20:57
 */
    use yii\helpers\Url;
    $this->title = "兼职列表";
?>
<html>
<head>

    <link rel="stylesheet" type="text/css" href="public/css/common.css" />
    <link rel="stylesheet" type="text/css" href="public/css/kkpager_orange.css" />
    <link rel="stylesheet" href="public/css/shop.css" />
    <link rel="stylesheet" href="public/css/sty.css" />
    <link rel="stylesheet" href="public/css/comm.css" />
    <link rel="stylesheet" href="public/css/new.css" />
    <link rel="stylesheet" type="text/css" href="public/css/shopparttimejobdetail.css"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

</head>
<body>
<!--head-->
<!--head end-->
<!--t_nav-->
<div class="t_min t_tit">当前位置：<a href="/">首页</a> > 我的门店</div>
<!--我的趣淘学-->
<div class="t_min">
    <div class="mt_ri_1">
        <div class="mt_rt" id="topmenus">
            <ul>
                <li class="img">
                    <img src="%E6%88%91%E7%9A%84%E9%97%A8%E5%BA%97_files/us.jpg" height="100" width="100">
                </li>
                <li class="wi1">
                    <h1>2311231请问</h1>
                    <p>手机号：13782519376</p>
                </li>
                <li class="wi2">预收余额：0.00</li>
                <li class="wi3">
                    <a href="http://www.qutaoxue.net/merchant/merchantQuota">
                        <span class="bg1">额度申请</span>
                    </a>
                    <a href="http://www.qutaoxue.net/merchant/merchantParttimeList">
                        <span class="bg2">兼职结算</span>
                    </a>
                    <a href="http://www.qutaoxue.net/merchant/merchantParttimeList">
                        <span class="bg3">兼职审核</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="mt_le t_le" id="leftmenus">
        <ul>
            <h2>我的兼职</h2>
            <li>
                <a href="<?= Url::to(['mystore/part'])?>" atr="publish">发布兼职</a>
            </li>
            <li>
                <a href="<?= Url::to(['mystore/partlist'])?>" atr="list">兼职列表</a>
            </li>
            <li>
                <a href="<?= Url::to(['mystore/partcomment'])?>" atr="publish">兼职评论</a>
            </li>
            <h2>企业设置</h2>
            <li>
                <a href="http://www.qutaoxue.net/merchant/merchantInfo" atr="base">基本资料</a>
            </li>
            <li>
                <a href="http://www.qutaoxue.net/merchant/merchantSafe" atr="safe">账户安全</a>
            </li>
            <li>
                <a href="http://www.qutaoxue.net/merchant/merchantBalance" atr="account">账户余额</a>
            </li>
        </ul>
    </div>
    <div class="mt_ri t_ri">

        <div class="mt_rli">
            <div class="right">
                <div class="top">
                    <span>兼职列表</span>
                </div>
                <table class="date" cellpadding="0" cellspacing="0">
                    <thead style="background: #E5E5E4;">
                    <tr>
                        <th>序号</th>
                        <th>兼职名称 </th>
                        <th>行业类型 </th>
                        <th>工作时间</th>
                        <th>工资待遇</th>
                        <th>报名人数</th>
                        <th>通过人数 </th>
                        <th>状态 </th>
                        <th>操作 </th>
                    </tr>
                    </thead>
                    <tbody id="parttimedate">
                        <?php foreach($data as $k=>$v){ ?>
                            <tr>
                                <td><?= $k;?></td>
                                <td><?= $v['job_name'];?></td>
                                <td><?= $v['job_type'];?></td>
                                <td><?= $v['work_start'];?>到<?= $v['work_end'];?></td>
                                <td><?= $v['job_money'];?><?= $v['job_treatment'];?></td>
                                <td><?= $v['job_people'];?></td>
                                <td><?= $v['user_count'];?></td>
                                <td id="<?= $v['job_id'];?>">
                                    <?php if($v['job_status'] == 1){ ?>
                                        报名中
                                    <?php } elseif($v['job_status'] == 2) { ?>
                                        进行中
                                    <?php } else { ?>
                                        已结束
                                    <?php } ?>
                                </td>
                                <td><a href="javascript:void(0)" class="stop_apply" val="<?= $v['job_id'];?>">截止报名</a> | <a href="<?= Url::to(['mystore/settlement','job_id'=>$v['job_id']])?>">结算</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div id="kkpager"></div>
            </div>
        </div>
    </div>
</div>




<style type="text/css">
    p{cursor:pointer}

</style>

</body>

</html>
<script>
    /* 截至报名 */
    $(".stop_apply").click(function(){
        var job_id = $(this).attr("val");
        $.ajax({
            type: "GET",
            url: "<?= Url::to(['mystore/stopapply'])?>",
            data: "job_id="+job_id,
            success: function(msg){
                if(msg == 1)
                {
                    $("#"+job_id).html("进行中");
                }
                else
                {
                    alert(2)
                }
            }
        });
    })
</script>