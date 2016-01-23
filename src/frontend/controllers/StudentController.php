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
        return $this->render('headportrait');
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
        $type = Yii::$app->request->get('type','pwd');
        return $this->render('studentsave',[
                        'type' => $type
        ]);
    }
    //我的余额
    public function actionBalance()
    {
        return $this->render('balance');
    }

}
