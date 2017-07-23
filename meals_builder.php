<div class="row">
    <div class="col-md-6">
        <h2>בניית תפריט מבוסס ארוחות</h2>
    </div>
    <div class="col-md-6 button-position">
      <button class="btn btn-primary" type="submit">שלח תפריט בדואר</button>
      <input class="btn btn-primary" type="button" value="שמור"></li>
    </div>
</div>
<!-- Code source: https://bootsnipp.com/snippets/AXVrV -->
<div class="panel panel-default">
  <div class="panel-heading">1. בחירת מנה >> 2. בחירת כמות >> 3. הוספת מנה נוספת או שמירה</div>
  <div class="panel-body section-one">
    
    <div class="col-sm-3 nopadding">
      <div class="form-group">
        <label for="dishname">יש להזין כאן את שם הפריט</label>
        <input  type="text" 
                class="form-control auto ui-autocomplete-input food dishname" 
                id="dishname" 
                name="food[]" 
                value="" 
                placeholder="Dish Selection" 
                autocomplete="off">
      </div>
    </div>
    <div class="col-sm-1 nopadding">
      <div class="form-group">
        <label for="quantity">כמות</label>
        <input  type="text" 
                class="form-control auto ui-autocomplete-input quantity" 
                id="quantity" 
                name="quantity[]" 
                value="1" 
                placeholder="Dish Selection" 
                autocomplete="off">
      </div>
    </div>
  </div>

  <div class="panel-body section-two">
    <div class="col-sm-2 nopadding">
      <div class="form-group">
        <input  type="hidden" 
                class="form-control auto ui-autocomplete-input units" 
                id="units" 
                name="units[]" 
                value="" 
                placeholder="Weight" 
                autocomplete="off"
                readonly>
        <label for="units_count">משקל בגרם</label>
        <input  type="text" 
                class="form-control auto ui-autocomplete-input units_count" 
                id="units_count" 
                name="units_count[]" 
                value="" 
                placeholder="Weight" 
                autocomplete="off"
                readonly>
      </div>
    </div>
    
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
        <div class="input-group">
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
          <div class="input-group-btn">
            <button class="btn btn-success btn-add" id="add_btn" type="button"  onclick="menu_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
          </div>
        </div>
      </div>
    </div>
    <div class="clear"></div>
    <div id="menu_fields"></div>
    
  </div>
    <ul class="list-group">
      <li class="list-group-item">
        עוד איזור טקסט
      </li>
    </ul>
  <div class="panel-footer"><small>Press <span class="glyphicon glyphicon-plus gs"></span> to add another form field :)</small>, <small>Press <span class="glyphicon glyphicon-minus gs"></span> to remove form field :)</small></div>
  <div class="panel-footer"><small><em><a href="http://shafi.info/">More Info - Developer Shafi (Bangladesh)</a></em></em></small></div>
</div>

