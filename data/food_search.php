<?php
    namespace lib\classes;
    require_once '../lib/wrapper.php';

    if (isset($_GET['term'])){
        $return_arr = array();
        $data = $DB->query("SELECT `Shrt_Desc`,`NDB_No` FROM `FOOD_DES` WHERE `Shrt_Desc` LIKE ?", array('%'.$_GET['term'].'%'));
        foreach ($data as $key => $value) {
            $return_arr[] =  $value['Shrt_Desc'] . "-" . $value['NDB_No'];
        } 
    
       /* Toss back results as json encoded array. */
    echo json_encode($return_arr, JSON_HEX_QUOT);
    }
    
    
    
?>