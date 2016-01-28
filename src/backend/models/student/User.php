<?php

namespace backend\models\student;

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
            [['user_id'], 'required'],
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
            'user_phone' => 'User Phone',
            'user_password' => 'User Password',
            'user_type' => 'User Type',
            'user_addtime' => 'User Addtime',
            'user_lastlogin' => 'User Lastlogin',
            'user_lastip' => 'User Lastip',
            'user_status' => 'User Status',
        ];
    }
    //查询用户密码
    public function password($user_id,$password)
    {
        return $this -> find()
                     -> where(['and',['=','user_id',$user_id],['=','user_password',$password]])
                     -> one();
    }
    public function phone($phone)
    {
        return $this -> find()
                     -> where(['=','user_phone',$phone])
                     -> one();
    }
}
