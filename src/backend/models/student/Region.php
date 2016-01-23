<?php

namespace backend\models\student;

use Yii;

/**
 * This is the model class for table "{{%fin_region}}".
 *
 * @property integer $region_id
 * @property integer $parent_id
 * @property string $region_name
 * @property integer $region_type
 * 王文秀
 * 地区表
 */
class Region extends \yii\db\ActiveRecord
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
            [['parent_id', 'region_name', 'region_type'], 'required'],
            [['parent_id', 'region_type'], 'integer'],
            [['region_name'], 'string', 'max' => 10]
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
    /*
    * 获取省
    */
    public function getProvince()
    {
        return $this->find()->select(['region_id','region_name'])->where(['region_type'=>1])->asarray()->all();
    } 
    /*
    * 获取市
    */
    public function getCity($province_id)
    {
        return $this->find()->select(['region_id','region_name'])->where(['parent_id'=>$province_id])->asarray()->all();
    }
    /*
    * 获取县 
    */
    public function getArea($city_id)
    {
        return $this->find()->select(['region_id','region_name'])->where(['parent_id'=>$city_id])->asarray()->all();
    }
}
