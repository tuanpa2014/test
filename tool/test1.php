<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<?php
/*
 * Mục đích: 
 */

date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once("../define.php");
require_once("condb.lib");

require_once 'Zend/Application.php';
$enviroment = APPLICATION_ENV;
$options = APPLICATION_PATH . '/configs/application_not_ui.ini';
$application = new Zend_Application($enviroment, $options);
$application->bootstrap()->run();


function outputLog($str) {
    echo " <br>\n$str";
    $date = nowy();
    $fileLog = basename(__FILE__);
    outputT("/var/glx/weblog/$fileLog.log", $str);
}
function ol1($str) {
    outputLog($str);
}


try {
    
 
    bl(" Template OK");



require_once(APPLICATION_PATH."/modules/menu/models/menu.php");
$tbl = new Menu_Model_Menu();

$objMenu =  new ClassMenuCms();

$arrObj = $tbl->listItem();
//$arrObj = $objMenu->LoadFromDB("SELECT * FROM cms2014.cms_menu ORDER BY id ");


echo "\n<ul class='menuTiny' id='menuTiny'>";
//$objMenu->show_menu($arrObj, $arrMenu, 0 , '', $baseUrl."/".$this->currentController."/index");
$objMenu->show_menu_ok($arrObj);

echo "\n</ul>";

    


} catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n";
}
?>