<?php
/**
 * Created by PhpStorm.
 * User: 王明东
 * Date: 2016/1/26
 * Time: 11:17
 */
use yii\helpers\Url;
$this->title = "兼职详情";
?>
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
                        <span style="margin: 20px 20px 20px 20px;color: red">兼职详情</span>
                    </a>
                    <a href="<?= Url::to(['mystore/applyuser','job_id'=>$job_id])?>">
                        <span style="margin: 20px 20px 20px 20px">报名人员</span>
                    </a>
                    <a href="<?= Url::to(['mystore/throughuser','job_id'=>$job_id])?>">
                        <span style="margin: 20px 20px 20px 20px">通过人员</span>
                    </a>
                    <a href="<?= Url::to(['mystore/refuseuser','job_id'=>$job_id])?>">
                        <span style="margin: 20px 20px 20px 20px">拒绝人员</span>
                    </a>
                </div>
                <table cellpadding="0" cellspacing="0" style="margin-top: 30px;margin-left: 20px;font-size: 16px">
                    <tr>
                        <td style="width: 120px">职位</td>
                        <td style="width: 800px"><?= $data['job_name']?></td>
                    </tr>
                    <tr bgcolor="#dafff3">
                        <td style="width: 120px">类型</td>
                        <td><?= $data['part_name']?></td>
                    </tr>
                    <tr>
                        <td style="width: 120px">商家名称</td>
                        <td style="width: 800px"><?= $data['part_name']?></td>
                    </tr>
                    <tr bgcolor="#dafff3">
                        <td style="width: 120px">地址</td>
                        <td><?= $data['working_place']?></td>
                    </tr>
                    <tr>
                        <td style="width: 120px">时间</td>
                        <td style="width: 800px"><?= date("Y-m-d",$data['job_start'])?>至<?= date("Y-m-d",$data['job_end'])?></td>
                    </tr>
                    <tr bgcolor="#dafff3">
                        <td style="width: 120px">招收人数</td>
                        <td><?= $data['job_people']?>人</td>
                    </tr>
                    <tr>
                        <td style="width: 120px">报名人数</td>
                        <td style="width: 800px"><?= $data['userall']?>人</td>
                    </tr>
                    <tr bgcolor="#dafff3">
                        <td style="width: 120px">通过人数</td>
                        <td><?= $data['usercount']?>人</td>
                    </tr>
                    <tr>
                        <td style="width: 120px">薪资</td>
                        <td style="width: 800px"><?= $data['job_money'];?>元</td>
                    </tr>
                    <tr bgcolor="#dafff3">
                        <td style="width: 120px">结算方式</td>
                        <td>
                            <?php if($data['pay_method'] == 1){?>
                                当天结算
                            <?php }elseif($data['pay_method'] == 2){ ?>
                                周末结算
                            <?php }elseif($data['pay_method'] == 3){ ?>
                                月末结算
                            <?php }else{ ?>
                                完工结算
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 120px">提成</td>
                        <td style="width: 800px">
                            <?php if($data['commission'] == 1){ ?>
                                有提成
                            <?php }else{ ?>
                                无提成
                            <?php } ?>
                        </td>
                    </tr>
                    <tr bgcolor="#dafff3">
                        <td style="width: 120px">联系人</td>
                        <td><?= $data['contact'];?></td>
                    </tr>
                    <tr>
                        <td style="width: 120px">联系方式</td>
                        <td style="width: 800px"><?= $data['contact_phone'];?></td>
                    </tr>
                    <tr bgcolor="#dafff3">
                        <td style="width: 120px">状态</td>
                        <td>
                            <?php if($data['job_status'] == 0){ ?>
                                审核中
                            <?php }else{ ?>
                                审核通过
                            <?php } ?>
                        </td>
                    </tr>
                </table>
                <div id="kkpager"></div>
            </div>
        </div>
    </div>
</div>






</body>

</html>