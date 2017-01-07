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
    public $info_needs = 'schoolid,schoolname,province,schoolproperty,edudirectly,f985,f211,level,
                  membership,schoolnature,guanwang,oldname';

    public function __construct(){
        parent::__construct();
    }

    public function search($key, $page){
        $realpage = 20*($page-1);
        $sql = "select {$this->info_needs} from gk_schools WHERE schoolname like '%{$key}%' limit {$realpage},20";
//        return $this->db->select($this->info_needs)->from($this->db->dbprefix('schools'))->like('schoolname',$key)->get();
        $result = $this->db->query($sql)->result_array();
        return $result;
    }

    public function select(array $array = array(), $page){
        return $this->base->select_with_page($this->info_needs, 'schools', $array, $page);
    }

    /**
     * 获取学校简介
     * @param $name
     * @return mixed
     */
    public function get_info($name){
        return $this->base->select($this->info_needs, 'schools', array('schoolname'=>$name));
    }

    /**
     * 获取学校详情
     * @param $name
     * @return mixed
     */
    public function get_detail($name){
        return $this->base->select('*', 'school_info', array('schoolname'=>$name));
    }

    public function get_score($name){
        return $this->base->select_array('schoolname,studenttype,year,batch,var,max,min,num,fencha,provincescore,', 'school_score', array('schoolname'=>$name));
    }

}