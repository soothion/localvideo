<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header','admin');
?>
<script type="text/javascript">
<!--
	$(function(){
	$.formValidator.initConfig({formid:"myform",autotip:true,onerror:function(msg,obj){window.top.art.dialog({content:msg,lock:true,width:'200',height:'50'}, function(){this.close();$(obj).focus();})}});
	})
//-->
</script>
<link type="text/css" href="statics/css/dialog.css" rel="alternate stylesheet"  />
<div class="pad_10" style="height:auto">
 
<table cellpadding="2" cellspacing="1" class="table_form" width="100%">

	
	<tr height="70">
		<th width="100">关于CkPlayer:</th>
		<td>ckplayer(超酷网页视频播放器),支持http协议下的flv,f4v,mp4,支持rtmp视频流和rtmp视频回放，是你做视频直播，视频播放的理想播放器 官方网站http://www.ckplayer.com/</td>
	</tr>
	
	<tr height="70">
		<th width="100">关于前沿应用(Appqy)：</th>
		<td width="300" >
			Appqy 前沿应用,涉足前沿新潮的科技应用领域!对视频转码,转码服务器/端拥有丰富经验,并且从事智能手机客户端开发! 官方支持网站 http://www.appqy.com/
		</td>
	</tr>
	
	<tr height="70">
		<th width="100">播放器模块更新：</th>
		<td width="300">
			本版本为播放器beta版,后面将陆续更新上播放器的一些强大的功能.敬请关注前沿应用官方网站! <span style="color:red">http://www.appqy.com</span>
		</td>
	</tr>
	
	<tr>
		<th></th>
		<td>
		<input type="submit" name="dosubmit" id="dosubmit" class="dialog" value=" <?php echo L('submit')?> " />
		</td>
	</tr>

</table>
 
</div>


</body>
</html> 