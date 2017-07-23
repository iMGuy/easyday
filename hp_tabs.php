<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#meals" aria-controls="meals" role="tab" data-toggle="tab">בניית תפריט מבוסס ארוחות</a></li>
    <li role="presentation"><a href="#dishs" aria-controls="dishs" role="tab" data-toggle="tab">בניית תפריט מבוסס מנות</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="meals">
      <?php include('meals_builder.php'); ?>  
    </div>
    <div role="tabpanel" class="tab-pane" id="dishs">
      <?php include('dishs_builder.php'); ?>   
    </div>
  </div>

</div>