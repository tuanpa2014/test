<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<?php
/*
 * Mục đích: 
 */

date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once("/var/www/glx/html/cms2014/define.php");
require_once("/var/www/glx/html/cms2014/condb.lib");
//require_once("condb_m11.php");
require_once("/var/www/glx/html/cms2014/define_user.php");
require_once("/var/www/glx/html/cms2014/system.php");
//require_once 'lib.php';
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

   // mysql_query("SET NAMES 'utf8'", $dblinkM11);
    mysql_query("SET NAMES 'utf8'", $dblink);
    
    
    $obj = new ClassUserCms();
    $obj1 = new ClassUserGroup();
    
    $dbname = DB_NAME;
    $obj->LoadFromDB("SELECT * from $dbname.cms_user WHERE id = 1");


    $obj1->LoadFromDB("SELECT * from $dbname.cms_group WHERE id = 1");


    echo "<pre> >>> " . __FILE__ . "(" . __LINE__ . ")<br/>";
    print_r($obj1);
    echo "</pre>";
    
//
//    //1. lấy all film ở m11
//    $sql = "SELECT * FROM film.film_items";
//    $ret = mysql_query($sql, $dblinkM11);
//    $count = 0;
//
//    while ($row = mysql_fetch_array($ret)) {
//        $count++;
//    }


} catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n";
}
?>