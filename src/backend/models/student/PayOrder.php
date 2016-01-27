<?php

namespace backend\models\student;

use Yii;

/**
 * This is the model class for table "{{%fin_pay_order}}".
 *
 * @property integer $order_id
 * @property string $order_sn
 * @property integer $user_id
 * @property string $order_price
 * @property integer $order_pay_time
 * @property integer $order_addtime
 * @property integer $order_status
 */
class PayOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%pay_order}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'order_pay_time', 'order_addtime', 'order_status'], 'integer'],
            [['order_price'], 'number'],
            [['order_sn'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'order_sn' => 'Order Sn',
            'user_id' => 'User ID',
            'order_price' => 'Order Price',
            'order_pay_time' => 'Order Pay Time',
            'order_addtime' => 'Order Addtime',
            'order_status' => 'Order Status',
        ];
    }
         //查询
    public function findones($order_id)
    {
        return $this -> find()
                     -> where(['=','order_id',$order_id])
                     -> one();
    }
         //查询
    public static function sn($order_sn)
    {
        return self::find()
                     -> where(['=','order_sn',$order_sn])
<<<<<<< HEAD
=======
                 //    -> asArray()
>>>>>>> fcacfcad98678f1d53a2ceeb97640429d97a0128
                     -> one();
    }
    
   
}
