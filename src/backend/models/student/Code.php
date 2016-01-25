<?php

namespace backend\models\student;

use Yii;

/**
 * This is the model class for table "{{%fin_code}}".
 *
 * @property integer $code_rand
 * @property string $code_phone
 * @property integer $code_addtime
 */
class Code extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%code}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code_rand', 'code_addtime'], 'integer'],
            [['code_phone'], 'required'],
            [['code_phone'], 'string', 'max' => 11]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'code_rand' => 'Code Rand',
            'code_phone' => 'Code Phone',
            'code_addtime' => 'Code Addtime',
        ];
    }


    /*
    * 发送验证码
    */
    public function getCode($code_phone)
    {
        $sysconfig = new SysConfig();
        $old_code = $this->find()->where(['code_phone'=>$code_phone])->asarray()->one();
        if(!empty($old_code)){
            if(time()-$old_code['set_time']>600){
                $this->deleteAll(['code_phone'=>$code_phone]); 
            }else{
                $code_rand = $old_code['code_rand'];
            }
        }
        if(preg_match("/1[34587]{1}\d{9}$/",$code_phone)){
            if(!isset($code_rand)){
                $code_rand = rand(111111,999999);
                $this->code_rand=$code_rand;
                $this->code_phone=$code_phone;
                $this->set_time=time();
                $this->save();
            }
            $sysconfig->config_key = "phone_content";
            $phone_content = $sysconfig->getValueBykey();
            $content = str_replace("{{verifyurl}}",$code_rand,$phone_content['config_value']);
            $curlPost = "account=cf_bwedu&password=education123&mobile=".$code_phone."&content=".rawurlencode("$content");
            $url = "http://106.ihuyi.cn/webservice/sms.php?method=Submit";
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_NOBODY, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
            $return_str = curl_exec($curl);
            curl_close($curl);
            return 1;
        }else{
            return 3;
        }
    }
    /*
    *   获取用户验证码
    */
    public function getUsercode($code_phone)
    {
        $re = $this->find()->where(['code_phone'=>$code_phone])->asarray()->one();
        if(time()-$re['set_time']>600){
            return '';
        }else{
            return $re['code_rand'];
        }   
    }
}
