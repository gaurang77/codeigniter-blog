<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <?= link_tag('assets/css/bootstrap.min.css')?>
    <?= link_tag('assets/css/app.css') ?>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <a class="navbar-brand" href="<?= site_url('Login') ?>">
  Login Panel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" 
  data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
  aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" 
        href="<?= site_url('Register') ?>">
        Register <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>
    
