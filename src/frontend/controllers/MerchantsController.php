<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\students\MerType;
use frontend\models\students\Circles;
use frontend\models\students\MerBase;
use frontend\models\students\Region;
use frontend\models\consumption\Comment;
use backend\models\student\PayOrder;
use app\models\students\Students;

/**
 * 优质商家
 */
class MerchantsController extends BaseController
{
	/*
     * @inheritdoc 首页
     */
    public function actionIndex()
    {
        $models_ty  = new MerType;      //实例化分类
        $models_go  = new MerBase;     //商家
        $models     = new Region;     //城市
        $types      = $models_ty->getType();
        $region_id  = '52';
        $regions    = $models->getRegion($region_id);
        //接受查询分类
        $keyword    = Yii::$app->request->get('1');
        $new_key    = Yii::$app->request->get('2');
        if ($new_key) 
        {
            foreach ($new_key as $key => $value) 
            {
                $keyword[$key] = $value;
            }
        }
    	$mers		= $models_go->getMerchants($keyword);
        $pages      = $mers['pages'];
        unset($mers['pages']);
        if (empty($keyword['type'])) {
            $keyword['type'] = 0;
        }
        if (empty($keyword['region'])) {
            $keyword['region'] = 0;
        }
        return $this->render('index',
        		[
        			'types'	  => $types,
                    'keyword' => $keyword,
        			'mers'	  => $mers,
                    'pages'   => $pages,
                    'regions' => $regions,
        		]);
    }
    /*
     * @inheritdoc 商家详细信息
     */
    public function actionDetails()
    {
        if (Yii::$app->request->isGet)
        {
            $modelsDetail  = new MerBase;   //实例化商家信息
            $modelsComment = new Comment;  //实例化评论
            $modelsUser    = new Students;//实例化用户信息
            $mer_id        = Yii::$app->request->get('mer_id');
            $mer_details   = $modelsDetail->getDetail($mer_id);
            $comments      = $modelsComment->getUserComment($mer_id);
            $pages         = $comments['pages'];
            unset($comments['pages']);
            foreach ($comments as $key => $comment) {
                $user_id         = $comment['user_id'];
                $comments[$key]['img'] = $modelsUser->getStuDetails($user_id);
            }
            $mer_id        = $mer_details['mer_id'];
            $session       = yii::$app->session;
            $session->set('mer_id',$mer_id);
            return $this->render('details',
                    [
                        'mer_details' => $mer_details,
                        'comments'    => $comments,
                        'pages'       => $pages,
                    ]);
        }
    	
    }
    /*
     * @inheritdoc  支付信息
     */
    public function actionPay()
    {
        $modelDetail= new MerBase; //实例化商家信息
        $modelStu   = new Students; //实例化学生
        $session    = yii::$app->session;
        $mer_id     = $session->get('mer_id');
        $user_info  = $session->get('userinfo');
        $payDetail  = $modelDetail->getSmall($mer_id);
        $user       = $modelStu->getPassword($user_info['user_id']);
        return $this->render('payment',['payDetail'=>$payDetail,'user'=>$user]);
    }
    /*
     * @inheritdoc 确认支付
     */
    public function actionConfirms()
    {
        $models     = new PayOrder;  //实例化订单
        $students   = new Students; //实例化学生
        $request    = yii::$app->request;
        $session    = yii::$app->session->get('userinfo');
        $user_id    = $session['user_id'];
        $user       = $students->getStuDetails($user_id);
        $Realpay    = $request['costTotal']-$request['stu_money'];
        $models->order_sn      = uniqid();
        $models->user_id       = $user_id;
        $models->user_name     = $user['stu_name'];
        $models->user_phone    = $session['user_phone'];
        $models->merchant_id   = $request['mer_id'];
        $models->merchant_name = $request['mer_name'];
        $models->order_amount  = $Realpay;
        $models->order_addtime = time();
        $models->order_price   = $request['costTotal'];
        $res   = $models->save();
        if ($res) {
            return ;
        }

        $this->redirect(['/alipay/index','order_id'=>$order_id]);  
    }
}
