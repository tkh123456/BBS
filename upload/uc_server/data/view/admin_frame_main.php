<?php if(!defined('UC_ROOT')) exit('Access Denied');?>
<?php 
//管理中心内容代码
?>
<?php include $this->gettpl('header');?>
<?php if($iframe) { ?>
<script type="text/javascript">
	var uc_menu_data = new Array();
	o = document.getElementById('header_menu_menu');
	elems = o.getElementsByTagName('A');
	for(i = 0; i<elems.length; i++) {
		uc_menu_data.push(elems[i].innerHTML);
		uc_menu_data.push(elems[i].href);
	}
	try {
		parent.uc_left_menu(uc_menu_data);
		parent.uc_modify_sid('<?php echo $sid;?>');
	} catch(e) {}
</script>
<?php } ?>
<div class="container">
	<h3>UCenter 统计信息</h3>
	<ul class="memlist fixwidth">
		<li><em><?php if($user['allowadminapp'] || $user['isfounder']) { ?><a href="admin.php?m=app&a=ls">应用总数</a><?php } else { ?>应用总数<?php } ?>:</em><?php echo $apps;?></li>
		<li><em><?php if($user['allowadminuser'] || $user['isfounder']) { ?><a href="admin.php?m=user&a=ls">用户总数</a><?php } else { ?>用户总数<?php } ?>:</em><?php echo $members;?></li>
		<li><em><?php if($user['allowadminpm'] || $user['isfounder']) { ?><a href="admin.php?m=pm&a=ls">短消息数</a><?php } else { ?>短消息数<?php } ?>:</em><?php echo $pms;?></li>
		<li><em>好友记录数:</em><?php echo $friends;?></li>
	</ul>
	
	<h3>通知状态</h3>
	<ul class="memlist fixwidth">
		<li><em><?php if($user['allowadminnote'] || $user['isfounder']) { ?><a href="admin.php?m=note&a=ls">未发送的通知数</a><?php } else { ?>未发送的通知数<?php } ?>:</em><?php echo $notes;?></li>
		<?php if($errornotes) { ?>
			<li><em><?php if($user['allowadminnote'] || $user['isfounder']) { ?><a href="admin.php?m=note&a=ls">通知失败的应用</a><?php } else { ?>通知失败的应用<?php } ?>:</em>		
			<?php foreach((array)$errornotes as $appid => $error) {?>
				<?php echo $applist[$appid]['name'];?>&nbsp;
			<?php }?>
		<?php } ?>
	</ul>
	
	<h3>系统信息</h3>
	<ul class="memlist fixwidth">
		<li><em>UCenter 程序版本:</em>UCenter <?php echo UC_SERVER_VERSION;?> Release <?php echo UC_SERVER_RELEASE;?> <a href="http://www.discuz.net/forum-151-1.html" target="_blank">查看最新版本</a> 
		<li><em>操作系统及 PHP:</em><?php echo $serverinfo;?></li>
		<li><em>服务器软件:</em><?php echo $_SERVER['SERVER_SOFTWARE'];?></li>
		<li><em>MySQL 版本:</em><?php echo $dbversion;?></li>
		<li><em>上传许可:</em><?php echo $fileupload;?></li>
		<li><em>当前数据库尺寸:</em><?php echo $dbsize;?></li>		
		<li><em>主机名:</em><?php echo $_SERVER['SERVER_NAME'];?> (<?php echo $_SERVER['SERVER_ADDR'];?>:<?php echo $_SERVER['SERVER_PORT'];?>)</li>
		<li><em>magic_quote_gpc:</em><?php echo $magic_quote_gpc;?></li>
		<li><em>allow_url_fopen:</em><?php echo $allow_url_fopen;?></li>		
	</ul>
	
</div>

<?php echo $ucinfo;?>

<?php include $this->gettpl('footer');?>