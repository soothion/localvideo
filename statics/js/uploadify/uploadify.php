<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination

$verifyToken = md5('unique_salt' . $_POST['timestamp']);

if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
    
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = '../../../uploadfile/video/org';
	$targetFile = iconv('UTF-8','GB2312',rtrim($targetPath,'/') . '/' . $_FILES['Filedata']['name']);
	
	// Validate the file type
	$fileParts = pathinfo($_FILES['Filedata']['name']);
        move_uploaded_file($tempFile,$targetFile);
        echo '1';
}
?>

