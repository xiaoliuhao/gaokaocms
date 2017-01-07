<?php 
class Career extends CI_Controller {
    /**
     * 构造函数
     * school constructor.
     */
    public function __construct(){
        parent::__construct();
        $this->load->model('School_Model', 'school');
    }
    
    public function index(){
        echo 'CareerController';
    }

    //获取题目分类列表
    public function get_list(){

    }

    //获取
    public function get_questions(){

    }
}