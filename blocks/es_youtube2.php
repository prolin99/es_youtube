<?php
//區塊

include_once(dirname(dirname(__FILE__)).'/function.php');
 


function youtube_show2() {
 // global $xoopsDB;

	$xoopsModuleConfig=get_xoopsModuleConfig("es_youtube") ;
    	$bad= preg_split('/[\n]/' , $xoopsModuleConfig['es_youtube_deny'] ) ;
    
	//取得偏好設定 -- 關鍵字
  	$keyword = $xoopsModuleConfig['es_you_keyword'] ;				 
	$youtube=get_youtube_rss($keyword) ;
	//var_dump($youtube) ;
	return $youtube ;
 
 
}	


?>