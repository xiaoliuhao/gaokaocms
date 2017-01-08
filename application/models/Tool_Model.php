<?php
/**
 * *******************************
 * gaokaocms
 * Author: Liu
 * Date: 2017/1/7 15:55
 * Version: 1.0
 *********************************
 */
class Tool_Model extends CI_Model {
    public $cache_path = './cache/';


    public function __construct(){
        parent::__construct();
    }

    public function get_all(){
        $sql = "select DISTINCT schoolproperty from gk_schools";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get($str){
        $json = file_get_contents($this->cache_path.$str.'.json');
        return json_decode($json, true);
    }

}