<?php

/*
  视频转码模块
  Copyright (c) 2014 http://www.fire-rain.com
  QQ:10628520
 */
define('PHPCMS_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
include PHPCMS_PATH . '/phpcms/base.php';
$local_video=new local_video($_POST,FFMPEG_EXT,PHPCMS_PATH);
$local_video->convert();
