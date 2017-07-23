<?php    
    session_start(); // START SESSION
    //error_reporting(E_ALL ^ E_NOTICE); // REMOVE MINOR ERROR REPORTING
    
    define('__SYSTEM_INI_FILE__', $_SERVER['CONF_FILE']);
    define('__SYSTEM_INI_FILE_1__', $_SERVER['TRACKING_CONF_FILE']);
    
    date_default_timezone_set( 'Asia/Jerusalem' );
    
    require_once dirname(__FILE__) . '/classes/SysConfig.class.php';
    require(dirname(__FILE__)."/classes/DataBase.class.php");
    
    use lib\classes\SysConfig;
    
    
    
    $DB = new DB(   SysConfig::get("database","db_host"), 
                    SysConfig::get("database","db_name"), 
                    $_SERVER['DB_USER'],
                    $_SERVER['DB_PASS'] );
                    
    $dir_path = SysConfig::get("settings","files_path")
    
?>
