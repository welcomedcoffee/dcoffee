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
class Qyuser extends \yii\db\ActiveRecord
{
    public $user_phone;
    public $mer_name;
    public $user_type;
    public $user_password;
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
            [
                ['user_phone', 'mer_name', 'user_type', 'smsValCode', 'user_password', 'user_checkpwd', 'agreement'],
                 'required'
            ],
            [
                ['user_phone', 'user_type', 'smsValCode', 'agreement'],
                 'integer'
            ],
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
            'user_phone' => '手机号码',
            'mer_name' => '公司名称',
            'user_type' => '公司类型',
            'user_password' => '设置密码',
            'user_checkpwd' => '确认密码',
            'smsValCode' => '短信验证码',
            'agreement' => '协议为必选项',
        ];
    }

    




}
