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
defined('IN_PHPCMS') or exit('Access Denied');
defined('INSTALL') or exit('Access Denied');
//主要是写入后台菜单连接用 parentidd父目录ID   后台模块显示在顶上的菜单 写入至v9_menu数据表的  语言文件如遇到相同的前者覆盖后者

//TODO 万恶的V9程序员 写入语言数据的时候没加载我们的语言数据  'name'=>'视频直播'  只好如此
$parentid = $menu_db->insert(array('name'=>'CkPlayer配置', 'parentid'=>29, 'm'=>'appqy_ckplayer', 'c'=>'appqy_ckplayer', 'a'=>'init', 'data'=>'', 'listorder'=>0, 'display'=>'1'), true);

?>