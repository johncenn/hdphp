<?php echo $data?>

<!-- <?php if(is_array($data) || is_object($data)){foreach ($data as $key=>$val){?>
    <?php echo $val['u_id']?>　
	<?php echo $val['name']?><p/>
<?php }}?> -->

<!--         <?php
        if (empty($data2)) {
            echo '为空时显示内容';
        }else{
            //初始化
            $_name= substr('$val',1);
            $hd['list'][$_name]['first']=false;
            $hd['list'][$_name]['last'] =false;
            $hd['list'][$_name]['index']=0;
            $hd['list'][$_name]['total']=0;
            $id=0;$key=0;$_tmp=$data2;
            for($index=0;$index<count($data2);$index++){
                $val=$_tmp[$key];$key +=1; 
                $hd['list'][$_name]['first'] = $index==0;
                $hd['list'][$_name]['index'] = ++$id;
				$hd['list'][$_name]['last']  = $id>=5 || !isset($_tmp[$key]);
            ?> -->
<!-- 	<?php echo $val['name']?> <p/> -->
<!-- <?php 
					if($hd['list'][$_name]['last']){break;}
				}}?> -->

<!--         <?php
        if (empty($data)) {
            echo '';
        }else{
            //初始化
            $_name= substr('$n',1);
            $hd['list'][$_name]['first']=false;
            $hd['list'][$_name]['last'] =false;
            $hd['list'][$_name]['index']=0;
            $hd['list'][$_name]['total']=0;
            $id=0;$key=0;$_tmp=$data;
            for($index=0;$index<count($data);$index++){
                $n=$_tmp[$key];$key +=1; 
                $hd['list'][$_name]['first'] = $index==0;
                $hd['list'][$_name]['index'] = ++$id;
				$hd['list'][$_name]['last']  = $id>=100 || !isset($_tmp[$key]);
            ?>
    <?php if($hd['list']['n']['first']){?>
                
        <?php echo $hd['list']['n']['index']?>: 这是第一条数据<br/>
    <?php }else if($hd['list']['n']['last']){?>
        <?php echo $hd['list']['n']['index']?>: 最后一条记录<br/>
    <?php }else{?>
        <?php echo $hd['list']['n']['index']?>:<?php echo $n['name']?><br/>
	
               <?php }?>
	
<?php 
					if($hd['list'][$_name]['last']){break;}
				}}?>

<?php echo $hd['list']['n']['total']?> 	部记录数 <p>
<?php echo $hd['list']['n']['first']?> 	是否为第 1 条记录 <p>
<?php echo $hd['list']['n']['last']?> 		是否为最后一条记录 <p>
<?php echo $hd['list']['n']['total']?> 	总记录数 <p>
<?php echo $hd['list']['n']['index']?> 	当前循环是第几条 <p> -->


<?php if($data){?>
                
	有数据

               <?php }?>

<?php if(count($data) == 1){?>
                
	一条
<?php }else if(count($data) == 2){?>
	二条
<?php }else{?>
	<?php echo count($data)?>条

               <?php }?>













