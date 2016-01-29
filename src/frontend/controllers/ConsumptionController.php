<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\consumption\Merchant;
use frontend\models\consumption\Comment;
use frontend\models\consumption\GoodsOrder;
use frontend\models\consumption\Bill;
use frontend\models\consumption\Payment;
use common\components\CreateExcel;
use frontend\models\consumption\Preferential;
use app\models\part\FinRegion;
use frontend\models\store\MerType;
use frontend\models\store\MerchantBase;
use yii\data\Pagination;
use backend\models\student\Code;
use backend\models\student\User;
use backend\models\student\PayOrder;
/**
 * 消费商家
 */
class ConsumptionController extends BaseController
{
	//消费商家首页展示
    public function actionIndex()
    {
		$user_id = 1;
		$merchant = new Merchant;
		$base = $merchant->getMerchant($user_id);
		//if(empty($base)){
		//	echo 123;die;
		//}
		$order = new GoodsOrder;
		//待处理退款订单
		$goodsOrder['processed'] = $order->getOrder($user_id,5);
		//print_r($goodsOrder['processed']);die;
		//全部订单
		$goodsOrder['all'] = $order->getOrder($user_id);
		//完成订单
		$goodsOrder['complete'] = $order->getOrder($user_id,4);
		//取消订单
		$goodsOrder['cancel'] = $order->getOrder($user_id,2);
		//退款订单
		$goodsOrder['refund'] = $order->getOrder($user_id,3);
		//消费总额
		$goodsOrder['allmoney'] = $order->getAllmoney($user_id);
		//成功订单的详细信息
		$endtime = strtotime(date('Y-m-d' ,strtotime('-2 month')));
		$pagination = new Pagination([
            'defaultPageSize' => 1,
            'totalCount' => $order->find()->where(['and',['merchant_id'=>$user_id,'order_status'=>4]])->andWhere(['>','order_addtime',$endtime])
			->andWhere(['<','order_addtime',time()])->count(),
        ]);
		$orderlist = $order->getComplete($user_id,$pagination);
		//print_r($orderlist);die;
        return $this->render('index',['data'=>$base,'order'=>$goodsOrder,'pagination' => $pagination,'orderlist'=>$orderlist]);
    }
	//优惠活动
	public function actionPreferential()
	{
		$user_id = 1;
		$preferential = new Preferential;
		$list = $preferential->find()
							->where(['merchant_id'=>$user_id])
							->orderBy('addtime desc')
							->all();
		if(!empty($list)){
			foreach($list as $k=>$v){
				if($v->preferential_type == 1){
					$v->preferential_content = explode(',',$v->preferential_content);
				}
			}
		}
		return $this->render('preferential',['list'=>$list,'preferential'=>$preferential]);
	}
	//添加优惠活动
	public function actionSavepreferential()
	{
		$data = Yii::$app->request->post('Preferential');
		$data['merchant_id'] = 1;
		$data['preferential_start']  = strtotime($data['preferential_start']);
		$data['preferential_end']  = strtotime($data['preferential_end']);
		$data['addtime'] = time();
		$preferential = new Preferential;
		$preferential -> attributes = $data;
		if($preferential->save()){
			$this->redirect(['consumption/preferential']);
		}else{
			$this->error('对不起,您添加的活动失败了！！', ['consumption/preferential']);
		}
	}
	//充值页面
	public function actionChong()
	{
		return $this->render('chong');
	}
	//限额申请页面
	public function actionLimimoney()
	{
		return $this->render('limimoney');
	}
	//对账单
	public function actionBill()
	{
		$user_id = 1;
		@$bill_id = Yii::$app->request->get('bill_id');
		$bills = new Bill;
		$bill = $bills->getBill($user_id);
		if(empty($bill_id)){
			$bill_id = $bills->getBillid()->bill_id;
		}
		$bill_list = $bills->getBillList($bill_id);
		return $this->render('bill',['bill'=>$bill,'bill_id'=>$bill_id,'bill_list'=>$bill_list]);
	}
	//导出商家明细
	public function actionDownload()
	{
		$user_id = 1;
		$bill_cycle = Yii::$app->request->get('bill_cycle');
		$bill_cycle = explode('至',$bill_cycle);
		$start_time = $bill_cycle[0];
		$end_time = $bill_cycle[1];
		$pay = new Payment;
		$data=$pay->find()
			->select(['payment_type','payment_addtime','payment_money','payment_note','payment_way'])
			->where(['user_id'=>$user_id])
			->andWhere(['>','payment_addtime',strtotime($start_time)])
			->andWhere(['<','payment_addtime',strtotime($end_time)])
			->asArray()
			->all();
		if(empty($data)){
			$this->error('您要导出的数据不存在！', ['consumption/bill']);
		}else{
			foreach($data as $k=>$v){
				if($v['payment_type']==1){
					$data[$k]['payment_type'] = '支出';
				}else{
					$data[$k]['payment_type'] = '支入';
				}
				$data[$k]['payment_addtime'] = date('Y-m-d H:i:s',$v['payment_addtime']);
				if($v['payment_way']==1){
					$data[$k]['payment_way'] = '趣币';
				}else{
					$data[$k]['payment_way'] = '支付宝';
				}
			}
		}
		
		$excel = new CreateExcel();
		$excel->createByArray($data,'商家支入支出记录',['支入/支出','时间','金钱','备注','操作途径']);
	}
	//导出消费明细
	public function actionDownloads()
	{
		$user_id = 1;
		$bill_cycle = Yii::$app->request->get('bill_cycle');
		$bill_cycle = explode('至',$bill_cycle);
		$start_time = $bill_cycle[0];
		$end_time = $bill_cycle[1];
		$order = new GoodsOrder;
		$order = $order->find()
			->where(['and',['merchant_id'=>$user_id,'order_status'=>4]])
			->select(['order_sn','user_name','user_phone','order_amount','order_price','order_pay_time'])
			->andWhere(['>','order_pay_time',strtotime($start_time)])
			->andWhere(['<','order_pay_time',strtotime($end_time)])
			->asArray()
			->all();
		if(empty($order)){
			return $this->error('您要导出的数据不存在！', ['consumption/bill']);
		}
		foreach($order as $k=>$v){
			$order[$k]['order_pay_time'] = date('Y-m-d H:i:s',$v['order_pay_time']);
		}
		$excel = new CreateExcel();
		$excel->createByArray($order,'消费信息',['订单号','用户名','用户电话','实付金额','应付金额','支付时间']);
	}
	//我的订单
	public function actionOrder()
	{
		$user_id = 1;
		$endtime = strtotime(date('Y-m-d' ,strtotime('-2 month')));
		@$ss=Yii::$app->request->get('ss');
		$order = new GoodsOrder;
		if(!empty($ss)){
			$pagination = new Pagination([
				'defaultPageSize' => 1,
				'totalCount' => $order->find()->where(['and',['merchant_id'=>$user_id,'order_sn'=>$ss]])->andWhere(['>','order_addtime',$endtime])
				->andWhere(['<','order_addtime',time()])->count(),
			]);
		}else{
			$pagination = new Pagination([
				'defaultPageSize' => 1,
				'totalCount' => $order->find()->where(['merchant_id'=>$user_id])->andWhere(['>','order_addtime',$endtime])
				->andWhere(['<','order_addtime',time()])->count(),
			]);
		}
		$orderlist = $order->getAllorder($user_id,$pagination,$ss);
		return $this->render('order',['orderlist'=>$orderlist,'pagination'=>$pagination]);
	}
	//订单状态修改
	public function actionSaveorder()
	{
		$user_id = 1;
		$order_status = Yii::$app->request->get('order_status');
		if($order_status != 3 && $order_status != 6){
			 $this->error('订单状态异常', ['consumption/order']);
		}
		//$order = new GoodsOrder;
		$order = GoodsOrder::find()
			->where(['merchant_id'=>$user_id])
			->one();
		
		$order->order_status = $order_status;
		if($order->save() ){
			$this->success('订单状态修改成功',['consumption/order']);
		}else{
			$this->error('订单状态修改失败', ['consumption/order']);
		}
	}
	//订单评论
	public function actionComment()
	{
		$user_id = 1;
		$comment = new Comment;
		$pagination = new Pagination([
				'defaultPageSize' => 1,
				'totalCount' => $comment->find()->where(['and',['model_id'=>$user_id,'comment_type'=>1,'comment_status'=>1]])->count(),
			]);
		$commentlist = $comment->getComment($user_id,$pagination);
		return $this->render('comment',['comment'=>$commentlist,'pagination'=>$pagination]);
	}
	//基本资料
	public function actionBasedata()
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
        return $this->render('basedata',[
										'model'    =>$model,
										'province' =>$province,
										'citys'    =>$citys,
										'areas'    =>$areas,
										'type'     =>$type,
										'childtype'=>$childtype,
										'is_update'=>$is_update
                                    ]);
	}
	//账户安全
	public function actionSecurity()
	{
		//获取用户id
        //$session = Yii::$app->session;
        //$user_id = $session->get('user_id');
        $user_id = 1;
        $merchants = new Merchant;
        $merchant = $merchants -> getMerchant($user_id);
        $merchant->mer_phone = substr_replace($merchant->mer_phone, '****', 3,4);
		return $this->render('security',['merchant'=>$merchant]);
	}
	//修改账户信息
	public function actionMerchantsave()
	{
		
        //获取用户id
        //$session = Yii::$app->session;
        //$user_id = $session->get('user_id');
        $user_id = 1;
        $merchants = new Merchant;
        $merchant = $merchants -> getMerchant($user_id);
        //获取要修改的类型
        $type = Yii::$app->request->get('type','pwd');
        return $this->render('merchantsave',[
                        'type' => $type,
                        'merchant' => $merchant,
        ]);
	}
	/*
    *   发送验证码
    */
    public function actionCodes()
    {
        $code = new Code();
        $request = Yii::$app->request;
        $phone = $request->post('phone');
        echo $code->getCode($phone);
    }
    /*
    * 验证手机的验证码
    */
    public function actionValidationcodes()
    {
        $phone=Yii::$app->request->post('phone');
        $codes=Yii::$app->request->post('code');
        $code = new Code();
        $re = $code->getUsercode($phone);
        if($re == ''){
            echo 1;
        }else if($re == $codes){
            echo 2;
        }else{
            echo 3;
        }
    }
    /*
    * 手机号码是否存在
    */
    public function actionUserphone()
    {   
        $request = Yii::$app->request->post();
        $User = new User;
        $res = $User -> phone($request['phone']);
        if ($res) {
            echo '1';//存在
        }else{
            echo '2';//不存在
        }
    }
    /*
    * 获取用户表密码是否正确
    */
    public function actionUserpwd()
    {   
        $request = Yii::$app->request->post();
        $User = new User;
        $res = $User -> password($request['id'],md5($request['password']));
        if ($res) {
            echo '1';
        }else{
            echo '2';
        }
    }
    /*
    * 修改密码
    */
    public function actionPwd()
    {
        $request = Yii::$app->request->post();
        //修改用户密码
        if ($request['type'] == 'pwd') {
             if(!empty($request['oldpassword']) && !empty($request['password']) && !empty($request['ispassword'])){
                $User = new User;
                $re = $User -> password($request['mer_id'],md5($request['oldpassword']));
                if ($re) {
                    preg_match('/\w{5,17}/',$request['password'],$str);
                    preg_match('/\w{5,17}/',$request['ispassword'],$strs);
                    //验证是否合法
                    if ($str && $strs) {
                        //验证密码密码是否一致
                        if ($request['password'] == $request['ispassword']) {
                            //修改支付密码
                            $user = User::findOne($request['mer_id']);
                            $user -> user_password = md5($request['ispassword']);
                            $res = $user -> save();
                            if ($res) {
                                    $this->success('修改成功!',['consumption/security']);
                                }else{
                                    $this->error('修改失败!',['consumption/merchantsave']);
                                }
                        }else{
                            $this->error('密码与确认密码不一致请重新输入!',['consumption/merchantsave']);
                        }
                    }else{
                        $this->error('密码必须6-18位!',['consumption/merchantsave']);
                    }
                }else{
                    $this->error('旧密码错误!',['consumption/merchantsave']);
                }
             }else{
                $this->error('数据不能为空!',['consumption/merchantsave']);
             }
        //修改支付密码
        }else if($request['type'] == 'pay'){
            if(!empty($request['paypassword']) && !empty($request['ispaypassword']) && !empty($request['code']) && !empty($request['mer_id'])){
                    preg_match('/\w{5,17}/',$request['paypassword'],$str);
                    preg_match('/\w{5,17}/',$request['ispaypassword'],$strs);
                    //验证是否合法
                    if ($str && $strs) {
                        //验证密码密码是否一致
                        if ($request['paypassword'] == $request['ispaypassword']) {
                            //验证验证码是否合法
                            $code = new Code();
                            $code = $code->getUsercode($request['str_phone']);
                            if($code ==$request['code']){
                                //修改支付密码
                                $merchant = Merchant::findOne($request['mer_id']);
                                $merchant -> mer_paypassword = md5($request['ispaypassword']);
								print_R($nerchant);die;
                                $res = $merchant -> save();
                                if ($res) {
                                    $this->success('修改成功!',['consumption/security']);
                                }else{
                                    $this->error('修改失败!',['consumption/merchantsave']);
                                }
                            }else{
                                $this->error('验证码错误!',['consumption/merchantsave']);
                            }
                            
                        }else{
                            $this->error('密码与确认密码不一致请重新输入!',['consumption/merchantsave']);
                        }
                    }else{
                        $this->error('密码必须6-18位!',['consumption/merchantsave']);
                    }
            }else{
                $this->error('数据不能为空!',['consumption/merchantsave']);
            }
        //手机验证
        }else if($request['type'] == 'phone'){
            if(!empty($request['phone']) && !empty($request['code'])){
                 $User = new User;
                 $re = $User -> phone($request['phone']);
                if (!$re) {
                    preg_match('/(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}/',$request['phone'],$str);
                    //验证是否合法
                    if ($str) {
                        //修改支付密码
                        $user = User::findOne($request['mer_id']);
                        $user -> user_phone = $request['phone'];
                        $res1 = $user -> save();
                        $user = Merchant::findOne($request['mer_id']);
                        $user -> mer_phone = $request['phone'];
                        $res2 = $user -> save();
                        if ($res1 && $res2) {
                                $this->success('修改成功!',['consumption/security']);
                            }else{
                                $this->error('修改失败!',['consumption/merchantsave']);
                            }
                    }else{
                        $this->error('手机号码格式不正确!',['consumption/merchantsave']);
                    }
                }else{
                    $this->error('手机号码已存在!',['consumption/merchantsave']);
                }
             }else{
                $this->error('数据不能为空!',['consumption/merchantsave']);
             }
        }
    }
	//账户余额
	public function actionLimoney()
	{
		//获取用户id
        //$session = Yii::$app->session->get('userinfo');
        //$user_id = $session['user_id'];
		$user_id = 1;
        $merchant = new Merchant;
        $merchant = $merchant -> getMerchant($user_id);
        $Payment = new Payment;
        $pagination = new Pagination([
            'defaultPageSize' => 8,
            'totalCount' => $Payment -> Count($user_id),
        ]);
        $PayList = $Payment -> PayList($user_id,$pagination);
        return $this->render('limoney',[
            'pagination' => $pagination,
            'merchant' => $merchant,
            'paylist' => $PayList
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
			$this->redirect(array('/consumption/basedata','re'=>$re));
		}

    }
	/**
     *  支付
     */
    public function actionPay()
    {
        $session = Yii::$app->session->get('userinfo');
        $user_id = $session['user_id'];
        $price = YII::$app->request->post('price');
        // 生成订单
        $Order = new PayOrder;
        $Order->order_sn      = uniqid();
        $Order->user_id       = $user_id;
        $Order->order_addtime = time();
        $Order->order_price  = $price;
        $re   = $Order->save();
        $order_id = Yii::$app->db->getLastInsertID();
        $this->redirect(['/alipay/index','order_id'=>$order_id]);
    }
}
