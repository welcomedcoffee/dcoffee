<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
/**
 * 用户控制台
 */
class BaseController extends Controller
{
	
    /**
     * 自定义成功跳转
     * @params $msg  提示信息
     * @params $redirct 跳转地址
     */
    protected function success($msg, $redirect = [])
    {
        Yii::$app->getSession()->setFlash('success', $msg, true);
        if (! $redirect) $redirect = [$this->id.'/'.$this->action->id];
        $this->redirect($redirect);
    }

    /**
     * 自定义错误跳转
     * @params $msg  提示信息
     * @params $redirct 跳转地址
     */
    public function error($msg, $redirect = [])
    {
        Yii::$app->getSession()->setFlash('error', $msg, true);
        if (! $redirect) $redirect = [$this->id.'/'.$this->action->id];
        $this->redirect($redirect);
    }
}