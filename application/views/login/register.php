<?php //echo validation_errors(); 
?>

<div class="container">
 <h4 class="text-warning text-center my-2">NEW REGISTERATION</h4>
 <div class="register-container">
  <?= form_open('Register/check') ?> <br>
  <label for="first">FIRST NAME:</label>
  <?php echo form_error('firstname', '<div class="text-danger">', '</div>'); ?>
  <?=form_input(['type'=>'text','class'=>'form-control',
  'value'=>set_value('firstname'),
  'name'=>'firstname','id'=>'first']);?> <br>

  <label for="last">LAST NAME:</label> 
  <?php echo form_error('lastname', '<div class="text-danger">', '</div>'); ?>
  <?=form_input(['type'=>'text','class'=>'form-control',
  'value'=>set_value('lastname'),
  'name'=>'lastname','id'=>'last']);?> <br>

  <label for="user">CREATE USER NAME:</label> 
  <?php echo form_error('username', '<div class="text-danger">', '</div>'); ?>
  <?=form_input(['type'=>'text','class'=>'form-control',
  'value'=>set_value('username'),
  'name'=>'username','id'=>'user']);?> <br>

  <?php if(isset($error)): ?>  
  <p class="text-warning text-center"><?= $error ?></p>
  <?php endif;?>  
  <label for="password">CREATE PASSWORD:</label>
  <?php echo form_error('password', '<div class="text-danger">', '</div>'); ?> 
  <?=form_input(['type'=>'password','class'=>'form-control',
  'value'=>set_value('password'),
  'name'=>'password','id'=>'password']);?> <br>

  <label for="passwordC">CONFIRM PASSWORD:</label> 
  <?php echo form_error('passwordC', '<div class="text-danger">', '</div>'); ?>
  <?=form_input(['type'=>'password','class'=>'form-control',
  'value'=>set_value('passwordC'),
  'name'=>'passwordC','id'=>'passwordC']);?> <br>

  <div class="row justify-content-center">
   <?= form_submit(['class'=>'btn btn-info w-25','value'=>'REGISTER'])?>
  </div>
  <?= form_close() ?>
 </div>
 <br>
</div>