<?php

namespace app\models\students;

use Yii;

/**
 * This is the model class for table "{{%fin_students}}".
 *
 * @property integer $stu_id
 * @property string $stu_name
 * @property string $stu_nickname
 * @property string $stu_card
 * @property string $card_positive
 * @property string $card_reverse
 * @property integer $stu_sex
 * @property integer $stu_height
 * @property string $stu_school
 * @property string $stu_professional
 * @property string $stu_code
 * @property integer $stu_start
 * @property integer $stu_end
 * @property integer $province_id
 * @property integer $city_id
 * @property integer $area_id
 * @property string $stu_addr
 * @property string $skills_id
 * @property integer $stu_parttime
 * @property string $stu_introduction
 * @property string $stu_experience
 * @property string $stu_pwd
 * @property string $stu_avatar
 * @property string $stu_money
 * @property string $stu_limit_money
 * @property integer $stu_addtime
 * @property integer $stu_updtime
 */
class Students extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%students}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stu_sex', 'stu_height', 'stu_start', 'stu_end', 'province_id', 'city_id', 'area_id', 'stu_parttime', 'stu_addtime', 'stu_updtime'], 'integer'],
            [['stu_money', 'stu_limit_money'], 'number'],
            [['stu_name', 'stu_nickname', 'stu_card', 'stu_school', 'stu_professional', 'stu_code'], 'string', 'max' => 30],
            [['card_positive', 'card_reverse', 'stu_introduction', 'stu_experience', 'stu_avatar'], 'string', 'max' => 255],
            [['stu_addr', 'skills_id'], 'string', 'max' => 100],
            [['stu_pwd'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'stu_id' => 'Stu ID',
            'stu_name' => 'Stu Name',
            'stu_nickname' => 'Stu Nickname',
            'stu_card' => 'Stu Card',
            'card_positive' => 'Card Positive',
            'card_reverse' => 'Card Reverse',
            'stu_sex' => 'Stu Sex',
            'stu_height' => 'Stu Height',
            'stu_school' => 'Stu School',
            'stu_professional' => 'Stu Professional',
            'stu_code' => 'Stu Code',
            'stu_start' => 'Stu Start',
            'stu_end' => 'Stu End',
            'province_id' => 'Province ID',
            'city_id' => 'City ID',
            'area_id' => 'Area ID',
            'stu_addr' => 'Stu Addr',
            'skills_id' => 'Skills ID',
            'stu_parttime' => 'Stu Parttime',
            'stu_introduction' => 'Stu Introduction',
            'stu_experience' => 'Stu Experience',
            'stu_pwd' => 'Stu Pwd',
            'stu_avatar' => 'Stu Avatar',
            'stu_money' => 'Stu Money',
            'stu_limit_money' => 'Stu Limit Money',
            'stu_addtime' => 'Stu Addtime',
            'stu_updtime' => 'Stu Updtime',
        ];
    }

    /**
     * 查询学生信息
     */
    public function getStudent($user_id)
    {
        return self::find()
                ->select("student.stu_nickname,student.stu_name,student.stu_sex,student.stu_height,student.stu_school,GROUP_CONCAT(skill.skills_name SEPARATOR ' / ') AS skills_name")
                ->from("fin_students as student")
                ->leftJoin("fin_skills as skill","student.skills_id =skill.skills_id")
                ->where(['student.stu_id'=>$user_id])
                ->asArray()
                ->one();
    }

    /*
     * @inheritdoc 学生信息
     */
    public function getStuDetails($user_id)
    {
        return Students::find()
                    ->select('stu_id,stu_name,stu_avatar')
                    ->where(['stu_id'=>$user_id])
                    ->asArray()->one();
                    
    }


    public function getPassword($user_id)
    {
        return Students::find()
                    ->select('stu_id,stu_money,stu_pwd')
                    ->where(['stu_id'=>$user_id])
                    ->asArray()->one();
    }
}

