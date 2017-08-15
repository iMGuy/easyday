<?php

/*
//  Translate the dropdown menu options
// $arr = the DB resoults (in English)
// $name = the DB column name
// $menu = the DropDown menu to translate
*/
function dropdown_values_translate($arr = array(), $name = '', $menu = '') {
                    
    global  $texts;
            $texts_lang = $texts['dropdown'][$menu];
            
    if ( (!empty($arr)) && (!empty($name)) && (!empty($menu)) && (!empty($texts_lang)) ) {
        $keys   = array_keys( $texts_lang );
        $values = array_values( $texts_lang );
        for ($x = 0; $x < count($arr); $x++) {
            
                $arr[$x][$name] = str_replace($keys, $values, $arr[$x][$name] );
        } 
    }
    
    return $arr;
}

/*
// Build the HTML of the dropDrown menus from DB
// $arr = the DB resoults (in English)
// $name = the DB column name
// $value = the DB column value
// $menu = the DropDown menu to translate
*/
    function dropdown_values_db ($arr = array(), $name = '', $value = '', $menu = '') {
    
    global $texts;
    global $default_weight;
    $tarr = array();
    $html = '';
    
        
    if ( (!empty($arr)) && (!empty($name)) && (!empty($value)) && (!empty($menu)) ) {
        
        $t_arr = dropdown_values_translate($arr, $name , $menu);
            $html .= "<option value=\"" . $default_weight . "\" selected=\"selected\">" . $texts['dropdown']['weight']['unit'] . "</option>";  
        for ($x = 0; $x < count($t_arr); $x++) {
            $html .= "<option value=\"" . $t_arr[$x][$value] . "\">" . $t_arr[$x][$name] . "</option>";   
        }
    }
    
    return $html;
}

/*
// Build the HTML of the dropDrown menus - from Translation file
// $arr = the DB resoults (in English)
// $name = the DB column name
// $value = the DB column value
// $menu = the DropDown menu to translate
*/

function dropdown_values ($menu = '') {
    
    if ( !empty($menu) ) {
        
        global  $texts;
                $args = $texts['dropdown'][$menu];
                $html = '';
                
        foreach ($args as $key => $value) {
            
            $html .= "<option value=\"" . $key . "\">" . $value . "</option>";   
        }
    }
    
    return $html;
}

// Simple nice view for array
function nice_dump($arr = array()) {
echo '<pre>' . var_export($arr, true) . '</pre>';
}
    
    
function set_language() {
    
    global $defoult_lang;
 
    
    if (!isset($_SESSION['site_lang']) || empty($_SESSION['site_lang'])) {
        $_SESSION["site_lang"] = $defoult_lang; 
    }
    
    if (isset($_GET['lang'])) {
        
        switch ($_GET['lang']) {
            case "english":
                $_SESSION["site_lang"] = "english";
                break;
            case "hebrew":
                $_SESSION["site_lang"] = "hebrew";
                break;
            default:
                $_SESSION["site_lang"] = "hebrew";
        }    
    }

}



function model_html_build( $arr = array(),$nut_name = array() ) {
    
    global  $texts;
    global  $defoult_units;
            $new_val = '';
            
                                    

    $html = "   <table class=\"table table-striped\"><thead><tr><th>" . $texts['model']['Nutrient']  . "</th><th>" . $texts['model']['Unit']  . "</th> <th>" . $texts['model']['Value']  . "</th></tr></thead></tbody>";
    
    foreach ($arr as $key => $value) {
        
        if ( in_array($value['NutrDesc'], $nut_name) ) {
            $round_val = round($value['Nutr_Val'],2);
            $html .= "<tr>  <td id=\"" . $value['Tagname'] . "\"> " . $texts['model'][$value['NutrDesc']] . " </td>
                            <td id=\"" . $value['Tagname'] . "_unit\"> " . $value['Units'] . " </td>
                            <td id=\"" . $value['Tagname'] . "_value\"> " . $round_val . " </td>
                        </tr>";
        }    
    }
    
    $html .= "</tbody></table>";
    
    return $html;
}

function dish_info_data( $arr = array(),$nut_name = array() ) {
    
    if ( (!empty($arr)) && (!empty($nut_name)) ) {
    
        global  $texts;
                $new_arr = array();
                $new_val = '';
                                        
        foreach ($arr as $key => $value) {
            
            if ( in_array($value['NutrDesc'], $nut_name) ) {
                $new_val = round($value['Nutr_Val'],2);
                $new_arr[] = array( $value['NutrDesc'] => $new_val);
            }    
        }
        
        return $new_arr;
    }
}


?>