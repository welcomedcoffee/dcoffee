<?php echo $this->render('_consumptionHeader') ?>
<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
?>
<div class="mt_rli">
<div class="studentdetailtop bor0">
			<span id="" class="colorff5400">
				账户信息
			</span>
		</div>
		<div class="backf6f3ee  marleft10 bor1  height213">
			<span class="fonw dis pad10 padleft20">消费账户</span>
			<!-- <span class="floatright pad5">查看明细</span> -->
			<div class="marleft50 ">
				<p class="dis  pad5 textcenter  "><?php echo $data->mer_limimoney?>元限额</p>
				<!-- <p class="dis marleft250  pad5 textcenter ">200元学生已消费</p> -->
				<p class="dis marleft250  pad5 textcenter "><?php echo $data->mer_money?>元余额</p>
			</div>
			<div class="lineheight40 martop50">
				<div class="dis marleft50 ">
					<p>结算日：每月15日</p>
				</div>
				<!-- <p class="dis marleft100">结算日：每月15日</p> -->
				<div class="dis marleft100 "><a href="<?= Url::to(['consumption/bill'])?>">对账单</a></div>
				<p class="dis marleft100 back pad5 textcenter white wid70  fonw" ><a href="javascript:void(0)" class='top_up'>账户充值</a></p>
				<p class="dis marleft100 back pad5 textcenter white wid70  fonw" id='limimoney'>申请限额</p>
			</div>
		</div>
		<div class="backf6f3ee  marleft10 bor1 martop20">
			<span class="fonw dis pad10 padleft20">订单信息</span>
			<p class="textint6 marb10">待处理退款订单：<?php echo $order['processed']?></p>
			<p class="textint1 marb10 padleft20">近三个月订单：</p>
			<p class=" marb10">
				<span class="dis textint6">全部：<?php echo $order['all']?></span> 
				<span class="dis textint13">完成订单：<?php echo $order['complete']?></span> 
				<span class="dis textint13">取消订单：<?php echo $order['cancel']?></span>
				<span class="dis textint12">退款订单：<?php echo $order['refund']?></span> 
			</p>
			<p class="textint1 marb10 padleft20">近三个月学生消费总额：</p>
			<p ><span class=" dis textint6 marb10 fonw red"><?php echo $order['allmoney']?>元</span><span class="textint1 dis">明细</span></p>
		</div>
		<table class="date " cellpadding="0" cellspacing="0" width="960px" >
                        <thead>
                            <tr  style="background: #E5E5E4; border: 0;">
                                <!-- <th class="id">序号</th> -->
                                <th class="id">订单号</th>
                                <th class="type">交易时间</th>
                                <th class="">用户</th>
                                <th class="money">消费总额</th>
                                <th class="money">优惠金额</th>
                                <th class="money">实付金额</th>
                                <th class="action">已完成</th>
                            </tr>
							<?php if(!empty($orderlist)){?>
							<?php foreach($orderlist as $k=>$v){?>
                            <tr>
                            	<!-- <td></td> -->
                            	<td><?php echo $v->order_sn?></td>
                            	<td><?php echo date('Y-m-d',$v->audit_addtime)?><span class="marleft1em"><?php echo date('H:i',$v->audit_addtime)?></span></td>
                            	<td><?php echo $v->user_name?></td>
                            	<td><?php echo $v->order_price?></td>
                            	<td><?php echo $v->order_price-$v->order_amount?></td>
                            	<td class="red"><?php echo $v->order_amount?></td>
                            	<td>已完成</td>
                            </tr>
							<?php }?>
							<?php }else{
								echo "<h1>暂无数据</h1>";
							}?>
                        </thead>
			</table>
			<?php echo LinkPager::widget([
				'pagination' => $pagination,
				'prevPageLabel'=>'上一页',
				'nextPageLabel'=>'下一页',
			]);?>
</div>
<div class="clear"></div>
</div>
<!-- 弹窗 -->
<div style="display: none;" class="qpzz" id="top_up">
    <div class="tip_box" style="margin-top: 0px; margin-left: 0px; height: 200px;">
        <h3>充值金额</h3>   
        <img style="width:25px;height:25px;float: right;position: relative;top:-35px;left:-5px;" src="/public/images/cross27.png" class="close">
        <?php $form = ActiveForm::begin([
                            'action' => Url::to(['consumption/pay']),
                            'method'=>'post',
                        ])?>
        <div class="con_t">
            <p id="titleBox">充值个人淘学金账户</p>
            <p>请输入充值金额：<input type="text" name="price" />元</p>
        </div>
        <br><br>
        <div style="float: right; margin-right: 20px;">
            <input type="submit" style="width: 70px; height: 30px;border-radius:4px;background-color:#0089cf;color: white;" value="确定">&nbsp;&nbsp; 
            <input type="button" style="width: 70px; height: 30px;border-radius:4px;background-color:#0089cf;color: white;" value="取消" class="close">
        </div>
        <?php $form = ActiveForm::end()?>
    </div>   
</div>
<script>
	//申请账户弹窗
	$(document).on('click', '.top_up', function(){
		   $('#top_up').show().css('height',document.body.scrollHeight);
	})
	//关闭弹窗
	$(document).on('click', '.close', function(){
		   $('.qpzz').hide()
	})
	$('#limimoney').click(function(){
		location.href="<?= Url::to(['consumption/limimoney'])?>";
	})
</script>