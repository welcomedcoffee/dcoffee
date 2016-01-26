<?php

namespace backend\models\student;

use Yii;

/**
 * This is the model class for table "{{%fin_skills}}".
 *
 * @property integer $skills_id
 * @property string $skills_name
 * @property integer $skills_sort
 * @property integer $skills_addtime
 * @property integer $skills_status
 * 王文秀
 * 技能表
 */
class Skills extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%skills}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['skills_name', 'skills_sort', 'skills_addtime', 'skills_status'], 'required'],
            [['skills_sort', 'skills_addtime', 'skills_status'], 'integer'],
            [['skills_name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'skills_id' => 'Skills ID',
            'skills_name' => 'Skills Name',
            'skills_sort' => 'Skills Sort',
            'skills_addtime' => 'Skills Addtime',
            'skills_status' => 'Skills Status',
        ];
    }
     /*
    * 获取省
    */
    public function getSkills()
    {
        return $this->find()
                    ->select(['skills_id','skills_name'])
                    ->where(['skills_status'=>'1'])
                    ->orderBy(['skills_sort'=>SORT_DESC])
                    ->asarray()
                    ->all();
    } 
}
