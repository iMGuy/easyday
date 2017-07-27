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
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" type="text/css" /> 
    <link rel="stylesheet" href="css/jquery-no-theme-rtl.css" type="text/css" /> 
    
</head>
<body id="page-top" class="index">
   

    <div class="container">
        
        <div class="row">
            <div class="col-md-12 ">
           <form action="" method="post" _lpchecked="1">
		<p><label>בחירת מנה:</label><input type="text" name="food" value="" class="auto ui-autocomplete-input food" autocomplete="off"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span></p>
		<div id="autocomplete-results">
		<p><label>units:</label>    <input type="text" name="units" value=""    class="auto ui-autocomplete-input units"    autocomplete="off" readonly> grams</p>
		<p><label>carbs:</label>    <input type="text" name="carbs" value=""     class="auto ui-autocomplete-input carbs"    autocomplete="off" readonly> grams</p>
		<p><label>proten:</label>   <input type="text" name="protens" value=""   class="auto ui-autocomplete-input protens"   autocomplete="off" readonly> grams</p>
		<p><label>fat:</label>      <input type="text" name="fats" value=""      class="auto ui-autocomplete-input fats"     autocomplete="off" readonly> grams</p>
		    
        </div>
	</form> 
            
        </div>

        <!-- Site footer -->
        <?php include("site_footer.php"); ?>
    </div>
    
    <!-- Site JS files -->
    <?php include("site_footer_js.php"); ?>
    
   <script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
  crossorigin="anonymous"></script>

    <script type="text/javascript">
    
    
    $(function() {
    	//autocomplete, source: https://daveismyname.blog/autocomplete-with-php-mysql-and-jquery-ui
    	$(".auto").autocomplete({
    		source: "data/food_search.php",
    		minLength: 3,
    		appendTo: "#autocomplete-results",
    		select: function() {
    		    var food_id    = $("input:text.food").val().split("-");
                $.ajax({ type: "GET",   
                        url: "data/unit.php",   
                        async: false,
                        dataType: "json",
                        data:"food_id="+food_id[1],
                        success : function(data) {
                            console.log(data);
                            $("input:text.units").val(data[0]).change();
                            $("input:text.carbs").val(data[1]).change();
                            $("input:text.protens").val(data[2]).change();
                            $("input:text.fats").val(data[3]).change();
                        }
                });
    		}
    	});
    });
    </script>

</body>

</html> 