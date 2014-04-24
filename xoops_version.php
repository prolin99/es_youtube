<?php
//  ------------------------------------------------------------------------ //
// 本模組由 prolin 製作
// 製作日期：2014-05-1
// $Id:$
// ------------------------------------------------------------------------- //

//---基本設定---//

$modversion['name'] ='本校影音';				//模組名稱
$modversion['version']	= '0.1';				//模組版次
$modversion['author'] = 'prolin(prolin@tn.edu.tw)';		//模組作者
$modversion['description'] ='隨機顯示本校 youtube 影片一則';			//模組說明
$modversion['credits']	= 'prolin';				//模組授權者
$modversion['license']	= "GPL see LICENSE";		//模組版權
$modversion['official']		= 0;				//模組是否為官方發佈1，非官方0
$modversion['image']		= "images/logo.png";		//模組圖示
$modversion['dirname'] = basename(dirname(__FILE__));		//模組目錄名稱

//---模組狀態資訊---//
//$modversion['status_version'] = '0.8';
$modversion['release_date'] = '2014-05-01';
$modversion['module_website_url'] = 'https://github.com/prolin99/es_youtube';
$modversion['module_website_name'] = 'prolin';
$modversion['module_status'] = 'release';
$modversion['author_website_url'] = 'http://www.syps.tn.edu.tw';
$modversion['author_website_name'] = 'prolin';
$modversion['min_php']= 5.2;



//---啟動後台管理界面選單---//
$modversion['system_menu'] = 1;//---資料表架構---//



//---管理介面設定---//
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu.php";
 
//---使用者主選單設定---//
$modversion['hasMain'] = 0;


//---樣板設定---要有指定，才會編譯動作，//
$modversion['templates'] = array();
$i=1;
$modversion['templates'][$i]['file'] = 'esyou_admin_tpl.html';
$modversion['templates'][$i]['description'] = 'esyou_admin_tpl.html'; 

//---區塊設定---//
$modversion['blocks'] = array();
$i= 1 ;
$modversion['blocks'][1]['file'] = "es_youtube.php";
$modversion['blocks'][1]['name'] = 'youtube 影音';
$modversion['blocks'][1]['description'] = '隨機呈現一段本校影片';
$modversion['blocks'][1]['show_func'] = "youtube_show";
$modversion['blocks'][1]['template'] = "youtube_show.html";
//$modversion['blocks'][1]['edit_func'] = "youtube_edit";
//$modversion['blocks'][1]['options'] = "30";
$i++ ;
$modversion['blocks'][$i]['file'] = "es_youtube2.php";
$modversion['blocks'][$i]['name'] = 'youtube 連播';
$modversion['blocks'][$i]['description'] = '本校影片連續播放';
$modversion['blocks'][$i]['show_func'] = "youtube_show2";
$modversion['blocks'][$i]['template'] = "youtube_show2.html";



$i=0 ;
//偏好設定

$i++ ;
$modversion['config'][$i]['name'] = 'es_you_keyword';
$modversion['config'][$i]['title']   = '_MI_ESYOUTUBE_CONFIG_TITLE1';
$modversion['config'][$i]['description'] = '_MI_ESYOUTUBE_CONFIG_DESC1';
$modversion['config'][$i]['formtype']    = 'textbox';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default'] ="新營國小" ;

$i++ ;
$modversion['config'][$i]['name'] = 'es_youtube_deny';
$modversion['config'][$i]['title']   = '_MI_ESYOUTUBE_CON_TITLE2';
$modversion['config'][$i]['description'] = '_MI_ESYOUTUBE_CON_DESC2';
$modversion['config'][$i]['formtype']    = 'textarea';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default'] ="" ;



?>