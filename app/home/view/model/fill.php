<html>
<head>
<style type="text/css">
.error{
	background: pink;
	height: 100px;
}
</style>
</head>
<if value="$errors">
    <div class="error">
        <foreach from="$errors" value="$v">
            {{$v}}<br/>
        </foreach>
    </div>
</if>

<form action="" method="post">
 {{csrf_field()}}
<!-- 用户名：<input type="text" name="username" /><p/>
密　码：<input type="text" name="password" /><p/>
密　码：<input type="text" name="password2" /><p/> -->
<!-- <input type="text" name="code"  />
<img alt="验证码" src="{{u(code)}}" onclick="this.src='{{u('code')}}&_'+Math.random()" name="code"> -->
用户名：<input type="text" name="name" /><p/>
年龄：<input type="text" name="age" />    <p/>
邮箱：<input type="text" name="email" />    <p/>
用户组：<input type="text" name="group" />    <p/>
密码：<input type="text" name="password" />    <p/>
<input  type="submit" value="提交" />
</form>
</html>





