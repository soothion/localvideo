<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<link href="<?php echo CSS_PATH;?>vms/vms.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.tools_tabs.min.js"></script>
<script type="text/javascript">
$(function(){
	$('#html').val('<?php echo player_code('video_player',$video['channelid'],$video['vid'],622,460);?>');
	$('#tag1').tabs("div.tabn1 > ul");
}) 

function copy_text(matter){
	matter.select();
	document.execCommand("Copy");
	alert('复制成功！');
}

</script>

<div class="clr ct show_pg">
	<div class="crumbs"><a href="<?php echo APP_PATH;?>">首页</a><span> &gt; </span><?php echo catpos($catid);?> 正文</div>
	<div class="ad">
	
	<a href="http://www.phpcms.cn" title="随机广告位，欢迎访问PHPCMS.CN"><img src="http://www.phpcms.cn/statics/images/video/ad960x40.gif"></a>
	
	</div>
    <div class="lty1">
    	<div class="clr">
    <div class="zj"><h5><?php echo $title;?></h5></div>
    <div class="clr xxg">
        <div class="clr">总播放：<span id="hits"></span>  <span>|</span>  更新时间：<?php echo $inputtime;?></div>
    </div>
    </div>
    	<div class="plbox">   
<?php if($allow_visitor==1) { ?>
	<?php if($video[vid]!="") { ?>
	<?php echo player_code('video_player',$video['channelid'],$video['vid'],622,460);?>
	<?php } else { ?>
	该视频不存在，请返回！
	<?php } ?> 		
<?php } else { ?>
		<CENTER><a href="<?php echo APP_PATH;?>index.php?m=content&c=readpoint&allow_visitor=<?php echo $allow_visitor;?>"><font color="red">阅读此信息需要您支付 <B><I><?php echo $readpoint;?> <?php if($paytype) { ?>元<?php } else { ?>点<?php } ?></I></B>，点击这里支付</font></a></CENTER>
<?php } ?>


		</div>
        <div class="sr"> 
		
        	<ul class="srli">
               <li>
                 	<strong>分享视频：</strong><a href="#" title="text" class=""></a>
                    <div class="clr sr_tag wp l">
                     <!-- Baidu Button BEGIN -->
    <div id="bdshare" class="bdshare_b" style="line-height: 12px;"><img src="http://share.baidu.com/static/images/type-button-5.jpg" />
		<a class="shareCount"></a>
	</div>
<script type="text/javascript" id="bdshare_js" data="type=button&amp;uid=6434581" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
	document.getElementById("bdshell_js").src = "http://share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
</script>
<!-- Baidu Button END -->
                   </div>
                </li>
                <li style="clear:both;">
                <strong>嵌入代码：</strong>
                <input name="html" id="html" type="text" size="50" class="fz_ipt" style="margin-left:2px;" ><input type="button" class="fz_btn" value="复制" onclick="copy_text($('#html'));"> (*非IE浏览器，请双击复制哦！)
				</li> 
            </ul>
        </div>
		<?php if($video[data] && count($video[data])>1) { ?>
        <div class="clr bfj wp">
		<?php $n=1;if(is_array($video[data])) foreach($video[data] AS $v) { ?>
         	<a href="<?php echo $v['url'];?>" ><?php echo $v['title'];?></a>
		<?php $n++;}unset($n); ?>
        </div> 
		<?php } ?>
		 <div class="clr mgt10 mgb10">
			<?php if($allow_comment && module_exists('comment')) { ?>
      <iframe src="<?php echo APP_PATH;?>index.php?m=comment&c=index&a=init&commentid=<?php echo id_encode("content_$catid",$id,$siteid);?>&iframe=1" width="100%" height="100%" id="comment_iframe" frameborder="0" scrolling="no"></iframe>
	  
	<div class="bk10"></div>
      <div class="box">
        		<h5>评论排行</h5>
				 <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"comment\" data=\"op=comment&tag_md5=9eeaba0a57bcf88c1b4779f4dc232d7a&action=bang&siteid=%24siteid&cache=3600\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$tag_cache_name = md5(implode('&',array('siteid'=>$siteid,)).'9eeaba0a57bcf88c1b4779f4dc232d7a');if(!$data = tpl_cache($tag_cache_name,3600)){$comment_tag = pc_base::load_app_class("comment_tag", "comment");if (method_exists($comment_tag, 'bang')) {$data = $comment_tag->bang(array('siteid'=>$siteid,'limit'=>'20',));}if(!empty($data)){setcache($tag_cache_name, $data, 'tpl_data');}}?>
            	<ul class="content list blue f14 row-2">
				<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                	<li>·<a href="<?php echo $r['url'];?>" target="_blank"><?php echo str_cut($r[title], 34);?></a><span>(<?php echo $r['total'];?>)</span></li>
					<?php $n++;}unset($n); ?>
                </ul>
				<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </div>
        <?php } ?>
		 </div>
    </div>
  <div class="wp lty2">
  
  
  
    <div class="box0">
    	<div class="nav">
             <h5>上升最快的视频</h5>
        </div>
        <div class="bct">
        	<div class="lbbox nos" >
            <ul class="c1 c2">
            
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=f015fd3ebc732d4b06f8147b9336c766&action=hits&catid=%24catid&num=5&order=dayviews+DESC&cache=0\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'hits')) {$data = $content_tag->hits(array('catid'=>$catid,'order'=>'dayviews DESC','limit'=>'5',));}?>
<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
	<li>
	<div class="clr h77">
	<a href="<?php echo $r['url'];?>" ><img src="<?php echo $r['thumb'];?>" width="104" height="65" class="l"></a>
	<div class="lh21"><a href="<?php echo $r['url'];?>" ><?php echo $r['title'];?></a></div>
	<div class="sz"><span>评论：<?php echo get_comments(id_encode("content_$r[catid]",$r[id],$siteid));?></span></div>
	</div>
	</li> 
<?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>			
				
            </ul>
            </div>
        </div>
    </div>
	
	
	
    <div class="ad">
	<a href="http://www.phpcms.cn" title="随机广告位，欢迎访问PHPCMS.CN"><img src="http://www.phpcms.cn/statics/images/video/ad318x64.gif"></a>
	
	</div> 
	
	 <div class="mgt10 box2">
    	<div class="nav tag3">
        	<ul class="clr col3"  id="tag1">
                <li><a href="#" class="ac">热点</a></li>
                <li><a href="#">评论</a></li>
                <li><a href="#">关注</a></li>
            </ul>
        </div>
        <div class="bct tabn1">
        	<ul class="uli4 mg10">
			<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=3ce0c92850ba1ffd809f82f2a88eb97a&action=hits&catid=%24catid&num=10&order=views+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'hits')) {$data = $content_tag->hits(array('catid'=>$catid,'order'=>'views DESC','limit'=>'10',));}?>
			<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
 			<?php $ids = explode('-',$r[hitsid]); $pic = get_pic($ids[2],$r[catid]);?>
 				<?php if($n==1) { ?>
					<li class="p_r">
						  <div class="l"><span class="bs">1</span><a href="<?php echo $r['url'];?>" title="<?php echo $r['title'];?>"><img src="<?php echo $pic['thumb'];?>" width="106" height="75"></a></div>
						  <div class="lh18"><a href="<?php echo $r['url'];?>" title="<?php echo $r['title'];?>"><?php echo str_cut($r[title],24,false);?></a></div>
						  <div><?php echo str_cut($r[description],45);?></div>
					</li>
				<?php } else { ?>
					<li><a href="<?php echo $r['url'];?>" title="<?php echo $r['title'];?>" target="_blank"><?php echo str_cut($r[title],44,false);?></a></li>
				<?php } ?>			
 			<?php $n++;}unset($n); ?>
			<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
          </ul>
		  
        	<ul class="uli4 mg10 hidden">
			<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"comment\" data=\"op=comment&tag_md5=7ec7d1b1cabbce40c6729fae78146a64&action=bang&num=9&cache=0\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$comment_tag = pc_base::load_app_class("comment_tag", "comment");if (method_exists($comment_tag, 'bang')) {$data = $comment_tag->bang(array('limit'=>'9',));}?>
			<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
				<?php if($n==1) { ?>
					<li class="p_r">
						  <div class="l"><span class="bs">1</span><a href="<?php echo $r['url'];?>" title="<?php echo $r['title'];?>"><img src="<?php echo $r['thumb'];?>" width="106" height="75"></a></div>
						  <div class="lh18"><a href="<?php echo $r['url'];?>" title="<?php echo $r['title'];?>"><?php echo str_cut($r[title],24,false);?></a></div>
						  <div><?php echo str_cut($r[description],45,false);?></div>
					</li>
				<?php } else { ?>
					<li><a href="<?php echo $r['url'];?>" title="<?php echo $r['title'];?>" target="_blank"><?php echo str_cut($r[title],44,false);?></a></li>
				<?php } ?>			
 			<?php $n++;}unset($n); ?>
			<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
          </ul>
		  
        <ul class="uli4 mg10 hidden">
			<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=3ce0c92850ba1ffd809f82f2a88eb97a&action=hits&catid=%24catid&num=10&order=views+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'hits')) {$data = $content_tag->hits(array('catid'=>$catid,'order'=>'views DESC','limit'=>'10',));}?>
			<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
				<?php if($n==1) { ?>
					<li class="p_r">
						  <div class="l"><span class="bs">1</span><a href="<?php echo $r['url'];?>" title="<?php echo $r['title'];?>"><img src="<?php echo $r['thumb'];?>" width="106" height="75"></a></div>
						  <div class="lh18"><a href="<?php echo $r['url'];?>" title="<?php echo $r['title'];?>"><?php echo str_cut($r[title],24,false);?></a></div>
						  <div><?php echo str_cut($r[description],45,false);?></div>
					</li>
				<?php } else { ?>
					<li><a href="<?php echo $r['url'];?>" title="<?php echo $r['title'];?>" target="_blank"><?php echo str_cut($r[title],44,false);?></a></li>
				<?php } ?>			
 			<?php $n++;}unset($n); ?>
			<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
          </ul>
		  
		  
        </div>
    </div>
	
	
  </div>
</div>
<script language="JavaScript" src="<?php echo APP_PATH;?>api.php?op=count&id=<?php echo $id;?>&modelid=<?php echo $modelid;?>"></script>
<script language="JavaScript">
<!--
//切换地址
function show_url(id) {
	var local_value = $('#url').val();
	if(id == 1){
		$('#url').val('');
	}else{
		
	}
 	var local = 'local'+id;
	var remote = 'remote'+id;
	
	var remote_value = $('#'+remote).val();
	$.get('index.php', {m:'cloudhost', c:'bucket', a:'ChangeBucket', local:local_value,remote:remote_value, id:id, time:Math.random()}, function (data){
		if(data=='ok'){
			alert('记录修改成功！');
		}else{
			alert('修改失败！');
		}
	});  
}
//--> 
</script>
<?php include template("content","footer"); ?>
