<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
//use OSS;
use common\components\Oss;
/**
 * 关于我们
 */
class AaController extends BaseController
{
    public function actionIndex()
    {

    	//include "../../vendor/aliyuncs/oss-sdk-php/src/OSS/OssClient.php";
    	//$OSS = new \OSS\OssClient(Yii::$app->params['oss-config']['OSS_ACCESS_ID'], Yii::$app->params['oss-config']['OSS_ACCESS_KEY'],Yii::$app->params['oss-config']['OSS_ENDPOINT']);
        Oss::upload('images/1.jpg', '1.jpg',__FILE__);
        echo OSS::getUrl('images/1.jpg');die;
		//$file = $OSS->uploadFile('welcomedcoffee',"1.jpg", __FILE__);
    	//var_dump($file);DIE;
        return $this->render('index');
    }

}
