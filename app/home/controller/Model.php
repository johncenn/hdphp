<?php namespace app\home\controller;

use houdunwang\route\Controller;
use system\model\News;
use system\model\Test;
use system\model\User;

class Model extends Controller{
    //动作
    public function index(){
        //此处书写代码...
    }
    
    
    public function test_model(){
        
        //$res = Test::find(1);
       /*  $res = Test::find(1)->toArray();//把模型对象转为数组
        p($res); */
        
        
        //$test_model = new Test();
        //$res = $test_model->find(2);
        
        
        // 查找id为8的用户数据，返回值为数组
        //$res = Test::where('id','1')->get();
        
        
        //使用model构造模型
        //$res = model('test')->get()->toArray();
        
        //增加
        /* $test_db = new Test();
        $test_db->name = "cc";
        $res = $test_db->save(); */
        
        //$test_db = new Test();
        //$res = $test_db->save(['title'=>'百度']);//要在model里看去允许数据填充
        
        
        //更新
        /* $test_db = Test::find(2);
        $test_db->title='腾讯';
        $res = $test_db->save(); */
        
        /* $test_db = Test::find(2);
        $res = $test_db->touch();//$timestamps 要为true */
        
        //$test_db = Test::find(4);
        $test_db = new Test();
        $res = $test_db->where('id',3)->update(['title'=>'哈哈哈']);
        
        
        //删除
        $test_db = Test::find(2);
        $res = $test_db->destory();
        
        
        dd($res);
    }
    
    
    
    
    public function base(){
        
        
        //news 表不行
        /* $news = new Test();
        $res = $news->find(2);
        dd($res); */
        
        
        //$res = News::where('uid',2)->get();
        
        //$news = new News();
       // $res = $news->where('id>1')->get();
        
        //新增
       /*  $news['title'] = 'add2';
        $news['click'] = 100;
        $news['uid'] = 3;
        $res = $news->save(); */
        
        //更新
        //$model = News::where('id = 2')->get(); // 查找主键为1的数据
//         $model->title = 'hdphp'; // 修改数据对象
//         $model->save(); // 保存当前数据对象
       // p($res[0]['title']);
        //p($model[0]['title']);
        
    }
    
    
    //验证
    public function verification(){
        
       /*  required                 	必须输入
        isnull					  	字段为空时验证失败
        email                    	邮箱
        http                        网址
        tel                         固定电话
        phone                    	手机
        zipCode                     邮政编码
        num                      	数字范围 如：num:20,60
        range                       长度范围(位数)如 : range:5,20
        maxlen                   	最大长度如：maxlen:10
        minlen                   	最少长度如：minlen:10
        regexp                      正则如：regexp:/^\d{5,20}$/
        confirm                  	两个字段值比对如：confirm:password2
        china                   	内容为中文或字母时验证通过
        identity                	身份证
        unique					   数据表值唯一如:unique:news,id (id为表主键）
        exists					    存在这个字段时验证失败
        captcha					 验证码 */
        
        
        if(IS_POST){
           // Validate::make([
               /*  ['username','required','账号不能为空'],
                ['password','required','密码不能为空'],
                ['password','confirm:password2','密码不一致'], */
               // ['code','captcha','验证码错误']
           // ]);
           
            //闭包添加自定义验证规则
            /* Validate::make([
                ["username",function($val){
                    return Db::table('user')->where('name',$val)->get()?false:true;
                },"用户名存在"]
            ]); */
            
            //追加验证规则
           /*  Validate::extend('checkuser',function($field,$value,$params){
                //dd($field);
               
                //dd($value);
                //exit();
                return Db::table("user")->where('name',$value)->get()?false:true;
            });
            
                Validate::make([
                    ['username','checkuser','用户已存在']
                ]);
            
            //当默认处理验证失败
            if(Validate::fail()){
                //输出错误信息
                View::with('errors',Validate::getError());
            	echo '验证失败';
            }else{
                echo "验证通过";
            } */
            
            $user_model = new User();
            
            //dd($user_model);die;
            $user_model['name'] = Request::post('username');
            $user_model['password'] = Request::post('password');
            $user_model['password2'] = Request::post('password2');
            $user_model['email'] = Request::post('email');
            $res = $user_model->save();
            p($res);
            //echo "验证通过";
        }
        
        
        return view();
    }
    
    public function code(){
        Code::make();
    }
    
    public function auto(){
        
        if(IS_POST){
            
            $user = new User();
            $user->name = Request::post('username');
            $user->group = Request::post('groupid');
            $user->age = Request::post('age');
            $res = $user->save();
            dd($res);
        }
        
        return view();
       
    }
    
    public function filter(){
        
        $user = User::find(14);
        if(IS_POST){
            $user->email = Request::post('email');
            $user->password = Request::post('password');
            $user->save();
        }
        View::with('user',$user);
        
       // p($user);
        
        return view();
    }
    
    
    public function fill(){
        
        
        
        if(IS_POST){
            $user = new User();
            $user->group = 6;
            $user->save(['name'=>'xx','password'=>'567']);
            //$res = $user->save(Request::post());
            p($res);
        }
        
        return view();
    }
    
}














