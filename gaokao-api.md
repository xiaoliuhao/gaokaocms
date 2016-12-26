##用户类

**注册**
  *    地址：`http://www.zhuangyuanlangvip.com/zhuangyuanlang/api/user/bind`
  
       * 查询值：`POST`
 
       ``` json
       {
            "userid":"470401911",    //用户账号
            "name":"刘浩",           //用户昵称
            "passwd":"123456"       //密码
            "passwd2":"123456"      //确认密码
            "code":"DD3B9D718280"   //注册码(卡上的密码)
       }
       ```
  
       * 返回值：
  
       ``` json
       // success
       {
            "status":200,
            "message": "ok",
            "data":""
       }
       // error
       { 
            "status":"不为200", 
            "message": "具体的信息",
            "data": ""
       }
       //以下几种情况:
       //201=>绑定失败,请重试   202=>用户名已存在  203=>两次密码不一致
       //400=>参数错误(参数不能为空)   403=>此注册码已使用
       ```

**登录**
  *    地址：`http://www.zhuangyuanlangvip.com/zhuangyuanlang/api/user/login`
  
       * 查询值：`POST`
 
       ``` json
       {
            "userid":"470401911",    //用户账号
            "passwd":"123456"       //密码
       }
       ```
  
       * 返回值：
  
       ``` json
       // success
       {
            "status":200,
            "message": "ok",
            "data":""
       }
       // error
       { 
            "status":"不为200", 
            "message": "具体的信息",
            "data": ""
       }
       //以下几种情况:
       //201=>绑定失败,请重试,202=>用户名已存在,203=>两次密码不一致
       //403=>此注册码已使用,
       ```
## 学校类
