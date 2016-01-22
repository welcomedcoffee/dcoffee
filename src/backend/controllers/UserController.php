<?php
namespace backend\controllers;

use Yii;
/**
 * 用户
 */
class UserController extends BaseController
{
    /**
     * 企业用户
     */
    public function actionEnterprise()
    {
        return $this->render('enterprise');
    }
    /**
     * 学生用户
     */
    public function actionStudent()
    {
        return $this->render('student');
    }
    /**
     * 管理员用户
     */
    public function actionAdmin()
    {
        return $this->render('admin');
    }
    /**
     * 角色列表
     */
    public function actionRole()
    {
        return $this->render('role');
    }
    /**
     * 添加页面
     */
    public function actionShow()
    {
        return $this->render('show');
    }
    /**
     * 添加页面
     */
    public function actionAdd()
    {
        return $this->render('add');
    }
    /**
     * 修改密码
     */
    public function actionPasswordsave()
    {
        return $this->render('passwordsave');
    }
    /**
     * 管理员添加页面
     */
    public function actionAdmin_add()
    {
        return $this->render('admin_add');
    }
    /**
     * 角色添加页面
     */
    public function actionRole_add()
    {
        return $this->render('role_add');
    }
    
}
