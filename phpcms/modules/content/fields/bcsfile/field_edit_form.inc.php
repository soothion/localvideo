<?php
defined('IN_PHPCMS') or exit('No permission resources.');

?>
<table cellpadding="2" cellspacing="1" width="98%">
    <tr> 
        <td>允许上传的视频类型</td>
        <td><input type="text" name="setting[upload_allowext]" value="<?php echo $setting['upload_allowext']; ?>" size="40" class="input-text"><font color="red">上传文件类型请用逗号(,)分开</font></td>
    </tr>
    <tr> 
        <td>允许上传的视频大小</td>
        <td><input type="text" name="setting[upload_allowsize]" value="<?php echo $setting['upload_allowsize']; ?>" size="40" class="input-text">M</td>
    </tr>	
    <tr> 
        <td>截图尺寸</td>
        <td><input type="text" name="setting[thumb_size]" value="<?php echo $setting['thumb_size']; ?>" size="40" class="input-text"><font color="red">比如：800x600</font></td>
    </tr>	
    <tr> 
        <td>主图尺寸</td>
        <td><input type="text" name="setting[main_size]" value="<?php echo $setting['main_size']; ?>" size="40" class="input-text"><font color="red">比如：800x600</font></td>
    </tr>	
</table>
