<?php
    namespace lib\classes;
    require_once '../lib/wrapper.php';

    if (isset($_GET['food_name'])){
        $return_arr = array();
        $NDB_No = $DB->query("SELECT `NDB_No` FROM `FOOD_DES` WHERE `Shrt_Desc` = ?", array($_GET['food_name']));
        $return_arr = $DB->query("SELECT * FROM `WEIGHT` WHERE `NDB_No` = ?", array($NDB_No[0]['NDB_No']));
        
         /* Toss back results as json encoded array. */
        echo json_encode($return_arr, JSON_HEX_QUOT);
    }
    
    
    
?>