<?php
/**
 * *******************************
 * gaokaocms
 * Author: Liu
 * Date: 2016/12/25 20:15
 * Version: 1.0
 *********************************
 */
class Zhuanye_Model extends CI_Model {
	public $needs = 'schoolid,schoolname,specialtyname,studenttype,year,batch,var,max,min';

    public function __construct(){
        parent::__construct();
    }

    public function select(array $array = array(), $page){
        return $this->base->select_with_page($this->needs, 'zhuanye_score', $array, $page);
    }

    public function get_all(){
        $sql = "select DISTINCT specialtyname from gk_zhuanye_score";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_by_school($school_name){
    	$data = $this->base->select_array($this->needs, 'zhuanye_score', array('schoolname'=>$school_name));
    	return $data;
    }


}