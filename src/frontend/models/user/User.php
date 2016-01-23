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
class User extends \yii\db\ActiveRecord
{
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
            [['user_id', 'user_phone', 'user_password', 'user_type', 'user_addtime', 'user_lastlogin', 'user_lastip', 'user_status'], 'required'],
            [['user_id', 'user_type', 'user_addtime', 'user_lastlogin', 'user_status'], 'integer'],
            [['user_phone'], 'string', 'max' => 11],
            [['user_password'], 'string', 'max' => 32],
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
                    $info = $data['User'];
                    $info['user_type'] = 1;
                    $info['user_addtime'] = time();
                    $info['user_lastlogin'] = time();
                    $info['user_lastip'] = $userip;
                    $info['user_status'] = 1;
                    User::setAttributes = $info;
                }else{
                    return [
                        'code' => 3,
                        'info' => '手机号错误'
                    ];    
                }    
            }else{
                return [
                    'code' => 2,
                    'info' => '两次输入密码不一致'
                ]; 
            }
        }else{
            return [
                'code' => 1,
                'info' => '您还没有选择注册协议'
            ];
        }
    }














}
