<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <?= link_tag('assets/css/bootstrap.min.css')?>
    <?php /*to use javscript use the base_url method
    otherwise it will show token not loaded error */?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <script src="<?= base_url('assets/js/edit.js') ?>"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-primary" 
style="padding:1px">
  <a class="navbar-brand pr-1" href="<?= base_url('users/welcome') ?>"
  style="border-right:3px solid black;font-size:30px;font-weight:bold;
  padding-left:5px;background-color:#b6b6b6">
  <?= ucfirst($_SESSION['uname']);?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" 
  data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
  aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
      <a href="<?= base_url('users/addarticle') ?>" 
      class="btn btn-info">Add Articles</a>
      </li>
    </ul>
  </div>
  <div class="nav-item mr-2">
    <a href="<?= site_url('users/logout'); ?>" 
    class="btn btn-danger">LOGOUT</a>
  </div>
</nav>
    
