   <div class="col-sm-3 nopadding display_inputs">
      <div class="form-group">
        <label for="carbs"> <?php echo $texts['homepage']['dish_menu']['carbs']; ?> </label>
        <input  type="text" 
                class="form-control auto ui-autocomplete-input carbs" 
                id="carbs" 
                name="carbs[]" 
                value="0" 
                placeholder="<?php echo $texts['homepage']['dish_menu']['carbs']; ?>" 
                autocomplete="off"
                readonly>
      </div>
    </div>
    <div class="col-sm-3 nopadding display_inputs">
      <div class="form-group">
        <label for="protens"> <?php echo $texts['homepage']['dish_menu']['protens']; ?> </label>
        <input  type="text" 
                class="form-control auto ui-autocomplete-input protens" 
                id="protens"
                name="protens[]" 
                value="0" 
                placeholder="<?php echo $texts['homepage']['dish_menu']['protens']; ?>" 
                autocomplete="off"
                readonly>
      </div>
    </div>
    <div class="col-sm-2 nopadding display_inputs">
      <div class="form-group">
        <label for="fats"> <?php echo $texts['homepage']['dish_menu']['fats']; ?> </label>
        <input  type="text" 
                class="form-control auto ui-autocomplete-input fats" 
                id="fats" 
                name="fats[]" 
                value="0" 
                placeholder="<?php echo $texts['homepage']['dish_menu']['fats']; ?>" 
                autocomplete="off"
                readonly>
      </div>
    </div>
    
     <div class="col-sm-3 nopadding display_inputs">
      <div class="form-group">
        <label for="kal"> <?php echo $texts['homepage']['dish_menu']['kal']; ?> </label>
        <input  type="text" 
                class="form-control auto ui-autocomplete-input kal" 
                id="kal" 
                name="kal[]" 
                value="0" 
                placeholder="<?php echo $texts['homepage']['dish_menu']['kal']; ?>" 
                autocomplete="off"
                readonly>
      </div>
    </div>
    
    <div class="col-sm-1 nopadding display_inputs">
        <button class="btn btn-success btn-add" id="dish_info" type="button"  onclick="dish_info();"> <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> </button>
    </div> 