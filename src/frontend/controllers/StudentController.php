<?php
/**
 * 王文秀
 * 16-1-22
 *学生模块
 */
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use common\components\Get;
use backend\models\student\Code;
use backend\models\student\User;
use backend\models\student\Region;
use backend\models\student\Skills;
use backend\models\student\Comment;
use backend\models\student\Payment;
use backend\models\student\PayOrder;
use backend\models\student\Students;
use backend\models\student\GoodsOrder;
use backend\models\student\ParttimeOrder;
use app\models\part\FinPartType;
use app\models\part\FinJobDetails;

class StudentController extends BaseController
{
    public function actionIndex()
    {
        //获取用户id
        $session = Yii::$app->session->get('userinfo');
        $user_id = $session['user_id'];
        $where = ['=','user_id',$user_id];
        $GoodsOrder = new GoodsOrder;
        $paginations = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $GoodsOrder -> Count($where),
        ]);
        $Gorder = $GoodsOrder -> Gorder($where,$paginations);
        $ParttimeOrder = new ParttimeOrder;
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $ParttimeOrder -> Count($where),
        ]);
        $Porder = $ParttimeOrder -> Porder($where,$pagination);
        $FinPartType = new FinPartType;
        $type = $FinPartType -> partComment();
        $FinJobDetails = new FinJobDetails;
        $part = $FinJobDetails -> getPart();
        return $this->render('index',[
                            'gorder' => $Gorder,
                            'porder' => $Porder,
                            'type' => $type,
                            'part' => $part
            ]);
    }
    //学生基本信息
    public function actionInfo()
    {
        //获取用户id
        $session = Yii::$app->session->get('userinfo');
        $user_id = $session['user_id'];
        $students = new Students;
        $student = $students -> Info($user_id);
        $region = new Region();
        //省
        $province = $region->getProvince();
        if(empty($province)){
            $provinces['']='请选择';
        }else{
            foreach($province as $k=>$v){
                $provinces[$v['region_id']] = $v['region_name'];
            }
        }
        //城市
        $city = $region->getCity($student['province_id']);
        if(empty($city)){
            $citys[''] = '请选择';
        }else{
            foreach($city as $k=>$v){
                $citys[$v['region_id']] = $v['region_name'];
            }
        }
        //县
        $area = $region->getArea($student['city_id']);
        if(empty($area)){
            $areas[''] = '请选择';
        }else{
            foreach($area as $k=>$v){
                $areas[$v['region_id']] = $v['region_name'];
            }
        }
        //查询技能表
        $skills = new Skills;
        $skill = $skills -> getSkills();
        $skills_id = explode(',', $student['skills_id']);
        //该用户有哪些技能
        foreach ($skill as $k => $v) {
            $skill[$k]['is_checked'] = 0;
            foreach ($skills_id as $kk => $vv) {
                if ($v['skills_id'] == $vv) {
                    $skill[$k]['is_checked'] = 1;
                }
            }
        }
        return $this->render('info',[
                        'student' => $student,
                        'provinces'=>$provinces,
                        'city'=>$citys,
                        'area'=>$areas,
                        'skills'=>$skill,
        ]);
    }
    //头像
    public function actionHeadportrait()
    {
        //获取用户id
        $session = Yii::$app->session->get('userinfo');
        $user_id = $session['user_id'];
        $students = new Students;
        $student = $students -> HeaderInfo($user_id);
        return $this->render('headportrait',[
                        'student' => $student,
        ]);
    }
    //修改头像
    public function actionHeaderupdate(){
        $data=Yii::$app->request->post();
        $students = new Students;
        $students = $students->findOne($data['stu_id']);
        $students->stu_avatar = $data['stu_avatar'];
        if ($students->save()) {
            $this->success('修改成功!',['student/info']);
        }else{
            $this->error('修改失败!',['student/info']);
        }
    }
    //查询地区
    public function actionRegion()
    {
        $id=Yii::$app->request->post('id');
        $region = new Region();
        $arr = $region->find()->where(['parent_id'=>$id])->asarray()->all();
        echo json_encode($arr);
    }
    //完善或修改个人资料
    public function actionStudentupdate()
    {
        $data=Yii::$app->request->post();
        $students = new Students;
        $students = $students->findOne($data['stu_id']);
        $students->stu_name = $data['stu_name'];
        $students->stu_nickname = $data['stu_nickname'];
        $students->stu_sex = $data['stu_sex'];
        $students->stu_height = $data['stu_height'];
        $students->stu_school = $data['stu_school'];
        $students->stu_professional = $data['stu_professional'];
        $students->stu_code = $data['stu_code'];
        $students->stu_start = strtotime($data['stu_start']);
        $students->stu_end = strtotime($data['stu_end']);
        $students->province_id = $data['province_id'];
        $students->city_id = $data['city_id'];
        $students->area_id = $data['area_id'];
        $students->stu_addr = $data['stu_addr'];
        $students->skills_id = implode(',',$data['skills_id']);
        $students->stu_introduction = $data['stu_introduction'];
        $students->stu_experience = $data['stu_experience'];
        if ($students->save()) {
            $this->success('修改成功!',['student/info']);
        }else{
            $this->error('修改失败!',['student/info']);
        }
    }
     //完善或修改个人资料
    public function actionCard()
    {
        //获取用户id
        $session = Yii::$app->session->get('userinfo');
        $user_id = $session['user_id'];
        $students = new Students;
        $student = $students -> HeaderInfo($user_id);
        $str = $student['stu_phone'];
        $str = 'test';
        $get = new Get;
        return $get -> get_oss($str);
    }
    //商品订单
    public function actionGoodsorder()
    {
        //获取用户id
        $session = Yii::$app->session->get('userinfo');
        $user_id = $session['user_id'];
        $request = Yii::$app->request->post();
        $search['search'] = '';
        $search['type'] = '';
        if ($request) {
            if ($request['type'] == 'order_sn') {
                if ($request['search']) {
                    $where = ['and',['=','user_id',$user_id],['=','order_sn',$request['search']]];
                    $search['search'] = $request['search'];
                    $search['type'] = 'order_sn';
                }else{
                    $where = ['=','user_id',$user_id];
                }
            }elseif ($request['type'] == 'mer_name') {
                if ($request['search']) {
                    $where = ['and',['=','user_id',$user_id],['like','merchant_name',$request['search']]];
                    $search['search'] = $request['search'];
                    $search['type'] = 'mer_name';
                }else{
                    $where = ['=','user_id',$user_id];
                }
            }
        }else{
            $where = ['=','user_id',$user_id];
        }
        $GoodsOrder = new GoodsOrder;
        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $GoodsOrder -> Count($where),
        ]);
        $Gorder = $GoodsOrder -> Gorder($where,$pagination);
        return $this->render('goodsorder',[
            'pagination' => $pagination,
            'gorder' => $Gorder,
            'search' => $search
        ]);
    }
    //兼职订单
    public function actionPartorder()
    {

        //获取用户id
        $session = Yii::$app->session->get('userinfo');
        $user_id = $session['user_id'];
        $request = Yii::$app->request->post();
        $search['search'] = '';
        $search['type'] = '';
        if ($request) {
            if ($request['type'] == 'order_sn') {
                if ($request['search']) {
                    $where = ['and',['=','user_id',$user_id],['=','order_sn',$request['search']]];
                    $search['search'] = $request['search'];
                    $search['type'] = 'order_sn';
                }else{
                    $where = ['=','user_id',$user_id];
                }
            }elseif ($request['type'] == 'mer_name') {
                if ($request['search']) {
                    $where = ['and',['=','user_id',$user_id],['like','mer_name',$request['search']]];
                    $search['search'] = $request['search'];
                    $search['type'] = 'mer_name';
                }else{
                    $where = ['=','user_id',$user_id];
                }
            }elseif ($request['type'] == 'job_name') {
                if ($request['search']) {
                    $where = ['and',['=','user_id',$user_id],['like','job_name',$request['search']]];
                    $search['search'] = $request['search'];
                    $search['type'] = 'job_name';
                }else{
                    $where = ['=','user_id',$user_id];
                }
            }
        }else{
            $where = ['=','user_id',$user_id];
        }
        $ParttimeOrder = new ParttimeOrder;
        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $ParttimeOrder -> Count($where),
        ]);
        $Porder = $ParttimeOrder -> Porder($where,$pagination);
        $FinPartType = new FinPartType;
        $type = $FinPartType -> partComment();
        return $this->render('partorder',[
            'pagination' => $pagination,
            'porder' => $Porder,
            'type' => $type,
            'search' => $search
        ]);
    }
    //我的评论
    public function actionComment()
    {
        //获取用户id
        $session = Yii::$app->session->get('userinfo');
        $user_id = $session['user_id'];
        $GoodsOrder = new GoodsOrder;
        //查询未评论的订单
        $where = ['and',['=','user_id',$user_id],['=','order_status','4']];
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $GoodsOrder -> Ccount($where),
        ]);
        $Gorder = $GoodsOrder -> Corder($where,$pagination);
        //查询已经评论的订单
        $wheres = ['and',['=','user_id',$user_id],['=','order_status','5']];
        $m_id = $GoodsOrder -> Mid($wheres);
        $w = ['model_id' => [$m_id], 'user_id' => $user_id,'comment_type' => '1'];
        $Comment = new Comment;
         $paginationc = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $Comment -> Ccount($w),
        ]);
        $Ccomment = $Comment -> Ccomment($w,$paginationc);
        return $this->render('comment',[
                    'gorder' => $Gorder,
                    'pagination' => $pagination,
                    'comment' => $Ccomment,
                    'paginationc' => $paginationc,
                ]);
    }
    //兼职评论
    public function actionPartcomment()
    {
        //获取用户id
        $session = Yii::$app->session->get('userinfo');
        $user_id = $session['user_id'];
        $ParttimeOrder = new ParttimeOrder;
        //查询未评论的订单
        $where = ['and',['=','user_id',$user_id],['=','order_status','3']];
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $ParttimeOrder -> Ccount($where),
        ]);
        $Porder = $ParttimeOrder -> Corder($where,$pagination);
        //查询已经评论的订单
        $wheres = ['and',['=','user_id',$user_id],['=','order_status','4']];
        $m_id = $ParttimeOrder -> Mid($wheres);
        $w = ['model_id' => [$m_id], 'user_id' => $user_id,'comment_type' => '2'];
        $Comment = new Comment;
         $paginationc = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $Comment -> Ccount($w),
        ]);
        $Ccomment = $Comment -> Ccomment($w,$paginationc);
        return $this->render('partcomment',[
                    'porder' => $Porder,
                    'pagination' => $pagination,
                    'comment' => $Ccomment,
                    'paginationc' => $paginationc,
                ]);
    }
    //要评论商家或兼职
    public function actionOrdercomment()
    {
        //获取用户id
        $session = Yii::$app->session->get('userinfo');
        $user_id = $session['user_id'];
        $request = Yii::$app->request->post();
        $Comment = new Comment;
        $Comment -> user_id = $user_id;
        $Comment -> comment_level = $request['comment_level'];
        $Comment -> comment_content = $request['comment_content'];
        $Comment -> model_id = $request['model_id'];
        $Comment -> comment_addtime = time();
        //兼职
        if ($request['type'] == 'part') {
            $Comment -> comment_type = 2;
            if ($Comment -> save()) {
                $this->success('评论成功!',['student/partcomment']);
            }else{
                $this->error('评论失败!',['student/partcomment']);
            }
        //商品
        }else if ($request['type'] == 'goods') {
            $Comment -> comment_type = 1;
            $Comment -> comment_price = $request['comment_price'];
            if ($Comment -> save()) {
                $this->success('评论成功!',['student/comment']);
            }else{
                $this->error('评论失败!',['student/comment']);
            }
        }

    }
    //账户安全
    public function actionSecurity()
    {
        //获取用户id
        $session = Yii::$app->session->get('userinfo');
        $user_id = $session['user_id'];
        $students = new Students;
        $student = $students -> HeaderInfo($user_id);
        $student['stu_phone'] = substr_replace($student['stu_phone'], '****', 3,4);
        return $this->render('security',['student' => $student]);
    }
     //修改密码
    public function actionStudentsave()
    {
        //获取用户id
        $session = Yii::$app->session->get('userinfo');
        $user_id = $session['user_id'];
        $students = new Students;
        $student = $students -> HeaderInfo($user_id);
        //获取要修改的类型
        $type = Yii::$app->request->get('type','pwd');
        return $this->render('studentsave',[
                        'type' => $type,
                        'student' => $student,
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
                $re = $User -> password($request['stu_id'],md5($request['oldpassword']));
                if ($re) {
                    preg_match('/\w{5,17}/',$request['password'],$str);
                    preg_match('/\w{5,17}/',$request['ispassword'],$strs);
                    //验证是否合法
                    if ($str && $strs) {
                        //验证密码密码是否一致
                        if ($request['password'] == $request['ispassword']) {
                            //修改支付密码
                            $user = User::findOne($request['stu_id']);
                            $user -> user_password = md5($request['ispassword']);
                            $res = $user -> save();
                            if ($res) {
                                    $this->success('修改成功!',['student/info']);
                                }else{
                                    $this->error('修改失败!',['student/studentsave']);
                                }
                        }else{
                            $this->error('密码与确认密码不一致请重新输入!',['student/studentsave']);
                        }
                    }else{
                        $this->error('密码必须6-18位!',['student/studentsave']);
                    }
                }else{
                    $this->error('旧密码错误!',['student/studentsave']);
                }
             }else{
                $this->error('数据不能为空!',['student/studentsave']);
             }
        //修改支付密码
        }else if($request['type'] == 'pay'){
            if(!empty($request['paypassword']) && !empty($request['ispaypassword']) && !empty($request['code']) && !empty($request['stu_id'])){
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
                                $stu = Students::findOne($request['stu_id']);
                                $stu -> stu_pwd = md5($request['ispaypassword']);
                                $res = $stu -> save();
                                if ($res) {
                                    $this->success('修改成功!',['student/info']);
                                }else{
                                    $this->error('修改失败!',['student/studentsave']);
                                }
                            }else{
                                $this->error('验证码错误!',['student/studentsave']);
                            }
                            
                        }else{
                            $this->error('密码与确认密码不一致请重新输入!',['student/studentsave']);
                        }
                    }else{
                        $this->error('密码必须6-18位!',['student/studentsave']);
                    }
            }else{
                $this->error('数据不能为空!',['student/studentsave']);
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
                        $user = User::findOne($request['stu_id']);
                        $user -> user_phone = $request['phone'];
                        $res1 = $user -> save();
                        $user = Students::findOne($request['stu_id']);
                        $user -> stu_phone = $request['phone'];
                        $res2 = $user -> save();
                        if ($res1 && $res2) {
                                $this->success('修改成功!',['student/info']);
                            }else{
                                $this->error('修改失败!',['student/studentsave']);
                            }
                    }else{
                        $this->error('手机号码格式不正确!',['student/studentsave']);
                    }
                }else{
                    $this->error('手机号码已存在!',['student/studentsave']);
                }
             }else{
                $this->error('数据不能为空!',['student/studentsave']);
             }
        }
    }
    //我的余额
    public function actionBalance()
    {
        //获取用户id
        $session = Yii::$app->session->get('userinfo');
        $user_id = $session['user_id'];
        $Students = new Students;
        $student = $Students -> HeaderInfo($user_id);
        $Payment = new Payment;
        $pagination = new Pagination([
            'defaultPageSize' => 8,
            'totalCount' => $Payment -> Count($user_id),
        ]);
        $PayList = $Payment -> PayList($user_id,$pagination);
        return $this->render('balance',[
            'pagination' => $pagination,
            'student' => $student,
            'paylist' => $PayList
        ]);
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
        $Order->order_sn      = '100'.uniqid();
        $Order->user_id       = $user_id;
        $Order->order_addtime = time();
        $Order->order_price  = $price;
        $re   = $Order->save();
        $order_id = Yii::$app->db->getLastInsertID();
        $this->redirect(['/alipay/index','order_id'=>$order_id,'type' => 'STU_PAY']);
    }
}
