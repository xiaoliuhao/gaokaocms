<?php
/**
 * *******************************
 * gaokaocms
 * Author: Liu
 * Date: 2016/12/16 19:52
 * Version: 1.0
 *********************************
 */
class School_Model extends CI_Model {
    public function __construct(){
        parent::__construct();
    }

    /**
     * 获取学校简介
     * @param $name
     * @return mixed
     */
    public function get_info($name){
        return $this->base->select('*', 'schools', array('schoolname'=>$name));
    }

    /**
     * 获取学校详情
     * @param $name
     * @return mixed
     */
    public function get_detail($name){
        return $this->base->select('*', 'school_info', array('schoolname'=>$name));
    }
}