<?php
/**
 * Created by PhpStorm.
 * User: 解科
 * Date: 2016/1/22
 * Time: 14:00
 */
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use app\models\part\FinRegion;
use frontend\models\store\MerType;
use frontend\models\store\MerchantBase;

/**
 *  门店
 */
class StoreController extends BaseController
{
	public $enableCsrfValidation = false;
	/* 门店首页 */
    public function actionIndex()
    {
		$model     = new MerchantBase();
		$session   = Yii::$app->session;
		$session ->open();
		$mer_id    = $session -> get('user_id') ? $session->get('user_id'):1;

		$model     = $model->findOne($mer_id);
		//获取分类
		$MerType   = new MerType();
		$type      = $MerType -> getType();
		$childtype = $MerType -> getChildType($model->ind_type);

		/* 查询省份 */
		$region    = new FinRegion();
		$province  = $region->getProvince();
		//print_r($model);die;
		//print_r($model->mer_province);die;
		$citys     = $region->getRegion($model->mer_province);
		//print_r($citys);die;
		$areas     = $region->getRegion($model->mer_city);

		//是否被修改
		$is_update = Yii::$app->request->get("re");
        return $this->render('index',[
										'model'    =>$model,
										'province' =>$province,
										'citys'    =>$citys,
										'areas'    =>$areas,
										'type'     =>$type,
										'childtype'=>$childtype,
										'is_update'=>$is_update
                                    ]);
    }

    /**
     * 接受临时文件
     */
    public function actionUpload()
    {
    	if(count($_FILES) > 0)
		{
			$f = $_FILES['file'];
			$filename = 'upload/' . md5(uniqid(rand())) . '_' . $f['name'];
			move_uploaded_file($f['tmp_name'], $filename);
			echo "/".$filename;
		}
		else
		{
			echo 'no files';
		}

    }

    /**
     * @return string
     * 获取地区信息
     */
    public function actionRegion()
    {
		$region_id = Yii::$app->request->get("region_id");
		$type      = Yii::$app->request->get("type");
		$region    = new FinRegion();
		$getregion = $region->getRegion($region_id);
		$option    = "";
        foreach($getregion as $k=>$v)
        {
            $option.="<option class='".$type."' value='".$v['region_id']."'>".$v['region_name']."</option>";
        }
        echo $option;
    }
    /**
     * @return string
     * 获取子行业分类
     */
    public function actionMertype()
    {
		$type_id = Yii::$app->request->get("type_id");
		$Mertype = new Mertype();
		$type    = $Mertype->getChildType($type_id);
		$option  = "";
        foreach($type as $k=>$v)
        {
            $option.="<option value='".$v['type_id']."'>".$v['type_name']."</option>";
        }
        echo $option;
    }

    /**
     * 修改商家信息
     */
    public function actionUpdate()
    {
		$MerchantBase = new MerchantBase();
		$data = Yii::$app->request->post();

		$session = Yii::$app->session;
		$session ->open();
		$mer_id  = $session -> get('user_id') ? $session->get('user_id'):1;
		$model   = $MerchantBase->findOne($mer_id);
		$model   -> setAttributes($data['MerchantBase']);
		$model   -> setAttributes($data);
		$model   -> validate();
		$re = $model ->save();
		//print_r(Yii::$app->request->post());die;
		if ($re) {
			$this->redirect(array('/store/index','re'=>$re));
		}

    }
}