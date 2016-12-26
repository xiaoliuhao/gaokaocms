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
        $page            = $this->input->get('page', true)?$this->input->get('page', true):'1';
        $get['province'] = $this->input->get('province', true);
        $get['level']    = $this->input->get('level', true);
        $get['property'] = $this->input->get('property', true);
        $params = array();
        foreach($get as $key => $value){
            if($value){
                $params[$key] = $value;
            }
        }
        $data = $this->school->search($params, $page);

        $this->show(200, 'ok', $data);
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