<?php

namespace frontend\models\store;

use Yii;

/**
 * This is the model class for table "fin_preferential".
 *
 * @property integer $preferential_id
 * @property integer $merchant_id
 * @property integer $preferential_type
 * @property string $preferential_content
 * @property integer $preferential_start
 * @property integer $preferential_end
 * @property integer $addtime
 */
class Preferential extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fin_preferential';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['merchant_id', 'preferential_type', 'preferential_content', 'preferential_start', 'preferential_end', 'addtime'], 'required'],
            [['merchant_id', 'preferential_type', 'preferential_start', 'preferential_end', 'addtime'], 'integer'],
            [['preferential_content'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'preferential_id' => 'Preferential ID',
            'merchant_id' => 'Merchant ID',
            'preferential_type' => 'Preferential Type',
            'preferential_content' => 'Preferential Content',
            'preferential_start' => 'Preferential Start',
            'preferential_end' => 'Preferential End',
            'addtime' => 'Addtime',
        ];
    }
}
