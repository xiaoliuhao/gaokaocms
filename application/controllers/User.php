<?php
/**
 * *********gaokaocms*******
 * Author: Liu               *
 * Date: 2016/12/5 21:53         *
 * Version: 1.0                  *
 *********************************
 */
class User extends CI_Controller {
    public function __construct(){

    }

    public function index(){
        echo date('Y-m-d H:i:s');
    }
}