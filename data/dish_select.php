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
        $data   = $DB->query("SELECT NUT_DATA . * , NUTR_DEF . * FROM NUT_DATA, NUTR_DEF WHERE NUT_DATA.NDB_No like ? AND NUT_DATA.Nutr_No = NUTR_DEF.Nutr_No",array($data[0]['NDB_No']));
        
        $nut_name = array(  'Protein',
                            'Carbohydrate, by difference', 
                            'Total lipid (fat)', 
                            'Energy',
                            'Water',
                            'Fiber, total dietary',
                            'Sugars, total',
                        );
        $model_table_html = model_html_build($data, $nut_name);
        $model_html = "<div id=\"myModal\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\"><div class=\"modal-dialog\" role=\"document\"><div class=\"modal-content\"><div class=\"modal-header\"><button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><h4 class=\"modal-title\">" . $texts['model']['Title'] . " (<span id=\"default_weight\">" . $default_weight . "</span><span id=\"default_unit\">" . $defoult_units . "</span>)</h4></div><div class=\"modal-body\">" . $model_table_html . "</div><div class=\"modal-footer\"><button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button></div></div><!-- /.modal-content --></div><!-- /.modal-dialog --></div><!-- /.modal -->";
        
        $dish_info = array( 'Protein', 
                            'Carbohydrate, by difference',
                            'Total lipid (fat)', 
                            'Energy'
                        );
        $return_arr['dish_info'] = dish_info_data($data, $dish_info);
        $return_arr["weight"]   = dropdown_values_db( $weight, 'Msre_Desc', 'Gm_Wgt', 'weight');
        $return_arr["model"] = $model_html;
        // $return_arr['data']     = $data;
        
        /* Toss back results as json encoded array. */
        echo json_encode($return_arr, JSON_HEX_QUOT);
    }
    
?>