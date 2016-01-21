<?php

/* 
	商品订单
 */

$this->title = '商品订单';
?>

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
                  <th class="job">
                                    序号
                                </th>
                                <th class="id">
                                    订单号
                                </th>
                                <th class="type">
                                    交易时间
                                </th>
                                <th class="adds">
                                    商家
                                </th>
                                <th class="money">
                                    消费总额
                                </th>
                                <th class="action">
			       优惠金额

                                </th>
                                <th class="action">
			       实付金额

                                </th>
                                <th class="action" style="width:133px">
			       操作
                                </th>
                            </tr>
                        </thead>
                        <tbody id="myOrderInfoDemo"></tbody>
                    </table>
                    <div id="kkpager"><div><span class="disabled">首页</span><span class="disabled">上一页</span><span class="curr">1</span><span class="disabled">下一页</span><span class="disabled">尾页</span><span class="totalText"></span></div><div style="clear:both;"></div></div>
                </div>
            </div>
        </div>
    </div>
 
<style type="text/css">
		p{cursor:pointer}
		
	</style>