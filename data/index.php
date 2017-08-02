<?php

/* 
// This page contain all the "Index.php" page php functions, calculation, call to DB ETC.
*/
$dish_id = '01001';
$weight_dropdown = $DB->query("SELECT `Msre_Desc`, `Gm_Wgt` FROM `WEIGHT` WHERE `NDB_No` LIKE ?", array('%'.$dish_id.'%'));
?>