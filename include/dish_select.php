<!-- Code source: https://bootsnipp.com/snippets/AXVrV -->
  <div class="col-sm-3 nopadding">
    <div class="form-group">
      <label for="dishname"> <?php echo $texts['homepage']['dish_menu']['dishname']; ?></label>
      <input  type="text" 
              class="form-control auto ui-autocomplete-input food dishname" 
              id="dishname" 
              name="food[]"       
              value="" 
              placeholder="Dish Selection" 
              autocomplete="off">
    </div>
  </div>
  <div class="col-sm-6 nopadding on_change" id="quantity_input">
    <div class="col-sm-2 nopadding">
      <div class="form-group">
        <label for="quantity"> <?php echo $texts['homepage']['dish_menu']['quantity']; ?> </label>
        <input  type="text" 
                class="form-control auto <ui->  </ui->autocomplete-input quantity" 
                id="quantity" 
                name="quantity[]" 
                value="1" 
                placeholder="Dish Selection" 
                autocomplete="off">
      </div>
    </div>    
    
    <div class="col-sm-4 nopadding ">
      <div class="form-group">
        <label for="weight"> <?php echo $texts['homepage']['dish_menu']['weight']; ?> </label>
        <select class="form-control" id="weight" name="weight[]">
          <option value=""> <?php echo $texts['homepage']['dish_menu']['weight']; ?> </option>
          <?php echo dropdown_values_db($weight_dropdown, 'Msre_Desc', 'Gm_Wgt', 'weight'); ?>
        </select>
      </div>
    </div>
  
    <div class="col-sm-3 nopadding">
      <div class="form-group">
        <label for="units"> <?php echo $texts['homepage']['dish_menu']['units']; ?> </label>
        <input  type="text" 
                class="form-control auto ui-autocomplete-input units" 
                id="units" 
                name="units[]" 
                value="" 
                placeholder="Weight" 
                autocomplete="off"
                readonly>
      </div>
    </div>
    
    <div class="col-sm-3 nopadding">
      <div class="form-group">
        <label for="total-units"> <?php echo $texts['homepage']['dish_menu']['total-units']; ?> </label>
        <input  type="text" 
                class="form-control auto ui-autocomplete-input total-units" 
                id="total-units" 
                name="total-units[]" 
                value="" 
                placeholder="משקל" 
                autocomplete="off"
                readonly>
      </div>
    </div>  
   
  </div>  
 
  <div class="col-sm-2 nopadding" id="addtomeal_select">
    <div class="form-group">
      <label for="addtomeal"> <?php echo $texts['homepage']['dish_menu']['addtomeal']; ?> </label>
      <select class="form-control" id="addtomeal" name="addtomeal[]">
        <option value=""> <?php echo $texts['homepage']['dish_menu']['addtomeal']; ?> </option>
        <?php echo dropdown_values('meals'); ?>
      </select>
    </div>
  </div>
    <div class="col-sm-1 nopadding" id="add_btn_button">
    <button class="btn btn-success btn-add" id="add_btn" type="button"  onclick="menu_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
  </div>  
  
  
  
  
  
  
  
  <!--
  
  
  
  
  
   <div class="col-sm-2 nopadding">
      <div class="form-group">
        <input  type="hidden" 
                class="form-control auto ui-autocomplete-input carbs" 
                id="carbs" 
                name="carbs[]" 
                value="0" 
                placeholder="carbs" 
                autocomplete="off"
                readonly>
        <label for="carbs_count">פחמימות</label>
        <input  type="text" 
                class="form-control auto ui-autocomplete-input carbs_count" 
                id="carbs_count" 
                name="carbs_count[]" 
                value="0" 
                placeholder="carbs_count" 
                autocomplete="off"
                readonly>
      </div>
    </div>
    <div class="col-sm-2 nopadding">
      <div class="form-group">
        <input  type="hidden" 
                class="form-control auto ui-autocomplete-input protens" 
                id="protens"
                name="protens[]" 
                value="0" 
                placeholder="protens" 
                autocomplete="off"
                readonly>
        <label for="protens_count">חלבונים</label>
        <input  type="text" 
                class="form-control auto ui-autocomplete-input protens_count" 
                id="protens_count"
                name="protens_count[]" 
                value="0" 
                placeholder="protens_count" 
                autocomplete="off"
                readonly>
      </div>
    </div>
    <div class="col-sm-2 nopadding">
      <div class="form-group">
        <input  type="hidden" 
              class="form-control auto ui-autocomplete-input fats" 
              id="fats" 
              name="fats[]" 
              value="0" 
              placeholder="fats" 
              autocomplete="off"
              readonly>
        <label for="fats_count">שומן</label>
        <input  type="text" 
                class="form-control auto ui-autocomplete-input fats_count" 
                id="fats_count" 
                name="fats_count[]" 
                value="0" 
                placeholder="fats_count" 
                autocomplete="off"
                readonly>
      </div>
    </div>
    -->
  