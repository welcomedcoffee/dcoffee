<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use app\models\part\FinPartType;
use app\models\part\FinJobDetails;
use frontend\models\students\Region;
/**
 * 兼职机会
 */
class ParttimeController extends BaseController
{
	/*
     * @inheritdoc 兼职列表
     */
    public function actionIndex()
    {
        $models_type    = new FinPartType();  //实例化分类
        $models_region  = new Region();      //实例化地区
        $models_part    = new FinJobDetails;//实例化兼职
        $types          = $models_type->partComment();
        $region_id      = '52';
        $regions        = $models_region->getRegion($region_id);
        //接受查询分类
        $keyword    = Yii::$app->request->get('1');
        $new_key    = Yii::$app->request->get('2');
        if ($new_key) 
        {
            foreach ($new_key as $key => $value) 
            {
                $keyword[$key] = $value;
            }
        }
        if (empty($keyword['type'])) {
            $keyword['type'] = 0;
        }
        if (empty($keyword['region'])) {
            $keyword['region'] = 0;
        }
        $parts          = $models_part->getParts($keyword);
        $pages          = $parts['pages'];
        unset($parts['pages']);
        return $this->render('index',
                [
                    'types'     => $types,
                    'regions'   => $regions,
                    'parts'     => $parts,
                    'keyword'   => $keyword,
                    'pages'     => $pages,
                ]);
    }

    /*
     * @inheritdoc 兼职详情页
     */
    public function actionDetails()
    {
        return $this->render('details');
    }

}
