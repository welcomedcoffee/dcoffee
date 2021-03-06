<?php
/**
 * Created by PhpStorm.
 * User: 王明东
 * Date: 2016/1/26
 * Time: 20:24
 */
use yii\helpers\Url;
$this->title = "报名人员";
?>
<style>
    .black_overlay{
        display: none;
        position: absolute;
        top: 0%;
        left: 0%;
        width: 100%;
        height: 100%;
        background-color: black;
        z-index:1001;
        -moz-opacity: 0.8;
        opacity:.80;
        filter: alpha(opacity=80);
    }
    .white_content {
        display: none;
        position: absolute;
        top: 10%;
        left: 30%;
        width: 40%;
        height: 80%;
        background-color: white;
        z-index:1002;
        overflow: auto;
    }
    .white_content_small {
        display: none;
        position: absolute;
        top: 20%;
        left: 30%;
        width: 40%;
        height: 50%;
        border: 16px solid lightblue;
        background-color: white;
        z-index:1002;
        overflow: auto;
    }
</style>
<script type="text/javascript">
    //弹出隐藏层
    function ShowDiv(show_div,bg_div,user_id,job_id){
        $.ajax({
            type: "GET",
            url: "<?= Url::to(['mystore/usermessage'])?>",
            data: "user_id="+user_id+"&job_id="+job_id,
            success: function(msg){
                $("#MyDiv").html(msg);
            }
        });
        document.getElementById(show_div).style.display='block';
        document.getElementById(bg_div).style.display='block' ;
        var bgdiv = document.getElementById(bg_div);
        bgdiv.style.width = document.body.scrollWidth;
// bgdiv.style.height = $(document).height();
        $("#"+bg_div).height($(document).height());
    };
    //关闭弹出层
    function CloseDiv(show_div,bg_div)
    {
        document.getElementById(show_div).style.display='none';
        document.getElementById(bg_div).style.display='none';
    };
</script>
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
                <div class="" style="font-size: 16px">
                    <a href="<?= Url::to(['mystore/settlement','job_id'=>$job_id])?>">
                        <span style="margin: 20px 20px 20px 20px;">兼职详情</span>
                    </a>
                    <a href="<?= Url::to(['mystore/applyuser','job_id'=>$job_id])?>">
                        <span style="margin: 20px 20px 20px 20px;">报名人员</span>
                    </a>
                    <a href="<?= Url::to(['mystore/throughuser','job_id'=>$job_id])?>">
                        <span style="margin: 20px 20px 20px 20px;color: red">通过人员</span>
                    </a>
                    <a href="<?= Url::to(['mystore/refuseuser','job_id'=>$job_id])?>">
                        <span style="margin: 20px 20px 20px 20px">拒绝人员</span>
                    </a>
                </div>
                <table class="date" cellpadding="0" cellspacing="0">
                    <thead style="background: #E5E5E4;">
                    <tr>
                        <th><input type="checkbox" name=""></th>
                        <th>昵称 </th>
                        <th>真实姓名</th>
                        <th>性别</th>
                        <th>身高</th>
                        <th>学校</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody id="parttimedate">

                    <?php foreach($array as $k=>$v){ ?>
                        <tr>
                            <td><input type="checkbox" name=""></td>
                            <td><?= $v['stu_nickname'];?></td>
                            <td><?= $v['stu_name'];?></td>
                            <td>
                                <?php if($v['stu_sex'] == 0){ ?>
                                    保密
                                <?php } elseif($v['stu_sex'] == 1) { ?>
                                    男
                                <?php } else { ?>
                                    女
                                <?php } ?>
                            </td>
                            <td><?= $v['stu_height'];?>CM</td>
                            <td><?= $v['stu_school'];?></td>
                            <td>
                                <a href="javascript:void(0)" class="stop_apply">查看</a> | <a href="<?= Url::to(['mystore/settlement'])?>">通过</a> | <a href="<?= Url::to(['mystore/settlement'])?>">不通过</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div id="kkpager"></div>
            </div>
        </div>
    </div>
</div>
<!--弹出层时背景层DIV-->
<div id="fade" class="black_overlay">
</div>
<div id="MyDiv" class="white_content">
</div>
<script>
    /* 显示个人详细记录 */

    $(document).on("click","#persons",function(){
        $("#part").css("display","none");
        $("#person").css("display","block");
        $("#parts").css("color","");
        $("#persons").css("color","red");
    })

    /* 显示兼职详细记录 */
    $(document).on("click","#parts",function(){
        $("#person").css("display","none");
        $("#part").css("display","block");
        $("#persons").css("color","");
        $("#parts").css("color","red");
    })
</script>