<table cellpadding="2" cellspacing="1" width="98%">
    <tr> 
        <td>允许上传的视频类型</td>
        <td><input type="text" name="setting[upload_allowext]" value="*.wmv;*.avi" size="40" class="input-text"><font color="red">上传文件类型请用分号(;)分开</font></td>
    </tr>
    <tr> 
        <td>允许上传的视频大小</td>
        <td><input type="text" name="setting[upload_allowsize]" value="1024" size="40" class="input-text">M</td>
    </tr>
    <tr> 
        <td>是否随机上传到远程服务器</td>
        <td><input type="radio" name="setting[put_remote]" value="1">是 <input type="radio" name="setting[put_remote]" value="0">否</td>
    </tr>	
    <tr>
        <td>视频尺寸</td>
        <td><input type="text" name="setting[video_size]" value="800x600" size="40" class="input-text"><font color="red">视频分辨率</font></td>
    </tr>
    <tr>
        <td>截图尺寸</td>
        <td><input type="text" name="setting[thumb_size]" value="800x600" size="40" class="input-text"><font color="red">比如：800x600</font></td>
    </tr>
    <tr>
        <td>主图尺寸</td>
        <td><input type="text" name="setting[main_size]" value="800x600" size="40" class="input-text"><font color="red">比如：800x600</font></td>
    </tr>
        <tr> 
        <td>水印参数</td>
        <td><input type="text" name="setting[watermark]" value="\"movie=logo.png [watermark];in[warktermark] overlay=0:0:1 [out]\"" size="40" class="input-text"><font color="red">比如：logo.png为水印图片，overlay前两个参数分别为距离左边与上边的距离</font></td>
    </tr>
</table>

