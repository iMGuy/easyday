<!-- Code source: https://bootsnipp.com/snippets/AXVrV -->

    <div class="  col-sm-2 nopadding display_inputs">
    <div class="form-group">
      <label for="quantity"> <?php echo $texts['homepage']['dish_menu']['quantity']; ?> </label>
      <input  type="text" 
              class="form-control auto <ui->  </ui->autocomplete-input quantity" 
              id="quantity" 
              name="quantity[]" 
              value="1" 
              placeholder="<?php echo $texts['homepage']['dish_menu']['quantity']; ?>" 
              autocomplete="off">
    </div>
  </div>    
  <div class="col-sm-3 nopadding display_inputs">
    <div class="form-group">
      <label for="weight"> <?php echo $texts['homepage']['dish_menu']['weight']; ?> </label>
      <select class="form-control" id="weight" name="weight[]">
        <option value=""> <?php echo $texts['homepage']['dish_menu']['weight']; ?> </option>
        <?php // echo dropdown_values_db($weight_dropdown, 'Msre_Desc', 'Gm_Wgt', 'weight'); ?>
      </select>
    </div>
  </div>

  <div class="col-sm-2 nopadding display_inputs">
    <div class="form-group">
      <label for="units"> <?php echo $texts['homepage']['dish_menu']['units'] . "(" . $defoult_units . ")"; ?> </label>
      <input  type="text" 
              class="form-control auto ui-autocomplete-input units" 
              id="units" 
              name="units[]" 
              value="" 
              placeholder="<?php // echo $texts['homepage']['dish_menu']['units']; ?>" 
              autocomplete="off"
              readonly>
    </div>
  </div>
  
  <div class="col-sm-2 nopadding display_inputs">
    <div class="form-group">
      <label for="total-units"> <?php echo $texts['homepage']['dish_menu']['total-units']; ?> </label>
      <input  type="text" 
              class="form-control auto ui-autocomplete-input total-units" 
              id="total-units" 
              name="total-units[]" 
              value="100" 
              placeholder="<?php echo $texts['homepage']['dish_menu']['total-units']; ?>" 
              autocomplete="off"
              readonly>
    </div>
  </div>  
 
  <div class="col-sm-3 nopadding display_inputs">
    <div class="form-group">
      <label for="addtomeal"> <?php echo $texts['homepage']['dish_menu']['addtomeal']; ?> </label>
      <select class="form-control" id="addtomeal" name="addtomeal[]">
        <?php echo dropdown_values('meals'); ?>
      </select>
    </div>
  </div>