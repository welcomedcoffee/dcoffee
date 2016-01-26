<?php
namespace frontend\models\students;
use Yii;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "{{%mer_type}}".
 *
 * @property integer $mer_id
 * @property string  $mer_name
 * @property integer $mer_sort
 * @property integer $addtime
 * @property integer $is_show
 */
class MerType extends ActiveRecord
{

	
	/**
     * @inheritdoc   select table
     */
	public static function tableName()
	{
		return '{{%mer_type}}';
	}
	/**
     * @inheritdoc 
     */
    public function rules()
    {
        return [
            [['mer_sort', 'addtime', 'is_show'], 'integer'],
            [['mer_name'], 'string', 'max' => 100]
        ];
    }
    /*获取分类*/
    public function getType()
    {
    	return $this->find()->where('is_show=1')->asArray()->all();
    }
}