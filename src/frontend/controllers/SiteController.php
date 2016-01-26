<?php
/**
 * Created by PhpStorm.
 * User: 班未军
 * Date: 2016/1/21
 * Time: 14:00
 */
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\user\Qyuser;
use app\models\user\User;
use app\models\user\Lguser;
use app\models\part\FinRegion;
/**
 * Site controller
 */
class SiteController extends BaseController
{    
    private $request;

    public function init() {
        parent::init();
       $this->request = Yii::$app->request; 
       $session = Yii::$app->session;
       if (!$session->isActive){
            $session->open();            
       }       
    }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
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
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return 首页
     */
    public function actionIndex()
    {   
<<<<<<< HEAD
        $cache = \Yii::$app->cache; 
        if(!$cache->get('city')){       
=======
        $cache = \Yii::$app->cache;
        if(! $cache->get('city')){      
>>>>>>> 953f0aa7c9f7be771a6c131c2b4896c85367ad3b
            $Region = new FinRegion;
            $dependency = new \yii\caching\FileDependency(['fileName' => 'example.txt']);
            $regionval = $Region->getProvince();
            $cache->set('city', json_encode($regionval,JSON_UNESCAPED_UNICODE), 3600, $dependency);
        }              
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return 登陆
     */
    public function actionLogin()
    {        
        $model = new Lguser;        
        if ($model->load(Yii::$app->request->post())) {
            if($model->validate()){
                $User = new User;
                if ($userinfo = $User->Checklgin($this->request->post('Lguser'))) {
                   if($userinfo['code']==1){                   
                        $this->actionTotrans('成功', '个人主页', 'student/index', $userinfo);
                    }else{                     
                        $this->actionTotrans('错误', '返回', 'site/login', $userinfo);
                    }                       
                }            
                //return $this->goBack();
            }else {
                $errors = $model->errors;
                if(count($errors)>1){                    
                    $user = array('code' => 5, 'data' => '非法注册，请通过正确途径注册');
                    $this->actionTotrans('错诶', '登陆页', 'site/login', $user);
                }else{
                    $val = array_values($errors);
                    $user = array('code' => 6, 'data' => $val[0][0]);
                    $this->actionTotrans('错诶', '登陆页', 'site/login', $user);
                }                
            }
        } 
        return $this->render('login', [
                'model' => $model,
            ]);
    }

    /**
     * Logs out the current user.
     *
     * @return 退出
     */
    public function actionLogtuichu()
    {   
        $session = Yii::$app->session;
        $session->remove('userinfo');
        $session->destroy();  
        $user = array('code' => 1, 'data' =>'退出成功');        
        $this->actionTotrans('退出', '登陆页', 'site/login', $user);
    }

    /**
     * Displays contact page.
     *
     * @return 选择地址
     */
    public function actionAddress()
    {
        $arr = $this->request->post();
        $cookies = Yii::$app->response->cookies;    //获取Yii\web\Controller

        $cookies->add(new \yii\web\Cookie([         //存入cookie 有多个值 需存二维数组
            'name' => 'city',
            'value' => $arr
        ])); 

        $cook = Yii::$app->request->cookies;
        if($cook->has('city')){
            return json_encode(['code' => 1, 'data' => '存入cookie']);
        }else{
            return json_encode(['code' => 2, 'data' => '存入cookie失败']);
        }
        
    }

    /**
     * Displays about page.
     *
     * @return 关于我
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return 学生注册
     */
    public function actionSignup()
    {
        $model = new User;      
        if ($model->load(Yii::$app->request->post())) {            
            if ($user = $model->registerUser($this->request->post('User'), $this->request->userIP)) {
                if($user['code']==1){                   
                    $this->actionTotrans('成功', '登陆页', 'site/login', $user);
                }else{                     
                    $this->actionTotrans('错误', '返回', 'site/signup', $user);
                }                 
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }    

    /**
     * Signs user up.
     *
     * @return 企业注册
     */
    public function actionEnterprisesignup()
    {
        $model = new Qyuser;      
        if ($model->load(Yii::$app->request->post())) {
            $User = new User;
            if ($userinfo = $User->registerEnterprise($this->request->post('Qyuser'), $this->request->userIP)) {
               if($userinfo['code']==1){                   
                    $this->actionTotrans('成功', '登陆页', 'site/login', $userinfo);
                }else{                     
                    $this->actionTotrans('错误', '返回', 'site/enterprisesignup', $userinfo);
                }           
            }
        }

        return $this->render('enterprisesignup', [
            'model' => $model,
        ]);
    }

    /**
     *@return 帮助中心
     */
    public function actionHelps(){
         return $this->render('helps');
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /** 
     * @return 跳转提示页面
     */
    public function actionTotrans($title = null, $key = null, $url = null, $user = null){
        $user['title'] = $title?$title:'提示';
        $user['keyname'] = $key?$key:'跳转';
        $user['keyword'] = $url;
        return $this->redirect(['site/transition','info'=>base64_encode(json_encode($user))]);
    }

    /** 
     * @return 提示页面
     */
    public function actionTransition() {        
        $info = json_decode(base64_decode($this->request->get('info')),true);       
        return $this->render('transition', ['res' => $info]);
    }









}
