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
<link rel="stylesheet" href="/public/css/styles.css" type="text/css">
<script type="text/javascript" src="/public/js/tipswindown.js"></script>
<script type="text/javascript">
    /*
     *弹出本页指定ID的内容于窗口
     *id 指定的元素的id
     *title:	window弹出窗的标题
     *width:	窗口的宽,height:窗口的高
     */
    function showTipsWindown(title,id,width,height){
        tipsWindown(title,"id:"+id,width,height,"true","","true",id);
    }
    function confirmTerm(s) {
        parent.closeWindown();
        if(s == 1) {
            parent.document.getElementById("isread").checked = true;
        }
    }
    //弹出层调用
    function popTips(){
        showTipsWindown("客服中心", 'simTestContent', 620, 450);
        $("#isread").attr("checked", false);
    }
    $(document).ready(function(){

        $("#isread").click(popTips);
        $("#isread-text").click(popTips);

    });
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
                            <div class="kf_qq_r"><a href="javascript:void(0)" id="isread-text">查看</a></div> | <a href="<?= Url::to(['mystore/settlement'])?>">通过</a> | <a href="<?= Url::to(['mystore/settlement'])?>">不通过</a>
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
                                <a href="javascript:void(0)" class="kf_qq_r">查看</a> | <a href="<?= Url::to(['mystore/settlement'])?>">通过</a> | <a href="<?= Url::to(['mystore/settlement'])?>">不通过</a>
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
<div style="display:none;">
    <div id="simTestContent" class="simScrollCont">
        <div class="mainlist">
            <div class="kf_qq_li">
                <div class="kf_qq_li_left kf_qq_li_1">
                </div>
                <div class="kf_qq_li_right">
                    <div class="kf_r_t">
                        <span>企业QQ：</span><a class="qyqq" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=123456&site=qq&menu=yes">在线咨询</a><span style="padding-left:19px;">400电话：4000-0000-00</span></div>
                    <div class="kf_r_d">
                        企业QQ与400电话采用集中调度，多人值班，受理所有业务</div>
                </div>
            </div>
            <div class="kf_qq_li">
                <div class="kf_qq_li_left kf_qq_li_2">
                </div>
                <div class="kf_qq_li_right">
                    <div class="kf_qq_c">
                        <ul>
                            <li>
                                <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=123456&site=qq&menu=yes">
                                    售前咨询-峰</a></li>
                            <li>
                                <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=123456&site=qq&menu=yes">
                                    售前咨询-汉</a></li>
                            <li>
                                <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=123456&site=qq&menu=yes">
                                    售前咨询-玲</a></li>
                            <li>
                                <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=123456&site=qq&menu=yes">
                                    售前咨询-量</a></li>
                            <li>
                                <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=12345633&site=qq&menu=yes">
                                    售前咨询-霞</a></li>
                            <li>
                                <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=12345634&site=qq&menu=yes">
                                    售前咨询-丽</a></li>
                            <li>
                                <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=12345638&site=qq&menu=yes">
                                    售前咨询-乔</a></li>
                            <li>
                                <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=12345632&site=qq&menu=yes">
                                    售前咨询-娟</a></li>
                        </ul>
                    </div>
                    <div class="kf_r_d">
                        业务相关，请咨询售前客服。为避免丢失消息，请尽量添加好友</div>
                </div>
            </div>
            <div class="kf_qq_li">
                <div class="kf_qq_li_left kf_qq_li_3">
                </div>
                <div class="kf_qq_li_right">
                    <div class="kf_qq_c">
                        <ul>
                            <li>
                                <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=123456&site=qq&menu=yes">
                                    售后技术-财</a></li>
                            <li>
                                <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=123456&site=qq&menu=yes">
                                    售后技术-海</a></li>
                            <li>
                                <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=123456&site=qq&menu=yes">
                                    售后技术-斌</a></li>
                            <li>
                                <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=1123456&site=qq&menu=yes">
                                    售后技术-明</a></li>
                            <li>
                                <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=1123456&site=qq&menu=yes">
                                    售后技术-军</a></li>
                            <li>
                                <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=123456&site=qq&menu=yes">
                                    售后技术-森</a></li>
                        </ul>
                    </div>
                    <div class="kf_r_d">
                        售后问题处理，请咨询售后技术。为避免丢失消息，请尽量添加好友</div>
                </div>
            </div>
            <div class="kf_qq_li" style="background:none;">
                <div class="kf_qq_li_left kf_qq_li_4">
                </div>
                <div class="kf_qq_li_right">
                    <div class="ke_qq_jl ke_qq_jl_l">
                        <div class="jl_left">
                            许经理：</div>
                        <div class="jl_right">
                            <div class="jl_call">
                                138-0000-0000</div>
                            <div class="jl_qq">
                                <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=12345635&site=qq&menu=yes">
                                    投诉建议</a></div>
                        </div>
                        <div class="jl_left" style="padding-top:5px;">
                            张经理：</div>
                        <div class="jl_right" style="padding-top:5px;">
                            <div class="jl_call">
                                138-0000-0000</div>
                        </div>
                    </div>
                    <div class="ke_qq_jl">
                        <div class="jl_left">
                            张经理：</div>
                        <div class="jl_right">
                            <div class="jl_call">
                                138-0000-0000
                            </div>
                            <div class="jl_qq">
                                <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=123456&site=qq&menu=yes">
                                    商务合作</a>
                            </div>
                        </div>

                    </div>
                    <div style="clear:both"></div>
                </div>
            </div>
        </div>
    </div>
</div>