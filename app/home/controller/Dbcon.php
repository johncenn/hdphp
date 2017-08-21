<?php namespace app\home\controller;

use houdunwang\route\Controller;

class Dbcon extends Controller{
    //动作
    public function index(){
        //此处书写代码...
    }
    
    //连接数据库
    public function connect(){
        
        $res = Db::table('news')->get();
        p($res);
        
    }
    
    public function core_insert(){
        
        //$res = Db::table('news')->insert(['title'=>'system']);
        
        //$res = Db::table('news')->insert(['title'=>'system2','name'=>'qq']);
        
        //使用预处理方式插入
        //$res = Db::execute("update sy_news set click=:click",[':click'=>15]);
        
        //问好占位符
        //$res = Db::execute("update sy_news set click=? where id = ?",['1110','2']);
        
        //replace:如果不存在主键，则插入，存在则更新（不好用）
        //$res = Db::table('news')->replace(['id'=>1,'title'=>'西欧阿米','click'=>9]);
        
        //插入时获取自增主键id
        //$res = Db::table('news')->insert(['title'=>'systemzz']);
        //echo Db::getInsertId();
        
        //插入时获取自增主键id 2
        $res = Db::table('news')->insertGetId(['title'=>'systemzz']);
        p($res);
        
        
        //p($res);
    }
    
    
    public function core_update(){
         
        $res = Db::table('news')->where("id",1)->update(['title'=>'论坛']);
        p($res);
    }
    
    public function core_Del(){
        
        //$res = Db::table('news')->where('id',1)->delete();
        //删除指定的主键值
        //Db::table('news')->delete(5);
        //Db::table('user')->delete([2,3,5]);
        
        //使click增加2
        //$res = Db::table("news")->where('id',2)->increment('click',2);
        
        //使click减少12
        //Db::table("news")->where('id',2)->decrement('click',12);
        
        //获取受影响条数
       $db = Db::table('news');
        $db->where('id in (5,7,9,10)')->delete();
        p(Db::getQueryLog());
        p($db->getAffectedRow());
        //p($res);
    }
    
    
    public function query(){
        
        //从数据表中取得所有的数据列
        //$res = Db::table('news')->get();
        
        //取得指定的字段
        //$res = Db::table('news')->get(['title','click']);
        
        //从数据表中取得单一数据列
        //$res = Db::table('news')->where('id','6')->first();
        
        //取出指定主键的值
        //$res = Db::table('news')->first(2);
        
        
        //从数据表中取得单一数据列的单一字段
        //$res = Db::table('news')->where('id', '3')->pluck('click');
        
        //取得单一字段值的列表
        //$res = Db::table('news')->lists('title');
        //$res = Db::table('news')->lists('id,title'); 
        
        //过滤
        //$res = Db::table('news')->where('id>6')->get();
       // $res = Db::table( 'news' )->where( 'title','like', "%阿米%" )->get();
        
        $res = Db::table('test')->find(1);
        
        p($res);
    }
    
    public function core_orderby(){
        
        //排序
        //$res = Db::table('news')->orderBy('id','DESC')->get();
        //$res = Db::table('news')->orderBy('id','DESC')->orderBy('click','ASC')->get();
        
        //分组
        //$res = Db::table('news')->groupBy('uid')->get();
        //$res = Db::table('news')->groupBy('uid')->having('count(*)','>=',2)->get();
        
        
        //取部分数据LIMIT
        //$res = Db::table('news')->limit(3)->get();//获取前面3条数据
        //$res = Db::table('news')->limit(2,4)->get();//从第二个开始取，一共取4个
        //p(Db::getQueryLog());
        
        //多表关联
        //$res = Db::table('news')
        //->join('user','user.u_id','=','news.uid')
        //->get();
        
        
        $res = Db::table('news')->leftJoin('user','news.uid','=','user.u_id')->get();
        
        p($res);
    }
    
    //事务
    public function transaction(){
        
        
        
         Db::transaction(function(){
        	if(!Db::execute('DELETE FROM sy_news WHERE id=?',[6])){
        		throw new \Exception();
        	}
        	throw new \Exception();
        }); 
        
       /*  Db::beginTransaction();
        Db::execute('DELETE FROM sy_news WHERE id=?',[8]);
        DB::rollback();
        DB::commit(); */
    }
    
    
    public function test_pdo(){
        
        
     /* 通过调用驱动程序创建一个PDO实例 */
        //$dsn = 'mysql:dbname=hdphp;host=localhost';
        $dsn = 'mysql:host=localhost;dbname=hdphp';

        $user = 'root';
        $password = 'root';
        
        try {
            $dbh = new \PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
}







