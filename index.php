
<?php

//index.php
require("config/json_db.php");

$data = getJSON("SELECT * FROM panel where id!=4");
          $result = json_decode($data, true);

?>

<!DOCTYPE html>
<html>
 <head>
  <title>How to Create Progress Bar for Data Insert in PHP using Ajax</title>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  
  <br />
  <br />
  <div class="container">
   <h1 align="center">How to Create Progress Bar for Data Insert in PHP using Ajax</h1>
   <br />
   <div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">Enter Data</h3>
    </div>
      <div class="panel-body">
       <span id="success_message"></span>
       <form method="post" id="sample_form">
        <div class="form-group">
         <label>Album Name</label>
         <input type="text" name="album_name" id="album_name" class="form-control" />
         <span id="first_name_error" class="text-danger"></span>
        </div>

        <div class="form-group">
                      <label>Select a Panel</label><label style="color: red; margin-left: 4px;">*</label>
                      <select class="custom-select" id="panel_id" name="panel_id" style="font-size: 14px;">
                     
            <?php
                      foreach ($result as $panel_name){
                        ?>
                      
                     <option value="<?=$panel_name['id']?>"><?=$panel_name['panel_name']?></option> 
                    
                      <?php } ?>
                      </select>
                    </div>
        <!-- <div class="form-group">
         <label>Last Name</label>
         <input type="text" name="last_name" id="last_name" class="form-control" />
         <span id="last_name_error" class="text-danger"></span>
        </div> -->
        <div class="form-group" align="center">
         <input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
        </div>
       </form>
       <div class="form-group" id="process" style="display:none;">
        <div class="progress">
       <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="">
       </div>
      </div>
       </div>
      </div>
     </div>
  </div>
 </body>
</html>

<script>
 
 $(document).ready(function(){
  
  $('#sample_form').on('submit', function(event){
   event.preventDefault();
   var count_error = 0;

   if($('#album_name').val() == '')
   {
    $('#first_name_error').text('Album Name is required');
    count_error++;
   }
   else
   {
    $('#first_name_error').text('');
   }

   

   if(count_error == 0)
   {
    $.ajax({
     url:"process.php",
     method:"POST",
     data:$(this).serialize(),
     beforeSend:function()
     {
      $('#save').attr('disabled', 'disabled');
      $('#process').css('display', 'block');
     },
     success:function(data)
     {
      var percentage = 0;

      var timer = setInterval(function(){
       percentage = percentage + 20;
       progress_bar_process(percentage, timer);
      }, 1000);
     }
    })
   }
   else
   {
    return false;
   }
  });

  function progress_bar_process(percentage, timer)
  {
   $('.progress-bar').css('width', percentage + '%');
   if(percentage > 100)
   {
    clearInterval(timer);
    $('#sample_form')[0].reset();
    $('#process').css('display', 'none');
    $('.progress-bar').css('width', '0%');
    $('#save').attr('disabled', false);
    $('#success_message').html("<div class='alert alert-success'>Data Saved</div>");
    setTimeout(function(){
     $('#success_message').html('');
    }, 5000);
   }
  }

 });
</script>
