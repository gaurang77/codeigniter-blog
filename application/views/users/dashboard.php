<?php
//print_r($articles);
//echo site_url('users/logout');
$i = 1;
?>
<div class="container" style="margin-top:50px">
<div class="table">
 <table class="mx-auto">
  <thead>
   <tr>
    <th>#</th>
    <th>IMAGE</th>
    <th>TITLE</th>
    <th>EDIT</th>
    <th>DELETE</th>
   </tr>
  </thead>
  <tbody>
  <?php if(count($articles)):?>
    <?php foreach($articles as $art): ?>
    <tr>
        <td><?= $i++ ?></td>
        <td> <img src="<?= $art->image_path ?>" 
        alt="image<?= $art->id ?>" style="height:150px;width:200px"> </td>
        <td><?= $art->article_title ?></td>
        <td> <a href="<?= site_url("users/editArt/".$art->id) ?>" 
        class="btn btn-secondary">edit</a> </td>
        <td> <a href="<?= site_url("users/deleteArt/".$art->id) ?>" 
        class="btn btn-danger">delete</a> </td>
    </tr>
    <?php endforeach; ?> 
  <?php else: ?>
    <td colspan="3">
    No Data Found
    </td>
  <?php endif; ?>
  </tbody>   
 </table>
</div>
</div>
