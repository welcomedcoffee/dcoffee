<?php
namespace common\components;

use Yii;
use OSS\OssClient;
use OSS\Core\OssException;

/**
 * OSS对象处理类
 */
class Oss
{
    public static $error   =  null;

    /**
     * 根据Config配置，得到一个OssClient实例
     * @params isCame  是否自定义域名
     * @return OssClient 一个OssClient实例
     */
    public static function getOssClient($isCname = false)
    {
        $config = Yii::$app->params['oss'];
        
        try {
            $ossClient = new OssClient($config['AccessKeyId'], $config['AccessKeySecret'], $config['Endpoint'], $isCname);
        } catch (OssException $e) {
            self::$error  = $e->getMessage();
            return null;
        }
        return $ossClient;
    }

    public static function getBucketName()
    {
        return Yii::$app->params['oss']['bucket'];
    }

    
    /**
     * 上传指定的本地文件内容
     *
     * @param string $object   保存名称
     * @param string $filePath 文件地址
     * @return null
     */
    public static function uploadFile($object, $filePath)
    {
        $ossClient = self::getOssClient();
        $bucket = self::getBucketName();

        $options = array();

        try {
            $ossClient->uploadFile($bucket, $object, $filePath, $options);
        } catch (OssException $e) {
            self::$error  = $e->getMessage();
            return false;
        }
        return true;
    }


    /**
     * 删除object
     *
     * @param OssClient $ossClient OssClient实例
     * @param string $bucket 存储空间名称
     * @param string $object 上传文件地址
     * @return null
     */
    public static function deleteObject($object)
    {
        $ossClient = self::getOssClient();
        $bucket = self::getBucketName();

        try {
            $ossClient->deleteObject($bucket, $object);
        } catch (OssException $e) {
            self::$error  = $e->getMessage();
            return false;
        }
        return true;
    }
    /**
     * 判断object是否存在
     *
     * @param OssClient $ossClient OssClient实例
     * @param string $bucket 存储空间名称
     * @return null
     */
    public static function doesObjectExist($object)
    {
        $ossClient = self::getOssClient();
        $bucket = self::getBucketName();

        try {
            $exist = $ossClient->doesObjectExist($bucket, $object);
        } catch (OssException $e) {
            self::$error  = $e->getMessage();
            return null;
        }
        return $exist;
    }

    /**
     * 生成GetObject的签名url,主要用于私有权限下的读访问控制
     *
     * @param $ossClient OssClient OssClient实例
     * @param $bucket string 存储空间名称
     * @return null
     */
    public static function getSignedUrl($object)
    {
        $ossClient = self::getOssClient();
        $bucket = self::getBucketName();

        $timeout = 3600;
        try {
            $signedUrl = $ossClient->signUrl($bucket, $object, $timeout);
        } catch (OssException $e) {
            self::$error  = $e->getMessage();
            return false;
        }
        return $signedUrl;
        
    }

}