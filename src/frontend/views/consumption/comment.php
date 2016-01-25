<?php echo $this->render('_consumptionHeader') ?>
<?php
	if(empty($comment)){
		echo "<h1>暂无评论</h1>";
	}else{
?>
	<table>
		<tr>
			<th>评论内容</th>
			<th>评论等级</th>
			<th>评论时间</th>
			<th>评论人</th>
		</tr>
		<?php foreach($comment as $k=>$v){?>
		<tr>
			<td><?php echo $v->comment_content?></td>
			<td><?php echo $v->comment_level?></td>
			<td><?php echo date('Y-m-d H:i:s',$v->comment->addtime)?></td>
			<td><?php echo $v->user_name?></td>
		</tr>
		<?php }?>
	</table>

<?php }?>