<?php
//  ------------------------------------------------------------------------ //
// 本模組由 prolin 製作
// 製作日期：2014-05-01
// $Id:$
// ------------------------------------------------------------------------- //

/*-----------引入檔案區--------------*/
include_once "header_admin.php";
//樣版
$xoopsOption['template_main'] = "esyou_admin_tpl.html";
include_once "header.php";

/*-----------function區--------------*/
//

 
/*-----------執行動作判斷區----------*/
	$my_key_word = $xoopsModuleConfig['es_you_keyword'] ;		
	$data['video'] =get_youtube_rss($my_key_word ,1 ) ;
 
 
/*-----------秀出結果區--------------*/
 

$xoopsTpl->assign("data",$data);
 
include_once 'footer.php';
?>