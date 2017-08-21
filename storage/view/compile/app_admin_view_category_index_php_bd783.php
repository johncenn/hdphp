<!-- 会把父模板继承过来 -->

<style>
 .header{
	width: 100%;
	height: 100px;
	background: gray;
}

.left{
	position: absolute;
	top: 110px;
	left: 0;
	height: 500px;
	width: 150px;
	background: yellow;
}

.right{
	position: absolute;
	top: 110px;
	left: 160px;
	height: 500px;
	width: 15000px;
	background: green;
} 

</style>

    <title>用户管理</title>

 <div>
    <header class="header">标题</header>
    <div class="left">左边</div>
    <div class="right">
        
	aaa
	<p>
	<!-- 子模板使用父模板的组件 -->
	
	底部内容(父页面 widget标签内容(组件))
	设备的就

	<!-- 这个webname一定要放到对应的组件里面 -->

    </div>
    
</div> 

<!-- 父类定义的组件在子模板里可以使用 -->






<!-- 替换父模板里面的内容 -->


