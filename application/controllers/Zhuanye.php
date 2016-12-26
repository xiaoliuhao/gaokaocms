<?php
/**
 * *******************************
 * gaokaocms
 * Author: Liu
 * Date: 2016/12/25 20:13
 * Version: 1.0
 *********************************
 */
class Zhuanye extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Zhuanye_Model', 'zhuanye');
    }

    public function index(){
        echo "ZhuanyeController";
    }

    public function get_all(){
        $data = $this->zhuanye->get_all();
        $this->show(200,'ok',$data);
    }
}