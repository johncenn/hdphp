<?php namespace system\model;
use houdunwang\model\Model;
class User extends Model{
	//数据表
	protected $table = "user";

	//允许填充字段
	protected $allowFill = ['*' ];

	//禁止填充字段
	protected $denyFill = ['group' ];//其他都可以填充，出了group用户组

	//自动验证
	protected $validate=[
		//['字段名','验证方法','提示信息',验证条件,验证时间]//写的是对应数据库的字段名
	//	['name','required','用户名不能为空',self::MUST_VALIDATE,self::MODEL_INSERT],
	//    ['name','checkUser','用户名已经存在',self::MUST_VALIDATE,self::MODEL_INSERT],
	   /*  ['password','required','密码不能为空',self::MUST_VALIDATE,self::MODEL_INSERT],
	    ['password','confirm:password2','两次密码不一致',self::MUST_VALIDATE,self::MODEL_INSERT],
	    ['email','email','邮箱格式不正确',self::NOT_EMPTY_VALIDATE,self::MODEL_INSERT], */
	];
	
	public function checkUser($field, $value, $params, $data)
	{
	    return Db::table('user')->where('name',$value)->get()?false:true;
	}

	//自动完成
	protected $auto=[
		//['字段名','处理方法','方法类型',验证条件,验证时机]
		
	  //  [ 'group', 1, 'string',  self::EMPTY_AUTO,  self::MODEL_INSERT ],
 	//    [ 'age', 'intval', 'function',  self::MUST_AUTO,  self::MODEL_INSERT ],
	//    [ 'password', 'encode', 'method',  self::MUST_AUTO,  self::MODEL_BOTH ]
	];
    
	
	public function encode($val,$data){
	    return md5($val);
	}
	
	
	//自动过滤
    protected $filter=[
        //[表单字段名,过滤条件,处理时间]
    //    ['password',self::EMPTY_FILTER,self::MODEL_BOTH]
    ];

	//时间操作,需要表中存在created_at,updated_at字段
	protected $timestamps=false;
}










