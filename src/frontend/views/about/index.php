<?php

/* 
	关于我们
 */

$this->title = '关于我们';
?>


<div class="t_min">
		<!--关于我们-->
		<div class="t_le t_usl">
			<a href="#" class="bg" id="aboutus">关于我们</a>
			<!-- <a href="#">友情链接</a> -->
			 <a href="#" id="linkus">联系我们</a>
			<!--<a href="#">趣淘学介绍 </a>-->
		</div>
		<div class="t_le t_usr"  style="width: 650px;">
		<div id="about">
			<h1>关于我们</h1>
			<p align="center">
				<img src="/public/images/us.jpg" height="500" width="600">
			</p>
			<p>  
趣淘学主要是大学生时间金融平台，通过互联网、移动互联网和大数据技术创新为大学生人群提供创新、安全、简单、快速的个人兼职及消费平台服务。
    
趣淘学是专门为大学生提供兼职、提前消费的服务平台，真正做到了信息真实有效、提前消费服务、兼职推荐。我们的定位是帮助大学生兼职成长，有效的解决大学
生资金不足的问题，同时通过用课余时间以做兼职来实现自己的日常消费。并提供真实、有效、优质的兼职信息给大学生。帮助大学生积累工作经验，为就业打好基
础。
   
平台成立于2015年，我们致力于开辟大学生时间金融，在实现提前消费的同时，为大学生提供兼职，提升自我经验积累，丰富课余生活。为企业提供兼职人力需
求方面的系统化解决方案，免费为企业提供兼职服务。</p>
		</div>
		<div id="link" style="display:none">
			<h1>联系我们</h1>
			<p align="center">
				<img src="/public/images/us.jpg" height="500" width="700">
			</p>
			<p> 趣淘学北京分部<br>
				地址：北京市大兴区西红门嘉悦广场4号楼1704<br>
				电话：010-80255373<br>
				业务联系人：<br>
				聂先生 手机：1391181302<span style="letter-spacing:8px">4</span>  QQ:45195188<span style="letter-spacing:8px">9</span> 邮箱：nieen@qutaoxue.net<br>
				胡先生 手机：1513365839<span style="letter-spacing:8px">6</span>  QQ:51479032<span style="letter-spacing:8px">8</span> 邮箱：hujinjia@qutaoxue.net<br>
				办公时间：早8点——晚24点<br><br>
				
				趣淘学南京分部<br>
				地址：南京新城科技园，嘉陵江东街18号 南京国家广告产业园03幢1106<br>
				电话：025-84725118<br>
				业务联系人：<br>
				杨先生 手机：1385182529<span style="letter-spacing:8px">7</span>  QQ:36974978<span style="letter-spacing:8px">1</span> 邮箱：yangxian@qutaoxue.net<br>
				办公时间：早8点——晚24点</p>

		</div>
		</div>
		<div class="clear"></div>
	</div>

	<script type="text/javascript">
		$(function(){
				$("#aboutus").click(function(){
					$("#about").show();
					$(this).addClass("bg");
					$("#link").hide();
					$("#linkus").removeClass("bg");
				});
				$("#linkus").click(function(){
					$("#link").show();
					$("#about").hide();
					$(this).addClass("bg");
					$("#aboutus").removeClass("bg");
				})
		})
			
			
	</script>