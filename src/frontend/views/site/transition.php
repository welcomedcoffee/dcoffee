<?php
use yii\helpers\Url;
?>
<link rel="stylesheet" type="text/css" href="/public/css/dandelion.css"  media="screen" />
<div id="da-wrapper" class="fluid">
    
        <!-- Content -->
        <div id="da-content">
            
            <!-- Container -->
            <div class="da-container clearfix">
            
            	<div id="da-error-wrapper">
                	
                   	<div id="da-error-pin"></div>
                    <div id="da-error-code">
                    	<!-- error --> <span id='ttile'><?=$res['title']?></span>                    </div>
                
                	<h1 class="da-error-heading"><?=$res['data']?>
                    <br><span id='ntime'>3</span>秒后自动跳转</h1>
                    <?php
                       $a = $res['keyword'];
                    ?>
                    <p>您可以直接点击这里进行操作哦！ <a href="<?= Url::to([$a]); ?>">点击进入<?=$res['keyname']?></a></p>
                </div>
            </div>
        </div>
    </div>
    <script>
        var i = 3;
        $(function(){            
            setInterval(a,1000);
        });
        function a(){              
           i = i-1;
           $('#ntime').html(i);
           if(i==1){
             location.href="<?=Url::to([$a]);?>";                
           }
        }
    </script>