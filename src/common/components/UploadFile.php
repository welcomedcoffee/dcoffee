<?php
namespace common\components;
use Yii;
use common\components\Local;
use common\components\Oss;

/**
 * 项目图片上传统一接口
 */
class UploadFile {
    /**
     * 1、生成缩略图
     * 2、判断格式
     * 3、选择保存方式  本地 or oss
     * 4、错误保存返回保存路径
     * 5、记录错误信息
     */
    public $instance;

    public $isOss = null;

    public $errorMsg = null;

    public $successMsg = null;

    /**
     * 初始化对象
     */
    public function __construct($isOss = true)
    {
        $this->instance = new Local();
        $this->isOss = $isOss;
    }

    /**
     * 上传方法, 缩略图前缀为  big_  medium_  small_   
     * @params string $size 上传大小限制
     * @params array  $width 缩略图宽度尺寸
     * @params array  $height 缩略图高度尺寸
     * @return null
     */
    public function upload($size = 3145728, $width = ['50', '200', '400'], $height = ['50', '200', '400'])
    {
        //设置上传限制
        $this->maxSize  = $size;
        $this->allowExts  = array('jpg', 'gif', 'png', 'jpeg');

        //设置保存目录
        $this->savePath =  './public/uploads/';

        //启用子目录保存文件
        $this->autoSub  =  true;

        //子目录创建方式 可以使用hash date custom
        $this->subType  =  'date';
        
        //设置生成缩略图
        $this->thumb = true;
        $this->thumbMaxWidth = implode(',', $width);
        $this->thumbMaxHeight = implode(',', $height);
        $thumbFile = ['small_', 'medium_', 'big_'];
        $this->thumbFile = implode(',', $thumbFile);

        //var_dump($this->instance);die;

        //获取上传结果
        if(! $this->instance->upload()) {
            $this->errorMsg = $this->instance->getErrorMsg();
            return false;
        }else{
            $fileInfo = $this->instance->getUploadFileInfo();
            
            if ($this->isOss) {
                //上传缩略图
                foreach ($fileInfo as $index => $item) {
                    foreach ($thumbFile as $key => $value) {
                        $object = str_replace('/', '/' . $value, $fileInfo[$index]['savename']);

                        $filePath = $fileInfo[$index]['savepath'] . $object;

                        if (Oss::uploadFile($object, $filePath)){
                            //删除原图
                            unlink($filePath);
                        } else {
                            $this->errorMsg = Oss::$error;
                            return false;
                        }
                    }
                }
                $this->successMsg = $fileInfo;
                return true;

                //删除本地图片
            } else {
                $this->successMsg = $fileInfo;
                return true;
            }
        }
    }
    
    
    public function __get($name){
        return $this->instance->$name;
    }

    public function __set($name,$value){
        $this->instance->$name = $value;
    }


    
}