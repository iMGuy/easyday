<?php    
    session_start(); // START SESSION
    date_default_timezone_set( 'Asia/Jerusalem' );
    
    define('__SYSTEM_INI_FILE__', $_SERVER['CONF_FILE']);
    define('__SYSTEM_INI_FILE_1__', $_SERVER['TRACKING_CONF_FILE']);
    
    require_once dirname(__FILE__) . '/classes/SysConfig.class.php';
    require_once dirname(__FILE__) . '/functions.php';
    require(dirname(__FILE__)."/classes/DataBase.class.php");
    
    use lib\classes\SysConfig;
    
    $DB = new DB(   SysConfig::get("database","db_host"), 
                    SysConfig::get("database","db_name"), 
                    $_SERVER['DB_USER'],
                    $_SERVER['DB_PASS'] );
                    
    // Set the site translation variable - $texts
                    
    $dir_path           = $DB->single("SELECT `value` FROM `SETTINGS` WHERE `parm` LIKE ?", array('files_path'));
    $path               = $DB->single("SELECT `value` FROM `SETTINGS` WHERE `parm` LIKE ?", array('path'));
    $default_weight     = $DB->single("SELECT `value` FROM `SETTINGS` WHERE `parm` LIKE ?", array('default_weight'));
    $defoult_units      = $DB->single("SELECT `value` FROM `SETTINGS` WHERE `parm` LIKE ?", array('default_units'));
    $defoult_lang       = $DB->single("SELECT `value` FROM `SETTINGS` WHERE `parm` LIKE ?", array('default_lang'));
    
    set_language();
    
    // if file translation exist - load it, else, use default - English
    if (file_exists($path . 'config/localization/' . $_SESSION["site_lang"] . '.php')) {
        include($path .'config/localization/' . $_SESSION["site_lang"].'.php');
    } elseif (file_exists($path . '/config/localization/english.php')) {
        include($path . 'config/localization/english.php');
    }
    
    $texts = $localization[$_SESSION["site_lang"]];
    
    
?>
