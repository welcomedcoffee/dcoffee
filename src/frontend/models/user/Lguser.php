<?php

namespace app\models\user;

use Yii;
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
class Lguser extends \yii\db\ActiveRecord
{
    public $user_phone;
    public $user_password;    

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
            [
                ['user_phone', 'user_password'],
                 'required'
            ],
            [
                ['user_phone'],
                 'integer'
            ],
            [['user_phone'],'match','pattern' => '/^(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/i', 'message'=>'请输入正确的手机号码'],
            [['user_password'],'match', 'pattern' => '/^[A-Za-z0-9]{8,15}$/', 'message' =>'请输入8~15位字母或数字'],
            //[['smsValCode'], 'match', 'pattern' =>'/^\d{4}$/', 'message' =>'请输入正确的验证码'],
            [['user_phone'], 'string', 'max' => 11],
            [['user_password'], 'string', 'max' => 15],           
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_phone' => '账----号',           
            'user_password' => '登录密码'            
        ];
    }

    




}
