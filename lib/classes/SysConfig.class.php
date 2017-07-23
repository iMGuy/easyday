<?php
namespace lib\classes;

define('__SYSTEM_INI_FILE__', $_SERVER['CONF_FILE']);
// define('__SYSTEM_INI_FILE_1__', $_SERVER['TRACKING_CONF_FILE']);


class SysConfig {
	/**
	 * @var array $config: holds the config file as key => value pairs
	 */
	public static $config;
	public static $config_tracking;

	function __construct() {
		/* loading the ini file */
		self::$config = parse_ini_file(__SYSTEM_INI_FILE__, true);
		// self::$config_tracking = parse_ini_file(__SYSTEM_INI_FILE_1__, true);
	}

	/**
	 * @param String $section - the ini file section, e.g. [header], [database]
	 * @param String param - the ini file parameter name
	 * @return String the ini file parameter
	 */
	public static function get($section, $param) {

		return (isset(self::$config[$section][$param]) ? self::$config[$section][$param] : '');
	}

	public static function get_tracking($section, $param) {

		return (isset(self::$config_tracking[$section][$param]) ? self::$config_tracking[$section][$param] : AppLog::log('Invalid System Config param: ' . $param));
	}

	public static function getBOServicesPath() {
		if ($_SERVER['HTTP_HOST'] == 'localhost:8080') {$test = 1;}
		else {$test = 0;}

		if ($test == 1) {
			$path = SysConfig::get('general', 'site_url');
		}
		else {
			$url_params = explode('/', $_SERVER['REQUEST_URI']);
			$path = 'https://'.$_SERVER['HTTP_HOST'].substr($_SERVER['REQUEST_URI'], 0, -(strlen($url_params[count($url_params)-1])));
		}

		return $path;
	}

	public static function getHeaderScripts($type = 0) {
		if ($type) $where = " OR PAGES = " . $type;
		$query = "select * from HEADER_SCRIPTS WHERE PAGES=0" . $where;
		$scripts = db::getObjects($query);

		foreach ($scripts as $script) $result .= $script['CONTENT'];

		return $result;
	}

   /**
    * Get setting parameter from BD
    *
    * @param $key
    * @param null $default
    * @return null
    */
    public static function getFromDb($key, $default = null)
    {
        $rez = db::getTableRow('SETTINGS', 'SETTING_NAME', $key);

        if ($rez) {
            return $rez['SETTING_VALUE'];
        } else {
               return $default;
        }

    }

    /**
     * Insert into DB new key value pair settings
     *
     * @param $key
     * @param $value
     */
    public static function setInDb($key, $value)
    {
        db::insert('SETTINGS', ['SETTING_NAME' => $key, 'SETTING_VALUE' => $value]);
    }

}

/**
 * reading the ini file
 */
new SysConfig();

?>