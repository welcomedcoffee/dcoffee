<?php

namespace app\models\part;

use Yii;

/**
 * This is the model class for table "{{%part_type}}".
 *
 * @property integer $part_id
 * @property string $part_name
 * @property integer $part_sort
 * @property integer $addtime
 * @property integer $is_show
 */
class FinPartType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%part_type}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['part_sort', 'addtime', 'is_show'], 'integer'],
            [['part_name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'part_id' => 'Part ID',
            'part_name' => 'Part Name',
            'part_sort' => 'Part Sort',
            'addtime' => 'Addtime',
            'is_show' => 'Is Show',
        ];
    }

    /* 查询兼职类型 */
    public function partComment()
    {
        return self::find()
                    ->where(['is_show' => 1])
                    ->orderBy("part_sort desc")
                    ->asArray()
                    ->all();
    }
}
