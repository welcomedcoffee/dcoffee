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
    <link rel="stylesheet" type="text/css" href="/public/oss/style.css"/>
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
                            <li><a href="<?= Url::to(['student/headportrait']); ?>">头像照片</a></li>
                        </ul>
                        <span class="wenxinart">您好，修改资料任意资料都要重新审核，建议您不要频繁修改，以免给您带来不便。</span>
                    </div>

                   
                   <?php $form = ActiveForm::begin([
                        'action' => Url::to(['student/studentupdate']),
                        'method'=>'post',
                        'options' => ['enctype' => 'multipart/form-data'],
                    ])?>
                        <p class="mar">
                            真实姓名：<input value="<?= Html::encode($student['stu_id']) ?>" id="stu_id" type="hidden" name="stu_id">
                            <input id="stu_name" name="stu_name" type="text" value="<?= Html::encode($student['stu_name']) ?>">
                        </p>
                        <p class="mar" style="text-indent:2em">
                            昵称：<input id="stu_nickname" name="stu_nickname" type="text" value="<?= Html::encode($student['stu_nickname']) ?>">
                        </p>
                        <p class="mar" style="position:relative;left:-1em">
                            身份证号码：<input id="stu_card" name="stu_card" type="text" value="<?= Html::encode($student['stu_card']) ?>">
                        </p>
                        <p style="position:relative;left:-1em;margin-top:10px">
                            <span style="position:relative;top:-4em">身份证照片：</span>
                            <img class="  " src="/public/images/fanmian.jpg" id="pic2" name="pic2" alt="1" style="width:163px;height:102px">
                            <img class="  " src="/public/images/zhenmian.png" alt="1" id="pic1" name="pic1" style="width:163px;height:102px">
                            <div id="ossfile" style="margin-left: 65px;">你的浏览器不支持flash,Silverlight或者HTML5！</div>
                            <div id="container" style="margin-left: 65px;">
                                <a id="selectfiles" href="javascript:void(0);" class='btn'>选择照片</a>
                                 <a id="postfiles" href="javascript:void(0);" class='btn'>开始上传</a>
                            </div>
                            <pre id="console" style="margin-left: 65px;"></pre>
                            <p>&nbsp;</p>
                        </p>
                         <p class="warm">只能上传jpg、jpeg、png类型的图片，大小不能超过2M</p>
                        <p class="mar" style="text-indent:2em">
                            性别：
                            <select id="stu_sex" name="stu_sex">
                                <?php if($student['stu_sex'] == 1){?>
                                    <option value="1" selected="selected">男</option>
                                    <option value="2">女</option>
                                <?php }else{ ?>
                                    <option value="1">男</option>
                                    <option value="2"  selected="selected">女</option>
                                <?php }?>
                            </select>

                        </p>
                        <p class="mar" style="text-indent:2em">
                            身高：<input id="stu_height" name="stu_height" type="text"  value="<?= Html::encode($student['stu_height']) ?>">cm
                        </p>
                        <p class="mar" style="text-indent:2em">
                            学校：
                            <input value="北京大学" id="stu_school" name="stu_school" type="text" value="<?= Html::encode($student['stu_school']) ?>">
                        </p>
                        <p class="mar" style="text-indent:2em">
                            专业：
                            <input id="stu_professional" name="stu_professional" type="text" value="<?= Html::encode($student['stu_professional']) ?>">
                        </p>
                        <p class="mar" style="text-indent:2em">
                            学号：
                            <input id="stu_code" name="stu_code" type="text" value="<?= Html::encode($student['stu_code']) ?>">
                        </p>
                        <p class="mar">
                            入学时间：
                            <input class="Wdate" name="stu_start" id="dt" type="text" value="<?= Html::encode(date('Y-m-d',$student['stu_start'])) ?>">
                            <div id="dd"></div>
                            毕业时间：
                            <input class="Wdate" name="stu_end" id="dts" type="text"  value="<?= Html::encode(date('Y-m-d',$student['stu_end'])) ?>">
                            <div id="dds"></div>

                        </p>
                        <p class="mar" style="text-indent:2em;margin-top: 20px;">
                            地址：
                            <select id="province" name="province_id" class="province_id">
                            <?php foreach($provinces as $key=>$val){?>
                                <?php if($student['province_id'] == $key){?>
                                    <option value="<?= Html::encode($key) ?>" selected="selected"><?= Html::encode($val) ?></option>
                                <?php }else{ ?>
                                     <option value="<?= Html::encode($key) ?>"><?= Html::encode($val) ?></option>
                                <?php } ?>
                            <?php } ?>   
                            </select>
                            <select id="city" name="city_id">
                                <?php foreach($city as $key=>$val){?>
                                    <?php if($student['city_id'] == $key){?>
                                        <option value="<?= Html::encode($key) ?>" selected="selected"><?= Html::encode($val) ?></option>
                                    <?php }else{ ?>
                                         <option value="<?= Html::encode($key) ?>"><?= Html::encode($val) ?></option>
                                    <?php } ?>
                                <?php } ?> 
                            </select>
                            <select id="area" name="area_id">
                                <?php foreach($area as $key=>$val){?>
                                    <?php if($student['area_id'] == $key){?>
                                        <option value="<?= Html::encode($key) ?>" selected="selected"><?= Html::encode($val) ?></option>
                                    <?php }else{ ?>
                                         <option value="<?= Html::encode($key) ?>"><?= Html::encode($val) ?></option>
                                    <?php } ?>
                                <?php } ?> 
                            </select>

                        </p>
                        <p class="mar" style="margin-top: 0px;">
                            <input id="stu_addr" name="stu_addr" placeholder="具体到宿舍号" style="margin-left:5.3em;color: #666661;" type="text" value="<?= Html::encode($student['stu_addr']) ?>">
                        </p>

                        <p class="mar" style="text-indent:2em;width:850px">
                          <table>
                              <tr>
                                  <td style="width: 65px;" align="right">技能：</td>
                                  <td style="width: 830px;">
                                        <?php foreach($skills as $key=>$val){?>
                                            <?php if($val['is_checked'] == '1'){?>
                                                <input name="skills_id[]" value="<?= Html::encode($val['skills_id']) ?>" style="width: 13px;height: 13px;position:relative;top:2.3px;" type="checkbox" checked='checked'>&nbsp;<?= Html::encode($val['skills_name']) ?>&nbsp;&nbsp;
                                            <?php }else{ ?>
                                                <input name="skills_id[]" value="<?= Html::encode($val['skills_id']) ?>" style="width: 13px;height: 13px;position:relative;top:2.3px;" type="checkbox">&nbsp;<?= Html::encode($val['skills_name']) ?>&nbsp;&nbsp;
                                            <?php } ?>
                                        <?php } ?>
                                  </td>
                              </tr>
                          </table>
                        </p>

                        <p class="mar" style="margin-top: 25px;">
                            是否兼职<m>：</m>
                            <select name="stu_parttime">
                                <?php if($student['stu_parttime'] == '1'){?>
                                    <option value="1" selected="selected">是</option>
                                    <option value="2">否</option>
                                <?php }else{ ?>
                                    <option value="1">是</option>
                                    <option value="2" selected="selected">否</option>
                                <?php } ?>
                            </select>
                        </p>


                        <div style="border:solid 1px #e6e3e3; height:38px;; background-color:#f4f8fb">
                            <h4 style="margin-left:10px;float:left; margin-top:10px;">完善个人简介</h4>
                        </div>
                        <div style="border:solid 1px #e6e3e3; height:300px;padding-top:4em">
                            <p>
                                <span style=" float:left; margin-left:10px;font-size:14px; color:#666666">自我介绍：</span><textarea class="intus" id="stu_introduction" name="stu_introduction"><?= Html::encode($student['stu_introduction']) ?></textarea><br><br><br>
                                <span style=" float:left; margin-left:10px; font-size:14px; color:#666666">工作经验：</span><textarea class="intus" id="stu_experience" name="stu_experience"><?= Html::encode($student['stu_experience']) ?></textarea>
                            </p>
                        </div>
                        <span>
                            <input id="postfiles" value="提交资料" style="width: 100px; height: 30px; background: #f39700; color: white; margin-left: 45%;" type="button">
                        </span>
                    <?php $form = ActiveForm::end()?>
                </div>
            </div>
        </div>
    </div>

<script src="/public/js/calendar.js"></script>
<script type="text/javascript" src="/public/oss/lib/plupload-2.1.2/js/plupload.full.min.js"></script>
<script type="text/javascript" src="/public/oss/upload.js"></script>
<script>

/*
$(document).on('change','#change_img',function() {
    //alert("11");
    var file = document.getElementById("change_img").files[0];      
    console.log(file);
    var tmpimg=document.createElement('img');                    
    tmpimg.src=window.URL.createObjectURL(file);              
    $('.choose_pic').after("<div class='new choose_pic'></div>");  
    $("#old").hide();    
    $(".new").html(tmpimg);
});*/

//城市
$(document).on('change', '.province_id', function(){
        var id=$(this).val();
        var objs = $(this);
        $.ajax({
            type: "POST",
            url:"<?= Url::to(['student/region'])?>",
            data: "id="+id,
            dataType:"json",
            success: function(obj){
                var str="";
                var i=0;
                for(i;i<obj.length;i++){
                    str+="<option value="+obj[i]['region_id']+">"+obj[i]['region_name'];
                }
                objs.next().next().html(str);
                objs.next().next().next().html("<option value=''>请选择...");
            }
        });
    })
//城市
$(document).on('click', '.city_id', function(){
        var id=$(this).val();       
        var next=$(this).next();
        $.ajax({
            type: "POST",
            url:"<?= Url::to(['student/region'])?>",
            data: "id="+id,
            dataType:"json",
            success: function(obj){
                var str="";
                var i=0;
                for(i;i<obj.length;i++){
                    str+="<option value="+obj[i]['region_id']+" class='city_id'>"+obj[i]['region_name'];
                }
                next.html(str);
            }
        });
    })
//时间插件
$('#dd').calendar({
    trigger: '#dt',
    zIndex: 999,
    format: 'yyyy-mm-dd',
    onSelected: function (view, date, data) {
        console.log('event: onSelected')
    },
    onClose: function (view, date, data) {
        console.log('event: onClose')
        console.log('view:' + view)
        console.log('date:' + date)
        console.log('data:' + (data || 'None'));
    }
});
$('#dds').calendar({
    trigger: '#dts',
    zIndex: 999,
    format: 'yyyy-mm-dd',
    onSelected: function (view, date, data) {
        console.log('event: onSelected')
    },
    onClose: function (view, date, data) {
        console.log('event: onClose')
        console.log('view:' + view)
        console.log('date:' + date)
        console.log('data:' + (data || 'None'));
    }
});
</script>