<?php
/*
 * Mục đích: 
 */

require_once("../index.php");


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

    
    //Sample DB query:
    $dbname = DB_NAME;
    $obj = new ClassViduCms();
    $ret = $obj->LoadFromDB("SELECT * FROM $dbname.cms_vidu");
        
    echo "<pre> >>> " . __FILE__ . "(" . __LINE__ . ")<br/>";
    print_r($ret);
    echo "</pre>";

    

    


} catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n";
}
?>