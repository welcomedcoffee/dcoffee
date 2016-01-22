<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

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
	/*首页*/
    public function actionIndex()
    {
    	/*分类*/
    	$models_ty 	= new MerType;
    	$types 		= $models_ty->getType();
    	/*商圈*/
    	$models_cir = new Circles;
    	$circles 	=  $models_cir->getCircle();
    	/*优质商家*/
    	$models_go 	= new  MerBase;
    	$mers		= $models_go->getMerInfo();
        return $this->render('index',
        		[
        			'types'		=>$type,
        			'circles'	=>$circles,
        			'mers'		=>$mers,
        		]);
    }
    /*商家详细信息*/
    /*public function actionDetails()
    {
    	$mer_id 	= Yii::$app->request->get('mer_id');
    	$model 		= new MerBase;
    	$mer_detail = $model->getDetail($mer_id);
    	return $this->render();
    }*/

}
