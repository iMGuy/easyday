<?php
    namespace lib\classes;
    require_once dirname(__FILE__) . '/lib/wrapper.php';
    require_once dirname(__FILE__) . '/data/index.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?php include("include/site_head.php"); ?>
</head>
<body id="page-top" class="index">

    <!-- Navigation -->
    <?php // include("/include/site_top_nav.php");  ?>
    
    <div class="row" style="text-align: left; width: 95%; margin: 0 auto;">
        <a href="<?php $dir_path ?>index.php?lang=hebrew">עברית</a> | <a href="<?php $dir_path ?>index.php?lang=english">English</a>
    </div>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1><?php echo $texts['homepage']['h1_title'] ?></h1>
        <p> <?php echo $texts['homepage']['title_discription'] ?> </p>  
      </div>
    </div>

    <div class="container">
        
        <div class="row dish-search-box">
            <div class="row">
                <?php include('include/dish_select.php'); ?>
            </div>
            <div class="row" id="info_inputs">
                <?php include('include/dish_info.php'); ?>
            </div>
        </div>
        <div class="row" id="meals_display">
            <div class="clear"></div>   
        </div>

        <!-- Site footer -->
        <?php include("include/site_footer.php"); ?>
    </div>
    
    <!-- Site JS files -->
    <?php include("include/site_footer_js.php"); ?>

</body>

<script>

    window.onload = displayMealsView();
    
    $(document).ready ( function(){
        $('#quantity_input, #addtomeal_select, #add_btn_button, #info_inputs').hide();

    });
    
</script>

</html> 