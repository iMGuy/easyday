<?php
    namespace lib\classes;
    require_once '../lib/wrapper.php';
    
    if (isset($_GET['food_id'])){
        $return_arr[] = '';
        $food_unit  = $DB->single("SELECT `Gm_Wgt` FROM `WEIGHT` WHERE `NDB_No` = ?", array($_GET['food_id']));
        $food_nut   = $DB->query("SELECT `Pro_Factor`,`CHO_Factor`,`Fat_Factor` FROM `FOOD_DES` WHERE `NDB_No` = ?", array($_GET['food_id']));
       
        $return_arr = array(    $food_unit, 
                                $food_nut[0]['Pro_Factor'],
                                $food_nut[0]['CHO_Factor'],
                                $food_nut[0]['Fat_Factor']);
                            
        /* Toss back results as string. */
        echo json_encode($return_arr, JSON_HEX_QUOT);
    }
    
    

?>