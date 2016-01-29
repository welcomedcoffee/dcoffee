<?php

namespace backend\models\student;

use Yii;

/**
 * This is the model class for table "{{%fin_parttime_order}}".
 *
 * @property integer $order_id
 * @property integer $order_sn
 * @property integer $user_id
 * @property integer $position_id
 * @property integer $order_addtime
 * @property integer $order_status
 */
class ParttimeOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%parttime_order}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id'], 'required'],
            [['order_id', 'order_sn', 'user_id', 'position_id', 'order_addtime', 'order_status'], 'integer']
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
            'position_id' => 'Position ID',
            'order_addtime' => 'Order Addtime',
            'order_status' => 'Order Status',
        ];
    }
    //条数
    public function Count($where)
    {
        return $this->find()
                    -> innerjoin('`fin_job_details` on `fin_parttime_order`.`position_id` = `fin_job_details`.`job_id`')
                    ->where($where)
                    ->count();
    }
    //查询当前用户的id
    public function Porder($where,$pagination)
    {
        return $this -> find()
                     -> select('*')
                     -> innerjoin('`fin_job_details` on `fin_parttime_order`.`position_id` = `fin_job_details`.`job_id`')
                     -> where($where)
                     -> orderBy(['order_addtime'=>SORT_DESC])
                     -> offset($pagination->offset)
                     -> limit($pagination->limit)
                     -> asarray()
                     -> all();
    }
}
