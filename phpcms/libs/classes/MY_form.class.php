<?php
class MY_form {
	public static function ueditor($textareaid = 'content',$toolbar = 'basic', $module = '', $catid = '', $color = '', $allowupload = 0, $allowbrowser = 1,$alowuploadexts = '',$height = 500,$disabled_page = 0, $allowuploadnum = '10') {
	  if(!defined('EDITOR_INIT')) {
	      $str='';
	      $str .= '<script type="text/javascript" src="'.JS_PATH.'ueditor/ueditor.config.js"></script>';
	      $str .= '<script type="text/javascript" src="'.JS_PATH.'ueditor/ueditor.all.min.js"></script>';
          $str .= '<script type="text/javascript" src="'.JS_PATH.'ueditor/ueditor.parse.min.js"></script>';
          $str .= '<link rel="stylesheet" href="'.JS_PATH.'ueditor/themes/default/css/ueditor.css"/>';
	    define('EDITOR_INIT', 1);
	  }

        if($toolbar == 'basic') {
            $toolbar="[
                [
                    'source', //源代码
                    'undo', //撤销
                    'redo', //重做
                    'bold', //加粗
                    'indent', //首行缩进
                    'italic', //斜体
                    'underline', //下划线
                    'formatmatch', //格式刷
                    'pasteplain', //纯文本粘贴模式
                    'removeformat', //清除格式
                    'time', //时间
                    'date', //日期
                    'unlink', //取消链接
                    'deletecaption', //删除表格标题
                    'inserttitle', //插入标题
                    'cleardoc', //清空文档
                    'insertparagraphbeforetable', //表格前插入行
                    'fontfamily', //字体
                    'fontsize', //字号
                    'paragraph', //段落格式
                    'simpleupload', //单图上传
                    'insertimage', //多图上传
                    'link', //超链接
                    'emotion', //表情
                    'searchreplace', //查询替换
                    'insertvideo', //视频
                    'justifyleft', //居左对齐
                    'justifyright', //居右对齐
                    'justifycenter', //居中对齐
                    'justifyjustify', //两端对齐
                    'forecolor', //字体颜色
                    'imageleft', //左浮动
                    'imageright', //右浮动
                    'imagecenter', //居中
                    'lineheight', //行间距
                    'preview', //预览
                ]
            ]";
        }else{
            $toolbar="[
                [
                    'source', //源代码
                    'customstyle', //自定义标题
                    'undo', //撤销
                    'redo', //重做
                    'bold', //加粗
                    'indent', //首行缩进
                    'italic', //斜体
                    'underline', //下划线
                    'strikethrough', //删除线
                    'subscript', //下标
                    'fontborder', //字符边框
                    'superscript', //上标
                    'formatmatch', //格式刷
                    'blockquote', //引用
                    'pasteplain', //纯文本粘贴模式
                    'selectall', //全选
                    'horizontal', //分隔线
                    'removeformat', //清除格式
                    'time', //时间
                    'date', //日期
                    'unlink', //取消链接
                    'mergeright', //右合并单元格
                    'mergedown', //下合并单元格
                    'deletecaption', //删除表格标题
                    'inserttitle', //插入标题
                    'mergecells', //合并多个单元格
                    'deletetable', //删除表格
                    'cleardoc', //清空文档
                    'insertparagraphbeforetable', //表格前插入行
                    'fontfamily', //字体
                    'fontsize', //字号
                    'paragraph', //段落格式
                    'simpleupload', //单图上传
                    'insertimage', //多图上传
                    'link', //超链接
                    'emotion', //表情
                    'searchreplace', //查询替换
                    'map', //Baidu地图
                    'insertvideo', //视频
                    'justifyleft', //居左对齐
                    'justifyright', //居右对齐
                    'justifycenter', //居中对齐
                    'justifyjustify', //两端对齐
                    'forecolor', //字体颜色
                    'backcolor', //背景色
                    'insertorderedlist', //有序列表
                    'insertunorderedlist', //无序列表
                    'fullscreen', //全屏
                    'rowspacingtop', //段前距
                    'rowspacingbottom', //段后距
                    'pagebreak', //分页
                    'insertframe', //插入Iframe
                    'imagenone', //默认
                    'imageleft', //左浮动
                    'imageright', //右浮动
                    'imagecenter', //居中
                    'lineheight', //行间距
                    'edittip ', //编辑提示
                    'autotypeset', //自动排版
                    'background', //背景
                    'music', //音乐
                    'inserttable', //插入表格
                    'print', //打印
                    'preview', //预览
                    'insertframe', //插入Iframe
                ]
            ]";
        }

        $str .= "<script type='text/javascript'>";
	  $str .= 'var editor = UE.getEditor("'.$textareaid.'",{
	  	    serverUrl:"'.APP_PATH.'index.php?m=ueditor&c=controller&a=upload",
			initialFrameWidth:650,
			initialFrameHeight:'.$height.',
			pasteplain:false,
            toolbars:'.$toolbar.'
		});';
		$str .="UE.Editor.prototype._bkGetActionUrl = UE.Editor.prototype.getActionUrl;";
		$str .="UE.Editor.prototype.getActionUrl = function(action) {";
		$str .="	return '".APP_PATH."index.php?m=ueditor&c=controller&a=upload&module=".$module."&catid=".$catid."&dosubmit=1&action='+action;";
		$str .="}";
	    $str .= '</script>';
		return $str;
	}
}
?>