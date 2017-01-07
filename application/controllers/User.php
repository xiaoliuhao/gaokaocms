<?php
/**
 * *********gaokaocms*******
 * Author: Liu               *
 * Date: 2016/12/5 21:53         *
 * Version: 1.0                  *
 *********************************
 */
header( 'Access-Control-Allow-Origin:*' );
class User extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('User_Model','user');
    }

    public function index(){
        echo date('Y-m-d H:i:s');
    }

    /**
     * 用户绑定
     */
    public function bind(){
        $post['userid']   = $this->input->post('userid', true);
        $post['name']     = $this->input->post('name', true);
        $post['passwd']   = $this->input->post('passwd', true);
        $post['passwd2']  = $this->input->post('passwd2', true);
        $post['code']     = $this->input->post('code', true);
        $this->_check($post);
        //判断激活码是否有效
//        $post['code'] = 'DD3B9D718280'; //测试用的激活码
        $code_info = $this->base->select('isset','code', array('code'=>$post['code']));
        //$code_info['isset'] == 1表示已经被使用过, 为0表示还未使用过
        if($code_info['isset'] || !isset($code_info['isset'])){
            $this->show(403, '此注册码已使用');
        }
        //判断两次密码是否一致
        if($post['passwd'] != $post['passwd2']){
            $this->show(203,'两次密码不一致');
        }
        //判断用户名是否存在
        $user = $this->base->select('userid', 'user', array('userid'=>$post['userid']));
        if($user){
            $this->show(202,'用户名已经存在');
        }
        //todo:密码加密
        //插入用户数据
        $insert = $this->base->insert('user',
            array(
                'userid'   => $post['userid'],
                'name'     => $post['name'],
                'password' => $post['passwd']
            )
        );
        //更新验证码为使用状态
        $this->user->active($post['code'], $post['userid']);
        //判断是否插入成功
        if($insert){
            $this->show(200,'ok');
        }else{
            $this->show(201,'绑定失败,请重试');
        }
    }

    public function login(){
        $post['userid'] = $this->input->post('userid', true);
        $post['passwd'] = $this->input->post('passwd', true);
        $this->_check($post);
        //todo:密码加密处理
        $user_info = $this->user->get_user_info($post['userid'], $post['passwd']);
//        $this->show(200, 'ok', $user_info);
        if(!$user_info){
            $this->show(404, '用户名不存在或密码错误');
        }
        $this->show(200, 'ok', $user_info);
    }

    /**
     * 重置密码
     */
    public function reset_passwd(){
        $post['userid'] = $this->input->post('userid', true);
        $post['passwd'] = $this->input->post('passwd', true);
        $post['new_passwd'] = $this->input->post('new_passwd', true);
        $post['new_passwd2']= $this->input->post('new_passwd2', true);
        //检查参数
        $this->_check($post);
        //两次新密码是否相同
        if($post['new_passwd'] != $post['new_passwd2']){
            $this->show(203, '两次密码不一致');
        }
        //判断用户密码是否正确
        $_check = $this->user->check_passwd($post['userid'], $post['passwd']);
        //密码错误
        if(!$_check){
            $this->show(404,'用户名不存在或密码错误');
        }
        //更新密码
        $result = $this->user->reset_passwd($post['userid'], $post['new_passwd']);
        if($result){
            $this->show(200, 'ok');
        }else{
            $this->show(503, '修改密码失败,请重试');
        }
    }



    /**
     * 生成12位激活码 一次1000条记录
     */
//    public function set(){
//        for($i = 0; $i<1000; $i++){
//            $rank = rand(0,9999);//产生一个4位随机数
//            //将上面的$rank与当前时间连接,精确到秒|md5生成32位字符串, 截取12位  随机从0~19位开始
//            $str = substr(strtoupper(md5($rank.time())), rand(0, 19), 12);
//            $bool = $this->base->insert('code', array('code'=>$str, 'isset'=>0));
//            if(!$bool){
//                echo '插入失败'.'<br>';
//            }else{
//                echo '插入成功:'.$str.'<br>';
//            }
//        }
//    }
}