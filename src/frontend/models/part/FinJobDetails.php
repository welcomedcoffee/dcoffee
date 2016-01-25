<?php

namespace app\models\part;

use Yii;

/**
 * This is the model class for table "{{%job_details}}".
 *
 * @property integer $job_id
 * @property integer $merchants_id
 * @property string $job_name
 * @property integer $job_type
 * @property integer $job_people
 * @property string $job_img
 * @property string $job_money
 * @property string $job_treatment
 * @property integer $pay_method
 * @property integer $end_data
 * @property integer $job_start
 * @property integer $job_end
 * @property integer $work_start
 * @property integer $work_end
 * @property integer $commission
 * @property string $cut_way
 * @property integer $sex
 * @property integer $height
 * @property string $job_content
 * @property string $job_require
 * @property string $contact
 * @property string $contact_phone
 * @property string $working_place
 * @property integer $job_status
 * @property double $lng
 * @property double $lat
 * @property integer $add_time
 */
class FinJobDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%job_details}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['merchants_id', 'job_name', 'job_type', 'job_people', 'job_img', 'job_money', 'job_treatment', 'pay_method', 'end_data', 'job_start', 'job_end', 'work_start', 'work_end', 'commission', 'cut_way', 'sex', 'height', 'job_content', 'job_require', 'contact', 'contact_phone', 'working_place', 'job_status', 'lng', 'lat', 'add_time'], 'required'],
            [['merchants_id', 'job_type', 'job_people', 'pay_method', 'end_data', 'job_start', 'job_end', 'work_start', 'work_end', 'commission', 'sex', 'height', 'job_status', 'add_time'], 'integer'],
            [['job_money', 'lng', 'lat'], 'number'],
            [['job_name', 'job_img', 'cut_way'], 'string', 'max' => 60],
            [['job_treatment'], 'string', 'max' => 100],
            [['job_content', 'job_require', 'working_place'], 'string', 'max' => 300],
            [['contact'], 'string', 'max' => 15],
            [['contact_phone'], 'string', 'max' => 11]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'job_id' => 'Job ID',
            'merchants_id' => 'Merchants ID',
            'job_name' => '兼职名称',
            'job_type' => '兼职类别',
            'job_people' => '招聘人数',
            'job_img' => '上传图片',
            'job_money' => '工资待遇',
            'job_treatment' => 'Job Treatment',
            'pay_method' => '结算方式',
            'end_data' => '截止日期',
            'job_start' => '兼职日期',
            'job_end' => 'Job End',
            'work_start' => '工作时段',
            'work_end' => 'Work End',
            'commission' => '提成',
            'cut_way' => '提成描述',
            'sex' => '性别要求',
            'height' => '身高要求',
            'job_content' => '工作内容',
            'job_require' => '工作要求',
            'contact' => '联系人',
            'contact_phone' => '联系电话',
            'working_place' => '工作地点',
            'working_place' => '工作地点',
            'working_place' => '工作地点',
            'job_status' => 'Job Status',
            'lng' => 'Lng',
            'lat' => 'Lat',
            'add_time' => 'Add Time',
        ];
    }
}
