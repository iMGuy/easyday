<?php
    namespace lib\classes;
    require_once dirname(__FILE__) . '/lib/wrapper.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?php include("site_head.php"); ?>
</head>
<body id="page-top" class="index">

    <!-- Navigation -->
    <?php include("site_top_nav.php"); ?>
    
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>פתרון קל לבניית תפריט יומי</h1>
        <p>אחרי חישובים והסברים,הגענו לשלב בו אנו בונים תפריט.מה בעצם נשאר לנו?
חישבנו את ההוצאה הקלורית,חישבנו כמה קלוריות התפריט שלנו יכלול וגם כמה גרם אנו צריכים מכל אב מזון.
אחרי כל זה,נותר רק להכניס מאכלים לתפריט.</p>
        <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p> -->
      </div>
    </div>

    <div class="container">
        
        <div class="row">
            <div class="col-md-12 ">
                <?php   // include('table.php');  
                        include('hp_tabs.php'); ?>
        </div>

        <!-- Site footer -->
        <?php include("site_footer.php"); ?>
    </div>
    
    <!-- Site JS files -->
    <?php include("site_footer_js.php"); ?>

</body>

</html> 