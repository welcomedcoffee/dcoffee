<?php

namespace app\models\part;

use Yii;

/**
 * This is the model class for table "{{%settlement}}".
 *
 * @property integer $settlement_id
 * @property integer $part_id
 * @property integer $part_status
 * @property string $part_comments
 * @property integer $settlement_time
 */
class FinSettlement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%settlement}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['part_id', 'part_status', 'part_comments', 'settlement_time'], 'required'],
            [['part_id', 'part_status', 'settlement_time'], 'integer'],
            [['part_comments'], 'string', 'max' => 300]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'settlement_id' => 'Settlement ID',
            'part_id' => 'Part ID',
            'part_status' => 'Part Status',
            'part_comments' => 'Part Comments',
            'settlement_time' => 'Settlement Time',
        ];
    }

    /* 查询该兼职下未结算的用户 */
    public function getsettlement($job_id)
    {
        return self::find()
                ->select("count(settle.part_id) as num,student.stu_name,student.stu_sex,student.stu_school,student.stu_professional,user.user_phone")
                ->from("fin_settlement as settle")
                ->leftJoin("fin_students as student","student.stu_id = settle.part_id")
                ->leftJoin("fin_user as user","settle.part_id = user.user_id")
                ->where(['settle.part_status'=>'2','job_id'=>$job_id])
                ->asArray()
                ->all();
    }
}
