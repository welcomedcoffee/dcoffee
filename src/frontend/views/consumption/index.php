<?php echo $this->render('_consumptionHeader') ?>
<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="mt_rli">
<div class="studentdetailtop bor0">
			<span id="" class="colorff5400">
				账户信息
			</span>
		</div>
		<div class="backf6f3ee  marleft10 bor1  height213">
			<span class="fonw dis pad10 padleft20">消费账户</span>
			<span class="floatright pad5">查看明细</span>
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
				<p class="dis marleft100 back pad5 textcenter white wid70  fonw">账户充值</p>
				<p class="dis marleft100 back pad5 textcenter white wid70  fonw">申请限额</p>
			</div>
		</div>
		
		<div class="backf6f3ee  marleft10 bor1 martop20">
			<span class="fonw dis pad10 padleft20">订单信息</span>
			<p class="textint6 marb10">待处理退款订单：5</p>
			<p class="textint1 marb10 padleft20">近三个月订单：</p>
			<p class=" marb10">
				<span class="dis textint6">全部：20</span> 
				<span class="dis textint13">完成订单：15</span> 
				<span class="dis textint13">取消订单：5</span>
				<span class="dis textint12">退款订单：3</span> 
			</p>
			<p class="textint1 marb10 padleft20">近三个月学生消费总额：</p>
			<p ><span class=" dis textint6 marb10 fonw red">3250元</span><span class="textint1 dis">明细</span></p>
		</div>
</div>
<div class="clear"></div>
</div>