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
    function ShowDiv(show_div,bg_div,id){
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
                        <span style="margin: 20px 20px 20px 20px;color: red">报名人员</span>
                    </a>
                    <a href="<?= Url::to(['mystore/throughuser','job_id'=>$job_id])?>">
                        <span style="margin: 20px 20px 20px 20px">通过人员</span>
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
                    <tr>
                        <td><input type="checkbox" name=""></td>
                        <td>123</td>
                        <td>123</td>
                        <td>123</td>
                        <td>123</td>
                        <td>123</td>
                        <td>
                            <a href="javascript:void(0)" onclick="ShowDiv('MyDiv','fade','5')">查看</a> | <a href="<?= Url::to(['mystore/settlement'])?>">通过</a> | <a href="<?= Url::to(['mystore/settlement'])?>">不通过</a>
                        </td>
                    </tr>
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
                                <a href="javascript:void(0)" onclick="ShowDiv('MyDiv','fade',<?= $v['stu_id']?>)">查看</a> | <a href="<?= Url::to(['mystore/settlement'])?>">通过</a> | <a href="<?= Url::to(['mystore/settlement'])?>">不通过</a>
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
    <div >
        <span id="persons" style="font-size: 20px;padding-left: 20px;color: red;">个人详细记录</span>
        <span id="parts" style="font-size: 20px;padding-left: 20px">兼职详细记录</span>
        <span style="font-size: 30px;padding-left:200px;" onclick="CloseDiv('MyDiv','fade')">☒</span>
    </div>
    <table id="person" cellpadding="0" cellspacing="0" style="margin-top: 30px;margin-left: 20px;font-size: 16px;display: block">
        <tr>
            <td style="width: 120px">昵称</td>
            <td style="width: 800px;padding-left: 20px">呆萌的洒家</td>
        </tr>
        <tr bgcolor="#dafff3">
            <td style="width: 120px">真实姓名</td>
            <td style="padding-left: 20px">帐篷</td>
        </tr>
        <tr>
            <td style="width: 120px">昵称</td>
            <td style="width: 800px;padding-left: 20px">呆萌的洒家</td>
        </tr>
        <tr bgcolor="#dafff3">
            <td style="width: 120px">真实姓名</td>
            <td style="padding-left: 20px">帐篷</td>
        </tr>
        <tr>
            <td style="width: 120px">性别</td>
            <td style="width: 800px;padding-left: 20px">男</td>
        </tr>
        <tr bgcolor="#dafff3">
            <td style="width: 120px">身高</td>
            <td style="padding-left: 20px">180cm</td>
        </tr>
        <tr>
            <td style="width: 120px">学校</td>
            <td style="width: 800px;padding-left: 20px">北京地质大学</td>
        </tr>
        <tr bgcolor="#dafff3">
            <td style="width: 120px">专业</td>
            <td style="padding-left: 20px">环境与市政工程</td>
        </tr>
        <tr>
            <td style="width: 120px">地址</td>
            <td style="width: 800px;padding-left: 20px">北京海淀区地质大学6号楼1120室</td>
        </tr>
        <tr bgcolor="#dafff3">
            <td style="width: 120px">技能</td>
            <td style="padding-left: 20px">推广/注册</td>
        </tr>
        <tr>
            <td style="width: 120px">可调工作</td>
            <td style="width: 800px;padding-left: 20px">店员/服务生</td>
        </tr>
        <tr bgcolor="#dafff3">
            <td style="width: 120px">自我简介</td>
            <td style="padding-left: 20px">本人家传绝技，胸口碎大石。</td>
        </tr>
        <tr>
            <td style="width: 120px">工作经验</td>
            <td style="width: 800px;padding-left: 20px">好多兼职都干过</td>
        </tr>
        <tr bgcolor="#dafff3">
            <td style="width: 120px">申请理由</td>
            <td style="padding-left: 20px">好多兼职都干过</td>
        </tr>
    </table>
    <table class="date" cellpadding="0" cellspacing="0" id="part" style="display: none">
        <thead style="background: #E5E5E4;">
        <tr>
            <th>职位</th>
            <th>商家名称 </th>
            <th>评分</th>
            <th>评论内容</th>
        </tr>
        </thead>
        <tbody id="parttimedate">
        <tr>
            <td>APP推广员</td>
            <td>北京优势梦想有限公司</td>
            <td>5</td>
            <td>不错，工作认真</td>
        </tr>
        </tbody>
    </table>
</div>
<script>
    /* 显示个人详细记录 */
    $("#persons").click(function(){
        $("#part").css("display","none");
        $("#person").css("display","block");
        $("#parts").css("color","");
        $("#persons").css("color","red");
    })

    /* 显示兼职详细记录 */
    $("#parts").click(function(){
        $("#person").css("display","none");
        $("#part").css("display","block");
        $("#persons").css("color","");
        $("#parts").css("color","red");
    })
</script>