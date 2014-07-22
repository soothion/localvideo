<?php
/**
 * @abstract 		CkPlayer 播放器配置模块
 * @copyright		Appqy
 * @license			http://www.appqy.com/
 * @lastmodify		2013-06-01 
 * @version         1.0
 * @author          fy
 * @authoremail 	fy@appqy.com
 */

defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_app_class('admin','admin',0); //加载admin后台类
pc_base::load_sys_class('form', '', 0);

class appqy_ckplayer extends admin {
	private $db; 
	
	public function __construct() {
		parent::__construct();
		$this->db = pc_base::load_model('appqy_ckplayer_model');
	}
	
	public function init(){
		if(isset($_POST['dosubmit'])) {
			//接收更新数据
		
			$_POST['info']['video_type'] = intval($_POST['info']['video_type']);
			$_POST['info']['video_default_status'] = intval($_POST['info']['video_default_status']);
			$_POST['info']['ck_http_set'] = intval($_POST['info']['ck_http_set']);
			$_POST['info']['ck_style'] =  safe_replace($_POST['info']['ck_style']);
			$_POST['info']['ck_volume'] = intval($_POST['info']['ck_volume']);
			$_POST['info']['ck_size'] =   safe_replace($_POST['info']['ck_size']);
			$_POST['info']['ck_html5'] = intval($_POST['info']['ck_html5']);
			 
			$_POST['info']['thumb_load'] = safe_replace($_POST['info']['thumb_load']);
			$_POST['info']['thumb_pause_ad'] = safe_replace($_POST['info']['thumb_pause_ad']);
		 	$_POST['info']['url_pause_ad'] = safe_replace($_POST['info']['url_pause_ad']);
			$_POST['info']['beff_ad'] = safe_replace($_POST['info']['beff_ad']);
			$_POST['info']['time_qz_ad'] = safe_replace($_POST['info']['time_qz_ad']); 
			$_POST['info']['thumb_qz_ad'] = safe_replace($_POST['info']['thumb_qz_ad']);
			$_POST['info']['url_qz_ad'] = safe_replace($_POST['info']['url_qz_ad']);
			//$_POST['info']['ck_bak'] = safe_replace($_POST['info']['ck_bak']);
		 //print_r($_POST['info']);
			
			if($_POST['info']['ck_volume']<0){
				$_POST['info']['ck_volume'] = 0;
			}elseif ($_POST['info']['ck_volume']>100){
				$_POST['info']['ck_volume'] = 100;
			}
 
			if(empty($_POST['info']['ck_size'])) {
				showmessage(L('播放器尺寸不能为空'),HTTP_REFERER);
			}
			if(empty($_POST['info']['ck_volume'])) {
				showmessage(L('默认音量不能为空'),HTTP_REFERER);
			}
			$ckid = $this->db->update($_POST['info'],array('id'=>1)); 
		 
			if(!$ckid){
				showmessage(L('更新失败!'),HTTP_REFERER); 
			}
			//重新编译模板 更新模板缓存
			//$template_cache_updata = pc_base::load_sys_class('template_cache', '', 1);
			//$template_cache_updata->template_refresh("show", "show");
 			showmessage(L('operation_success'),'?m=appqy_ckplayer&c=appqy_ckplayer','', 'edit');
 			
		}else{
		//返回配置数据
		$info = $this->db->get_one();
		if(!$info) showmessage('数据不存在!');
 
		
		extract($info);
		$big_menu = array('javascript:window.top.art.dialog({id:\'add\',iframe:\'?m=appqy_ckplayer&c=appqy_ckplayer&a=appqy_help\', title:\''.'帮助'.'\', width:\'700\', height:\'450\'}, function(){var d = window.top.art.dialog({id:\'add\'}).data.iframe;var form = d.document.getElementById(\'dosubmit\');form.click();return false;}, function(){window.top.art.dialog({id:\'add\'}).close()});void(0);', "帮助");
		include $this -> admin_tpl('appqy_edit');
		}
	}
	
	
	//添加节目
	public function appqy_help(){
		if(isset($_POST['dosubmit'])) {
			showmessage(L('operation_success'),'?m=appqy_ckplayer&c=appqy_ckplayer','', '');
		}else{
			include $this -> admin_tpl('appqy_help');
		}
		
	}


 
}
?>