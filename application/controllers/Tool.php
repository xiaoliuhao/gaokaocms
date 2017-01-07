<?php
/**
 * *******************************
 * gaokaocms
 * Author: Liu
 * Date: 2017/1/7 15:53
 * Version: 1.0
 *********************************
 */
class Tool extends CI_Controller {
    /**
     * 构造函数
     * school constructor.
     */
    public function __construct(){
        parent::__construct();
        $this->load->model('Tool_Model', 'tool');
    }

    public function index(){
        echo "ToolController";
    }

    public function get_all_province(){
        $data = $this->tool->get('province');
        $this->show(200, 'ok', $data);
    }

    public function get_all_zhuanye(){
        $data = $this->tool->get('zhuanye');
        $this->show(200, 'ok', $data);
    }
}