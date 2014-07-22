<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header','admin');
?>
<script type="text/javascript">
<!--
$(function(){
	$.formValidator.initConfig({formid:"myform",autotip:true,onerror:function(msg,obj){window.top.art.dialog({content:msg,lock:true,width:'200',height:'50'}, function(){this.close();$(obj).focus();})}}); 
	$("#tv_title").formValidator({onshow:"<?php echo L("input");echo L("tv_title");?>",onfocus:"<?php echo L("input");echo L("tv_title");?>"}).inputValidator({min:1,onerror:"<?php echo L("input");echo L("tv_title");?>"});
	$("#video_url").formValidator({onshow:"<?php echo L("input");echo L("video_url");?>",onfocus:"<?php echo L("input");echo L("video_url");?>"}).inputValidator({min:1,onerror:"<?php echo L("input");echo L("video_url");?>"});
	})
//-->
</script>

<div class="pad_10">
<form action="?m=appqy_ckplayer&c=appqy_ckplayer&a=init&pc_hash=<?php echo $_SESSION['pc_hash'];?>" method="post" name="myform" id="myform">
 
<table cellpadding="2" cellspacing="1" class="table_form" width="100%">
<style type="text/css">
.gare{color:#BCBCBC}
</style>

	<tr>
		<th width="100">调用说明：</th>
		<td width="300">
			在你的模型字段里面建立一个类型为text的文本字段,字段名为<b>appqy_ckplayer</b>,将标签<span style="color: red">{template  "appqy_ckplayer","show"}</span>放入你想调用播放器的内容模板里面,发布数据的时候填写入视频地址或者网址形式的视频地址即可
		</td>
	</tr>
	<tr>
		<th width="100">调用方式：</th>
		<td width="300">
			<input name="info[video_type]" type="radio" value="0" <?php if($info['video_type']==0)echo 'checked="checked"'?> /><label>普通形式</label> <input name="info[video_type]"  type="radio" value="1" <?php if($info['video_type']==1)echo 'checked="checked"'?> /><label>网址形式</label>
			<span class="gare">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;普通方式:视频字段填写视频实际地址;网址方式:填写http://appqy.com/video.php?id=1动态调用视频地址</span>
		</td>
	</tr>
	<tr>
		<th width="100">视频默认是否播放：</th>
		<td width="300">
			<input name="info[video_default_status]" type="radio" value="0" <?php if($info['video_default_status']==0)echo 'checked="checked"'?> /><label>暂停</label> <input name="info[video_default_status]"  type="radio" value="1" <?php if($info['video_default_status']==1)echo 'checked="checked"'?> /><label>播放</label>
			<span class="gare">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;打开播放界面是否自动播放</span>
		</td>
	</tr>
	
	<tr>
		<th width="100">视频拖动方式：</th>
		<td width="300">
			<input name="info[ck_http_set]" type="radio" value="0" <?php if($info['ck_http_set']==0)echo 'checked="checked"'?> /><label>不拖动</label> 
			<input name="info[ck_http_set]"  type="radio" value="1" <?php if($info['ck_http_set']==1)echo 'checked="checked"'?> /><label>按关键帧</label>
			<input name="info[ck_http_set]"  type="radio" value="2" <?php if($info['ck_http_set']==2)echo 'checked="checked"'?> /><label>按时间点</label>
			<input name="info[ck_http_set]"  type="radio" value="3" <?php if($info['ck_http_set']==3)echo 'checked="checked"'?> /><label>格式自动</label>
			<input name="info[ck_http_set]"  type="radio" value="4" <?php if($info['ck_http_set']==4)echo 'checked="checked"'?> /><label>关键字自动</label>
			<br /><br /><span class="gare">播放http视频流时采用何种拖动方法，=0不使用任意拖动，=1是使用按关键帧，=2是按时间点，=3是自动判断按什么(如果视频格式是.mp4就按关键帧，.flv就按关键时间)，=4也是自动判断(只要包含字符mp4就按mp4来，只要包含字符flv就按flv来)</span>
		</td>
	</tr>
	
	
	<tr>
		<th width="100">播放器风格自定义路径:</th>
		<td><input type="text" name="info[ck_style]" id="ck_style" value="<?php echo $info['ck_style']?>" size="30" class="input-text"> <span class="gare">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;调用xml风格路径，为空的话将使用ckplayer.js的配置</span></td>
	</tr>
	
	<tr id="task_info">
		<th width="100">默认音量：</th>
		<td>
		<input type="text" name="info[ck_volume]" id="ck_volume" size="10"  value="<?php echo $info['ck_volume']?>"  class="input-text"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="gare">范围:1-100</span>
		</td>
	</tr>
	<tr>
		<th width="100">播放器尺寸:</th>
		<td><input type="text" name="info[ck_size]" id="ck_size" size="30"  value="<?php echo $info['ck_size']?>"  class="input-text"><span class="gare">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;格式: 600|400  (宽|高)</span></td> 
		
	</tr>
	<tr>
		<th width="100">是否启用HTML5播放器自动切换：</th>
		<td width="300">
			<input name="info[ck_html5]" type="radio" value="0" <?php if($info['ck_html5']==0)echo 'checked="checked"'?> /><label>启用</label> <input name="info[ck_html5]"  type="radio" value="1" <?php if($info['ck_html5']==1)echo 'checked="checked"'?> /><label>关闭</label>
			<span class="gare">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;当不客户端不支持FLASH时自动切换HTML5播放器</span>
		</td>
	</tr>

	
	<tr>
		<th width="100">加载等待图片：</th>
		<td width="300">
			<?php echo form::upfiles('info[thumb_load]', 'thumb_load', $info[thumb_load], 'appqy_ckplayer','',30,'','',"jpg|png|gif")?>

		</td>
	</tr>
    
    <tr>
		<th width="100">暂停广告：</th>
		<td width="300">
			<?php echo form::upfiles('info[thumb_pause_ad]', 'thumb_pause_ad', $info[thumb_pause_ad], 'appqy_ckplayer','',30,'','',"jpg|png|gif")?>
			URL连接地址: <input type="text" name="info[url_pause_ad]" id="ck_volume" size="40"  value="<?php echo $info['url_pause_ad'];?>"  class="input-text"> <br /><span class="gare">暂停和播前广告图片和地址可多写 ,格式:http://appqy.com/1.jpg|http://appqy.com/2.jpg</span>
		</td>
	</tr>
	<tr>


		<th width="100">播放前广告：</th>
		<td width="300" id="task_step">
			<li>
			<?php echo form::upfiles('info[thumb_qz_ad]', 'thumb_qz_ad', $info[thumb_qz_ad], 'thumb_qz_ad','',30,'','',"jpg|png|gif")?>
			URL连接地址: <input type="text" name="info[url_qz_ad]"  size="40"  value="<?php echo $info['url_qz_ad'];?>"  class="input-text">
			广告时长: <input type="text" name="info[time_qz_ad]"  size="10"  value="<?php echo $info['time_qz_ad'];?>"  class="input-text">秒
			</li>
		</td>
	</tr>
	
	<tr>
		<th width="100">缓冲广告：</th>
		<td width="300">
			<?php echo form::upfiles('info[beff_ad]', 'beff_ad', $info[beff_ad], 'appqy_ckplayer','',30,'','',"swf")?> <span class="gare">只支持SWF格式</span>

		</td>
	</tr>
	
	<tr>
		<th width="100">文字广告:</th>
		<td><input type="text" name="info[text_ad]" id="ck_size" size="60"  value='<?php echo $info['text_ad']?>'  class="input-text"><span class="gare">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;格式:{a href="http://www.appqy.com"}{font color="#FFFFFF" size="12"}这里可以放文字广告。{/font}{/a}</span></td> 
		
	</tr>
    
    <tr>
		<th width="100">备用视频调用字段:</th>
		<td><span style="color: red">{appqy_ckplayer2}</span>有多个播放页面不同需求的问题,这个备用字段和调用字段是一样的用法,插入模板.如{appqy_ckplayer}字段没填写则启用这个字段</td> 
		
	</tr>
    
	<tr>
	
	
<style type="text/css">
	.aui_state_highlight{margin-left: 15px;padding: 6px 12px;cursor: pointer;display: inline-block;text-align: center;line-height: 1;letter-spacing: 2px;font-family: Tahoma, Arial/9!important;width: auto;overflow: visible;color: #333;border: solid 1px #999;border-radius: 5px;background: #DDD;filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#FFFFFF', endColorstr='#DDDDDD');background: linear-gradient(top, #FFF, #DDD);text-shadow: 0px 1px 1px rgba(255, 255, 255, 1);box-shadow: 0 1px 0 rgba(255, 255, 255, .7), 0 -1px 0 rgba(0, 0, 0, .09);}
</style>
<tr>
		<th></th>
		<td>
		<input type="submit" name="dosubmit" id="dosubmit"  class="aui_state_highlight" value=" <?php echo L('submit')?> " />
		</td>
	</tr>

</table>
</form>
</div>


</body>
</html> 