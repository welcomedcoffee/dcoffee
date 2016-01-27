<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    $this->title = "发布兼职";


?>
<link rel="stylesheet" href="/public/css/publish.css">
<link rel="stylesheet" href="/public/css/skin_v2.css">
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=ZT4wsbKvt0nB8pvbGAREQisb"></script>
    <style type="text/css">
        #l-map{height:300px;width:100%;}
        #r-result{width:100%;}
    </style>

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
                <?php
                $form = ActiveForm::begin([
                    'options' => ['id'=>'site-form','enctype' => 'multipart/form-data','class' => "frm"],
                    'action'=>Url::to(['mystore/partadd']),
                    'method'=>'post',
                    'fieldConfig' => [
                        'template' => '<span id=""><m>*</m>{label}{input}{error}</span>'
                    ],
                ]);
                ?>
                    <h3>兼职详情</h3>
			<span id="">
<!--				<m>*</m><label>兼职名称：</label>-->
<!--				<input type="text" name="name"  value="" class="validate[required,maxSize[30]]" placeholder="请输入兼职名称"/>-->
                <?= $form->field($model, 'job_name', ['inputOptions'=>['placeholder'=>'请输入兼职名称']])->textInput() ?>
			</span>
			<span id="">

                <?= $form->field($model, 'job_type')->dropDownList($data, ['prompt'=>'请选择','style'=>'width:120px;margin-left: 10px']) ?>

			</span>
			<span id="">

                <?= $form->field($model, 'job_people', ['inputOptions'=>['placeholder'=>'']])->textInput() ?>
			</span>
			<span id=" " >
                <?= $form->field($model, 'job_img',['inputOptions'=>['placeholder'=>''],'template'=>'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{label}<img src="images/logo.png" id="myselfpic1" width="80px" class="margleft10" name="introPic"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{input}{error}'])->fileInput() ?>
			</span>
			<span id="">
				<?= $form->field($model, 'job_money', ['inputOptions'=>['placeholder'=>'']])->textInput() ?>
                <?= $form->field($model, 'job_treatment',['inputOptions'=>['placeholder'=>''],'template'=>'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{input}{error}'])->dropDownList(['1'=>"元/天",'2'=>"元/小时",'3'=>"元/周","4"=>"元/月","5"=>"元/次","6"=>"元/个","7"=>"元/单","8"=>"元/面议"], ['prompt'=>'请选择','style'=>'width:120px;margin-left: 10px']) ?>
			</span>
			<span id="">
                <?= $form->field($model, 'pay_method')->dropDownList(['1'=>"当天结算",'2'=>"周末结算",'3'=>"月末结算","4"=>"完工结算"], ['prompt'=>'请选择','style'=>'width:120px;margin-left: 10px']) ?>
			</span>

			<span id="">
                <?= $form->field($model, 'end_data', ['inputOptions'=>['placeholder'=>'请输入报名截止日期']])->textInput(['id'=>"d11","onClick"=>"WdatePicker()"]) ?>
			</span>
			<span id="">

                <?= $form->field($model, 'job_start', ['inputOptions'=>['placeholder'=>'请输入兼职日期']])->textInput(['id'=>"workBegin","data-prompt-position"=>"topRight","class"=>"Wdate validate[required]","onfocus"=>"WdatePicker({skin:'whyGreen',dateFmt:'yyyy-MM-dd'})"]) ?>

                <?= $form->field($model, 'job_end', ['inputOptions'=>['placeholder'=>'请输入兼职日期']])->textInput(['id'=>"workEnd","class"=>"Wdate validate[required]","onfocus"=>"WdatePicker({skin:'whyGreen',dateFmt:'yyyy-MM-dd'})"]) ?>
			</span>

			<span id="">

                <?= $form->field($model, 'work_start', ['inputOptions'=>['placeholder'=>'请输入工作时段']])->textInput() ?>

                <?= $form->field($model, 'work_end', ['inputOptions'=>['placeholder'=>'请输入工作时段']])->textInput() ?>


			</span>
			<span id="" class="margleft45">
                <?= $form->field($model, 'commission')->dropDownList(['0'=>"无提成",'1'=>"有提成"], ['prompt'=>'请选择','style'=>'width:120px;margin-left: 10px']) ?>
			</span>
			<span id="deductTypeNameSpan" style="display:block">

                <?= $form->field($model, 'cut_way')->textarea(['rows'=>3,"class"=>"w100h25 validate[required,maxSize[200] ]"]) ?>

			</span>
			<span id="">
                <?= $form->field($model, 'sex')->dropDownList(['1'=>"男",'2'=>"女"], ['prompt'=>'请选择','style'=>'width:120px;margin-left: 10px']) ?>
			</span>
			<span id="">
                <?= $form->field($model, 'height')->dropDownList(['0'=>"不限",'1'=>"160cm以上",'2'=>"165cm以上","3"=>"170cm以上","4"=>"175cm以上","5"=>"180cm以上"], ['prompt'=>'请选择','style'=>'width:120px;margin-left: 10px']) ?>
			</span>
			<span id="" style="">
                <?= $form->field($model, 'job_content', ['inputOptions'=>['placeholder'=>'请输入工作内容']])->textarea(['rows'=>3,"class"=>"margleft12  validate[required,maxSize[600]]"]) ?>
			</span>
			<span id="">
                <?= $form->field($model, 'job_require', ['inputOptions'=>['placeholder'=>'请输入工作要求']])->textarea(['rows'=>3,"class"=>"margleft12  validate[required,maxSize[600]]"]) ?>
			</span>
                    <h3>联系方式</h3>
			<span id="">
                <?= $form->field($model, 'contact', ['inputOptions'=>['placeholder'=>'请输入联系人']])->textInput() ?>
			</span>
			<span id="">
                <?= $form->field($model, 'contact_phone', ['inputOptions'=>['placeholder'=>'请输入联系电话']])->textInput() ?>
			</span>
                    <h3>工作地点</h3>
            <span id="">
				<m>*</m><label>工作地点：</label>
				<select name="province" id="province"  data-prompt-position="topRight" class="validate[required]">
                    <option value="">请选择省</option>
                    <?php foreach($province as $k=>$v){ ?>
                        <option class="province" value="<?= $v['region_id']?>"><?= $v['region_name']?></option>
                    <?php } ?>
                </select>
				<select name="city" id="city" data-prompt-position="topRight"  class="validate[required]">
                    <option value="">请先选择市</option>
                </select>
				<select name="area" id="area"  class="validate[required]">
                    <option value="">请先选择区</option>
                </select>
			</span>
			<span class="pd55">
			<div id="r-result">
                <?= $form->field($model, 'working_place', ['inputOptions'=>['placeholder'=>'请输入工作地点']])->textInput(['id'=>"suggestId"]) ?>
            </div>
                <div id="searchResultPanel" style="border:1px solid #C0C0C0;width:150px;height:auto; display:none;"></div>

			</span>

			<span class="pd55" >
			<div id="mapAdress">
                <div id="l-map"></div>
            </div>

			</span>
			<span class="pd55">
<!--				<input type="button"  id="btnPublish" value="发布兼职"  class="fabujianzhisubmit"/>-->
                <?= Html::submitButton('发布兼职', ['class'=>'fabujianzhisubmit','id' =>'']) ?>
			</span>
			<span id="" class="margleft88">
				<m>温馨提示：岗位信息发布后将无法修改，请在信息核实无误后再发布！</m>
			</span>
                <?php ActiveForm::end();?>
            </div>
        </div>
    </div>

</div>


<style type="text/css">
    p{cursor:pointer}

</style>



<?php $this->registerJsFile('/public/date/My97DatePicker/WdatePicker.js');?>
<script>
    $(".province").click(function(){
        var region_id = $(this).val();
        var type = "citys";
        $.ajax({
            type: "GET",
            url: "<?= Url::to(['mystore/region'])?>",
            data: "region_id="+region_id+"&type="+type,
            success: function(msg){
                $("#area>option:gt(0)").remove();
                $("#city").append(msg)
                //alert( "Data Saved: " + msg );
            }
        });
    })

    $(document).on("click",".citys",function(){
        var region_id = $(this).val();
        var type = "area";
        $.ajax({
            type: "GET",
            url: "<?= Url::to(['mystore/region'])?>",
            data: "region_id="+region_id+"&type="+type,
            success: function(msg){
                //$("#city option[index!=0]").remove();
                $("#area").append(msg)
                //alert( "Data Saved: " + msg );
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
