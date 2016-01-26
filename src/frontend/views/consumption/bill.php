<?php echo $this->render('_consumptionHeader') ?>
<?php
	use yii\helpers\Url;
?>
<div class="shoppttimejbdetailtop postop1">
			<?php foreach($bill as $k=>$v){?>
			<?php if($bill_id == $v->bill_id){?>
			<span class="choosen marleft30 " id="<?php echo $v->bill_id?>" >
				<a href="<?= Url::to(['consumption/bill'])?>&bill_id=<?php echo $v->bill_id?>"><?php echo $v->bill_date?></a>
			</span>
			<?php }else{?>
			<span class="unchoose marleft10 " id="<?php echo $v->bill_id?>" >
				<a href="<?= Url::to(['consumption/bill'])?>&bill_id=<?php echo $v->bill_id?>"><?php echo $v->bill_date?></a>
			</span>
			<?php }?>
			<?php }?>
		</div >
		<div class="shoppttimejbdetailline borff5400" style="z-index: 9999;"></div>
		<div class="clear"></div>
			<p class="mar30">门店名称：<?php echo $bill_list->mer_name?></p>
			<p class="mar30">
				<span class="dis">预充限额：<?php echo $bill_list->mer_limimoney?>元</span>
				<span class="dis marleft30">累计预充金额：<?php echo $bill_list->bill_money?>元</span>
				<span class="dis marleft30">学生累计消费：<?php echo $bill_list->bill_consumption?>元</span>
				<span class="dis marleft30">余额：<?php echo $bill_list->bill_balance?>元</span>
			</p>
			<p class="marleft30">对账周期：<?php echo $bill_list->bill_cycle?></p>
			<div class="mar30 wid100 back height30 textcenter white"><a href="javascript:void(0)" id="download">导出商家明细</a></div>
			<div class="mar30 wid100 back height30 textcenter white"><a href="javascript:void(0)" id="downloads">导出消费明细</a></div>
<div class="clear"></div>
<script>
	$("#download").click(function(){
			location.href="<?= Url::to(['consumption/download'])?>&bill_cycle=<?php echo $bill_list->bill_cycle?>";
	});
	$("#downloads").click(function(){
			location.href="<?= Url::to(['consumption/downloads'])?>&bill_cycle=<?php echo $bill_list->bill_cycle?>";
	});
</script>