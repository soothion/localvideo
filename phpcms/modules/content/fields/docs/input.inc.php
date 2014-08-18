	function docs($field, $value) {
		extract(string2array($this->fields[$field]['setting']));

                $upload_url = pc_base::load_config('system','upload_url');
		$upload_path = pc_base::load_config('system','upload_path');	

		$files = $_POST[$field.'_fileurl'];
		$files_alt = $_POST[$field.'_filename'];
		$array = $temp = array();
		if(!empty($files)) {
			foreach($files as $key=>$file) {
                                        $filepath=str_replace($upload_url,$upload_path,$file);
                                        $filepath=str_replace('\\','/',$filepath);
                                        $folderpath=dirname($filepath);
                                        $pathinfo=pathinfo($filepath);
                                        $dirname = $pathinfo['dirname']; // 文件所在路径
                                        $filename =$pathinfo['filename']; // 不含扩展名的文件名
                                        $pdf=$filename.'.pdf';
                                        $output=$dirname.'/'.$pdf;
                                        $cmd='java -jar '.$jodconverter.' '.$filepath.' '.$output;
                                        exec($cmd);
                                        $pdfurl=pathinfo($file, PATHINFO_DIRNAME).'/'.$pdf;
					$temp['fileurl'] = $file;
					$temp['pdfurl'] = $pdfurl;
					$temp['filename'] = $files_alt[$key];
					$array[$key] = $temp;
			}
		}
		$array = array2string($array);
		return $array;
	}
