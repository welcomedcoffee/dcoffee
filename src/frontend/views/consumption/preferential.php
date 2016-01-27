<?php echo $this->render('_consumptionHeader') ?>
<?php 
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<table class="date " cellpadding="0" cellspacing="0" width="960px" >
	<tr  style="background: #E5E5E4; border: 0;">
		<th class="id">活动类型</th>
		<th class="type">活动内容</th>
		<th class="">活动开始时间</th>
		<th class="money">活动结束时间</th>
		<th class="money">发布时间</th>
	</tr>
	<?php if(empty($list)){?>
		<center><h1>暂无数据！！！！！</h1></center>
	<?php }else{?>
		<?php foreach($list as $k=>$v){?>
			<tr>
				<?php if($v->preferential_type == 1){?>
					<td>满减</td>
					<td>满<?php echo $v->preferential_content[0]?>减<?php echo $v->preferential_content[1]?></td>
				<?php }else{?>
					<td>折扣</td>
					<td>打<?php echo $v->preferential_content?>折</td>
				<?php }?>
					<td><?php echo date('Y-m-d H:i:s',$v->preferential_start)?></td>
					<td><?php echo date('Y-m-d H:i:s',$v->preferential_end)?></td>
					<td><?php echo date('Y-m-d H:i:s',$v->addtime)?></td>
			</tr>
		<?php }?>
	<?php }?>
</table>
<table>
	<?php $form = ActiveForm::begin([
            'action' => ['consumption/savepreferential'],
            'method'=> 'post',
            'class' => 'form-horizontal uc-form',
            'id'=> 'preferential-form',
            
            ]); ?>	
	<tr>
		<?= $form->field($preferential, 'preferential_type')->radioList(['1'=>'满减','2'=>'折扣']); ?>
	</tr>
	<tr>
		<?= $form->field($preferential, 'preferential_content')->textInput() ?>满减内容用,隔开(例:满100减80 100,80)
	</tr>
	<tr>
		<?= $form->field($preferential, 'preferential_start', ['inputOptions'=>['placeholder'=>'开始日期']])->textInput(['id'=>"d11","onClick"=>"WdatePicker()"]) ?>
	</tr>
	<tr>
		<?= $form->field($preferential, 'preferential_end', ['inputOptions'=>['placeholder'=>'结束日期']])->textInput(['id'=>"d11","onClick"=>"WdatePicker()"]) ?>
	</tr>
	<tr>
		 <?= Html::submitButton('添加', ['class' => 'btn btn-micv5 btn-block','id'=>'preferential_save','style'=>'margin:0px auto;']) ?>
	</tr>
</table>
<?= Html::jsFile('public/date/My97DatePicker/WdatePicker.js')?>