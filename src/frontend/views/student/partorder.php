<?php

/* 
	兼职订单
 */

$this->title = '兼职订单';
?>

<link rel="stylesheet" href="/public/css/kkpager_orange.css">
 <div class="t_min t_tit">当前位置：<a href="http://www.qutaoxue.net/">首页</a> &gt; 我的趣淘学</div>

 <div class="t_min">

            <?php echo $this->render('_studentRecommend') ?>
        	<?php echo $this->render('_menuLeft') ?>
        <div class="mt_ri t_ri">

            <div class="mt_rli">
                <div class="right">
                    <div class="top">
                        <span>兼职列表</span>
                    </div>
                    <table class="date" style="width: 960px;" cellpadding="0" cellspacing="0">
                        <thead>
                            <tr style="background: #E5E5E4;">
                                <th class="jobname">职位</th>
                                <th class="">类型</th>
                                <th class="type">地区</th>
                                <th class="adds">薪资</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody id="studentPartimelistDemo"></tbody>
                    </table>
                    <div id="kkpager"><div><span class="disabled">首页</span><span class="disabled">上一页</span><span class="curr">1</span><span class="disabled">下一页</span><span class="disabled">尾页</span><span class="totalText"></span></div><div style="clear:both;"></div></div>
                </div>
            </div>
        </div>
    </div>
     
<style type="text/css">
		p{cursor:pointer}
		
	</style>