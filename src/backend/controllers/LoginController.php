<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\login\LoginForm;
use yii\filters\VerbFilter;
/**
 * 登陆控制
 */
class LoginController extends BaseController
{


    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],

        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            //错误提示
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],

            
        ];
    }
    
    /**
     * 登陆处理及界面
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->renderAjax('login', [
                'model' => $model,
            ]);
        }
    }

    
    /**
     * 退出登陆
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}