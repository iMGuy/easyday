<?php
    namespace lib\classes;
    require_once '../lib/wrapper.php';
    header('Content-Type: text/html; charset="utf-8"');
    
    $column_name = '';
    
    if (isset($_GET['term'])){
        
        $return_arr = array();
        $data = array();
        
        switch ($_SESSION["site_lang"]) {
            case "english":
                $column_name = "Shrt_Desc";
                $data = $DB->query("SELECT `" . $column_name . "` FROM `FOOD_DES` WHERE `" . $column_name . "` LIKE ?", array('%'.$_GET['term'].'%'));
                break;
            case "hebrew":
                $column_name = "Shrt_Desc_he";
                $data = $DB->query("SELECT `" . $column_name . "` FROM `FOOD_DES_TRANSLATE` WHERE `" . $column_name . "` LIKE ?", array('%'.$_GET['term'].'%'));
                break;
            default:
                $column_name = "Shrt_Desc";
                $data = $DB->query("SELECT `" . $column_name . "` FROM `FOOD_DES` WHERE `" . $column_name . "` LIKE ?", array('%'.$_GET['term'].'%'));
        }   
      
        foreach ($data as $key => $value) {
            // $return_arr[] =  "<div id=\"id-" . $value['NDB_No']. "\" >" . $value['Shrt_Desc'] . "</div >";
            $return_arr[]  = $value[$column_name];
            
        }
    /* Toss back results as json encoded array. */
    echo json_encode($return_arr, JSON_HEX_QUOT);
    }
    
    
    
?>