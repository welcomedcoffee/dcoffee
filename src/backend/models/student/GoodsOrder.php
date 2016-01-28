<?php

namespace backend\models\student;

use Yii;

/**
 * This is the model class for table "{{%fin_goods_order}}".
 *
 * @property integer $order_id
 * @property integer $order_sn
 * @property integer $user_id
 * @property string $user_name
 * @property string $user_phone
 * @property integer $audit_addtime
 * @property integer $merchant_id
 * @property string $merchant_name
 * @property string $order_amount
 * @property string $order_price
 * @property integer $order_pay_time
 * @property integer $order_addtime
 * @property integer $order_status
 */
class GoodsOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%goods_order}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_sn', 'user_id', 'audit_addtime', 'merchant_id', 'order_pay_time', 'order_addtime', 'order_status'], 'integer'],
            [['order_amount', 'order_price'], 'number'],
            [['user_name', 'merchant_name'], 'string', 'max' => 30],
            [['user_phone'], 'string', 'max' => 11]
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
            'user_name' => 'User Name',
            'user_phone' => 'User Phone',
            'audit_addtime' => 'Audit Addtime',
            'merchant_id' => 'Merchant ID',
            'merchant_name' => 'Merchant Name',
            'order_amount' => 'Order Amount',
            'order_price' => 'Order Price',
            'order_pay_time' => 'Order Pay Time',
            'order_addtime' => 'Order Addtime',
            'order_status' => 'Order Status',
        ];
    }
    //条数
    public function Count($where)
    {
        return $this->find()
                    ->where($where)
                    ->count();
    }
    //查询当前用户的id
    public function Gorder($where,$pagination)
    {
        return $this -> find()
                     -> where($where)
                     -> orderBy(['order_addtime'=>SORT_DESC])
                     -> offset($pagination->offset)
                     -> limit($pagination->limit)
                     -> asarray()
                     -> all();
    }
}
