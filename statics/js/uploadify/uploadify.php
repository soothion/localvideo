<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination
$verifyToken = md5('unique_salt' . $_POST['timestamp']);

if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
        $uniqid=time();
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = '../../../uploadfile/video/org';
        $targetName=$uniqid.'.'.substr(strrchr($_FILES['Filedata']['name'], '.'), 1);
	$targetFile = rtrim($targetPath,'/') . '/' .$targetName ;
	
        move_uploaded_file($tempFile,$targetFile);
        $result=array('uniqid'=>$uniqid,'org'=>$targetName);
        echo json_encode($result);
}
?>

