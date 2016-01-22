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
class StudentController extends Controller
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

        return $this->render('info',[
                        'model' => $students,
                        'student' => $student,
                        'provinces'=>$provinces,
                        'city'=>$citys,
                        'area'=>$areas,
        ]);
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
        return $this->render('security');
    }
     //修改密码
    public function actionStudentsave()
    {
        return $this->render('studentsave');
    }
    //我的余额
    public function actionBalance()
    {
        return $this->render('balance');
    }

}
