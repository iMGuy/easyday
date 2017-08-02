<?php    
    session_start(); // START SESSION
    //error_reporting(E_ALL ^ E_NOTICE); // REMOVE MINOR ERROR REPORTING
    
    define('__SYSTEM_INI_FILE__', $_SERVER['CONF_FILE']);
    define('__SYSTEM_INI_FILE_1__', $_SERVER['TRACKING_CONF_FILE']);
    
    date_default_timezone_set( 'Asia/Jerusalem' );
    
    require_once dirname(__FILE__) . '/classes/SysConfig.class.php';
    require_once dirname(__FILE__) . '/functions.php';
    require(dirname(__FILE__)."/classes/DataBase.class.php");
    
    use lib\classes\SysConfig;
    languagechange();
    
    $DB = new DB(   SysConfig::get("database","db_host"), 
                    SysConfig::get("database","db_name"), 
                    $_SERVER['DB_USER'],
                    $_SERVER['DB_PASS'] );
                    
    $dir_path   = SysConfig::get("settings","files_path");
    $path       = SysConfig::get("settings","path");
    
    // Check if langage is set, if not - get from DB defoult settings
    if (!isset($_SESSION['site_lang']) || empty($_SESSION['site_lang'])) {
        $_SESSION["site_lang"] = $DB->single("SELECT `value` FROM  `SETTINGS` WHERE  `parm` LIKE  'default_lang';"); 
    }
    
    // if file translation exist - load it, or use defoult - English
    if (file_exists($path . '/config/localization/' . $_SESSION["site_lang"] . '.php')) {
        include($path .'config/localization/' . $_SESSION["site_lang"].'.php');
    } else {
        include($path . 'config/localization/english.php');
    }
    
    // Set the site translation variable - $texts
    $texts = $localization[$_SESSION["site_lang"]];
    
?>
