
    /* need to add onchange to dish name input field.
    
    $(".dishname").autocomplete({
        change: function(change) {
    	    alert('There was a change in the dish name - please select an existing dish.');
    	    $('#quantity_input, #addtomeal_select, #add_btn_button,  #info_inputs').hide("slow");   
    	}   
    });
    */
    $(".dishname").autocomplete({
    	source: "data/dish_search.php",
    	noCache: true,
        lookupLimit: 10,
    	minLength: 3,
    	appendTo: "#autocomplete-results",
    	// After selecting food name - updates nutrition inputs
    	
    	select: function() {
    	    $('#quantity_input, #addtomeal_select, #add_btn_button,  #info_inputs').show("slow");
    	    $.ajax({ type: "GET",   
                    url: "data/unit_search.php",   
                    async: false,
                    dataType: "json",
                    data:"food_name="+$("input:text.dishname").val(),
                    success : function(data) {
                        // var obj = JSON.parse(data);
                        
                        
                        
                    }
            });
    	    
    	},
    	
    });
	
	/* Dynamic Form Fields - Add & Remove Multiple fields, source: https://bootsnipp.com/snippets/AXVrV */
	var room = 1;
    function menu_fields() {
     
        room++;
        var objTo = document.getElementById('menu_fields')
        var divtest = document.createElement("div");
        	divtest.setAttribute("class", "form-group removeclass"+room);
    	var rdiv = 'removeclass'+room;
    	var dish_val        =$("input:text.food").val();
        var quantity_val    =$("input:text.quantity").val();
        var count_val       =$("input:text.units_count").val();
        var carbs_val       =$("input:text.carbs_count").val();
        var protens_val     =$("input:text.protens_count").val();
        var fats_val        =$("input:text.fats_count").val();
        
        divtest.innerHTML = '<div class="col-sm-3 nopadding"><div class="form-group"><input  type="text" class="form-control auto ui-autocomplete-input food_selected" id="autocomplete'+ room +'" name="food[]" value="'+ dish_val +'" placeholder="Dish Selection" autocomplete="off" readonly></div></div><div class="col-sm-1 nopadding"><div class="form-group"><input  type="text" class="form-control auto ui-autocomplete-input quantity_elected" id="quantity'+ room +'" name="quantity[]" value="'+ quantity_val +'" placeholder="Dish Selection" autocomplete="off" readonly></div></div><div class="col-sm-2 nopadding"><div class="form-group"><input  type="text" class="form-control auto ui-autocomplete-input units_count_selected" id="units_count'+ room +'" name="units_count[]" value="'+ count_val +'" placeholder="Weight" autocomplete="off" readonly></div></div><div class="col-sm-2 nopadding"><div class="form-group"><input  type="text" class="form-control auto ui-autocomplete-input carbs_count_selected" id="carbs_count'+ room +'" name="carbs_count[]" value="'+ carbs_val +'" placeholder="carbs_count" autocomplete="off" readonly></div></div><div class="col-sm-2 nopadding"><div class="form-group"><input  type="text" class="form-control auto ui-autocomplete-input protens_count_elected" id="protens_count'+ room +'" name="protens_count[]" value="'+ protens_val +'" placeholder="protens_count" autocomplete="off" readonly></div></div><div class="col-sm-2 nopadding"><div class="form-group"><div class="input-group"><input  type="text" class="form-control auto ui-autocomplete-input fats_coun_selected" id="fats_count'+ room +'" name="fats_count[]" value="'+ fats_val +'" placeholder="fats_count" autocomplete="off" readonly><div class="input-group-btn"><button class="btn btn-danger" type="button" onclick="remove_menu_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div>';
        
        objTo.appendChild(divtest);
        reset_fileds();
        
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
    
    function remove_menu_fields(rid) {
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