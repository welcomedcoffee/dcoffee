<?php

/* 
	兼职订单
 */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
$this->title = '兼职订单';
?>
<link rel="stylesheet" href="/public/css/pagecss.css">
<link rel="stylesheet" href="/public/css/kkpager_orange.css">
 <div class="t_min t_tit">当前位置：<a href="http://www.qutaoxue.net/">首页</a> &gt; 我的趣淘学</div>

 <div class="t_min">

            <?php echo $this->render('_studentRecommend') ?>
        	<?php echo $this->render('_menuLeft') ?>
        <div class="mt_ri t_ri">

            <div class="mt_rli">
                <div class="right">
                    <div class="order">
                        <span style="font-size: 16px;">我的订单:</span>
                    </div>
                    <?php $form = ActiveForm::begin([
                        'action' => Url::to(['student/partorder']),
                        'method'=>'post',
                    ])?>
                        <select name="type" style="width: 100px; height: 30px; margin-left: 0px;">
                            <?php if ($search['type'] == 'order_sn') { ?>
                                <option value="order_sn" selected="selected">订单号</option>
                                <option value="mer_name">商家名称</option>
                                <option value="job_name">职位</option>
                            <?php }elseif ($search['type'] == 'mer_name') { ?>
                                <option value="order_sn">订单号</option>
                                <option value="mer_name" selected="selected">商家名称</option>
                                <option value="job_name">职位</option>
                            <?php }elseif ($search['type'] == 'job_name') { ?>
                                <option value="order_sn">订单号</option>
                                <option value="mer_name">商家名称</option>
                                <option value="job_name" selected="selected">职位</option>
                            <?php }else{ ?>
                                <option value="order_sn">订单号</option>
                                <option value="mer_name">商家名称</option>
                                <option value="job_name">职位</option>
                            <?php } ?>
                        </select>
                        <input type="text" name="search" style="height: 30px; margin-left: 10px; margin-right: 10px;" value="<?= Html::encode($search['search']) ?>">
                        <input type="submit" value="搜索" style="background-color:#f97c0e;color: white;width: 60px;">
                    <?php $form = ActiveForm::end()?>
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