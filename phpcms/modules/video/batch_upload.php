<?php 
defined('IN_PHPCMS') or exit('No permission resources.');

/**
 * 
 * ------------------------------------------
 * index
 * ------------------------------------------
 * @package 	PHPCMS V9.1.16
 * @author		K
 * @copyright	
 * 
 */
 
 pc_base::load_app_class('admin', 'admin', 0);
pc_base::load_sys_class('form', 0, 0);
pc_base::load_app_func('global', 'video');

 
 class  batch_upload extends admin{
 
	public $path = 'uploadfile/video/ftp'; //扫描目录
 
	public function __construct() {
	
		$this->db = pc_base::load_model('content_model');
		$this->siteid=1;
                param::set_cookie('siteid',1);
		$this->categorys = getcache('category_content_'.$this->siteid,'commons'); 
	
		
	}
	
	public  function  init (){
	
		include $this->admin_tpl('batch_video_add');
		
	}
	
	public  function batch_add (){
		
		$catids = $_POST['catids'];
	
		ini_set("max_execution_time",600000);
	
		$this->db->set_model(11);//视频模型
		
		$picpaths = $_POST['ids'];
				
		$des = $_POST['description'];
 		
	
		foreach($picpaths as $k=>$v){
                                if($_POST['remote']=='1')
                                {
                                	$ftp_server=pc_base::load_config('ftp_server');
                                    $remote_server=array_rand($ftp_server);

                                 }   
                                else{
                                    $remote_server='local';
                                }   
                                $options=array(
                                    'remote_server'=>$remote_server,
                                    'uniqid'=>time(),
                                    'token'=>$_POST['token'],
                                    'timestamp'=>$_POST['timestamp'],
                                    'org'=>iconv('UTF-8', 'GB2312', $v),
                                    'org_path'=>$_POST['path'],
                                    'ftp_server'=>intval($_POST['remote']),
                                    'ftp_backup'=>intval($_POST['backup']),
                                    'remote_server'=>$remote_server
                                );
				$local_video=new local_video($options,FFMPEG_EXT);
				             $orgFile  = $local_video->options['org_path'] . $local_video->options['org'];
            				 $video_invo=$local_video->video_info($orgFile);
                                $result=$local_video->convert();
                                foreach($catids as $catid){
                                    $pathinfo=pathinfo($v);
                                    $data = array(				
                                                                    'inputtime' => time(),
                                                                    'islink' => 0,							   
                                                                    'catid' => $catid,
                                                                    'title' => $_POST['title'].$pathinfo['filename'],	//获取文件名			
                                                                    'description' => $_POST['description'],						 
                                                                    'status' => 99,
                                                                    'local_video'=>$result['url'],
                                                                    'videoTime'=>$video_invo['seconds']
                                                            );

                                    $this->db->add_content($data,1);
                                }
		}
		
		showmessage(L('operation_success'));
		
	
	}
	
	public  function  get_filename(){
	
	/* 	$arr = $this -> db -> select(array('channelid'=>3),'picpath');
		
		foreach($arr  as $k => &$v){
			
			$files[] = basename($v['picpath']);
		
		} */
		
	//	$files = array_filter($files);
		// if(trim($_POST['path']!=''))
  //                  $this->path=$_POST['path'];
		$upload_files = $this -> traverse($this -> path);

		//$un_use = empty($files) ? $upload_files : array_diff($upload_files,$files);
		
	//	$str = ' ';
		
		foreach ($upload_files  as  $_v){
		
		$data .= "
			<tr>
			<td width='120'>
				<input type='checkbox' value='{$_v}' class='inputcheckbox' name='ids[]'>
			</td>
           
            <td>". $_v ."</td>
			</tr>";
			
		
		}
	$str .= empty($upload_files) ? '<tr><td>  没有数据</td></tr>': $data;
	
	
	
	echo $str;
	
	}
	
	
	
	public function traverse($path){
	
			$arr = array();
			$current_dir = opendir($path);    //opendir()返回一个目录句柄,失败返回false
			while(($file = readdir($current_dir)) !== false)  //readdir()返回打开目录句柄中的一个条目
			{		
				if($file == '.' || $file == '..')
					continue;
				
					$arr[] = iconv('GBK', 'UTF-8', $file); 
			}
			return $arr;
	
	}
		
			
		
		 
 
 }

