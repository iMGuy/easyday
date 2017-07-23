<?php
    namespace lib\classes;
    require_once dirname(__FILE__) . '/lib/wrapper.php';

    $ndb_no= '11529';
    $data= array();
    
    $discription = $DB->query("SELECT `Long_Desc`,`Shrt_Desc` FROM `FOOD_DES` WHERE NDB_No = ?", array($ndb_no) );
    $data[] = $DB->query("SELECT * FROM `NUT_DATA` WHERE NDB_No = ?", array($ndb_no) );
    $units[] = $DB->query("SELECT * FROM `WEIGHT` WHERE NDB_No = ?", array($ndb_no) );
    
    // var_dump($data);
    echo '<pre>' . var_export($discription, true) . '</pre>';
    echo '<hr>';
    
    
    
    
/*        
    $txt = "[" . PHP_EOL;
    foreach ($data as $key => $value) {
        $txt = $txt . "{ \"value\": \"" . strtolower($value['Shrt_Desc']) ."\", \"data\": \"" . $value['NDB_No'] ."\" }," . PHP_EOL;;
     
    }
    $txt = $txt . "]" . PHP_EOL;

    $myfile = fopen("data/autocomplete/dishes_en", "w") or die("Unable to open file!");
    fwrite($myfile, $txt);
    fclose($myfile);

[
{ "value": "United Arab Emirates", "data": "AE" },
{ "value": "United Kingdom", "data": "UK" },
{ "value": "United States", "data": "US" }
] */
?>