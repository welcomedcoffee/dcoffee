<?php
namespace common\components;
use \PHPExcel;

/**
 * 作者：d.coffee
 * 时间：2016-1-25
 * 功能：二维数组生成为Excel
 */
class CreateExcel{
    
    public $act_sheet;  //当前活动的sheet对象
    
    public $act_writer; 

    private $_cell = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
    
    /**
     * @params $options 配置信息
     * @params $options['creator']    创建者
     * @params $options['lastmodify'] 最后修改者
     * @params $options['title']      标题
     */
    public function __construct($options = []){
        $objExcel = new PHPExcel();
		$objProps = $objExcel->getProperties();   
		$objWriter = new \PHPExcel_Writer_Excel2007($objExcel);
        //处理配置
        //$creator = $options['creator'] ? $options['creator'] : "高阳明天科技";
		$creator = '咖啡豆科技';
        //$lastmodify = $options['lastmodify'] ? $options['lastmodify'] : "高阳明天";
		$lastmodify = '咖啡豆';
        //$title = $options['title'] ? $options['title'] : "Office XLS Document";
		$title = '咖啡豆账单';
        //$subject = $options['subject'] ? $options['subject'] : "Office XLS Document";
		$subject ="Office XLS Document";
        //$description = $options['description'] ? $options['description'] : "excel Data";
		$description = "excel Data";
        //$keywords = $options['keywords'] ? $options['keywords'] : "excel Data";
		$keywords = "excel Data";
        //$category = $options['category'] ? $options['category'] : "Data";
        $category = "Data";

		$objProps->setCreator($creator);   
		$objProps->setLastModifiedBy($lastmodify);   
		$objProps->setTitle($title);   
		$objProps->setSubject($subject);   
		$objProps->setDescription($description);   
		$objProps->setKeywords($keywords);   
		$objProps->setCategory($category);   
		$objExcel->setActiveSheetIndex(0);   
		$objActSheet = $objExcel->getActiveSheet();
        $this->act_writer = $objWriter;
        $this->act_sheet = $objActSheet;
    }


    /**
     * @params $data   被处理的数据，二维数组
     * @params $output 生成后的文件名称
     * @params $field  每列的标题，一维数据
     */
    public function createByArray($data, $output, $field){
        if ( !is_array($data) || !$data ) {
            return false;
        }

        //处理数据 
		//array_values  函数返回一个包含给定数组中所有键值的数组，但不保留键名。
        foreach ( $data as $key => $value ) {
            $data[$key] = array_values($value); 
        }


        //设置单元格头部及样式
        for ( $i = 0; $i < count($data[0]); $i++ ) {
            $this->act_sheet->setCellValue($this->_cell[$i].'1', $field[$i]);
            $this->act_sheet->getColumnDimension($this->_cell[$i])->setWidth(20);
        }

        //填充数据
        $j = 1;
        foreach ( $data as $key => $item ) {
            $j++;
            foreach ( $item as $k => $v ) {
                $this->act_sheet->setCellValue($this->_cell[$k].$j, $v);
            }
        }
        //设置下载后的文件名
        $outputFileName = $output.'.xlsx'; 
		
		//启动下载窗口
		header("Content-Type:application/octet-stream;charset=utf-8");
		header('Content-Disposition: attachment; filename='.$outputFileName); 
		$this->act_writer->save('php://output');
    }
}