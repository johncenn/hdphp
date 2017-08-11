<?php 

?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加用户</title>
</head>
<body>
<!-- u 函数的使用 -->
<a href="<?php echo  u('add') ?>">当前控制器下的添加用户</a><p>
<a href="<?php echo  u('entry/add') ?>">entry控制器下的添加用户</a><p>
<a href="<?php echo  u('admin/show/add') ?>">admin模块show控制器下的添加用户</a><p>
<a href="<?php echo u(show)?>">跳转</a>
</body>
</html>
