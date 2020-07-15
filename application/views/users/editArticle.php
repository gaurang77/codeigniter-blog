<!-- This page uses JQUERY to perform dynamic contents[edit.js] -->
<?php //print_r($article); ?>
<h4 class="text-center text-warning mt-3 col-7">Edit your Article:</h4> <br>
 <div class="container">

  <?= form_open_multipart('users/updateArt') ?>
  <?= form_hidden('id',$article->id); ?>
  <?= form_hidden('image_path',$article->image_path); ?>
  <div class="row">
    <div class="col-7">
     <label for="art_name">Article Title:</label>
     <?= form_input(['type'=>'text','class'=>'form-control',
     'name'=>'article_title','id'=>'art_name',
     'value'=>set_value('article_title',$article->article_title)]); ?>
    </div>
    <div class="col-5 text-danger" style="margin-top:30px">
     <?= form_error('article_title'); ?>
    </div>
  </div> <br>
  <div class="row">
    <div class="col-7">
     <label for="art_body">Article Body:</label>
     <?= form_textarea(['class'=>'form-control','name'=>'article_body',
     'value'=>set_value('article_body',$article->article_body)]); ?> 
    </div>
    <div class="col-5 text-danger" style="margin-top:30px">
     <?= form_error('article_body'); ?>
    </div>
  </div> <br>
  <div class="row">
    <div class="col-7">
      <div class="row">
        <div class="col-6" id="imgDB">
          <img src="<?= $article->image_path ?>"  
          style="height:150px;width:100%"
          alt="">  
        </div>
        <div class="col-6" id="colm">
          <div class="btn btn-secondary btn-block" id="clickUP">
          UPDATE IMAGE
          </div>
          <input type="file" name="userfile" id="imgup" >
          <input type="text" name="changeImage" id="forward"
          value="no" style="display:none">
        </div>
        <div class="col-1" id="x" style="display:none">
          <div class="btn btn-outline-danger">X</div>
        </div>
      </div> 
    </div>
    <div class="col-5 text-danger">
      <?php if(isset($article->upload_error['error']))
      {
        echo $article->upload_error['error'];
      }
      ?>
    </div>
  </div> <br>
  <?= form_submit(['value'=>'UPDATE','class'=>'btn btn-primary']) ?> 
  <?= form_reset(['value'=>'RESET','class'=>'btn btn-secondary'])?> 
   <br>
  <?= form_close() ?> 
</div>