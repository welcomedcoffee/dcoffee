<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

/**
 * 兼职机会
 */
class ParttimeController extends BaseController
{
	/*
     * @inheritdoc 公共部分
     */
    public function common()
    {
        $models_ty  = new MerType;
        $types      = $models_ty    ->getType();
        return ['types'=>$types];
    }
    public function actionIndex()
    {
        return $this->render('index');
    }

}
