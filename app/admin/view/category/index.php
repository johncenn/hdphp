<!-- 会把父模板继承过来 -->
<extend file='app/admin/view/masket'/>
<!-- 替换父模板里面的内容 -->
<block name="content">
	aaa
	<p>
	<!-- 子模板使用父模板的组件 -->
	<parent name="footer" webname="设备的就">
	<!-- 这个webname一定要放到对应的组件里面 -->
</block>

<block name="title">
    <title>用户管理</title>
</block>