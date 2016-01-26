<?php

namespace app\models\part;

use Yii;

/**
 * This is the model class for table "{{%region}}".
 *
 * @property integer $region_id
 * @property integer $parent_id
 * @property string $region_name
 * @property integer $region_type
 */
class FinRegion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%region}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'region_type'], 'integer'],
            [['region_name'], 'string', 'max' => 120]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'region_id' => 'Region ID',
            'parent_id' => 'Parent ID',
            'region_name' => 'Region Name',
            'region_type' => 'Region Type',
        ];
    }

    /**
     * 查询省份
     */
    public function getProvince()
    {
        return self::find()
                ->where(["region_type" => 1])
                ->select("region_name,region_id,parent_id,region_type")
                ->asArray()
                ->all();
    }

    /**
     * 根据region_id查询该地区子级
     */
    public function getRegion($region_id)
    {
        return self::find()
                ->where(['parent_id' => $region_id])
                ->select("region_name,region_id,parent_id,region_type")
                ->asArray()
                ->all();
    }
}
