<?php

/* 
	学生详情
 */

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
    </style>
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
                            <li style=" border-bottom-color:#c40001; color:#c40001"><a href="javascript:void(0)">个人信息</a></li>
                            <li><a href="http://www.qutaoxue.net/student/studentHeadPortrait">头像照片</a></li>
                        </ul>
                        <span class="wenxinart">您好，修改资料任意资料都要重新审核，建议您不要频繁修改，以免给您带来不便。</span>
                    </div>

                    <form class="form" id="merchantinfo">
                        <p class="mar">
                            真实姓名：<input value="2165" id="sid" type="hidden">
                            <input id="name" name="name" type="text">
                        </p>
                        <p class="mar" style="text-indent:2em">
                            昵称：<input id="nick" name="nick" type="text">
                        </p>
                        <p class="mar" style="position:relative;left:-1em">
                            身份证号码：<input id="idNo" name="idNo" type="text">
                        </p>
                        <p style="position:relative;left:-1em;margin-top:10px">
                            <span style="position:relative;top:-4em">身份证照片：</span>
                            <img class="  " src="/public/images/zhenmian.png" alt="1" id="pic1" name="pic1" style="width:163px;height:102px">
                            <img class="  " src="/public/images/fanmian.jpg" id="pic2" name="pic2" alt="1" style="width:163px;height:102px">
                        </p>
                         <p class="warm">只能上传jpg、jpeg、png类型的图片，大小不能超过2M</p>
                        <p class="mar">
                            出生年月：
                            <input class="Wdate" onfocus="WdatePicker({skin:'whyGreen',dateFmt:'yyyy-MM-dd'})" name="birth" id="birth" style="cursor: pointer;   padding-left:5px;width:130" type="text">
                        </p>
                        <p class="mar" style="text-indent:2em">
                            性别：
                            <select id="gender" name="gender">
                                <option selected="selected">请选择</option>
                                <option value="0">男</option>
                                <option value="1">女</option>
                            </select>

                        </p>
                        <p class="mar" style="text-indent:2em">
                            身高：<input id="height" name="height" type="text">cm
                        </p>
                        <p class="mar" style="text-indent:2em">
                            学校：
                            <input value="北京大学" id="school" name="school" type="text">
                        </p>
                        <p class="mar" style="text-indent:2em">
                            专业：
                            <input id="major" name="major" type="text">
                        </p>
                        <p class="mar" style="text-indent:2em">
                            学号：
                            <input id="studentId" name="studentId" type="text">
                        </p>
                        <p class="mar">
                            入学时间：
                            <input class="Wdate" onfocus="WdatePicker({skin:'whyGreen',dateFmt:'yyyy-MM-dd'})" name="inTime" id="inTime" style="cursor: pointer;   padding-left:5px;width:130" type="text">
                            毕业时间：
                            <input class="Wdate" onfocus="WdatePicker({skin:'whyGreen',dateFmt:'yyyy-MM-dd'})" name="outTime" id="outTime" style="cursor: pointer;   padding-left:5px;width:130" type="text">

                        </p>
              
                        <p class="mar">
                            邮箱地址：
                            <input id="email" name="email" type="text">
                        </p>
                        <p class="mar" style="text-indent:2em">
                            地址：
                            <select id="province" name="province"> <option selected="selected" value="-1">省</option><option value="110000">北京市</option><option value="120000">天津市</option><option value="130000">河北省</option><option value="140000">山西省</option><option value="150000">内蒙古自治区</option><option value="210000">辽宁省</option><option value="220000">吉林省</option><option value="230000">黑龙江省</option><option value="310000">上海市</option><option value="320000">江苏省</option><option value="330000">浙江省</option><option value="340000">安徽省</option><option value="350000">福建省</option><option value="360000">江西省</option><option value="370000">山东省</option><option value="410000">河南省</option><option value="420000">湖北省</option><option value="430000">湖南省</option><option value="440000">广东省</option><option value="450000">广西壮族自治区</option><option value="460000">海南省</option><option value="500000">重庆市</option><option value="510000">四川省</option><option value="520000">贵州省</option><option value="530000">云南省</option><option value="540000">西藏自治区</option><option value="610000">陕西省</option><option value="620000">甘肃省</option><option value="630000">青海省</option><option value="640000">宁夏回族自治区</option><option value="650000">新疆维吾尔自治区</option><option value="990000">新疆建设兵团</option></select>
                            <input id="oneCity" class="oneCity" code="" style="display:none" type="text">

                            <select id="city" name="city"></select>
                            <select id="area" name="area"></select>

                        </p>

                        <p class="mar">
                            <input id="address" name="address" placeholder="具体到宿舍号" style="margin-left:5.3em;color: #666661;" type="text">
                        </p>

                        <p class="mar" style="text-indent:2em;width:850px">
                          <span>  技能：</span><span id="ability"><input name="ability1" value="1" style="width: 13px;height: 13px;position:relative;top:2.3px;" type="checkbox">&nbsp;推广/注册&nbsp;&nbsp;<input name="ability1" value="2" style="width: 13px;height: 13px;position:relative;top:2.3px;" type="checkbox">&nbsp;发单/举牌&nbsp;&nbsp;<input name="ability1" value="3" style="width: 13px;height: 13px;position:relative;top:2.3px;" type="checkbox">&nbsp;促销/导购&nbsp;&nbsp;<input name="ability1" value="4" style="width: 13px;height: 13px;position:relative;top:2.3px;" type="checkbox">&nbsp;销售/签单&nbsp;&nbsp;<input name="ability1" value="5" style="width: 13px;height: 13px;position:relative;top:2.3px;" type="checkbox">&nbsp;充场/观众&nbsp;&nbsp;<input name="ability1" value="6" style="width: 13px;height: 13px;position:relative;top:2.3px;" type="checkbox">&nbsp;调研/问卷&nbsp;&nbsp;<input name="ability1" value="7" style="width: 13px;height: 13px;position:relative;top:2.3px;" type="checkbox">&nbsp;话务/客服&nbsp;&nbsp;<input name="ability1" value="8" style="width: 13px;height: 13px;position:relative;top:2.3px;" type="checkbox">&nbsp;店员/服务员&nbsp;&nbsp;<input name="ability1" value="9" style="width: 13px;height: 13px;position:relative;top:2.3px;" type="checkbox">&nbsp;老师/家教&nbsp;&nbsp;<input name="ability1" value="10" style="width: 13px;height: 13px;position:relative;top:2.3px;" type="checkbox">&nbsp;礼仪/模特&nbsp;&nbsp;<input name="ability1" value="11" style="width: 13px;height: 13px;position:relative;top:2.3px;margin-left:5em" type="checkbox">&nbsp;演艺/主持&nbsp;&nbsp;<input name="ability1" value="11" style="width: 13px;height: 13px;position:relative;top:2.3px;" type="checkbox">&nbsp;演艺/主持&nbsp;&nbsp;<input name="ability1" value="12" style="width: 13px;height: 13px;position:relative;top:2.3px;" type="checkbox">&nbsp;校园/代理&nbsp;&nbsp;</span>
                        </p>
                        <p class="mar" style="position:relative;left:-1em">
                            可调整工作： <span id="workState"><input name="workState1" value="1" style="width: 13px;height: 13px;margin: 0;" type="checkbox">&nbsp;发单/举牌&nbsp;&nbsp;<input name="workState1" value="2" style="width: 13px;height: 13px;margin: 0;" type="checkbox">&nbsp;话务/客服&nbsp;&nbsp;<input name="workState1" value="3" style="width: 13px;height: 13px;margin: 0;" type="checkbox">&nbsp;店员/服务生&nbsp;&nbsp;</span>
                        </p>

                        <p class="mar">
                            是否兼职<m>：</m>
                            <select id="isagree" class="stu_select">
                                <option selected="selected" value="0">请选择</option>
                                <option value="1">是</option>
                                <option value="2">否</option>
                            </select>
                        </p>


                        <div style="border:solid 1px #e6e3e3; height:38px;; background-color:#f4f8fb">
                            <h4 style="margin-left:10px;float:left; margin-top:10px;">完善个人简介</h4>
                        </div>
                        <div style="border:solid 1px #e6e3e3; height:300px;padding-top:4em">
                            <p>
                                <span style=" float:left; margin-left:10px;font-size:14px; color:#666666">自我介绍：</span><textarea class="intus" id="introduction" name="introduction"></textarea><br><br><br>
                                <span style=" float:left; margin-left:10px; font-size:14px; color:#666666">工作经验：</span><textarea class="intus" id="workExp" name="workExp"></textarea>
                            </p>
                        </div>
                        <span>
                            <input value="提交资料" id="btnSave" style="width: 100px; height: 30px; background: #f39700; color: white; margin-left: 45%;" onclick="GLOBAL.pagebase.bindBtnSaveClick('')" type="button">
                        </span>

</form>                </div>
            </div>
        </div>
    </div>


 
<style type="text/css">
		p{cursor:pointer}
		
	</style>

<input style="position: absolute; margin: -5px 0px 0px -175px; padding: 0px; width: 220px; height: 30px; font-size: 14px; opacity: 0; cursor: pointer; display: none; z-index: 2147483583; top: 758px; left: 640px;" name="file" type="file"><input style="position: absolute; margin: -5px 0px 0px -175px; padding: 0px; width: 220px; height: 30px; font-size: 14px; opacity: 0; cursor: pointer; display: none; z-index: 2147483583; top: 763px; left: 750px;" name="file" type="file"><div style="position: absolute; top: -1970px; left: -1970px;" id="_my97DP"><iframe style="width: 186px; height: 198px;" src="/public/images/My97DatePicker.htm" border="0" scrolling="no" frameborder="0"></iframe>