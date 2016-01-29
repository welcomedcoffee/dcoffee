<?php

namespace frontend\models\store;

use Yii;

/**
 * This is the model class for table "fin_shop_limit_apply".
 *
 * @property integer $mer_id
 * @property string $apply_limit
 * @property string $apply_reason
 * @property integer $is_pass
 * @property integer $apply_time
 */
class ApplyLimit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fin_shop_limit_apply';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['apply_limit'], 'number'],
            [['is_pass', 'apply_time'], 'integer'],
            [['apply_reason'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mer_id' => 'Mer ID',
            'apply_limit' => 'Apply Limit',
            'apply_reason' => 'Apply Reason',
            'is_pass' => 'Is Pass',
            'apply_time' => 'Apply Time',
        ];
    }
}
