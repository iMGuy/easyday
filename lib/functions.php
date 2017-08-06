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
    $tarr = array();
    $html = '';
    
        
    if ( (!empty($arr)) && (!empty($name)) && (!empty($value)) && (!empty($menu)) ) {
        
        $t_arr = dropdown_values_translate($arr, $name , $menu);
            $html .= "<option value=\"100\" selected=\"selected\">" . $texts['dropdown']['weight']['unit'] . "</option>";  
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
    
    
function languagechange()    {
 
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

?>