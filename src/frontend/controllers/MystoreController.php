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
        return $this->render("partlist");
    }

    /* 兼职评论 */
    public function actionPartcomment()
    {
        return $this->render("partcomment");
    }

}