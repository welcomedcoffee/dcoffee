<?php

namespace app\models\part;

use Yii;

/**
 * This is the model class for table "{{%merchant_base}}".
 *
 * @property integer $mer_id
 * @property string $mer_name
 * @property string $mer_phone
 * @property string $mer_paypassword
 * @property string $mer_contact
 * @property string $mer_conphone
 * @property string $mer_position
 * @property integer $mer_level
 * @property integer $mer_province
 * @property integer $mer_city
 * @property integer $mer_area
 * @property string $mer_address
 * @property string $mer_money
 * @property string $mer_limimoney
 * @property integer $ind_type
 * @property integer $ind_type_child
 * @property string $mer_logo
 * @property string $mer_license
 * @property string $mer_registration
 * @property string $mer_ allow
 * @property string $mer_positive
 * @property string $mer_reverse
 * @property string $mer_image1
 * @property string $mer_image2
 * @property string $mer_image3
 * @property string $mer_start
 * @property string $mer_end
 * @property integer $mer_isshow
 * @property string $mer_introduce
 * @property integer $register_time
 */
class FinMerchantBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
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
        return [
            [['mer_level', 'mer_province', 'mer_city', 'mer_area', 'ind_type', 'ind_type_child', 'mer_isshow', 'register_time'], 'integer'],
            [['mer_money', 'mer_limimoney'], 'number'],
            [['mer_start', 'mer_end'], 'safe'],
            [['mer_introduce'], 'string'],
            [['mer_name', 'mer_contact', 'mer_position'], 'string', 'max' => 30],
            [['mer_phone', 'mer_conphone'], 'string', 'max' => 11],
            [['mer_paypassword'], 'string', 'max' => 32],
            [['mer_address'], 'string', 'max' => 90],
            [['mer_logo', 'mer_license', 'mer_registration', 'mer_ allow', 'mer_positive', 'mer_reverse', 'mer_image1', 'mer_image2', 'mer_image3'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mer_id' => 'Mer ID',
            'mer_name' => 'Mer Name',
            'mer_phone' => 'Mer Phone',
            'mer_paypassword' => 'Mer Paypassword',
            'mer_contact' => 'Mer Contact',
            'mer_conphone' => 'Mer Conphone',
            'mer_position' => 'Mer Position',
            'mer_level' => 'Mer Level',
            'mer_province' => 'Mer Province',
            'mer_city' => 'Mer City',
            'mer_area' => 'Mer Area',
            'mer_address' => 'Mer Address',
            'mer_money' => 'Mer Money',
            'mer_limimoney' => 'Mer Limimoney',
            'ind_type' => 'Ind Type',
            'ind_type_child' => 'Ind Type Child',
            'mer_logo' => 'Mer Logo',
            'mer_license' => 'Mer License',
            'mer_registration' => 'Mer Registration',
            'mer_ allow' => 'Mer  Allow',
            'mer_positive' => 'Mer Positive',
            'mer_reverse' => 'Mer Reverse',
            'mer_image1' => 'Mer Image1',
            'mer_image2' => 'Mer Image2',
            'mer_image3' => 'Mer Image3',
            'mer_start' => 'Mer Start',
            'mer_end' => 'Mer End',
            'mer_isshow' => 'Mer Isshow',
            'mer_introduce' => 'Mer Introduce',
            'register_time' => 'Register Time',
        ];
    }

    /**
     * 查询兼职企业详细信息
     */
    public function getMessage($user_id)
    {
        return self::find()
                    ->select("mer_id,mer_name,mer_address")
                    ->where(['mer_id'=>$user_id])
                    ->asArray()
                    ->one();
    }
}
