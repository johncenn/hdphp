<form action="" method="post">
<input type="text" name="name" />
<input type="submit" value="提交" />
</form>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript">

var data = {};
$.post('{{__URL__}}',data,function(res){
	console.log(res);
},'json');

</script>