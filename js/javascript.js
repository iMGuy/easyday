
    /* need to add onchange to dish name input field.
    
    $(".dishname").autocomplete({
        change: function(change) {
    	    alert('There was a change in the dish name - please select an existing dish.');
    	    $('#quantity_input, #addtomeal_select, #add_btn_button,  #info_inputs').hide("slow");   
    	}   
    });
    */
    
    // hide dish information on page load from the dish search engin.
    $(document).ready ( function(){
        $('.display_inputs').hide();
        $('#add_btn').prop('disabled', true);
    });
    
    // Auto complete dish search feature on fron page.
    $(".dishname").autocomplete({
    	source: "data/dish_search.php",
    	noCache: true,
        lookupLimit: 10,
    	minLength: 3,
    	appendTo: "#autocomplete-results",
    	
    	// On Selecting dish - updates nutrition inputs
    	select: function( event , ui ) {
    	    $('.display_inputs').show("slow");
    	    $('#add_btn').prop('disabled', false);
    	    
    	    $.ajax({ type: "GET",
                url: "data/dish_select.php",   
                async: false,
                dataType: "json",
                data:"dish_name="+ ui.item.label,
                success : function(data) {
                    $( "#model_hive" ).html(data['model']);
                    $( "#weight" ).html(data['weight']);
                    $( "#units" ).val( $( "#default_weight" ).html() );
                    $( "#carbs" ).val( $( "#CHOCDF_value" ).html() );
                    $( "#protens" ).val( $( "#PROCNT_value" ).html() );
                    $( "#fats" ).val( $( "#FAT_value" ).html() );
                    $( "#kal" ).val( $( "#ENERC_KCAL_value" ).html() );
                    
                },
    	    });
        },
    });
    
    $('#weight').on('input', function() {
        var ratio       = $(this).val() / $( "#default_weight" ).html() * $( "#quantity" ).val();
        
        $( "#units" )   .val( $(this).val() );
        $( "#total-units" ) .val( ( $("#quantity").val()*$('#weight').val()).toFixed(2));
        $( "#carbs" )   .val( ( $( "#CHOCDF_value" ).html() * ratio  ).toFixed(2));
        $( "#protens" ) .val( ( $( "#PROCNT_value" ).html() * ratio ).toFixed(2));
        $( "#fats" )    .val( ( $( "#FAT_value" ).html() * ratio ).toFixed(2));
        $( "#kal" )     .val( ( $( "#ENERC_KCAL_value" ).html() * ratio ).toFixed(2));
    }); 
    
    $('#quantity').on('input', function() {
        var ratio =$( "#units" ).prop('value') / $( "#default_weight" ).html() * $(this).val();
        
        $( "#total-units" ) .val( ( $("#quantity").val()*$('#weight').val()).toFixed(2));
        $( "#carbs" )       .val( ( $( "#CHOCDF_value" ).html() * ratio ).toFixed(2));
        $( "#protens" )     .val( ( $( "#PROCNT_value" ).html() * ratio ).toFixed(2));
        $( "#fats" )        .val( ( $( "#FAT_value" ).html() * ratio ).toFixed(2));
        $( "#kal" )         .val( ( $( "#ENERC_KCAL_value" ).html() * ratio ).toFixed(2));
       
    });
    
	/* Dynamic Form Fields - Add & Remove Multiple fields, source: https://bootsnipp.com/snippets/AXVrV */
	var dish = 1;
    function menu_fields() {
     
        dish++;
        var objTo = document.getElementById($('#addtomeal').val())
        
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "row removeclass"+dish);
    	var rdiv = 'removeclass'+dish;
    	var dish_name           =$("#dishname").val();
        var dish_unit           =$("#weight option:selected").text();
        var dish_quantity       =$("#quantity").val();
        var dish_total_units    =$("#total-units").val();
        
        divtest.innerHTML = '<div class=\"col-sm-4 nopadding dish_display\"><div class=\"row\"><div class=\"col-sm-2 nopadding\"><button class=\"btn btn-danger\" type=\"button\" onclick=\"remove_dish_fields('+ dish +');\"> <span class=\"glyphicon glyphicon-minus\" aria-hidden=\"true\"></span> </button></div><div class=\"col-sm-10 nopadding\">' + dish_name + '</div></div></div><div class=\"col-sm-2 nopadding dish_display\">' + dish_unit + '</div><div class=\"col-sm-1 nopadding dish_display\">' + dish_quantity + '</div><div class=\"col-sm-2 nopadding dish_display\">' + dish_total_units + '</div><div class=\"col-sm-1 nopadding\"><button class="btn btn-success" id="dish_info-' + dish + '" data-toggle="modal" data-target="#myModal-' + dish + '" type="button"> <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> </button></div>';
        
        objTo.appendChild(divtest);
        
        // Duplicate the Model info div 
        var modelTo = $('#myModal').clone().prop('id', 'myModal-'+ dish ).addClass('removeclass'+dish );
        $( "#model_hive" ).append( modelTo );   
        
        // reset_fileds();
        
        
    }
    
    function reset_fileds() {
            $("input:text.food").val('').change();
            $("input:hidden.units").val('').change();
            $("input:text.units_count").val('').change();
            $("input:hidden.carbs").val('').change();
            $("input:text.carbs_count").val('').change();
            $("input:hidden.protens").val('').change();
            $("input:text.protens_count").val('').change();
            $("input:hidden.fats").val('').change();
            $("input:text.fats_count").val('').change();
        }
    
    function remove_dish_fields(rid) {
       $('.removeclass'+rid).remove();
    }
    
   
   

    // Update food nutrition fileds in hompage according to quantity
    $( "input:text.quantity" ).bind('keyup mouseup', function () {
        
        // data[0] = $("input:text.units").val()*$("input:text.quantity").val;
        $("input:text.units_count").val(Math.round($("input:hidden.units").val()*$("input:text.quantity").val()*100)/100).change();
        $("input:text.carbs_count").val(Math.round($("input:hidden.carbs").val()*$("input:text.quantity").val()*100)/100).change();
        $("input:text.protens_count").val(Math.round($("input:hidden.protens").val()*$("input:text.quantity").val()*100)/100).change();
        $("input:text.fats_count").val(Math.round($("input:hidden.fats").val()*$("input:text.quantity").val()*100)/100).change();
        
    });
   
    // Add the meals feature section to the home page - Default. 
    function displayMealsView() {
        var meals = document.getElementById("addtomeal");
        var meals_display = document.getElementById("meals_display");
        var txt = '';
        var i;
        
        for (i = 1; i < meals.length; i++) {
            txt = txt + "<div id=\"" + meals.options[i].value + "\"><h2 class = \"meal_title\">" + meals.options[i].text + "</h2></div>\n";
        }
        
        $( meals_display ).append( txt );
    } 
   
    
   /* DataTable Settings JS 
   $(document).ready(function() {
		$('#example').DataTable( {
		  //  "ajax": '../ajax/data/arrays.txt'
		} );
	} );
	*/