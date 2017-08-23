
{{$time}}

{{$cache_Data['time']}}

 <foreach from="$cache_Data['users']" key='$key' value='$val'>
	    {{$val['u_id']}}　
		{{$val['name']}}<p/>
	</foreach> 