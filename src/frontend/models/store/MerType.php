<?php

namespace frontend\models\store;

use Yii;

/**
 * This is the model class for table "fin_mer_type".
 *
 * @property integer $type_id
 * @property string $type_name
 * @property integer $parent_id
 * @property integer $type_sort
 * @property integer $addtime
 * @property integer $is_show
 */
class MerType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fin_mer_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'type_sort', 'addtime', 'is_show'], 'integer'],
            [['type_name'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'type_id' => 'Type ID',
            'type_name' => 'Type Name',
            'parent_id' => 'Parent ID',
            'type_sort' => 'Type Sort',
            'addtime' => 'Addtime',
            'is_show' => 'Is Show',
        ];
    }

    /*获取分类*/
    public function getType()
    {
        return $this->find()->where('is_show=1 and parent_id=0')->asArray()->all();
    }
    //获取子分类
    public function getChildType($type_id)
    {
       return $this->find()
                ->where(['parent_id' => $type_id,'is_show'=>1])
                ->asArray()
                ->all();
    }

}
