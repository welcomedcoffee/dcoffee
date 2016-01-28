<?php

/* 
	学生详情
 */
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = '学生详情';
?>
<link rel="stylesheet" href="/public/css/shop.css">
<link rel="stylesheet" href="/public/css/sty.css">
<link rel="stylesheet" href="/public/css/comm.css">
<link rel="stylesheet" href="/public/css/ui.css">
<div class="t_min t_tit">当前位置：<a href="http://www.qutaoxue.net/">首页</a> &gt; 我的趣淘学</div>
 <div class="t_min">
        <?php echo $this->render('_studentRecommend') ?>
        <?php echo $this->render('_menuLeft') ?>
        <div class="mt_ri t_ri">

            <div class="mt_rli">
                <div class="right">
                    <div class="myjob">
                        <span>我的兼职:</span>
                    </div>
                    <table class="two" cellpadding="0" cellspacing="0" width="960px">
                        <thead>
                            <tr style="background:#E5E5E4 ;border: 0;">
                                <th>序号</th>
                                <th>订单号</th>
                                <th>职位</th>
                                <th>类型</th>
                                <th>商家名称</th>
                                <th>工作时间</th>
                                <th>薪资</th>
                                <th>结算方式</th>
                                <th>提成</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($porder) { ?>
                            <?php foreach ($porder as $key => $value) { ?>
                                <tr>
                                    <td><?= Html::encode($value['order_id']) ?></td>
                                    <td><?= Html::encode($value['order_sn']) ?></td>
                                    <td><?= Html::encode($value['job_name']) ?></td>
                                    <td>
                                        <?php foreach ($type as $k => $v) {
                                            if ($v['part_id'] == $value['job_type']) {
                                        ?>
                                            <?= Html::encode($v['part_name']) ?>
                                        <?php } } ?>
                                    </td>
                                    <td><?= Html::encode($value['mer_name']) ?></td>
                                    <td style="width: 200px;"><?= date('Y-m-d',Html::encode($value['work_start']))."至".date('Y-m-d',Html::encode($value['work_end'])) ?></td>
                                    <td><?= Html::encode($value['job_money']) ?></td>
                                    <td>
                                        <?php if ($value['pay_method'] == 1) { ?>
                                            当天结算
                                        <?php }elseif ($value['pay_method'] == 2) { ?>
                                           周末结算
                                        <?php }elseif ($value['pay_method'] == 3) { ?>
                                            月末结算
                                        <?php }elseif ($value['pay_method'] == 4) { ?>
                                            完工结算
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if ($value['commission'] == 1) { ?>
                                            <span style="color:green">有</span>
                                        <?php }else{ ?>
                                            <span style="color:red">无</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if ($value['order_status'] == 0) { ?>
                                            审核中
                                        <?php }else if ($value['order_status'] == 1) { ?>
                                            已通过
                                        <?php }else if ($value['order_status'] == 2) { ?>
                                            未通过
                                        <?php }else if ($value['order_status'] == 3) { ?>
                                            成功
                                        <?php }else if ($value['order_status'] == 4) { ?>
                                            成功
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php }?>
                            <?php }else { ?>
                                <tr>
                                    <td colspan="9">您没有订单</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="solid"> </div>
                    <div class="order">
                        <span style="font-size: 16px;">我的订单:</span>
                    </div>

                     <table class="two" cellpadding="0" cellspacing="0" width="960px">
                        <thead>
                            <tr style="background:#E5E5E4 ;border: 0;">
                                <th>序号</th>
                                <th>订单号</th>
                                <th>交易时间</th>
                                <th>商家</th>
                                <th>消费总额</th>
                                <th>优惠金额</th>
                                <th>实付金额</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($gorder) { ?>
                            <?php foreach ($gorder as $key => $value) { ?>
                                <tr>
                                    <td><?= Html::encode($value['order_id']) ?></td>
                                    <td><?= Html::encode($value['order_sn']) ?></td>
                                    <td><?= date('Y-m-d H:i:s',Html::encode($value['order_addtime'])) ?></td>
                                    <td><?= Html::encode($value['merchant_name']) ?></td>
                                    <td><?= Html::encode($value['order_price']) ?></td>
                                    <td><?= Html::encode($value['order_price'] - $value['order_amount']) ?></td>
                                    <td><?= Html::encode($value['order_amount']) ?></td>
                                    <td>
                                        <?php if ($value['order_status'] == 0) { ?>
                                            未支付
                                        <?php }else if($value['order_status'] == 1){ ?>
                                            已付款
                                        <?php }else if($value['order_status'] == 2){ ?>
                                            订单关闭
                                        <?php }else if($value['order_status'] == 3){ ?>
                                            退款
                                        <?php }else if($value['order_status'] == 4){ ?>
                                            成功
                                        <?php }else if($value['order_status'] == 5){ ?>
                                            成功
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php }?>
                            <?php }else { ?>
                                <tr>
                                    <td colspan="8">您没有订单</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>


                <div class="mt_rli" style="padding:0">
                    <h1>最新兼职</h1>
                    <ul id="newJobDemo">

                        <a href="http://www.qutaoxue.net/ParttimeShow?url=jzjh&amp;jid=2&amp;bid=11"><li style="margin-left:20px"><img src="/public/images/student/11_1449915194183_jztp.jpg" height="100" width="140">借贷宝app软件超市推广员<br>10元/天</li></a>


                    

                        <a href="http://www.qutaoxue.net/ParttimeShow?url=jzjh&amp;jid=6&amp;bid=39"><li style="margin-left:20px"><img src="/public/images/student/39_1449983331364_jztp.jpg" height="100" width="140">食朝汇招聘服务员（寒假工）<br>80元/天</li></a>


                    

                        <a href="http://www.qutaoxue.net/ParttimeShow?url=jzjh&amp;jid=13&amp;bid=50"><li style="margin-left:20px"><img src="/public/images/student/50_1449984984525_jztp.png" height="100" width="140">周五——周日银鹭促销员<br>120元/天</li></a>


                    

                        <a href="http://www.qutaoxue.net/ParttimeShow?url=jzjh&amp;jid=14&amp;bid=51"><li style="margin-left:20px"><img src="/public/images/student/51_1449985264329_jztp.png" height="100" width="140">金陵大公馆（KTV）招聘服务员<br>200元/天</li></a>


                    

                        <a href="http://www.qutaoxue.net/ParttimeShow?url=jzjh&amp;jid=16&amp;bid=21"><li style="margin-left:20px"><img src="/public/images/student/56_1449985764539_jztp.jpg" height="100" width="140">全氏韩国料理店招服务生<br>50元/天</li></a>


                    </ul>
                    <script type="text/template" id="newJobDemoTemplate">

                        <a href="../ParttimeShow?url=jzjh&jid={jobId}&bid={userId}"><li style="margin-left:20px"><img src="{introPic}" width="140" height="100" />{name}<br />{salary}元/天</li></a>


                    </script>

                </div>
            </div>
        </div>
    </div>
<!--  进入我的趣淘学弹窗
    wzl123-->
<div class="qpzz" style="display: none;"id="qpzz">
    <div class="tip_box" style="margin-top: 0px; margin-left: 0px;left: 450px; top: 200px;">
        <h3>温馨提示</h3>
        <img src="/public/images/cross27.png" style="width:25px;height:25px;float: right;position: relative;top:-35px;left:-5px;" class="close">
        <div class="con_t">
            <p id="titleBox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;尊敬的&nbsp;&nbsp;18511031789&nbsp;&nbsp;您好，完善资料并审核通过后，才可以实现学生兑付和兼职功能！</p>

        </div>
        <br><br>
        <div style="float: right; margin-right: 20px;">
            <input name="" id="studetail" value="完善资料" style="width: 70px; height: 30px;border-radius:4px;background-color:#0089cf;color: white;" type="button">&nbsp;&nbsp;
            <input class="close" value="确定" style="width: 70px; height: 30px;border-radius:4px;background-color:#0089cf;color: white;" type="button">
        </div>
    </div>
</div>
<script>
    //弹窗
    $(function(){
        $('#qpzz').show().css('height',document.body.scrollHeight);
    })
</script>