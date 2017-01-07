##用户类

**注册**
  *    地址：`http://www.zhuangyuanlangvip.com/zhuangyuanlang/api/user/bind`
  
       * 查询值：`POST`
 
       ``` json
       {
            "userid":"470401911",    //用户账号
            "name":"刘浩",           //用户昵称
            "passwd":"123456",       //密码
            "passwd2":"123456",      //确认密码
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
       //403=>此注册码已使用,404=>用户名不存在或密码错误
       ```


**修改密码**
  *    地址：`http://www.zhuangyuanlangvip.com/zhuangyuanlang/api/user/reset_password`
  
       * 查询值：`POST`
 
       ``` json
       {
            "userid":"470401911",    //用户账号
            "passwd":"123456"       //密码
            "new_passwd":"654321",        //新密码
            "new_passwd2":"654321",       //确认密码
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
       //203=>两次密码不一致
       //403=>此注册码已使用,404=>用户名不存在或密码错误
       //503=>修改密码失败,请重试
       ```

## 学校类

**搜索**
  *    地址：`http://www.zhuangyuanlangvip.com/zhuangyuanlang/api/school/search?key=北京大学`
  
       * 查询值：`GET`
 
       ``` json
       {
            "name":"北京大学"   //需要搜索的学校名
            "page":"1"         //页码 一页20条
       }
       ```
  
       * 返回值：
  
       ``` json
       // success
       {
            "status":200,
            "message": "ok",
            "data":[
                        {
                            "schoolid": "31",            //学校id
                            "schoolname": "北京大学",     //学校名字
                            "province": "北京",           //省份
                            "schoolproperty": "综合类",   //种类
                            "edudirectly": "1",          //是否教育部直属
                            "f985": "1",                 //985
                            "f211": "1",                 //211
                            "level": "本科",             //本科,专科
                            "membership": "教育部",       //举办
                            "schoolnature": "公办",        //公办民办
                            "guanwang": "http://www.pku.edu.cn", //官网
                            "oldname": "北京大学"            //曾用名
                        },
                        {
                            ...
                        }
                    ]
       }
       // error
       { 
            "status":"不为200", 
            "message": "具体的信息",
            "data": ""
       }
       //一般不会有问题
       ```


**筛选**
  *    地址：`http://www.zhuangyuanlangvip.com/zhuangyuanlang/api/school/select?page=1&province=北京`
  
       * 查询值：`GET`
 
       ``` json
       {
            "page":"1",             //页码
            "province":"北京"       //省份
            "level":"本科",         //本科、专科
            "property":"654321",    //学校分类 get_property中获取
            "f985":"1",             //985院校1为是 0否
            "f211":"1",             //211院校 同上
       }
       ```
  > 以上几个值需要搜什么就传什么不需要则不传或传空值
  
       * 返回值：
  
       ``` json
       // success
       {
            "status":200,
            "message": "ok",
            "data":[
                       {
                           "schoolid": "31",            //学校id
                           "schoolname": "北京大学",     //学校名字
                           "province": "北京",           //省份
                           "schoolproperty": "综合类",   //种类
                           "edudirectly": "1",          //是否教育部直属
                           "f985": "1",                 //985
                           "f211": "1",                 //211
                           "level": "本科",             //本科,专科
                           "membership": "教育部",       //举办
                           "schoolnature": "公办",        //公办民办
                           "guanwang": "http://www.pku.edu.cn", //官网
                           "oldname": "北京大学"            //曾用名
                       },
                       {
                        ...
                       }
                   ]
       }
       // error
       { 
            "status":"不为200", 
            "message": "具体的信息",
            "data": ""
       }
       //一般不会有问题
       ```

**获取学校简介**
  *    地址：`http://www.zhuangyuanlangvip.com/zhuangyuanlang/api/school/info?name=北京大学`
  
       * 查询值：`GET`
 
       ``` json
       {
            "name":"北京大学"   //学校名称 上面列表中存在的学校名称 模糊搜索需要别的接口
       }
       ```
  
       * 返回值：
  
       ``` json
       // success
       {
            "status":200,
            "message": "ok",
            "data":{
                       "schoolid": "31",            //学校id
                       "schoolname": "北京大学",     //学校名字
                       "province": "北京",           //省份
                       "schoolproperty": "综合类",   //种类
                       "edudirectly": "1",          //是否教育部直属
                       "f985": "1",                 //985
                       "f211": "1",                 //211
                       "level": "本科",             //本科,专科
                       "membership": "教育部",       //举办
                       "schoolnature": "公办",        //公办民办
                       "guanwang": "http://www.pku.edu.cn", //官网
                       "oldname": "北京大学"            //曾用名
                   }
       }
       // error
       { 
            "status":"不为200", 
            "message": "具体的信息",
            "data": ""
       }
       //一般不会有问题
       ```
       
**获取学校详情**
  *    地址：`http://www.zhuangyuanlangvip.com/zhuangyuanlang/api/school/detail?name=北京大学`
  
       * 查询值：`GET`
 
       ``` json
       {
            "name":"北京大学"   //学校名称 上面列表中存在的学校名称 模糊搜索需要别的接口
       }
       ```
  
       * 返回值：
  
       ``` json
       // success
       {
            "status":200,
            "message": "ok",
            "data":{
                       "schoolid": "31",                            //学校id
                       "schoolname": "北京大学",                     //学校名称
                       "shoufei": "北京大学校本部学费收费标准：....",  //收费标准
                       "jianjie": "北京大学创于1898年..."             //学校简介
                   }
       }
       // error
       { 
            "status":"不为200", 
            "message": "具体的信息",
            "data": ""
       }
       //一般不会有问题
       ```
       
**获取学校分数线**
  *    地址：`http://www.zhuangyuanlangvip.com/zhuangyuanlang/api/school/score?name=北京大学`
  
       * 查询值：`GET`
 
       ``` json
       {
            "name":"北京大学"   //学校名称 上面列表中存在的学校名称 模糊搜索需要别的接口
       }
       ```
  
       * 返回值：
  
       ``` json
       // success
       {
            "status":200,
            "message": "ok",
            "data":[
                       {
                           "schoolname": "北京大学",
                           "studenttype": "文科",
                           "year": "2013",        //年份
                           "batch": "本科一批",    //批次
                           "var": "602",          //平均分
                           "max": "615",          //最高分
                           "min": "588",          //最低分
                           "num": "7",            //人数
                           "fencha": "128",       //分差
                           "provincescore": "474" //省控线
                       }
                   ]
       }
       // error
       { 
            "status":"403", 
            "message": "暂无记录",
            "data": ""
       }
       //一般不会有问题
       ```


## 辅助工具类
**获取所有专业(无分页)**
  *    地址：`http://www.zhuangyuanlangvip.com/zhuangyuanlang/api/zhuanye/all`
  
       * 返回值：
  
       ``` json
       // success
       {
            "status":200,
            "message": "ok",
            "data":[
                       {
                           "specialtyname": "物理学类"
                       },
                       {
                           "specialtyname": "环境科学"
                       }
                   ]
       }
       //一般不会有问题
       ```

**获取所有省份**
  *    地址：`http://www.zhuangyuanlangvip.com/zhuangyuanlang/api/tool/get_all_province`
  
       * 返回值：
  
       ``` json
       // success
       {
            "status":200,
            "message": "ok",
            "data":[
                       {
                           "province": "北京"
                       },
                       {
                           "province": "内蒙古"
                       }
                   ]
       }

## 专业类


