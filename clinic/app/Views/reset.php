<!DOCTYPE html>
<html>

<head>
  <title>Flat Admin - Bootstrap Themes</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" type="text/css" href="<?=base_url()?>/files/clinic/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>/files/clinic/css/animate.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>/files/clinic/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>/files/clinic/css/login.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>/files/clinic/css/theme.css">
  <!--  -->
  <!-- <script type="text/javascript" src="<?=base_url()?>/files/clinic/js/jquery-2.1.3.min.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- <script type="text/javascript" src="<?=base_url()?>/files/clinic/js/bootstrap.min.js"></script> -->
</head>

<body>

  <div class="container">
    <div class="login-box">
      <div class="title"><h3>Flat Admin</h3></div>

      <?php if(session()->getFlashdata('msg')):?>
        <div class="alert alert-danger" id="forgot-message" role="alert">
          <i class="fa-solid fa-x"></i>
             <?= session()->getFlashdata('msg') ?>
          </div>
      <?php endif;?>
      <?php if(isset($validation)):?>
        <div class="alert alert-danger" id="forgot-message" role="alert">
          <i class="fa-solid fa-x"></i>
         <?= $validation->listErrors() ?>
      </div>
      <?php endif;?>
      <?=$name?>
      <div class="box">
        <form method="post" action="<?=base_url('/changepassword')?>">
          <input type="hidden" name="old_token" value="<?=$token?>">
          <div class="control">
            <div class="label">Password</div>
            <input type="password"name="password" class="form-control" />
          </div>
          <div class="control">
            <div class="label">Verify Password</div>
            <input type="password"name="password1" class="form-control" />
          </div>
          <div class="login-button">
            <input type="submit" class="btn btn-orange" value="Change Password">
          </div>
        </form>
      </div>
    </div>
  </div>

</body>

</html>
