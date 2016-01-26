<?php

namespace app\models\user;

use Yii;
use app\models\students\Students;
use frontend\models\students\MerBase;
/**
 * This is the model class for table "{{%fin_user}}".
 *
 * @property integer $user_id
 * @property string $user_phone
 * @property string $user_password
 * @property integer $user_type
 * @property integer $user_addtime
 * @property integer $user_lastlogin
 * @property string $user_lastip
 * @property integer $user_status
 */
class User extends \yii\db\ActiveRecord
{
    public $user_checkpwd;
    public $smsValCode;
    public $agreement;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'user_phone', 'user_password', 'user_type', 'user_addtime', 'user_lastlogin', 'user_lastip', 'user_status','user_checkpwd', 'smsValCode', 'agreement'], 'required'],
            [['user_id', 'user_type', 'user_addtime', 'user_lastlogin', 'user_status'], 'integer'],
            [['user_phone'],'match','pattern' => '/^(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/i', 'message'=>'请输入正确的手机号码'],
            [['user_password', 'user_checkpwd'],'match', 'pattern' => '/^[A-Za-z0-9]{8,15}$/', 'message' =>'请输入8~15位字母或数字'],
            [['smsValCode'], 'match', 'pattern' =>'/^\d{4}$/', 'message' =>'请输入正确的验证码'],
            [['user_phone'], 'string', 'max' => 11],
            [['user_password','user_checkpwd'], 'string', 'max' => 32],
            [['user_lastip'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'user_phone' => '手机号码',
            'user_password' => '设置密码',
            'user_type' => 'User Type',
            'user_addtime' => 'User Addtime',
            'user_lastlogin' => 'User Lastlogin',
            'user_lastip' => 'User Lastip',
            'user_status' => 'User Status',
            'user_checkpwd' => '确认密码',
            'smsValCode' => '短信验证码',
            'agreement' => '协议为必选项',
        ];
    }

    /**
     * @新增学生用户 数据入库
     */
    public function registerUser($data = null, $userip = null)
    {
        if($data['agreement']){
            if($data['user_password']==$data['user_checkpwd']){
                if($data['user_phone']){
                    if(is_null($this->onlyPhone($data['user_phone']))){                   
                        $data['user_id'] = 0;                                      
                        $data['user_type'] = 1;
                        $data['user_addtime'] = time();
                        $data['user_lastlogin'] = time();
                        $data['user_lastip'] = $userip;
                        $data['user_status'] = 1; 
                        $model = new User;
                        $model->attributes = $data;
                        if ($model->validate()) {  
                            $model -> setAttributes($data); 
                            $model -> user_password = md5($data['user_password']);
                            if($model -> save(false)){
                                $user_id = $model->attributes['user_id'];
                                $stu = new Students;
                                $stu -> stu_id = $user_id;
                                $stu ->save();
                                return $this->result(1, '注册成功');                       
                            }else{
                                return $this->result(5, '注册失败');                         
                            }  
                        } else {
                            // 验证失败：$errors 是一个包含错误信息的数组
                            $errors = $model->errors;
                            print_r($errors);
                        }                        
                    }else{
                        return $this->result(6, '手机号已存在');  
                    }                     
                }else{
                    return $this->result(4, '手机号错误');                        
                }    
            }else{
                return $this->result(3, '两次输入密码不一致');                
            }
        }else{
            return $this->result(2, '您还没有选择注册协议');            
        }
    }    

    /**
     * @新增企业号 数据入库
     */
    public function registerEnterprise($data = null, $Ip = null) {
        $data['user_id'] = 0;                                      
        $data['user_type'] = count($data['user_type'])>1 ? 4 : $data['user_type'][0];
        $data['user_addtime'] = time();
        $data['user_lastlogin'] = time();
        $data['user_lastip'] = $Ip;
        $data['user_status'] = 1; 
        $model = new User;
        $model->attributes = $data;
        if(!is_null($this->onlyPhone($data['user_phone']))) return $this->result(3, '手机号已存在');      

        if(!is_null($this->onlyEnterprise($data['mer_name']))) return $this->result(4, '企业名称已存在'); 

        if ($model->validate()) {
            $transaction = \Yii::$app->db->beginTransaction();
            try {  
                $model -> setAttributes($data); 
                $model -> user_password = md5($data['user_password']);
                $model -> save(false);

                $user_id = $model->attributes['user_id'];
                $mer = new MerBase;
                 
                $mer -> mer_id = $user_id;
                $mer -> mer_name = $data['mer_name'];
                $mer -> mer_phone = $data['user_phone'];
                $mer -> register_time = time();
                $mer ->save(false);

                $transaction->commit(); //提交事务会真正的执行数据库操作
                return $this->result(1, '注册成功'); 
            } catch (Exception $e) {                
                $transaction->rollback(); //如果操作失败, 数据回滚
                return $this->result(2, '注册失败');
            }
        } else {
            // 验证失败：$errors 是一个包含错误信息的数组
            $errors = $model->errors;            
            if(count($errors)>1){
                return $this->result(5, '非法注册，请通过正确途径注册');
            }else{
                $val = array_values($errors);
                return $this->result(6, $val[0][0]);
            }
        }                     
    }

    /**
     * @验证用户登录
     */
    public function Checklgin($data) {
       $res = User::find()->select([
                                    'user_id', 'user_phone', 'user_password', 'user_lastlogin',
                                    'user_lastip', 'user_status', 'user_type'
                                  ])
                          ->where(['user_phone' => $data['user_phone']])
                          ->asArray()
                          ->one();
        if(!empty($res)){
            if(md5($data['user_password'])===$res['user_password']){
                if($res['user_status']!=0){
                    $session = Yii::$app->session; 
                    if (!$session->isActive){ // 检查session是否开启
                        $session->open();
                    }
                    $session->set('userinfo', $res); 
                    return $this->result(1, '登陆成功');
                }else{
                    return $this->result(4, '您的账号已经封停');
                }
            }else{
                return $this->result(3, '密码不正确');
            }
        }else{
            return $this->result(2, '用户名不存在');
        }

    }

    /**
     * @验证手机号唯一
     */
    public function onlyPhone($phone) {
       $res = User::find()->select(['user_id'])->where(['user_phone' => $phone])->asArray()->one();
       return $res['user_id'];
    }

    /**
     * @验证企业名称唯一
     */
    public function onlyEnterprise($name) {
       $res = MerBase::find()->select(['mer_name'])->where(['mer_name' => $name])->asArray()->one();
       return $res['mer_name'];
    }

    /**
     * @返回结果 数据处理
     */
    public function result($code = null, $msg = null) {
        $msg = !empty($msg) ? $msg : '数据处理失败！';
        return [
            'code' => $code,
            'data' => $msg
        ];        
    }














}
