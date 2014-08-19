<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header', 'admin');

?>
<script type="text/javascript" src="<?php echo JS_PATH; ?>video/swfobject.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH; ?>video/swfobject2.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH; ?>dialog.js"></script>

<script language="javascript" type="text/javascript" src="<?php echo JS_PATH; ?>content_addtop.js"></script>



<link href="<?php echo CSS_PATH; ?>dialog.css" rel="stylesheet" type="text/css" />

<div class="pad-10">
    <div class="common-form">
        <form name="myform" action="?m=video&c=batch_upload&a=batch_add" method="post" id="myform" onsubmit ="getElementById('dosubmit').disabled=true;return true;" enctype="multipart/form-data" ><input type="hidden" name="userupload" value="1">
            <input type="hidden" value="" name="batch_insert" />
            <table width="100%" class="table_form">

                <script type="text/javascript" src="<?php echo JS_PATH; ?>plupload/plupload.full.min.js"></script>
                <tr id="local_method">
                    <td width="120">扫描文件</td> 

                    <td>
                        <div id="container">
                            <input id='pickfiles' type='button' class='button' value='开始扫描'>
                            <input id='path' type='text' name="path" value='uploadfile/video/ftp/'><font color="red">路径必须以/结束</font>


                        </div>
                    </td>
                </tr>


                <tr>
                    <td width="120"><input type="checkbox" value="" id="check_box" onclick="selectall('ids[]');"> 全选 </td>
                    <td> </td>

                </tr>

                <tr>
                    <td width="120">上传到远程服务器</td> 
                    <td>
                        <input type="radio" name="remote" value="1"/>是
                        <input type="radio" name="remote" value="0"/>否
                    </td>
                </tr>
                <tr>
                    <td width="120">是否备份</td> 
                    <td>
                        <input type="radio" name="backup" value="1"/>是
                        <input type="radio" name="backup" value="0"/>否
                    </td>
                </tr>
                <tr>
                    <td width="120">标题</td> 
                    <td>
                        <input type="text" name="title"/>
                    </td>
                </tr>

                <tr>
                    <td width="120"><?php echo L('video_description') ?></td> 
                    <td><textarea id="description" name="description" rows="5" cols="50"></textarea></td>
                </tr>

                <tr>

                    <td width="120">栏目ID</td> 
                    <td>
                        <?php $timestamp = time(); ?>
                        <input type="hidden" name="token" value="<?php echo md5('fire-rain.com' . $timestamp); ?>"/>
                        <input type="hidden" name="timestamp" value="<?php echo $timestamp ?>"/>
                         <div style="width:500px; padding:2px; border:1px solid #d8d8d8; float:left; margin-top:10px; margin-right:10px; overflow:hidden">
                        <table width="100%" cellspacing="0" class="table-list" >
                                <thead>
                                    <tr>
                                    <th width="100"><?php echo L('catid');?></th>
                                    <th ><?php echo L('catname');?></th>
                                    <th width="150" ><?php echo L('select_model_name');?></th>
                                    </tr>
                                </thead>
                            <tbody id="load_catgory">
                            <?php echo $categorys;?>
                            </tbody>
                            </table>
                        </div>

                        <div style="overflow:hidden;_float:left;margin-top:10px;*margin-top:0;_margin-top:0; width:144px">
                        <fieldset>
                            <legend><?php echo L('category_checked');?></legend>
                        <ul class='list-dot-othors' id='catname'></ul>
                        </fieldset>
                        </div>
                    </td>

                </tr>
               
            </table>
           
</div>
<style type="text/css">
.line_ff9966,.line_ff9966:hover td{background-color:#FF9966}
.line_fbffe4,.line_fbffe4:hover td {background-color:#fbffe4}
.list-dot-othors li{float:none; width:auto}
</style>
<SCRIPT LANGUAGE="JavaScript">
<!--
	function select_list(obj,title,id) {
		var sid = 'v'+id;
		$(obj).attr('class','line_fbffe4');
		var str = "<li id='"+sid+"'>·<input type='hidden' name='catids[]' value='"+id+"'><span>"+title+"</span><a href='javascript:;' class='close' onclick=\"remove_id('"+sid+"')\"></a></li>";
		$('#catname').append(str);
}

$(document).ready(function(){
    $("#load_catgory").load("?m=content&c=content&a=public_getsite_categorys&siteid=1");
})
		

//移除ID
function remove_id(id) {
	$('#'+id).remove();
}
//-->
</SCRIPT>


            <div class="bk15"></div>
            <input type="hidden" name="vid" id="vid" value="0">
            <input name="dosubmit" type="submit" value="<?php echo L('submit') ?>" class="button" id="dosubmit">
        </form>
    </div>
</body>
</html>
<script type="text/javascript">

    $(document).ready(function() {

//移除ID


        function selectall(name) {

            if ($("#check_box").attr("checked") == 'checked') {
                $("input[name='" + name + "']").each(function() {
                    $(this).attr("checked", "checked");

                });
            } else {
                $("input[name='" + name + "']").each(function() {
                    $(this).removeAttr("checked");
                });
            }
        }


        $("#pickfiles").bind('click', function() {

            $.ajax({
                type: "post",
                url: "index.php?m=video&c=batch_upload&a=get_filename&pc_hash=<?php echo $_SESSION['pc_hash'] ?>",
                data: 'path=' + $('#path').val(),
                beforeSend:
                        function() {

                            $('#pickfiles').val('扫描中...');


                        },
                success:
                        function(data) {

                            $('#local_method').after(data);

                            $('#pickfiles').val('完成！');

                            $('#pickfiles').unbind('click');



                        }
            });

        });


    });

</script>
