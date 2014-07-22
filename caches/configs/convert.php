<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

return array(
        'org_path'=>'uploadfile/video/org/',//原始视频保存目录
        'thumb_path'=>'uploadfile/thumb/',//缩略图保存目录
        'mp4_path'=>'uploadfile/video/mp4/',//转码后MP4文件保存目录
        'video_size'=>'800x450',//转码分辨率
        'main_size'=>'1024x768',//主图尺寸
        'thumb_size'=>'800x600',//缩略图尺寸
        'remote_server'=>'1',//是否随机存放到远程服务器，1为是，0为否
        'watermark'=>'movie=logo.png [logo]; [in][logo] overlay=10:10 [out]',//水印参数：logo.png为水印图片，overlay=0:0:1,其中前两个0分别表示距离视频左边与上边的距离，后面的1表示是否透明
);

