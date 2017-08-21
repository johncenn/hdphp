{{$data}}

<!-- <foreach from='$data' key='$key' value='$val'>
    {{$val['u_id']}}　
	{{$val['name']}}<p/>
</foreach> -->

<!-- <list from='$data2' name='$val' row='5' empty='为空时显示内容'> -->
<!-- 	{{$val['name']}} <p/> -->
<!-- </list> -->

<!-- <list from='$data' name='$n'>
    <if value="$hd['list']['n']['first']">
        {{$hd['list']['n']['index']}}: 这是第一条数据<br/>
    <elseif value="$hd['list']['n']['last']"/>
        {{$hd['list']['n']['index']}}: 最后一条记录<br/>
    <else/>
        {{$hd['list']['n']['index']}}:{{$n['name']}}<br/>
	</if>
	
</list>

{{$hd['list']['n']['total']}} 	部记录数 <p>
{{$hd['list']['n']['first']}} 	是否为第 1 条记录 <p>
{{$hd['list']['n']['last']}} 		是否为最后一条记录 <p>
{{$hd['list']['n']['total']}} 	总记录数 <p>
{{$hd['list']['n']['index']}} 	当前循环是第几条 <p> -->


<if value="$data">
	有数据
</if>

<if value= "count($data) == 1">
	一条
<elseif value="count($data) == 2"/>
	二条
<else/>
	{{count($data)}}条
</if>













