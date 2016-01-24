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
                    	<!-- error --> <span><?=$res['title']?></span>                    </div>
                
                	<h1 class="da-error-heading"><?=$res['data']?></h1>
                    <?php
                        echo $a = $res['keyword'];
                    ?>
                    <p>大家可以到狗狗没有叼过的地方看看！ <a href="<?= Url::to([$a]); ?>">点击进入<?=$res['keyname']?></a></p>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <div id="da-footer">
        	<div class="da-container clearfix">
           	<p> 2013 17sucai . All Rights Reserved. <a href="http://www.mycodes.net/" target="_blank">源码之家</a></div>
        </div>
    </div>