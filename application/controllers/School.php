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
        $this->load->model('Zhuanye_Model', 'zhuanye');
    }
    
    public function index(){
        echo 'SchoolController';
    }

    /**
     * 搜索学校
     */
    public function search(){
        $key    = $this->input->get('key', true);
        $page   = $this->input->get('page', true)?$this->input->get('page', true):'1';
        $data   = $this->school->search($key, $page);
        $this->show(200,'ok',$data);
    }

    /**
     * 查询学校
     */
    public function select(){
        $page            = $this->input->get('page', true)?$this->input->get('page', true):'1';
        $get['province'] = $this->input->get('province', true);
        $get['level']    = $this->input->get('level', true);
        $get['property'] = $this->input->get('property', true);
        $get['f985']     = $this->input->get('985', true);
        $get['f211']     = $this->input->get('211', true);
        $params = array();
        foreach($get as $key => $value){
            if($value){
                $params[$key] = $value;
            }
        }
        $data = $this->school->select($params, $page);
        if(!$data){
            $this->show(403,'暂无数据');
        }
        $this->show(200, 'ok', $data);
    }

    /**
     * 获取学校简介
     */
    public function info(){
        //获取参数
        $name = $this->input->get('name', true);
        //获取简介
        $result = $this->school->get_info($name);
        //输出
        $this->response($result);
    }

    /**
     * 获取学校详情
     */
    public function detail(){
        //获取参数
        $name = $this->input->get('name', true);
        //获取详情
        $result = $this->school->get_detail($name);
        //输出数据
        $this->response($result);
    }

    public function score(){
        //获取参数
        $name = $this->input->get('name', true);
        $result = $this->school->get_score($name);
        //输出数据
        $this->response($result);
    }
    
    public function zhuanye(){
        $name = $this->input->get('name', true);
        $result = $this->zhuanye->get_by_school($name);
        $this->response($result);
    }

}