<?php
/**
 * Created by PhpStorm.
 * User: 王明东
 * Date: 2016/1/21
 * Time: 14:00
 */
namespace frontend\controllers;

use app\models\part\FinJobDetails;
use Yii;
use yii\web\Controller;
use app\models\part\FinPartType;
use app\models\part\FinRegion;
use app\models\part\FinPartList;
use app\models\user\User;
use app\models\students\Students;
use app\models\part\FinMerchantBase;
use frontend\models\consumption\Comment;
use app\models\part\FinSettlement;

/**
 *  我的门店首页
 */
class MystoreController extends BaseController
{
    /* 兼职门店首页 */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /* 发布兼职 */
    public function actionPart()
    {
        /* 表单模型 */
        $model = new FinJobDetails();

        /* 兼职类型数据 */
        $part = new FinPartType();
        $parttype = $part->partComment();
        foreach($parttype as $k=>$v)
        {
            $data[$v['part_id']] = $v['part_name'];
        }
        /* 查询省份 */
        $region = new FinRegion();
        $province = $region->getProvince();
        return $this->render("part",[
                                        'model'=>$model,
                                        'data'=>$data,
                                        'province'=>$province
                                    ]);
    }

    /**
     * 添加发布兼职信息
     */
    public function actionPartadd()
    {
        $model = new FinJobDetails();
        $data = yii::$app->request->post();
        $model->attributes = yii::$app->request->post("FinJobDetails");
        $model->end_data = strtotime($model->attributes['end_data']);
        $model->job_start = strtotime($model->attributes['job_start']);
        $model->job_end = strtotime($model->attributes['job_end']);
        $model->province_id = $data['province'];
        $model->city_id = $data['city'];
        $model->area_id = $data['area'];
        $model->job_status = 0;//未审核
        $model->add_time = time();
        $model->merchants_id = 1;//商家ID
        unset($data);
        if ($model->save()) {
            $this->success('保存成功！', ['mystore/part']);
        } else {
            $this->error('保存失败！');
        }

    }

    /**
     * @return string
     * 获取地区信息
     */
    public function actionRegion()
    {
        $region_id = Yii::$app->request->get("region_id");
        $type = Yii::$app->request->get("type");
        $region = new FinRegion();
        $getregion = $region->getRegion($region_id);
        $option = "";
        foreach($getregion as $k=>$v)
        {
            $option.="<option class='".$type."' value='".$v['region_id']."'>".$v['region_name']."</option>";
        }
        echo $option;
    }

    /* 兼职列表 */
    public function actionPartlist()
    {
        /* 查询兼职信息 */
        $job_details = new FinJobDetails();
        $data = $job_details->getDetails();
        /* 查询通过人数 */
        $part_list = new FinPartList();
        $part_user = $part_list->throughUser();
        foreach($data as $k=>$v)
        {
            //echo $v['job_id'];die;
            foreach($part_user as $key=>$val)
            {
                if($val['job_id'] == $v['job_id'])
                {
                    $data[$k]['user_count'] = $val['user_count'];
                    unset($part_user[$k]);
                }
            }
        }
        return $this->render("partlist",['data'=>$data]);
    }

    /**
     * 兼职结算页面
     */
    public function actionSettlement()
    {
        /* 查询兼职详情 */
        $job_id = yii::$app->request->get("job_id");
        $model = new FinJobDetails();
        $data = $model->partdetails($job_id);
        /* 查询兼职审核通过人数 */
        $list = new FinPartList();
        /* 通过审核用户 */
        $user = $list->getUsercount($job_id);
        /* 所有的报名用户 */
        $userall = $list->getUserall($job_id);
        $data['usercount'] = $user;
        $data['userall'] = $userall;
        //print_r($data);die;
        return $this->render("settlement",[
                                            'data'=>$data,
                                            'job_id'=>$job_id
                                            ]);
    }

    /**
     * 报名人员
     */
    public function actionApplyuser()
    {
        $job_id = Yii::$app->request->get("job_id");
        $model = new FinPartList();
        /* 查询用户类型 */
        $data = $model->getUser($job_id);
        foreach($data as $k=>$v)
        {
            $model = new User();
            $type = $model->usertype($v['user_id']);
            /* 状态为学生 */
            $array=[];
            if($type['user_type'] == 1)
            {
                $stu = new Students();
                $array[$k] = $stu->getStudent($v['user_id']);
            }
            /* 状态为企业兼职 */
//            elseif($type['user_type'] == 3)
//            {
//                $base = new FinMerchantBase();
//                $array[$k] = $base->getMessage($v['user_id']);
//            }
//            else
//            {
//
//            }
        }
        return $this->render("applyuser",[
                                            'array'=>$array,
                                            'job_id'=>$job_id
                                            ]);
    }

    /**
     * 通过人员
     */
    public function actionThroughuser()
    {
        $job_id = Yii::$app->request->get("job_id");
        $model = new FinPartList();
        /* 查询用户类型 */
        $data = $model->getUserthrough($job_id);
        foreach($data as $k=>$v)
        {
            $model = new User();
            $type = $model->usertype($v['user_id']);
            /* 状态为学生 */
            $array=[];
            if($type['user_type'] == 1)
            {
                $stu = new Students();
                $array[$k] = $stu->getStudent($v['user_id']);
            }
            /* 状态为企业兼职 */
//            elseif($type['user_type'] == 3)
//            {
//                $base = new FinMerchantBase();
//                $array[$k] = $base->getMessage($v['user_id']);
//            }
//            else
//            {
//
//            }
        }
        return $this->render("throughuser",[
                                                'array'=>$array,
                                                'job_id'=>$job_id
                                            ]);
    }

    /**
     * 拒绝人员
     */
    public function actionRefuseuser()
    {
        $job_id = Yii::$app->request->get("job_id");
        $model = new FinPartList();
        /* 查询用户类型 */
        $data = $model->getrefuseUser($job_id);
        $array = [];
        foreach($data as $k=>$v)
        {
            $model = new User();
            $type = $model->usertype($v['user_id']);
            /* 状态为学生 */
            if($type['user_type'] == 1)
            {
                $stu = new Students();
                $array[$k] = $stu->getStudent($v['user_id']);
            }
            /* 状态为企业兼职 */
            elseif($type['user_type'] == 3)
            {
                $base = new FinMerchantBase();
                $array[$k] = $base->getMessage($v['user_id']);
            }
            else
            {

            }
        }
        return $this->render("fuseuser",[
                                            'array'=>$array,
                                            'job_id'=>$job_id
                                        ]);
    }

    /**
     * @return string
     * 修改兼职状态
     */
    public function actionStopapply()
    {
        /* 修改兼职状态 */
        $job_id = Yii::$app->request->get("job_id");
        $model = FinJobDetails::findOne($job_id);
        $model->job_status = 2;//修改为进行中
        if($model->save())
        {
            echo 1;//修改成功
        }
        else
        {
            echo 2;//修改失败
        }

    }

    /**
     * @return string
     * 审核通过
     */
    public function actionApproved()
    {
        $user_id = Yii::$app->request->get("user_id");
        $job_id = Yii::$app->request->get("job_id");
        $status = Yii::$app->request->get("status");
        $model = new FinPartList();
        /* 1 为审核通过 2 为审核未通过 */
        if($status == 1)
        {
            $re = $model->reviewStatus($job_id,$user_id,1);
        }
        else
        {
            $re = $model->reviewStatus($job_id,$user_id,2);
        }
        if($re)
        {
            $this->success('审核成功！', ['mystore/partlist']);
        }
        else
        {
            $this->error("审核失败");
        }

    }

    /**
     * @return string
     * 获取用户详细信息
     */
    public function actionUsermessage()
        {
//            $data = '<div ><span id="persons" style="font-size: 20px;padding-left: 20px;color: red;">个人详细记录</span><span id="parts" style="font-size: 20px;padding-left: 20px">兼职详细记录</span><span style="font-size: 30px;padding-left:200px;" onclick="CloseDiv(\'MyDiv\',\'fade\')">☒</span></div><table id="person" cellpadding="0" cellspacing="0" style="margin-top: 30px;margin-left: 20px;font-size: 16px;display: block"><tr><td style="width: 120px">昵称</td><td style="width: 800px;padding-left: 20px">呆萌的洒家</td></tr><tr bgcolor="#dafff3"><td style="width: 120px">真实姓名</td><td style="padding-left: 20px">帐篷</td></tr><tr><td style="width: 120px">昵称</td><td style="width: 800px;padding-left: 20px">呆萌的洒家</td></tr><tr bgcolor="#dafff3"><td style="width: 120px">真实姓名</td><td style="padding-left: 20px">帐篷</td></tr><tr><td style="width: 120px">性别</td><td style="width: 800px;padding-left: 20px">男</td></tr><tr bgcolor="#dafff3"><td style="width: 120px">身高</td><td style="padding-left: 20px">180cm</td></tr><tr><td style="width: 120px">学校</td><td style="width: 800px;padding-left: 20px">北京地质大学</td></tr><tr bgcolor="#dafff3"><td style="width: 120px">专业</td><td style="padding-left: 20px">环境与市政工程</td></tr><tr><td style="width: 120px">地址</td><td style="width: 800px;padding-left: 20px">北京海淀区地质大学6号楼1120室</td></tr><tr bgcolor="#dafff3"><td style="width: 120px">技能</td><td style="padding-left: 20px">推广/注册</td></tr><tr><td style="width: 120px">可调工作</td><td style="width: 800px;padding-left: 20px">店员/服务生</td></tr><tr bgcolor="#dafff3"><td style="width: 120px">自我简介</td><td style="padding-left: 20px">本人家传绝技，胸口碎大石。</td></tr><tr><td style="width: 120px">工作经验</td><td style="width: 800px;padding-left: 20px">好多兼职都干过</td></tr><tr bgcolor="#dafff3"><td style="width: 120px">申请理由</td><td style="padding-left: 20px">好多兼职都干过</td></tr></table><table class="date" cellpadding="0" cellspacing="0" id="part" style="display: none"><thead style="background: #E5E5E4;"><tr><th>职位</th><th>商家名称 </th><th>评分</th><th>评论内容</th></tr></thead><tbody id="parttimedate"><tr><td>APP推广员</td><td>北京优势梦想有限公司</td><td>5</td><td>不错，工作认真</td></tr></tbody></table>';
//            echo $data;die;
            $user_id = Yii::$app->request->get("user_id");
            $job_id = Yii::$app->request->get("job_id");

            /* 获取申请兼职理由 */
            $list = new FinPartList();
            $reasons = $list->getreasons($user_id,$job_id);

            /* 获取用户详细信息 */
            $student = new Students();
            $usermessage = $student->getStudent($user_id);
            //var_dump($usermessage);die;
            /* 获取商家对用户兼职的详细记录 */
            $part = new Comment();
            $partrecord = $part->getshopcomment($user_id,$job_id,10);
            //var_dump($partrecord);die;
            /* 判断用户是否存在 */
            if(!empty($usermessage)) {
                $data = '<div id="MyDiv" class="white_content"><div ><span id="persons" style="font-size: 20px;padding-left: 20px;color: red;">个人详细记录</span><span id="parts" style="font-size: 20px;padding-left: 20px">兼职详细记录</span><span style="font-size: 30px;padding-left:200px;" onclick="CloseDiv(\'MyDiv\',\'fade\')"></span></div><table id="person" cellpadding="0" cellspacing="0" style="margin-top: 30px;margin-left: 20px;font-size: 16px;display: block"><tr><td style="width: 120px">昵称</td><td style="width: 800px;padding-left: 20px">' . $student['stu_nickname'] . '</td></tr><tr bgcolor="#dafff3"><td style="width: 120px">真实姓名</td><td style="padding-left: 20px">' . $student['stu_name'] . '</td></tr><tr><td style="width: 120px">性别</td><td style="width: 800px;padding-left: 20px">';

                /* 输出性别 */
                if($student['stu_sex'] == 0)
                {
                    $data.="保密";
                }
                elseif($student['stu_sex'] == 1)
                {
                    $data.="男";
                }
                else
                {
                    $data.="女";
                }

                $data .= '</td></tr><tr bgcolor="#dafff3"><td style="width: 120px">身高</td><td style="padding-left: 20px">' . $student['stu_height'] . 'cm</td></tr><tr><td style="width: 120px">学校</td><td style="width: 800px;padding-left: 20px">' . $student['stu_school'] . '</td></tr><tr bgcolor="#dafff3"><td style="width: 120px">专业</td><td style="padding-left: 20px">' . $student['stu_professional'] . '</td></tr><tr><td style="width: 120px">地址</td><td style="width: 800px;padding-left: 20px">' . $student['stu_professional'] . '</td></tr><tr bgcolor="#dafff3"><td style="width: 120px">技能</td><td style="padding-left: 20px">'.$student['skills_name'].'</td></tr><tr bgcolor="#dafff3"><td style="width: 120px">自我简介</td><td style="padding-left: 20px">' . $student['stu_introduction'] . '</td></tr><tr><td style="width: 120px">工作经验</td><td style="width: 800px;padding-left: 20px">' . $student['stu_experience'] . '</td></tr><tr bgcolor="#dafff3"><td style="width: 120px">申请理由</td><td style="padding-left: 20px">'.$reasons['part_reasons'].'</td></tr></table><table class="date" cellpadding="0" cellspacing="0" id="part" style="display: none"><thead style="background: #E5E5E4;"><tr><th>职位</th><th>商家名称 </th><th>评分</th><th>评论内容</th></tr></thead><tbody id="parttimedate">';

                /* 循环用户兼职的详细信息 */
                foreach($partrecord as $k=>$v)
                {
                    $data.='<tr><td>'.$v['user_name'].'</td><td>'.$v['comment_level'].'</td><td>'.$v['comment_content'].'</td></tr>';
                }

                $data.= '</tbody></table></div>';

                echo $data;
            }
        }

    /**
     * @return string
     * 兼职结算列表
     */
    public function actionSettlementlist()
    {
        $job_id = Yii::$app->request->get("job_id");
        $settle = new FinSettlement();
        $data = $settle->getsettlement($job_id);
        return $this->render("settlementlist",[
                                                'data'=>$data,
                                                'job_id'=>$job_id
                                            ]);
    }

    /**
     * @return string
     * 处理结算业务之前
     *
     */
    public function actionSettlementbefore()
    {
        /* 用户id */
        $user = Yii::$app->request->get("user_id");
        //$user_id = explode(",",$user);

        /* 用户姓名 */
        $name = Yii::$app->request->get("user_name");
        //$user_name = explode(",",$name);

        /* 工作id */
        $job_id = Yii::$app->request->get("job_id");

        /* 根据兼职ID查找商家余额及工资合计 */
        $model = new FinJobDetails();
        $data = $model->getBalance($job_id);
        /* 商家余额 */
        $balance = $data['mer_money'];
        /* 工资合计 */
        $combined = $data['job_money']*count($user);
        return $this->render("onlinesettlement",[
                                                    'user'=>$user,
                                                    'name'=>$name,
                                                    'balance'=>$balance,
                                                    'combined'=>$combined
                                                ]);
    }

    /* 兼职评论 */
    public function actionPartcomment()
    {
        return $this->render("partcomment");
    }

}