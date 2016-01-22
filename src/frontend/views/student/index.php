<?php

/* 
	学生详情
 */

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
                    <table class="date" cellpadding="0" cellspacing="0" width="960px">
                        <thead>
                            <tr style="background: #E5E5E4; border: 0;">
                                <th class="job">
                                    序号
                                </th>
                                <th class="id">
                                    职位
                                </th>
                                <th class="type">
                                    类型
                                </th>
                                <th class="adds">
                                    地区
                                </th>
                                <th class="money">
                                    薪资
                                </th>
                                <th class="action">
                                    操作
                                </th>
                            </tr>
                        </thead>
                        <tbody id="myJobDemo">
							<tr>
	                        	<td colspan="6">
	                        		没有数据！
	                        	</td>
                        	</tr>
                        </tbody>
                    </table>
                    <script type="text/template" id="myJobTemplate">
                        <tr>
                            <td>{jobId}</td>
                            <td>{name}</td>
                            <td>{workTypeName}</td>
                            <td>{provincename} {cityname}</td>
                            <td>{salary}/天</td>
                            <td>   {status}  </td>
                        </tr>
                    </script>
                    <div class="solid"> </div>
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
                        <tbody id="myOrderDemo">
                        	<tr>
	                        	<td colspan="8">
	                        		没有数据！
	                        	</td>
                        	</tr>
                        </tbody>
                    </table>
                    <script type="text/template" id="myOrderTemplate">
                        <tr>
                            <td>{orderId}</td>
                            <td>{orderNo}</td>
                            <td>{orderTime}</td>
                            <td><div class="shopname" title="{enterpriseName}">{enterpriseName}</div></td>
                            <td>{totalAmt}元</td>
                            <td>{favouredAmt}元</td>
                            <td>{realAmt}元</td>
                            <td>已完成</td>
                        </tr>
                    </script>
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
<style type="text/css">
		p{cursor:pointer}
		
	</style>