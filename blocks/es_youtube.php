<?php
//區塊
include_once(dirname(dirname(__FILE__)).'/function.php');
 



function youtube_show() {
 // global $xoopsDB;

	$xoopsModuleConfig=get_xoopsModuleConfig("es_youtube") ;
    $bad= preg_split('/[\n]/' , $xoopsModuleConfig['es_youtube_deny'] ) ;
    
	//取得偏好設定 -- 關鍵字
  	$my_key_word = $xoopsModuleConfig['es_you_keyword'] ;				 
	$youtube=get_youtube_rss($my_key_word) ;


    
 	//抽取 1 個
	$ti= mt_rand ( 0,count($youtube)-1 );
	$video_url = $youtube[$ti]['url'] ;

		
	$words = preg_split("/[=&]+/", $video_url )  ;
	if ($words[0]=='http://www.youtube.com/watch?v'  ) 
		$youtube_url=  '<p class="text-center"><iframe width="525" height="360" src="http://www.youtube.com/embed/'.$words[1].'" frameborder="0" allowfullscreen TITLE="' .$youtube[$ti]['video'] .'" ></iframe></p>' ;	
	
	//echo   $youtube_arr ;
	$block['html'] =$youtube_url ;
	return  $block ;
}	


?>