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
//        $this->show(200,'ok',$data);
        echo json_encode($data);
    }

    public function select(){
        $page            = $this->input->get('page', true)?$this->input->get('page', true):'1';
        $get['studenttype'] = $this->input->get('studenttype', true);
        $get['province']    = $this->input->get('province', true);
        $get['specialtyname'] = $this->input->get('name', true);
        $get['batch']         = $this->input->get('batch', true);
        $get['year']          = $this->input->get('year', true);

        $params = array();
        foreach($get as $key => $value){
            if($value){
                $params[$key] = $value;
            }
        }
        $data = $this->zhuanye->select($params, $page);
        if(!$data){
            $this->show(403,'暂无数据');
        }
        $this->show(200, 'ok', $data);
    }

    public function get_score_by_school(){

    }

}