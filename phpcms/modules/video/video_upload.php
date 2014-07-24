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

 
 class  video_upload {
 
         function convert(){
            $local_video=new local_video($_POST,FFMPEG_EXT);
            $local_video->convert();

         }
         function getTime(){
             $local_video=new local_video($_POST,FFMPEG_EXT);
             $orgFile  = $local_video->options['org_path'] . $local_video->options['org'];
             $video_invo=$local_video->video_info($orgFile);
             echo $video_invo['seconds'];
         }
 
 }

