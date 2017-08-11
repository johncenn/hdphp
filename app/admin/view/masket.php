
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
 <div>
    <header class="header">标题</header>
    <div class="left">左边</div>
    <div class="right">
        <blade name="content"/>
    </div>
</div> 
