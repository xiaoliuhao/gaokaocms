<?php
/**
 * *********gaokaocms*******
 * Author: Liu               *
 * Date: 2016/12/1 20:45         *
 * Version: 1.0                  *
 *********************************
 */
class School extends CI_Controller {
    /**
     * 构造函数
     * school constructor.
     */
    public function __construct(){
        parent::__construct();
        $this->load->model('School_Model', 'school');
    }
    
    public function index(){
        echo 'SchoolController';
    }
    
    public function search(){
        $get['name'] = $this->input->get('name', true);
    }

    public function info(){
        //获取参数
        $name = $this->input->get('name', true);
        //获取简介
        $result = $this->school->get_info($name);
        //输出
        $this->response($result);
    }

    public function detail(){
        //获取参数
        $name = $this->input->get('name', true);
        //获取详情
        $result = $this->school->get_detail($name);
        //输出数据
        $this->response($result);
    }

}