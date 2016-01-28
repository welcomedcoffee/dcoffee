<?php

/* 
	商品订单
 */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
$this->title = '商品订单';
?>
<link rel="stylesheet" href="/public/css/pagecss.css">
<link rel="stylesheet" href="/public/css/kkpager_orange.css">
 <div class="t_min t_tit">当前位置：<a href="http://www.qutaoxue.net/">首页</a> &gt; 我的趣淘学</div>
    <!--我的趣淘学-->
    <div class="t_min">
        <?php echo $this->render('_studentRecommend') ?>
        <?php echo $this->render('_menuLeft') ?>
        <div class="mt_ri t_ri">

            <div class="mt_rli">
                <div class="right">
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
                    <div class="tcdPageCode t_min">
                        <?php echo LinkPager::widget([
                            'pagination' => $pagination,
                            'prevPageLabel'=>'上一页',
                            'nextPageLabel'=>'下一页',
                        ]);?>
                    </div>
                </div>
            </div>
        </div>
    </div>