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
    public function __construct(){
        parent::__construct();
    }

    public function get_all(){
        $sql = "select DISTINCT specialtyname from gk_zhuanye_score";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}