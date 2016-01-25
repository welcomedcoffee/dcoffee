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

        /* 查询省份 */
        $region = new FinRegion();
        $province = $region->getProvince();
        return $this->render("part",[
                                        'model'=>$model,
                                        'parttype'=>$parttype,
                                        'province'=>$province
                                    ]);
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