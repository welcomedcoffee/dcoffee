<?php echo $this->render('_consumptionHeader') ?>
<div class="mt_rli">
<div class="studentdetailtop  borbot1" >
			<span id="" class="borbotff5400 postop7 colorff5400" style="margin:0 ;">
				我的订单
			</span>
		</div>
		<div class="martop20 ">
	<select class="height25">
	<option>最近三个月</option>
</select>
<input type="text" class="height21"/>
<div class="dis back wid100 textcenter white height25">搜索</div>
<div class="floatright">总计金额：<span class="red">264</span>元</div>
</div>
		 <table class="date " cellpadding="0" cellspacing="0" width="960px" >
                        <thead>
                            <tr  style="background: #E5E5E4; border: 0;">
                                <!-- <th>序号</th> -->
                                <th>订单号</th>
                                <th >交易时间</th>
                                <th >用户</th>
                                <th >消费总额</th>
                                <th>优惠金额</th>
                                <th >实付金额</th>
                                <th >操作</th>
                            </tr>
                            </thead>
							<?php
								foreach($orderlist as $k=>$v){
							?>
							<tr>
                            	<!-- <td>2</td> -->
                            	<td><?php echo $v->order_sn?></td>
                            	<td><?php echo date('Y-m-d H:i',$v->audit_addtime)?></td>
                            	<td><?php echo $v->user_name?></td>
                            	<td><?php echo $v->order_price?>元</td>
                            	<td><?php echo $v->order_price-$v->order_amount?>元</td>
                            	<td class="red"><?php echo $v->order_amount?>元</td>
                            	<td>已完成<a href="##" style="text-decoration:underline;color: #0000ff;" class="marleft1em">退款审核</a></td>
                            </tr>
							<?php }?>
                            
                        
			</table>
</div>


</div>
<div class="clear"></div>
</div>