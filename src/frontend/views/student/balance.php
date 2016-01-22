<?php

/* 
    我的余额
 */

$this->title = '我的余额';
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
                    <div class="tittle">
                        <span>账户余额</span>
                    </div>
                  
                    <div class="budget" id="sudentInfo">
                        <span>淘学金余额：<e id="advancelimit">1,000.00元</e></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span>淘学金限额：<i id="astrictlimit">1,000.00元</i></span>
                     

                    </div>

                   
                    <div class="mingxi" id="studentDIV">
                        <span>淘学金明细</span>
                    </div>

                    <div class="red"></div>
                    <table class="date" cellpadding="0" cellspacing="0" width="100%">
                        <thead>
                            <tr style="background: #E5E5E4; height: 50px;">
                                <th class="left">时间</th>
                                <th class="left">类型</th>
                                <th class="left">金额</th>
                                <th>备注</th>
                            </tr>
                        </thead>
                        <tbody id="taoxueDemo">
                            <tr>
                                <td colspan="4">
                                    没有数据！
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div id="kkpager"><div><span class="disabled">首页</span><span class="disabled">上一页</span><span class="curr">1</span><span class="disabled">下一页</span><span class="disabled">尾页</span><span class="totalText"></span></div><div style="clear:both;"></div></div>
                </div>

            </div>
        </div>
    </div>
     
<style type="text/css">
		p{cursor:pointer}
		
	</style>