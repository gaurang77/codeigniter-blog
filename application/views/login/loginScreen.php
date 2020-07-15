<div class="container mt-4">
 <h3 class="text-warning">USER LOGIN</h3> <br>
 <?php if($err = $this->session->flashdata('login_err')): ?>
 <div class="container">
  <div class="row">
   <div class="col-lg-6">
    <div class="alert alert-danger">
    <?= $err ?>
    </div>
   </div>
  </div>
 </div>
 <?php endif; ?>

 <?php if($added = $this->session->flashdata('login')): ?> 
  <div class="row">
   <div class="col-lg-6">
    <div class="text-center alert alert-success">
      <?= $added ?> 
    </div>
  </div>
 </div>
 <?php endif; ?>

 <?php echo form_open('login/valid'); ?>
 <div class="row">
  <div class="col-lg-6">
    <div class="form-group">
      <label for="username">User Name</label>
      <?php echo form_input(['type'=>'text','class'=>'form-control','name'=>'uname',
      'id'=>'username','value'=>set_value("uname")]); ?>
    </div>
  </div>
  <div class="col-lg-6" style="margin-top:30px">
  <?= form_error('uname',"<p class='text-danger'>","</p>")?>
  </div>
 </div>
<?php //<?= validation_errors()::: for getting errors after submission ?>
 <div class="row">
    <div class="col-lg-6">
      <div class="form-group">
        <label for="Password1">Password</label>
        <?php echo form_input(['type'=>'password','class'=>'form-control','name'=>'upass',
        'id'=>'Password1','value'=>set_value("upass")]); ?>
      </div>
    </div>
    <div class="col-lg-6" style="margin-top:30px">
    <?= form_error('upass',"<p class='text-danger'>","</p>")?>
    </div>
 </div>  
 <button type="submit" class="btn btn-success">Submit</button>
 <?= form_reset(['type'=>'reset','class'=>'btn btn-primary','value'=>'Reset']); ?>
 <?= anchor('Register','Not a user? register here'); ?>
 <?= form_close()?> 
 
</div>