<?php
/**
 * 王文秀
 * 16-1-22
 *学生模块
 */
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\student\Students;
use backend\models\student\Region;
use backend\models\student\Skills;
use backend\models\student\Code;
use backend\models\student\PayOrder;
use common\components\Get;

class StudentController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    //学生基本信息
    public function actionInfo()
    {
        //获取用户id
        //$session = Yii::$app->session;
        //$user_id = $session->get('user_id');
        $user_id = 1;
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
        //$session = Yii::$app->session;
        //$user_id = $session->get('user_id');
        $user_id = 1;
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
        //$session = Yii::$app->session;
        //$user_id = $session->get('user_id');
        $user_id = 1;
        $students = new Students;
        $student = $students -> HeaderInfo($user_id);
        $str = $student['stu_phone'];
        $get = new Get;
        return $get -> get_oss($str);
    }
    //商品订单
    public function actionGoodsorder()
    {
        return $this->render('goodsorder');
    }
    //兼职订单
    public function actionPartorder()
    {
        return $this->render('partorder');
    }
    //我的评论
    public function actionComment()
    {
        return $this->render('comment');
    }
    //账户安全
    public function actionSecurity()
    {
        //获取用户id
        //$session = Yii::$app->session;
        //$user_id = $session->get('user_id');
        $user_id = 1;
        $students = new Students;
        $student = $students -> HeaderInfo($user_id);
        $student['stu_phone'] = substr_replace($student['stu_phone'], '****', 3,4);
        return $this->render('security',['student' => $student]);
    }
     //修改密码
    public function actionStudentsave()
    {
        //获取用户id
        //$session = Yii::$app->session;
        //$user_id = $session->get('user_id');
        $user_id = 1;
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
    //我的余额
    public function actionBalance()
    {
        return $this->render('balance');
    }
    /**
     *  支付
     */
    public function actionPay()
    {
        //$session = Yii::$app->session;
        //$user_id = $session->get('user_id');
        $user_id = 1;
        $price = YII::$app->request->post('price');
        // 生成订单
        $Order = new PayOrder;
        $Order->order_sn      = uniqid();
        $Order->user_id       = $user_id;
        $Order->order_addtime = time();
        $Order->order_price  = $price;
        $re   = $Order->save();
        $order_id = Yii::$app->db->getLastInsertID();
        /*$coin     = YII::$app->request->get('coin');
        $session  = yii::$app->session;
        $session  ->open();
        $user_id  = $session->get("user_id");
        $user     = User::find()->where("user_id=$user_id")->one();

        if ($user->user_virtual < $coin) {
            echo "数据异常";die;
        }
        $order = CourseOrder::findOne($order_id);
        $order ->coinAmount = $coin;
        if ($order ->price_amount - $coin<0) {
            $order ->amount = 0;
        }else{
            $order ->amount = $order ->price_amount - $coin;
        }
        $order ->save();*/

       /* //判断用户是否还需要支付现金
        if ($order ->amount == 0) {
            $user->user_virtual = $user->user_virtual-$coin;
            $user->save();
            //
            $order = CourseOrder::findOne($order_id);
            $order->order_status = 1;
            $order->save();
            $order_id = $order->order_id;
            $user_id  = $order->user_id;
            if ($order->type=='course') {
                $courses = CourseOrderInfo::find()->where("order_id=$order_id")->asArray()->all();
                foreach ($courses as $key => $course) {
                    $result = UserCourse::AddCourse($user_id,$course['course_id']);
                }
            }
            echo "购买成功";die;
        }*/
        $this->redirect(['/alipay/index','order_id'=>$order_id]);
    }

}
