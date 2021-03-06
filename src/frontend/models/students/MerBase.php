<?php
namespace frontend\models\students;
use Yii;
use yii\db\ActiveRecord;
use yii\data\Pagination;
use frontend\models\store\Preferential;
class MerBase extends ActiveRecord
{

	
	/**
     * @inheritdoc   select table
     */
	public static function tableName()
	{
		return '{{%merchant_base}}';
	}
	/**
     * @inheritdoc 
     */
    public function rules()
    {
        return ;
    }
    /*
     * @return 关联优惠表
     */
    public function getPreferential()
    {
        return $this->hasOne(Preferential::className(),['merchant_id'=>'mer_id']);
    }
    /*
     * @inheritdoc 获取商商家信息
     */
    public function getMerchants($keyword)
    {
    	$cond = "1=1 and mer_isshow=1";
    	if($keyword['type']){
    		(int)$type 	 = $keyword['type'];
    		$cond	    .= " and ind_type = $type";
    	}
    	if($keyword['region']){
    		(int)$region = $keyword['region'];
    		$cond		.= " and mer_area = $region";
    	}
    	$pages     = new Pagination([
            'defaultPageSize'   => 12,
            'totalCount'        => $this->find()->where($cond)->count(),
        ]);
        $merchants = MerBase::find()
        			->where($cond)
                    ->offset($pages->offset)
                    ->limit($pages->limit)
                    ->asArray()->all();
        $merchants['pages'] = $pages;

        return $merchants;                               
    }
    /*
     * @inheritdoc 获取商家详细信息
     */
    public function getDetail($mer_id)
    {
        $mer_details =  MerBase::find()
                        ->where("mer_id=$mer_id")
                        ->asArray()->one();
        unset($mer_details['mer_paypassword']);
        unset($mer_details['mer_position']);
        unset($mer_details['mer_positive']);
        unset($mer_details['mer_reverse']);
        unset($mer_details['register_time']);
        unset($mer_details['mer_ allow']);
        return $mer_details;            
    }

    /*
     * @inheritdoc 获取商家优惠详细信息
     */
    public function getSmall($mer_id)
    {
        $mer_details =  MerBase::find()
                        ->select('mer_id,mer_name,merchant_id')
                        ->joinwith('preferential')
                        ->where("mer_id=$mer_id")
                        ->asArray()->one();
        return $mer_details;            
    }

}