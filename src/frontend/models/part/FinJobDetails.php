<?php

namespace app\models\part;

use Yii;
use yii\data\Pagination;
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
 * @property integer $province_id
 * @property integer $city_id
 * @property integer $area_id
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
            [['merchants_id', 'job_type', 'job_people', 'pay_method', 'end_data', 'job_start', 'job_end', 'work_start', 'work_end', 'commission', 'sex', 'height', 'job_status', 'add_time', 'province_id', 'city_id', 'area_id'], 'integer'],
            [['job_name', 'job_type', 'job_people'], 'required'],
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
            'job_treatment' => '',
            'pay_method' => '结算方式',
            'end_data' => '截止日期',
            'job_start' => '兼职日期开始',
            'job_end' => '兼职日期结束',
            'work_start' => '工作时段开始',
            'work_end' => '工作时段结束',
            'commission' => '提成',
            'cut_way' => '提成描述',
            'sex' => '性别要求',
            'height' => '身高要求',
            'job_content' => '工作内容',
            'job_require' => '工作要求',
            'contact' => '联系人',
            'contact_phone' => '联系电话',
            'working_place' => '工作地点',
            'province_id' => '省ID',
            'city_id' => '城市ID',
            'area_id' => '区ID',
            'job_status' => 'Job Status',
            'lng' => 'Lng',
            'lat' => 'Lat',
            'add_time' => 'Add Time',
            'province_id' => 'Province ID',
            'city_id' => 'City ID',
            'area_id' => 'Area ID',
        ];
    }

    /**
     * 查询出所有兼职信息
     */
    public function getDetails()
    {
        return self::find()
                ->select("job_id,job_name,job_type,work_start,work_end,job_money,job_treatment,job_people,job_status")
                ->asArray()
                ->all();
    }

    /**
     * 根据兼职ID查询兼职详情
     */
    public function partdetails($job_id)
    {
        return self::find()
                ->select("details.*,type.part_name,base.mer_name")
                ->from("fin_job_details as details")
                ->leftJoin("fin_part_type as type","type.part_id = details.job_type")
                ->leftJoin("fin_merchant_base as base","base.mer_id = details.merchants_id")
                ->where(['details.job_id'=>$job_id])
                ->asArray()
                ->one();
    }


    /*
     * @inheritdoc 兼职列表页
     */
    public function getParts($keyword)
    {
        $cond = '1=1 and job_status=1';
        if($keyword['type']){
            $type = $keyword['type'];
            $cond.= " and job_type = $type";
        }
        if($keyword['region']){
            $region = $keyword['region'];
            $cond  .= " and area_id = $region";
        }
        $pages     = new Pagination([
            'defaultPageSize'   => 12,
            'totalCount'        => $this->find()->where($cond)->count(),
        ]);
        $parts = FinJobDetails::find()
                     ->where($cond)
                     ->offset($pages->offset)
                     ->limit($pages->limit)
                     ->asArray()->all();
        $parts['pages'] = $pages;
        return $parts;             
    }
}
