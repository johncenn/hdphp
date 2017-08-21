<html>
<head>
<style type="text/css">
.error{
	background: pink;
	height: 100px;
}
</style>
</head>
<?php if($errors){?>
                
    <div class="error">
        <?php if(is_array($errors) || is_object($errors)){foreach ($errors as $v){?>
            <?php echo $v?><br/>
        <?php }}?>
    </div>

               <?php }?>

<form action="<?php echo u(auto)?>" method="post">
<input type='hidden' name='csrf_token' value=''/>

<!-- 用户名：<input type="text" name="username" /><p/>
密　码：<input type="text" name="password" /><p/>
密　码：<input type="text" name="password2" /><p/> -->
<!-- <input type="text" name="code"  />
<img alt="验证码" src="<?php echo u(code)?>" onclick="this.src='<?php echo u('code')?>&_'+Math.random()" name="code"> -->
用户名：<input type="text" name="username" /><p/>
密　码：<input type="text" name="password" /><p/>
密　码：<input type="text" name="password2" /><p/>
邮　箱：<input type="text" name="email" /><p/>
<input  type="submit" value="提交" />
</form>
</html>





