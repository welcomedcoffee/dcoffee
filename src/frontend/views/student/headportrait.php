<?php

/* 
	学生详情
 */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
$this->title = '学生详情';
?>


    <style type="text/css">
        span {
            font-size: 12px;
        }

        .mar {
            margin-bottom: 2em;
            margin-top:10px;
        }
        input{
            padding-left: 10px;
        }
        select{
            padding-left: 10px;
        }
        textarea{
            padding-left: 10px;
        }
    </style>
    <link rel="stylesheet" href="/public/css/calendar.css">
    <div class="t_min t_tit">当前位置：<a href="http://www.qutaoxue.net/">首页</a> &gt; 我的趣淘学</div>
    <!--我的趣淘学-->
    <div class="t_min">

        <?php echo $this->render('_studentRecommend') ?>
        <?php echo $this->render('_menuLeft') ?>
        <div class="mt_ri t_ri">
            <div class="mt_rli">
                <div class="right">
                    <div class="Pic_header">
                        <ul>
                            <li><a href="<?= Url::to(['student/info']); ?>">个人信息</a></li>
                            <li style=" border-bottom-color:#c40001; color:#c40001"><a href="javascript:void(0)">头像照片</a></li>
                        </ul>
                        <span class="wenxinart">您好，修改资料任意资料都要重新审核，建议您不要频繁修改，以免给您带来不便。</span>
                    </div>
                    <div>
                        <div style=" margin-left:50px; margin-top:70px;">
                            <img src="/public/images/touxiang.png" style=" float:left; margin-right:20px; width: 150px;" id="pic_top">
                            <span style=" font-family:微软雅黑; font-size:14px; color:#535353; line-height:33px;">
                                上传头像后请刷新页面，才能看见图片。<br>
                                请选择新的图片上传，文件大小请不要超过1M<br>
                                支持.jpg/.jpeg/.gif/.png格式
                            </span><br><br>
                            <input type="button" value="提交资料" id="btnSave" onclick="GLOBAL.pagebase.headPicBtnClick('')" style="width: 100px; height: 30px; background: #f39700; color: white;" />
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>