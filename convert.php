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
class local_video
{
    protected $options;
    protected $ffmpeg;
    protected $phpcms_path;
    
    function __construct($options,$ffmpeg,$phpcms_path)
    {
        $this->options=array(
            'org_path'=>'uploadfile/video/org/',
            'thumb_path'=>'uploadfile/thumb/',
        );
        $this->options = $options + $this->options;
        $this->ffmpeg=$ffmpeg;
        $this->phpcms_path=$phpcms_path;    
    }
    
    function video_info($file)
    {
        ob_start();
        passthru(sprintf($this->ffmpeg . ' -i "%s" 2>&1', $file));
        $info = ob_get_contents();
        ob_end_clean();
        // 通过使用输出缓冲，获取到ffmpeg所有输出的内容。
        $ret  = array();
        // Duration: 01:24:12.73, start: 0.000000, bitrate: 456 kb/s
        if (preg_match("/Duration: (.*?), start: (.*?), bitrate: (\d*) kb\/s/",
                       $info, $match))
        {
            $ret['duration'] = $match[1]; // 提取出播放时间
            $da              = explode(':', $match[1]);
            $ret['seconds']  = $da[0] * 3600 + $da[1] * 60 + $da[2]; // 转换为秒
            $ret['start']    = $match[2]; // 开始时间
            $ret['bitrate']  = $match[3]; // bitrate 码率 单位 kb
        }

        // Stream #0.1: Video: rv40, yuv420p, 512x384, 355 kb/s, 12.05 fps, 12 tbr, 1k tbn, 12 tbc
        if (preg_match("/Video: (.*?), (.*?), (.*?)[,\s]/", $info, $match))
        {
            $ret['vcodec']     = $match[1]; // 编码格式
            $ret['vformat']    = $match[2]; // 视频格式 
            $ret['resolution'] = $match[3]; // 分辨率
            $a                 = explode('x', $match[3]);
            $ret['width']      = $a[0];
            $ret['height']     = $a[1];
        }

        // Stream #0.0: Audio: cook, 44100 Hz, stereo, s16, 96 kb/s
        if (preg_match("/Audio: (\w*), (\d*) Hz/", $info, $match))
        {
            $ret['acodec']      = $match[1];       // 音频编码
            $ret['asamplerate'] = $match[2];  // 音频采样频率
        }

        if (isset($ret['seconds']) && isset($ret['start']))
        {
            $ret['play_time'] = $ret['seconds'] + $ret['start']; // 实际播放时间
        }

        $ret['size'] = filesize($file); // 文件大小
        return $ret;
    }

    function convert()
    {
        $verifyToken = md5('fire-rain.com' . $this->options['timestamp']);
        if ($verifyToken == $this->options['token'])
        {
            $orgFile  = $this->options['org_path'] . $this->options['org'];
            $mp4      = $this->ffmpeg . ' -i  ' . $this->phpcms_path . '/' . $orgFile . ' -vcodec libx264 -strict -2 -s 800X450 ' . $this->phpcms_path . '/uploadfile/video/mp4/' . $this->options['uniqid'] . '.mp4';
            @exec($mp4);
            $duration = $this->video_info($orgFile);
            $seconds  = intval($duration['seconds']);
            $offset   = intval($seconds / 21);
            for ($i = 0; $i < 21; $i++)
            {
                $targetPath = $this->phpcms_path . $this->options['thumb_path'] . $this->options['uniqid'] . '/';
                if (!file_exists($targetPath))
                    @mkdir(rtrim($targetPath, '/'), 0777);
                $time       = $i * $offset;
                $name       = $i == 0 ? 'default.jpg' : $i . '.jpg';
                $img_size   = $_POST['thumb_size'];
                if ($i == 0)
                {
                    $time     = 1;
                    $name     = $i == 0 ? 'default.jpg' : $i . '.jpg';
                    $img_size = $_POST['main_size'];
                }
                $jpg = $this->ffmpeg . ' -i  ' . $this->phpcms_path . '/' . $orgFile . ' -f  image2  -ss ' . $time . ' -vframes 1  -s ' . $img_size . ' ' . $targetPath . $name;
                @exec($jpg);
            }

            //复制文件到对应的FTP服务器
            $ftp_server    = pc_base::load_config('ftp_server');
            $remote_server = $_POST['remote_server'];
            $ftp_server    = $ftp_server[$remote_server];
            pc_base::ftp_upload($this->phpcms_path . '/' . $orgFile,
                                $ftp_server['ftp_server'],
                                $ftp_server['ftp_user_name'],
                                $ftp_server['ftp_user_pass']);

            //备份到所有FTP服务器
            $ftp_backup = pc_base::load_config('ftp_backup');
            foreach ($ftp_backup as $v)
            {
                pc_base::ftp_upload($this->phpcms_path . '/' . $orgFile,
                                    $ftp_backup['ftp_server'],
                                    $ftp_backup['ftp_user_name'],
                                    $ftp_backup['ftp_user_pass']);
            }
        }
        else
            echo '验证失败！';
    }

}