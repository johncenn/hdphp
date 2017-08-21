
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
<blade name="title"/>
 <div>
    <header class="header">标题</header>
    <div class="left">左边</div>
    <div class="right">
        <blade name="content"/>
    </div>
    
</div> 

<!-- 父类定义的组件在子模板里可以使用 -->
<widget name="footer" >
	底部内容(父页面 widget标签内容(组件))
	{{webname}}
</widget>




