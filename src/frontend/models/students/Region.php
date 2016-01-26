<?php
namespace frontend\models\students;
use Yii;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "{{%region}}".
 *
 * @property integer $region_id
 * @property string  $region_name
 * @property integer $parent_id
 * @property integer $region_type
 */
class Region extends ActiveRecord
{

	
	/**
     * @inheritdoc   select table
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
            [['region_id', 'parent_id', 'region_type'], 'integer'],
            [['region_name'], 'string', 'max' => 100]
        ];
    }
    /*获取分类*/
    public function getRegion($region_id)
    {
    	return $this->find()->where("parent_id=$region_id")->asArray()->all();
    }
}