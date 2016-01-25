<?php

namespace app\models\user;

use Yii;
use app\models\students\Students;
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
     * @新增用户 数据入库
     */
    public function registerUser($data = null, $userip = null)
    {
        if($data['agreement']){
            if($data['User']['user_password']==$data['checkpwd']){
                if($data['User']['user_phone']){
                    if(is_null($this->onlyPhone($data['User']['user_phone']))){ 
                        $info['user_id'] = 0;                      
                        $info['user_phone'] = $data['User']['user_phone'];                   
                        $info['user_password'] = $data['User']['user_password'];                   
                        $info['user_type'] = 1;
                        $info['user_addtime'] = time();
                        $info['user_lastlogin'] = time();
                        $info['user_lastip'] = $userip;
                        $info['user_status'] = 1;                    
                        $model = new User;
                        $model -> setAttributes($info);                              
                        if($model -> save()){
                            $user_id = $model->attributes['user_id'];
                            $stu = new Students;
                            $stu -> stu_id = $user_id;
                            $stu ->save();
                            return $this->result(1, '注册成功');                       
                        }else{
                            return $this->result(5, '注册失败');                         
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
     * @验证手机号唯一
     */
    public function onlyPhone($phone) {
       $res = User::find()->select(['user_id'])->where(['user_phone' => $phone])->asArray()->one();
       return $res['user_id'];
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
