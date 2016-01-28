<?php

/* 
	账户安全
 */
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = '账户安全';
?>
<div class="t_min t_tit">当前位置：<a href="http://www.qutaoxue.net/">首页</a> &gt; 我的趣淘学</div>
<div class="t_min">
        <?php echo $this->render('_studentRecommend') ?>
        <?php echo $this->render('_menuLeft') ?>

        <div class="mt_ri t_ri">
            <div class="mt_rli">
                <div class="right">
                    <div class="tittle">
                        <span>账户安全:</span>
                    </div>
                    <!--        <div class="tishi">
                               <div class="zi">
                                   <span>安全级别：<m>中级</m></span>
                                   <div class="tiao">
                                       <div class="zhong"></div>
                                   </div>
                                   <span class="safe">您的当前的账户安全度为中级</span>
                               </div>
                           </div> -->

                    <div class="next">
                        <div class="update">
                            <img src="/public/images/zhengquetishi.png"><span>密码修改</span>
                            <m>
                                建议定期更换密码，且数字、字母、符号至少包含
                                <p>两种,长度为8-20个字符的密码。</p>
                            </m>
                            <div>
                                <a href="<?= Url::to(['student/studentsave']); ?>?type=pwd">修改</a>
                            </div>
                        </div>
                      
                        <div class="phone">
                            <img src="/public/images/zhengquetishi.png"><span>手机验证</span>
                            <m>
                                已验证手机：<?= Html::encode($student['stu_phone']) ?>  若已丢失或停用，
                                <p>请立即更换，避免账户被盗。</p>
                            </m>
                            <div>
                                <a href="<?= Url::to(['student/studentsave']); ?>?type=phone" >修改</a>
                            </div>
                        </div>
                        <div class="phone">
                            <img src="/public/images/zhengquetishi.png" id="imageIMG"><span>支付密码</span>
                            <m>
                                用于虚拟账户支付和提现，且设置密码一个包含
                                <p>字母加数字或字符，长度为8-20个字符的密码。</p>
                            </m>
                            <div>
                                <a href="<?= Url::to(['student/studentsave']); ?>?type=pay">修改</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
 
<style type="text/css">
		p{cursor:pointer}
		
	</style>