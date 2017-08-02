<div class="col-sm-12 nopadding">
    <div class="form-group">
        <div class="input-group">
              <label for="dishname"> <?php echo $texts['homepage']['dish_menu']['dishname']; ?></label>
              <input  type="text" 
                      class="form-control auto ui-autocomplete-input food dishname input-lg" 
                      id="dishname" 
                      name="food[]"       
                      value="" 
                      placeholder="<?php echo $texts['homepage']['dish_menu']['dishname_input']; ?>" 
                      autocomplete="off">
      
                <div class="input-group-btn">
                    <button class="btn btn-success btn-add btn-lg" id="add_btn" type="button"  onclick="menu_fields();" disabled> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
                </div>
        </div>
    </div>
</div>