<?php
//  ------------------------------------------------------------------------ //
// 本模組由 prolin 製作
// 製作日期：2014-02-16
// $Id:$
// ------------------------------------------------------------------------- //
//引入TadTools的函式庫
 
if(!file_exists(XOOPS_ROOT_PATH."/modules/tadtools/tad_function.php")){
 redirect_header("http://www.tad0616.net/modules/tad_uploader/index.php?of_cat_sn=50",3, _TAD_NEED_TADTOOLS);
}
include_once XOOPS_ROOT_PATH."/modules/tadtools/tad_function.php";

include_once(dirname(__FILE__).'/class/autoloader.php');

/********************* 自訂函數 *********************/



/********************* 預設函數 *********************/
 

if (!function_exists('get_youtube_rss')) {
	
function get_xoopsModuleConfig($module_dir){
  $modhandler = &xoops_gethandler('module');
  $xoopsModule = &$modhandler->getByDirname($module_dir);
  $config_handler =& xoops_gethandler('config');
  $xoopsModuleConfig =& $config_handler->getConfigsByCat(0, $xoopsModule->getVar('mid'));	
  return $xoopsModuleConfig ;
}	


function get_youtube_rss($keyword ,$admin=0 ) {
	//取得 youtube RSS 資料
	global $xoopsModuleConfig ;
	
    $simplepie=new SimplePie();  
    
    $bad= preg_split('/[\n]/' , $xoopsModuleConfig['es_youtube_deny'] ) ;
 	foreach ($bad as $k =>$v) {
		$bad[$k]= trim($v) ;
 	}	
    //由 RSS 找資料
    $query="http://gdata.youtube.com/feeds/api/videos?q=$keyword&orderby=published&max-results=30" ;


    $simplepie->set_feed_url($query);  
    
   	$simplepie->init();  
  	$simplepie->enable_order_by_date(true);
    $simplepie->handle_content_type();
 	
    //取得 RSS 資料
    foreach ($simplepie->get_items() as $item){  
		$descript  ='' ;
		$author_name='' ;
 		$descript =    $item->get_description()    ;
 		if ($author = $item->get_author()) {
			$author_name =  $author->get_name();
		}	
		
		//再次檢查關鍵字 
		if   ( strstr($item->get_title() , $keyword)   or   strstr($author_name  , $keyword)  ) {
			//不在隱藏的影片
			if (!in_array($item->get_title() , $bad) ){
				$i++ ;
				
				$data[$i]['url']= $item->get_permalink() ;
				$data[$i]['video']= $item->get_title() ;
				
				
				$data[$i]['author']= $author_name;
				$data[$i]['descript']= $descript;
 
			}else{
 				if ($admin) {
					$data[$i]['video']= $item->get_title() ;
					$data[$i]['author']= $author_name;
					$data[$i]['deny']= 1;
				}	
			}	
		}
    }
 
    return $data ;

			

}


}
