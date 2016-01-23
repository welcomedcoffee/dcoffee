<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\students\MerType;
use frontend\models\students\Circles;
use frontend\models\students\MerBase;

/**
 * 优质商家
 */
class MerchantsController extends BaseController
{
    /*
     * @inheritdoc 公共部分
     */
    public function common()
    {
        $models_ty  = new MerType;
        $types      = $models_ty    ->getType();
        $models_cir = new Circles;
        $circles    = $models_cir   ->getCircle();
        return ['types'=>$types,'circles'=>$circles];
    }
	/*
     * @inheritdoc 首页
     */
    public function actionIndex()
    {
        //接受查询分类
        $keyword = YII::$app->request->get('1');
        $new_key = YII::$app->request->get('2');
        if ($new_key) {
            foreach ($new_key as $key => $value) {
                $keyword[$key] = $value;
            }
        }
    	$models_go 	= new  MerBase;
        $pages      = new Pagination([
            'defaultPageSize'   => 12,
            'totalCount'        => MerBase::find()->count(),
        ]);
    	$mers		= $models_go->getMerInfo($pages);
        $data = $this->common();
        return $this->render('index',
        		[
        			'data'	  => $data,
                    'keyword' => $keyword,
        			'mers'	  => $mers,
                    'pages'   => $pages,
        		]);
    }
    /*
     * @inheritdoc 商家详细信息
     */
    public function actionDetails()
    {
        if (Yii::$app->request->isGet)
        {
            $mer_id         = Yii::$app->request->get('mer_id');
            $model          = new MerBase;
            $mer_details    = $model->getDetail($mer_id);
        }
    	return $this->render('details',['mer_details'=>$mer_details]);
    }
}
