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
                            <img class="  " src="/public/images/zhenmian.png" alt="1" id="pic1" name="pic1" style="width:163px;height:102px">
                            <img class="  " src="/public/images/fanmian.jpg" id="pic2" name="pic2" alt="1" style="width:163px;height:102px">
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
                            <input class="Wdate" onfocus="WdatePicker({skin:'whyGreen',dateFmt:'yyyy-MM-dd'})" name="inTime" id="inTime" style="cursor: pointer;   padding-left:5px;width:130" type="text">
                            毕业时间：
                            <input class="Wdate" onfocus="WdatePicker({skin:'whyGreen',dateFmt:'yyyy-MM-dd'})" name="outTime" id="outTime" style="cursor: pointer;   padding-left:5px;width:130" type="text">

                        </p>
                        <?php 
                                $form = ActiveForm::begin([
                                    'options' => ['class' => 'form-horizontal',
                                    'id'=>'Users-form'],
                                    'action'=>Url::to(['user/teachercreate']),
                                    'method'=>'post',
                                    'fieldConfig' => [
                                        'template' => '<div class="form-group"><center><label class="col-md-2 control-label" for="type-name-field">{label}</label></center><div class="col-md-8 controls">{input}{error}</div></div>'
                                    ], 
                                ]);
                            ?>
                                
                                <?= $form->field($model, 'stu_name',['inputOptions'=>['placeholder'=>'请输入教师名称']])->textInput(['maxlength' => true]) ?>
                                
                                <?= $form->field($model, 'stu_name',['inputOptions'=>['placeholder'=>'请输入邮箱']])->textInput(['maxlength' => true]) ?>
                                
                                <?= $form->field($model, 'stu_name',['inputOptions'=>['placeholder'=>'请输入用户名']])->textInput(['maxlength' => true]) ?>

                                <div class="modal-footer">
                                    <?= Html::submitButton('保存', ['class' => 'btn btn-success','id'=>'user-create-btn']) ?>
                                    <button data-dismiss="modal" class="btn btn-link pull-right" type="button">取消</button>
                                </div>
                            <?php ActiveForm::end(); ?>
                            <div class="form-group">
                                <label class="control-label">城市:</label>
                                <?= Html::dropDownList('province_id', $student['province_id'], ArrayHelper::map($provinces,'id', 'province_id'), ['class' => 'province_id form-control','style'=>'width: 150px;']);?>
                                <?= Html::dropDownList('city_id', $student['city_id'], ArrayHelper::map($city,'id', 'city_id'), ['class' => 'city_id form-control','id'=>'city_id','style'=>'width: 150px;']);?>
                                <?= Html::dropDownList('area_id', $student['area_id'], ArrayHelper::map($area,'id', 'area_id'), ['class' => 'area_id form-control','id'=>'area_id','style'=>'width: 150px;']);?>
                            </div>
                        <p class="mar" style="text-indent:2em">
                            地址：
                            <select id="province" name="province">
                                
                            </select>
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