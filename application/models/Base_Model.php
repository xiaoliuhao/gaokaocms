<?php
/**
 * *********gaokaocms*******
 * Author: Liu               *
 * Date: 2016/12/1 20:46         *
 * Version: 1.0                  *
 *********************************
 */
class Base_Model extends CI_Model {
    /**
     * 构造函数
     * Base constructor.
     */
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->base_url = $this->config->item('base_url');
    }

    /**
     * select_needs
     * @access public
     * @param $needs
     * @param $table
     * @param $array
     * @return mixed
     */
    public function select($needs,$table,$array){
        return $this->db->select($needs)->get_where($this->db->dbprefix($table),$array)->row_array();

    }
    public function select_any($needs,$table){
        $data  = $this->db->select($needs)->from($table)->get()->result_array();
//        $data = $res->result_array();
        return $data;
    }

    /**
     * @param $needs
     * @param $table
     * @param $array
     * @param int $page
     * @param int $rows
     * @return mixed
     */
    public function select_with_page($needs, $table, $array, $page = 1, $rows = 20){
        return $this->db->select($needs)->from($table)->where($array)->limit($rows, ($page-1)*$rows)->get()->result_array();
    }

    /**
     * select_array_needs
     * @access public
     * @param $needs
     * @param $table
     * @param $array
     * @return mixed
     */
    public function select_array($needs,$table,$array){
        return $this->db->select($needs)->from($table)->where($array)->get()->result_array();
    }
    /**
     * insert  插入数据
     * @access public
     * @param $table    需要插入的数据库表名
     * @param $data     需要插入的值
     * @return mixed    返回影响的行数 一般为1
     */
    public function insert($table,$data){
        $this->db->insert($this->db->dbprefix($table),$data);
        return $this->db->affected_rows();
    }
    /**
     * update   更新数据库中的数据
     * @access public
     * @param $table    需要更新的表名
     * @param $data     需要更新的数据
     * @param $where    更新条件
     * @return mixed    返回影响的行数 一般为1
     */
    public function update($table,$data,$where){
        $this->db->update($table,$data,$where);
        return $this->db->affected_rows();
    }

    public function delete($table,$where){
        $this->db->delete($table,$where);
        return $this->dn->affected_rows();
    }

    public function write_user_log($uid,$action){
        $ip = $_SERVER["REMOTE_ADDR"];
        $this->db->insert('user_log',array('uid'=>$uid,'action'=>$action,'ip'=>$ip,'time'=>date('Y-m-d H:i:s')));
    }
    /**
     * write_group_log 写入群组日志
     * @access public
     * @param $gid
     * @param $uid
     * @param $action
     */
    public function write_group_log($gid,$uid,$action){
        $ip = $_SERVER["REMOTE_ADDR"];
        $this->db->insert('group_log',array('g_id'=>$gid,'uid'=>$uid,'action'=>$action,'ip'=>$ip,'time'=>date('Y-m-d H:i:s')));
    }
}