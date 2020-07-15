<?php 
$hidden = array('user_id'=>$id);
print_r($upload_error);
?>
<h4 class="text-center text-warning mt-3 col-7">Create new Article</h4> <br>
 <div class="container">
 <!-- the form sends the data to addArt(method) of users(model) -->
  <?= form_open_multipart('users/addArt','',$hidden) ?>
  <div class="row">
    <div class="col-7">
     <label for="art_name">Article Title:</label>
     <?= form_input(['type'=>'text','class'=>'form-control',
     'name'=>'article_title','id'=>'art_name',
     'value'=>set_value('article_title')]); ?>
    </div>
    <div class="col-5 text-danger" style="margin-top:30px">
     <?= form_error('article_title'); ?>
    </div>
  </div> <br>
  <div class="row">
    <div class="col-7">
     <label for="art_body">Article Body:</label>
     <?= form_textarea(['class'=>'form-control','name'=>'article_body',
     'value'=>set_value('article_body')]); ?> 
    </div>
    <div class="col-5 text-danger" style="margin-top:30px">
     <?= form_error('article_body'); ?>
    </div>
  </div> <br>
  <div class="row">
    <div class="col-7">
      <?= form_upload(['name'=>'userfile']) ?>
    </div>
    <div class="col-5 text-danger">
    <?php if(isset($upload_error['error']))
    {
      echo $upload_error['error'];
    }
    ?>
    </div>
  </div> <br>
  <?= form_submit(['value'=>'SUBMIT','class'=>'btn btn-primary']) ?> 
  <?= form_reset(['value'=>'RESET','class'=>'btn btn-secondary'])?> 
   <br>
  <?= form_close() ?> 
</div>