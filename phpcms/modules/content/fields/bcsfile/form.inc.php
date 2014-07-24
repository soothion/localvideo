	function bcsfile($field, $value, $fieldinfo) {
		$list_str = $str = '';
		extract(string2array($fieldinfo['setting']));
		$string .= $str."";   
		$string .= <<<EOF
	
	<div id="container">
		<input type='text' name='info[$field]' id='local_video' value='$value' class='input-text' style='width:280px'/>
		<input id="file_upload" name="file_upload" type="file" multiple="true">
	</div>
	<pre id="console"></pre>

EOF;
		$timestamp=time();
                $ftp_server=pc_base::load_config('ftp_server');
                if(!intval($put_remote))
                    $remote_server='local';
                else{
                    $remote_server=array_rand($ftp_server);
                }    
                $remote_server_http=$ftp_server[$remote_server]['http_address'];
		$my = '
		<link href="'.JS_PATH.'uploadify/uploadify.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="'.JS_PATH.'uploadify/jquery.uploadify.min.js"></script>
		<script type="text/javascript">
               $(function() {
					$("#file_upload").uploadify({
						"formData"     : {
							"timestamp" : "'.$timestamp.'",
							"token"     : "'.md5('unique_salt' . time()).'",
						},
                                                "sizeLimit" : "'.$upload_allowsize.'MB",                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
						"fileTypeExts" : "'.$upload_allowext.'",
						"buttonText" : "选择视频",
						"swf"      : "'.JS_PATH.'uploadify/uploadify.swf",
						"uploader" : "'.JS_PATH.'uploadify/uploadify.php",
                                                "cancelImg": "'.JS_PATH.'uploadify/uploadify-cancel.png",
                                                "height":"28",
						"onUploadSuccess" : function(file, data, response) {
						var uniqid=new Date().getTime();
						$.post("index.php?m=video&c=video_upload&a=convert",{"timestamp" : "'.$timestamp.'","token" : "'.md5('fire-rain.com' . $timestamp).'","video_size":"'.$video_size.'","main_size":"'.$main_size.'","remote_server":"'.$remote_server.'","thumb_size":"'.$thumb_size.'","watermark":"'.$watermark.'","org" : file.name,"uniqid" : uniqid});
						$.post("index.php?m=video&c=video_upload&a=getTime",{"timestamp" : "'.$timestamp.'","token" : "'.md5('fire-rain.com' . $timestamp).'","org" : file.name},function(msg){
                                                    $("input[name=\'info[videoTime]\']").val(msg);
                                                });
						var filename=uniqid+".mp4";
						$("#local_video").val("'.$remote_server_http.'"+filename);
							if(!$("#thumb").val()){
								$("#thumb").val("uploadfile/thumb/"+uniqid+".jpg");
							}
						}
						
					});
				});

               </script>
        ';
		return $string . $my;

		return $string;
	}
