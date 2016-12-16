<?php
/**
 * *******************************
 * gaokaocms
 * Author: Liu
 * Date: 2016/12/5 22:17
 * Version: 1.0
 *********************************
 */

class User_Model extends CI_Model {
    /**
     * User_Model constructor.
     */
    public function __construct(){
        parent::__construct();
    }

    /**
     * 获取用户信息
     * @param $userid
     * @param $passwd
     * @return mixed
     */
    public function get_user_info($userid, $passwd){
        return $this->base->select('userid,name,tel,score,rank,sex,photo', 'user', array('userid'=>$userid, 'password'=>$passwd));
    }

    /**
     * 激活绑定状态
     * @param $code
     * @param $userid
     */
    public function active($code, $userid){
        $this->base->update('code', array('isset'=>1, 'userid'=>$userid));
    }

    /**
     * 检查用户密码是否正确
     * @param $userid
     * @param $passwd
     * @return bool
     */
    public function check_passwd($userid, $passwd){
        $user = $this->base->select('password', 'user', array('userid'=>$userid));
        return $user['password']==$passwd?true:false;
    }

    /**
     * 重置密码
     * @param $userid
     * @param $passwd
     * @return mixed
     */
    public function reset_passwd($userid, $passwd){
        return $this->base->update('user', array('password'=>$passwd), array('userid'=>$userid));
    }
}