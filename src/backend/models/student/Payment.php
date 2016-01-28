<?php

namespace backend\models\student;

use Yii;

/**
 * This is the model class for table "{{%fin_payment}}".
 *
 * @property integer $payment_id
 * @property integer $user_id
 * @property integer $payment_type
 * @property integer $payment_addtime
 * @property string $payment_money
 * @property string $payment_note
 * @property integer $payment_way
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%payment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'payment_type', 'payment_addtime', 'payment_way'], 'integer'],
            [['payment_money'], 'number'],
            [['payment_note'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'payment_id' => 'Payment ID',
            'user_id' => 'User ID',
            'payment_type' => 'Payment Type',
            'payment_addtime' => 'Payment Addtime',
            'payment_money' => 'Payment Money',
            'payment_note' => 'Payment Note',
            'payment_way' => 'Payment Way',
        ];
    }
    /**
    * 查询
    */
    public function Count($user_id)
    {
        return $this->find()
                    ->where(['=','user_id',$user_id])
                    ->count();
    }
    //查询当前用户
    public function PayList($user_id,$pagination)
    {
        return $this -> find()
                     -> where(['=','user_id',$user_id])
                     -> orderBy(['payment_addtime'=>SORT_DESC])
                     -> offset($pagination->offset)
                     -> limit($pagination->limit)
                     -> asArray()
                     -> all();
    }
}
