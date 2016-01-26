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
        $model->job_status = 3;//审核中
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
        $user = $list->getUsercount($job_id);
        $data['usercount'] = $user;
        return $this->render("settlement",['data'=>$model['attributes']]);
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

    /* 兼职评论 */
    public function actionPartcomment()
    {
        return $this->render("partcomment");
    }

}