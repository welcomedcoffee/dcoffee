<?php

namespace backend\models\student;

use Yii;

/**
 * This is the model class for table "{{%fin_audit}}".
 *
 * @property integer $audit_id
 * @property integer $user_id
 * @property string $audit_text
 * @property integer $audit_status
 * @property string $audit_content
 * @property integer $audit_addtime
 */
class Audit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%fin_audit}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'audit_text', 'audit_status', 'audit_content', 'audit_addtime'], 'required'],
            [['user_id', 'audit_status', 'audit_addtime'], 'integer'],
            [['audit_text', 'audit_content'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'audit_id' => 'Audit ID',
            'user_id' => 'User ID',
            'audit_text' => 'Audit Text',
            'audit_status' => 'Audit Status',
            'audit_content' => 'Audit Content',
            'audit_addtime' => 'Audit Addtime',
        ];
    }
}
