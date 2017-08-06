<?php
    namespace lib\classes;
    require_once '../lib/wrapper.php';
    header('Content-Type: text/html; charset="utf-8"');

    if (isset($_GET['dish_name'])){
        $return_arr = array();
        $weight     = array();
        $data       = array();
        
        switch ($_SESSION["site_lang"]) {
            case "english":
                $data = $DB->query("SELECT `NDB_No` FROM  `FOOD_DES` WHERE  `Shrt_Desc` LIKE ?", array($_GET['dish_name']));
                break;
            case "hebrew":
                $data = $DB->query("SELECT `NDB_No` FROM  `FOOD_DES_TRANSLATE` WHERE  `Shrt_Desc_he` LIKE ?", array($_GET['dish_name']));
                break;
            default:
                $data = $DB->query("SELECT `NDB_No` FROM  `FOOD_DES_TRANSLATE` WHERE  `Shrt_Desc_he` LIKE ?", array($_GET['dish_name']));
        }
        
        $weight = $DB->query("SELECT `Msre_Desc`, `Gm_Wgt` FROM `WEIGHT` WHERE `NDB_No` LIKE ?", array($data[0]['NDB_No']));
        // $data   = $DB->query("SELECT NUT_DATA . * , NUTR_DEF . * FROM NUT_DATA, NUTR_DEF WHERE NUT_DATA.NDB_No like ? AND NUT_DATA.Nutr_No = NUTR_DEF.Nutr_No",array($data[0]['NDB_No']));
        
        $return_arr["weight"]   = dropdown_values_db( $weight, 'Msre_Desc', 'Gm_Wgt', 'weight');
        // $return_arr['data']     = $data;
        
        /* Toss back results as json encoded array. */
            echo json_encode($return_arr, JSON_HEX_QUOT);
    }
    
?>