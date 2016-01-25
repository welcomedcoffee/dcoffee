<link rel="stylesheet" href="/public/css/jianzhijihui.css">
    <link rel="stylesheet" href="/public/css/pagecss.css">

    
  <!--t_nav end-->
  <div class="t_min t_tit">
    当前位置：
    <a href="http://www.qutaoxue.net/">首页</a>
    &gt;
    <a href="http://www.qutaoxue.net/ParttimeList?url=jzjh">趣兼职</a>
    &gt;
    <a href="###" id="bussiname">电话专员</a>
  </div>
  <div class="t_min">
   <div class="t_zlistl t_le " id="jboDiv">
            <div class="parttimediv1">
                <div class="parttimetitle">
                    <span id="">
                        <?php echo $job['partjob_name']?>（0/5人）
                    </span>
                    <input name="" id="btnJobSend" value="我要抢单" class="woyaobaomingbutton" type="button">
                </div>
                <div class="parttimediv1text">
                    <img src="/public/images/weizhitubiao.png" height="11px" width="10px">
                    <span id=""><?php echo $job['region_name']?></span>

                    <p><label>工资待遇：</label><m class="colff4200fwb"><?php echo $job['partjob_wages']?><?php echo $job['company_name']?></m></p>
                    <?php if($job['partjob_mode'] == ""){?>
                    <?php }else{ ?>
                        <p><label>提成方式：</label><m></m></p>
                    <?php }?>
                    <p><label>招聘人数：</label><m><?php echo $job["partjob_number"]?>人</m></p>
                    <p><label>报名日期：</label><m><?php echo date("Y-m-d",$job["partjob_sign_starttime"])?> - <?php echo date("Y-m-d",$job["partjob_sign_endtime"])?></m></p>
                    <p><label>兼职日期：</label><m><?php echo date("Y-m-d",$job["partjob_part_starttime"])?> - <?php echo date("Y-m-d",$job["partjob_part_endtime"])?></m></p>
                    <p><label>兼职时间：</label><m><?php echo date("H:s",$job["partjob_job_starttime"])?> - <?php echo date("H:s",$job["partjob_job_endtime"])?></m></p>
                    <p><label>结算方式：</label><m>
                                    <?php if($job["partjob_set_method"]=='1'){?>
                                        完工结算
                                    <?php }else{ ?>
                                        当天结算
                                    <?php }?>
                        </m></p>
                    <p><label>工作地址：</label><m><?php echo $job["partjob_address"]?></m></p>
    <p><label>咨询电话：</label></p>
<p><m style="margin-right:1em"><?php echo $job["partjob_phone"]?></m></p>
                </div>
                <div class="flrw320posrel" id="cityMap" style="width: 400px; height: 320px; overflow: hidden; position: relative; z-index: 0; background-color: rgb(243, 241, 236); color: rgb(0, 0, 0); text-align: left;"></div>
            </div>
            <div class="parttimediv2">
                <div class="parttimediv1text">
                    <p class="padtop20"><label>性别要求：</label><m>
                            <?php if($job['partjob_sex']=='1'){?>
                                女
                            <?php }elseif($job["partjob_sex"]=='2'){ ?>
                                男
                            <?php }else{ ?>
                                不限
                            <?php }?>
                        </m></p>
                    <p><label>身高要求：</label><m><?php echo $job["partjob_tall"]?></m></p>
                    <p><label>工作内容：</label><m><?php echo $job["partjob_content"]?></m></p>
                    <p><label>工作要求：</label><m><?php echo $job["partjob_demand"]?></m></p>
                </div>
            </div>

  </div>

    <div id="" style="border: solid 10px #f6f3ee; width: 900px;z-index: 99999; position: relative;top:480px">

        </div>
        <div style="border: solid 10px #f6f3ee;position: relative;top:360px;z-index:9999;width:240px; float:right"></div>
      
  
    <!--t_zlistl end-->
        <div class="t_le t_zlistlr posreltop20">
            <h1>相似职位</h1>
            <div class="parttimediv1text margintop20" id="jobLikeInfo">
      
               
            
<a href="http://www.qutaoxue.net/ParttimeShow?url=jzjh&amp;jid=264&amp;bid=2&amp;wty=7" style="display:block;    line-height: 80px;height:80px;">
             <img src="/public/images/2_1453368147169_jztp_suolue.jpg" class="parttimejobpic" height="52px" width="80px">
                <div style="line-height: 16px;margin-left:100px">
                    <p style="font-weight:bold">电话专员</p>
                    <p style="color: #aaa;">薪金:3500元/月</p>
                    <p style="font-size: 9px;color: #aaa;">2016-01-21</p>
                </div>

</a>    
<div class="clear"></div>
  
<a href="http://www.qutaoxue.net/ParttimeShow?url=jzjh&amp;jid=253&amp;bid=2157&amp;wty=7" style="display:block;    line-height: 80px;height:80px;">
             <img src="/public/images/2157_1453168522050_jztp_suolue.png" class="parttimejobpic" height="52px" width="80px">
                <div style="line-height: 16px;margin-left:100px">
                    <p style="font-weight:bold">鲜花长期客服</p>
                    <p style="color: #aaa;">薪金:120元/天</p>
                    <p style="font-size: 9px;color: #aaa;">2016-01-19</p>
                </div>

</a>    
<div class="clear"></div>
  
<a href="http://www.qutaoxue.net/ParttimeShow?url=jzjh&amp;jid=200&amp;bid=2025&amp;wty=7" style="display:block;    line-height: 80px;height:80px;">
             <img src="/public/images/2025_1452324794575_jztp.jpg" class="parttimejobpic" height="52px" width="80px">
                <div style="line-height: 16px;margin-left:100px">
                    <p style="font-weight:bold">中山北路招聘话务员</p>
                    <p style="color: #aaa;">薪金:0元/天</p>
                    <p style="font-size: 9px;color: #aaa;">2016-01-09</p>
                </div>

</a>    
<div class="clear"></div>
  </div>
      <script type="text/template" id="jobLikeInfoTemplate">
<a href="/ParttimeShow?url=jzjh&jid={jobId}&bid={userId}&wty={workType}" style="display:block;    line-height: 80px;height:80px;">
             <img src="{introPic}"  width="80px" height="52px" class="parttimejobpic"/>
                <div style="line-height: 16px;margin-left:100px">
                    <p style="font-weight:bold">{name}</p>
                    <p style="color: #aaa;">薪金:{salary}{salaryTypeName}</p>
                    <p style="font-size: 9px;color: #aaa;">{createTime}</p>
                </div>

</a>    
<div class="clear"></div>
  </script>
             
            <div style="text-align: center;height: 320px;margin-top: 20px;;">
                <img src="/public/images/qutaoxue2weimadaizi.png" style="margin-top: 220px;" width="180px">
            </div>
        </div>
        <div class="clear"></div>
 
  </div>