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

/**
 *  门店
 */
class StoreController extends BaseController
{
	public $enableCsrfValidation = false;
	/* 门店首页 */
    public function actionIndex()
    {
        return $this->render('index');
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
			echo $filename;
		}
		else
		{
			echo 'no files';
		}
    }
11545454445454

}