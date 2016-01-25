<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
    $this->title = "发布兼职";
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>趣淘学</title>
    <link rel="stylesheet" href="public/css/comm.css" />
    <link rel="stylesheet" href="public/css/shop.css" />
    <link rel="stylesheet" href="public/css/sty.css" />
    <link rel="stylesheet" href="public/css/skin_v2.css" />
    <link rel="stylesheet" href="public/css/publish.css" />
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=ZT4wsbKvt0nB8pvbGAREQisb"></script>
    <style type="text/css">
        #l-map{height:300px;width:100%;}
        #r-result{width:100%;}
    </style>
</head>
<body>
<!--head-->
<!--head end-->
<!--t_nav-->
<div class="t_min t_tit">当前位置：<a href="/">首页</a> > 我的趣淘学</div>
<!--我的趣淘学-->
<div class="t_min">
    <div class="mt_ri_1">

        <div class="mt_rt" id="topmenus">
            <ul>
                <li class="img">
                    <img src="%E6%88%91%E7%9A%84%E9%97%A8%E5%BA%97_files/us.jpg" height="100" width="100">
                </li>
                <li class="wi1">
                    <h1>2311231请问</h1>
                    <p>手机号：13782519376</p>
                </li>
                <li class="wi2">预收余额：0.00</li>
                <li class="wi3">
                    <a href="http://www.qutaoxue.net/merchant/merchantQuota">
                        <span class="bg1">额度申请</span>
                    </a>
                    <a href="http://www.qutaoxue.net/merchant/merchantParttimeList">
                        <span class="bg2">兼职结算</span>
                    </a>
                    <a href="http://www.qutaoxue.net/merchant/merchantParttimeList">
                        <span class="bg3">兼职审核</span>
                    </a>
                </li>
            </ul>
            <div class="clear"></div>
        </div>
    </div>
    <div class="mt_le t_le" id="leftmenus">
        <ul>
            <h2>我的兼职</h2>
            <li>
                <a href="<?= Url::to(['mystore/part'])?>" atr="publish">发布兼职</a>
            </li>
            <li>
                <a href="<?= Url::to(['mystore/partlist'])?>" atr="list">兼职列表</a>
            </li>
            <li>
                <a href="<?= Url::to(['mystore/partcomment'])?>" atr="publish">兼职评论</a>
            </li>
            <h2>企业设置</h2>
            <li>
                <a href="http://www.qutaoxue.net/merchant/merchantInfo" atr="base">基本资料</a>
            </li>
            <li>
                <a href="http://www.qutaoxue.net/merchant/merchantSafe" atr="safe">账户安全</a>
            </li>
            <li>
                <a href="http://www.qutaoxue.net/merchant/merchantBalance" atr="account">账户余额</a>
            </li>
        </ul>
    </div>
    <div class="mt_ri t_ri">
        <div class="mt_rli">
            <div class="right">
                <div id="" class="topdiv">
                    <p id="" class="topdivtext">
                        发布兼职
                    </p>
                </div>

                <form  class="frm">
                    <h3>兼职详情</h3>
			<span id="">
				<m>*</m><label>兼职名称：</label>
				<input type="text" name="name"  value="" class="validate[required,maxSize[30]]" placeholder="请输入兼职名称"/>
			</span>
			<span id="">
				<m>*</m><label>兼职类别：</label>
		    <select id="workType" class="margleft6 validate[required]" placeholder="请输入兼职类别">
                <?php foreach($parttype as $k=>$v){?>
                    <option><?= $v['part_name'];?></option>
                <?php }?>
            </select>
			</span>
			<span id="">
				<m>*</m><label>招聘人数：</label>
				<input type="text" name="total" id="" value=""  class="validate[required,custom[integer],min[1]]"  placeholder="请输入招聘人数"/>
			</span>
			<span id=" ">
				<label class="floleft margleft5">上传图片：</label>
				<img src="images/logo.png" id="myselfpic1"  width="80px" class="margleft10" name="introPic"><br>
                    <input type="file" name="job_img">
					只能上传jpg、jpeg、png类型的图片，大小不能超过2M
			</span>
			<span id="">
				<m>*</m><label>工资待遇：</label><input type="text" name="salary" id="salary" value="" data-prompt-position="topRight"  class="validate[required,custom[number]]"  placeholder="请输入工资待遇"/>

			<select id="payUnit" name="payUnit">
                <option>元/天</option>
                <option>元/小时</option>
                <option>元/周</option>
                <option>元/月</option>
                <option>元/次</option>
                <option>元/个</option>
                <option>元/单</option>
                <option>元/面议</option>
            </select>
			</span>
			<span id="">
				<m>*</m>
                <label>结算方式：</label>
		 <select id="payStyle"  class="margleft6">
             <option selected value="1">当天结算</option>
             <option value="2">周末结算</option>
             <option value="3">月末结算</option>
             <option value="4">完工结算</option>
         </select>
			</span>

			<span id="">
				<m>*</m>
                <label>截止日期：</label>
				<input type="text" name="startDateTime" id="d11" placeholder="请输入报名截止日期" onClick="WdatePicker()" />
<!--                <input type="text" onfocus="WdatePicker({maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}'})" id="logmin" class="input-text Wdate" style="width:120px;">-->
<!--		--->
<!--		<input type="text" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d'})" id="logmax" class="input-text Wdate" style="width:120px;">-->
			</span>
			<span id="">
				<m>*</m><label>兼职日期：</label>
				<input type="text" name="workBegin" value="" id="workBegin"  data-prompt-position="topRight" class="Wdate validate[required]" onfocus="WdatePicker({skin:'whyGreen',dateFmt:'yyyy-MM-dd'})" placeholder="请输入兼职日期"  />
				<input type="text" name="workEnd"  value="" id="workEnd"   class="Wdate validate[required]" onfocus="WdatePicker({skin:'whyGreen',dateFmt:'yyyy-MM-dd', minDate:'#F{$dp.$D(\'workBegin\')}'})" placeholder="请输入兼职日期" />
			</span>

                    <div class="con" id="begin">
                        <ul class="conul" >
                            <li>00:00</li><li>01:00</li><li>02:00</li><li>03:00</li>

                            <li>04:00</li><li>05:00</li><li>06:00</li><li>07:00</li>

                            <li>08:00</li><li>09:00</li><li>10:00</li><li>11:00</li>

                            <li>12:00</li><li>13:00</li><li>14:00</li><li>15:00</li>

                            <li>16:00</li><li>17:00</li><li>18:00</li><li>19:00</li>

                            <li>20:00</li><li>21:00</li><li>22:00</li><li>23:00</li>
                        </ul>
                    </div>
                    <div class="con" id="end">
                        <ul class="conul" >
                            <li>00:00</li><li>01:00</li><li>02:00</li><li>03:00</li>

                            <li>04:00</li><li>05:00</li><li>06:00</li><li>07:00</li>

                            <li>08:00</li><li>09:00</li><li>10:00</li><li>11:00</li>

                            <li>12:00</li><li>13:00</li><li>14:00</li><li>15:00</li>

                            <li>16:00</li><li>17:00</li><li>18:00</li><li>19:00</li>

                            <li>20:00</li><li>21:00</li><li>22:00</li><li>23:00</li>
                        </ul>
                    </div>
			<span id="">
				<m>*</m><label>工作时段：</label>
				<input type="text" name="workTimeHourBegin" id="workTimeHourBegin"  data-prompt-position="topRight"  onfocus="GLOBAL.pagebase.workTimeShowBegin()"   class="validate[required]" placeholder="请输入工作时段" />
				<input type="text" name="workTimeHourEnd" id="workTimeHourEnd"   class="validate[required]"  placeholder="请输入工作时段"  onfocus="GLOBAL.pagebase.workTimeShowEnd()"  />
			</span>
			<span id="" class="margleft45">
				<m>*</m><label>提&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;成：</label>
				<select name="isDeduct" class="margleft6" id="isDeduct">
                    <option value="0">无提成</option>
                    <option value="1">有提成</option>
                </select>
			</span>
			<span id="deductTypeNameSpan" style="display:none">
				<m>*</m><label>提成内容：</label>
				<textarea  name="deductTypeName" id="deductTypeName"  class="w100h25 validate[required,maxSize[200] ]  "  ></textarea>

			</span>
			<span id="">
				<label  class="margleft6">性别要求：</label>
				<select name="sex"  id="sex" class="margleft6 validate[required]">
                    <option value="0">不限</option>
                    <option value="1">男</option>
                    <option value="2">女</option>
                </select>
			</span>
			<span id="">
				<label class="margleft6">身高要求：</label>
				<select name="height" class="margleft6  validate[required]"  id="height">
                    <option value="0">不限</option>
                    <option value="1">160cm以上</option>
                    <option value="2">165cm以上</option>
                    <option value="3">170cm以上</option>
                    <option value="4">175cm以上</option>
                    <option value="5">180cm以上</option>
                </select>
			</span>
			<span id="" style="">
				<m>*</m><label>工作内容：</label><textarea id="workInfo" name="workInfo" rows="" cols=""  class="margleft12  validate[required,maxSize[600]] " placeholder="请输入工作内容"></textarea>
			</span>
			<span id="">
				<label class="margleft6">工作要求：</label><textarea name="jobDetails" rows="" cols="" class="margleft12  validate[required,maxSize[600]]" value="333" placeholder="请输入工作要求"></textarea>
			</span>
                    <h3>联系方式</h3>
			<span id="">
				<m class="margleft12">*</m><label>联系人：</label><input type="text" name="contact" id="contact" value="" class=" validate[required,maxSize[30]]" placeholder="请输入联系人"/>
			</span>
			<span id="">
				<m>*</m><label>联系电话：</label><input type="text" name="contactTel" id="contactTel" value=""  class=" validate[required,maxSize[100]] " placeholder="请输入联系电话"/>
			</span>
                    <h3>工作地点</h3>
			<span class="pd55">
			<div id="r-result">
                <input type="text" name="address" id="suggestId" size="20" style="width:150px;" placeholder="请输入工作地点"/>
            </div>
                <div id="searchResultPanel" style="border:1px solid #C0C0C0;width:150px;height:auto; display:none;"></div>

			</span>

			<span class="pd55" >
			<div id="mapAdress">
                <div id="l-map"></div>
            </div>

			</span>
			<span class="pd55">
				<input type="button"  id="btnPublish" value="发布兼职"  class="fabujianzhisubmit"/>
			</span>
			<span id="" class="margleft88">
				<m>温馨提示：岗位信息发布后将无法修改，请在信息核实无误后再发布！</m>
			</span>
                </form>
            </div>
        </div>
    </div>

</div>


<style type="text/css">
    p{cursor:pointer}

</style>

</body>
</html>


<?= Html::jsFile('public/date/My97DatePicker/WdatePicker.js')?>
<script>
    $(".province").click(function(){
        var region_id = $(this).attr("id");
        $.ajax({
            type: "GET",
            url: "<?= Url::to(['mystore/region'])?>",
            data: "region_id="+region_id,
            success: function(msg){
                alert( "Data Saved: " + msg );
            }
        });
    })
    // 百度地图API功能
    function G(id) {
        return document.getElementById(id);
    }

    var map = new BMap.Map("l-map");
    map.centerAndZoom("北京",12);                   // 初始化地图,设置城市和地图级别。

    var ac = new BMap.Autocomplete(    //建立一个自动完成的对象
        {"input" : "suggestId"
            ,"location" : map
        });

    ac.addEventListener("onhighlight", function(e) {  //鼠标放在下拉列表上的事件
        var str = "";
        var _value = e.fromitem.value;
        var value = "";
        if (e.fromitem.index > -1) {
            value = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
        }
        str = "FromItem<br />index = " + e.fromitem.index + "<br />value = " + value;

        value = "";
        if (e.toitem.index > -1) {
            _value = e.toitem.value;
            value = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
        }
        str += "<br />ToItem<br />index = " + e.toitem.index + "<br />value = " + value;
        G("searchResultPanel").innerHTML = str;
    });

    var myValue;
    ac.addEventListener("onconfirm", function(e) {    //鼠标点击下拉列表后的事件
        var _value = e.item.value;
        myValue = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
        G("searchResultPanel").innerHTML ="onconfirm<br />index = " + e.item.index + "<br />myValue = " + myValue;

        setPlace();
    });

    function setPlace(){
        map.clearOverlays();    //清除地图上所有覆盖物
        function myFun(){
            var pp = local.getResults().getPoi(0).point;    //获取第一个智能搜索的结果
            map.centerAndZoom(pp, 18);
            map.addOverlay(new BMap.Marker(pp));    //添加标注
        }
        var local = new BMap.LocalSearch(map, { //智能搜索
            onSearchComplete: myFun
        });
        local.search(myValue);
    }
</script>
