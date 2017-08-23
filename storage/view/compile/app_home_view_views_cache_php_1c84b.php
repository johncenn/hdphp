
<?php echo $time?>

<?php echo $cache_Data['time']?>

 <?php if(is_array($cache_Data['users']) || is_object($cache_Data['users'])){foreach ($cache_Data['users'] as $key=>$val){?>
	    <?php echo $val['u_id']?>　
		<?php echo $val['name']?><p/>
	<?php }}?> 