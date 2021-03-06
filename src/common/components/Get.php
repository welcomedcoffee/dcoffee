<?php

namespace common\components;

use Yii;

class Get {
	function gmt_iso8601($time) {
        $dtStr = date("c", $time);
		$pos = strpos($dtStr, '+');
        $expiration = substr($dtStr, 0, $pos);
        return $expiration."Z";
    }
	public function get_oss($str){
		require_once 'oss_php_sdk_20140625/sdk.class.php';
		
		$config = Yii::$app->params['oss'];
		$id   = $config['AccessKeyId'];
		$key  = $config['AccessKeySecret'];
		$host = $config['Host'];
        $bindUrl = $config['BindUrl'];



		$callback_body = '{"callbackUrl":"http://oss-demo.aliyuncs.com:23450","callbackHost":"oss-demo.aliyuncs.com","callbackBody":"filename=${object}&size=${size}&mimeType=${mimeType}&height=${imageInfo.height}&width=${imageInfo.width}","callbackBodyType":"application/x-www-form-urlencoded"}';

        //$callback_body = '{"callbackUrl":"http://finance.coffeedou.com/oss.php","callbackHost":"finance.coffeedou.com","callbackBody":"filename=${object}&size=${size}&mimeType=${mimeType}&height=${imageInfo.height}&width=${imageInfo.width}","callbackBodyType":"application/x-www-form-urlencoded"}';


		$base64_callback_body = base64_encode($callback_body);
		
		
		$now = time();
		$expire = 10; //设置该policy超时时间是10s. 即这个policy过了这个有效时间，将不能访问
		$end = $now + $expire;
		$expiration = $this -> gmt_iso8601($end);
		

		//$oss_sdk_service = new alioss($id, $key, $host);
		$dir = 'user-dir/'.$str;

		//最大文件大小.用户可以自己设置
		$condition = array(0=>'content-length-range', 1=>0, 2=>1048576000);
		$conditions[] = $condition; 

		//表示用户上传的数据,必须是以$dir开始, 不然上传会失败,这一步不是必须项,只是为了安全起见,防止用户通过policy上传到别人的目录
		$start = array(0=>'starts-with', 1=>'$key', 2=>$dir);
		$conditions[] = $start; 


		$arr = array('expiration'=>$expiration,'conditions'=>$conditions);
		//echo json_encode($arr);
		//return;
		$policy = json_encode($arr);
		$base64_policy = base64_encode($policy);
		$string_to_sign = $base64_policy;
		$signature = base64_encode(hash_hmac('sha1', $string_to_sign, $key, true));

		$response = array();
		$response['accessid'] = $id;
		$response['host'] = $host;
		$response['policy'] = $base64_policy;
		$response['signature'] = $signature;
		$response['expire'] = $end;
		$response['callback'] = $base64_callback_body;
        $response['bindUrl'] = $bindUrl;
		//这个参数是设置用户上传指定的前缀
		$response['dir'] = $dir;
		echo json_encode($response);
	}
    
}
?>
