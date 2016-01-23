<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
/**
 * 后台控制器基础类
 */
class BaseController extends Controller
{
    /**
     * @inheritdoc
     */
    public $layout = false;
}