-- Powered by www.appqy.com 
-- authoremail fy@appqy.com

/* s:'1',//调用方式，0=普通方法（f=视频地址），1=网址形式,2=xml形式，3=swf形式(s>0时f=网址，配合a来完成对地址的组装
 * p:'1',//视频默认0是暂停，1是播放
 * h:'0',//播放http视频流时采用何种拖动方法，=0不使用任意拖动，=1是使用按关键帧，=2是按时间点，=3是自动判断按什么(如果视频格式是.mp4就按关键帧，.flv就按关键时间)，=4也是自动判断(只要包含字符mp4就按mp4来，只要包含字符flv就按flv来)
 * f   视频地址
 * x:'',//调用xml风格路径，为空的话将使用ckplayer.js的配置   
 * i:'http://www.ckplayer.com/images/loadimg2.jpg',//初始图片地址
 * d:'http://www.ckplayer.com/down/pause6.1_1.swf|http://www.ckplayer.com/down/pause6.1_2.swf',//暂停时播放的广告，swf/图片,多个用竖线隔开，图片要加链接地址，没有的时候留空就行
 * u:'',//暂停时如果是图片的话，加个链接地址
 * l:'http://www.ckplayer.com/down/adv6.1_1.swf|http://www.ckplayer.com/down/adv6.1_2.swf',//前置广告，swf/图片/视频，多个用竖线隔开，图片和视频要加链接地址
 * r:'',//前置广告的链接地址，多个用竖线隔开，没有的留空
 * t:'1|0',//视频开始前播放swf/图片时的时间，多个用竖线隔开
 * z:'http://www.ckplayer.com/down/buffer.swf',//缓冲广告，只能放一个，swf格式
 * v:'80',//默认音量，0-100之间
 * 视频大小 
 * 是否使用HTML 0为使用  1为不使用
 * 备播字段
 */
DROP TABLE IF EXISTS `phpcms_appqy_ckplayer`;
CREATE TABLE IF NOT EXISTS `phpcms_appqy_ckplayer` (
	`id` tinyint(1) not null default '1',
	`video_type` tinyint(1) NOT NULL default '0',
	`video_default_status` tinyint(1) NOT NULL default '1',
	`ck_http_set` tinyint(1) NOT NULL default '0',
	`video_url` char(255) NULL,
	`ck_style` char(100) NULL,
	`thumb_load` varchar(100) NULL,
	`thumb_pause_ad` varchar(100) NULL,
	`url_pause_ad` char(255) NULL,
	`thumb_qz_ad` varchar(100) NULL,
	`url_qz_ad` char(255) NULL,
	`time_qz_ad` char(50) NULL,
	`beff_ad` char(255) NULL,
	`text_ad` text null,
	`ck_volume` char(2) not NULL default '80',
	`ck_size` char(10) not NULL default '600|400',
	`ck_html5` tinyint(1) NOT NULL default '0'
) TYPE=MyISAM;

INSERT INTO  `phpcms_appqy_ckplayer` (
`id`,
`video_type` ,
`video_default_status` ,
`ck_http_set` ,
`video_url` ,
`ck_style` ,
`thumb_load` ,
`thumb_pause_ad` ,
`url_pause_ad`,
`thumb_qz_ad` ,
`url_qz_ad` ,
`time_qz_ad` ,
`beff_ad` ,
`text_ad`,
`ck_volume` ,
`ck_size` ,
`ck_html5`
)
VALUES (
1,1, 1,0, NULL , NULL , NULL , NULL , NULL , NULL, NULL , NULL , NULL , NULL ,  80,  '600|400',0
)