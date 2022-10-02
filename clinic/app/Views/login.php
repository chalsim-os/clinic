<!DOCTYPE html>
<html>

<head>
  <title>MBC Clinic - Online Appointment</title>
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
      <div class="title"><h3>MBC Clinic</h3></div>
      <?php if(session()->getFlashdata('msg')):?>
        <div class="alert alert-danger" id="forgot-message" role="alert">
          <i class="fa-solid fa-x"></i>
             <?= session()->getFlashdata('msg') ?>
          </div>
      <?php endif;?>
      <?php if(isset($validation)):?>
      <div class="alert alert-warning">
         <?= $validation->listErrors() ?>
      </div>
      <?php endif;?>
      <div class="progress hidden" id="forgot-progress">
        <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
          Checking your account
        </div>
      </div>
      <div class="alert alert-success hidden" id="forgot-message" role="alert">
        <i class="fa fa-check"></i> We have sent link to your email
      </div>
      <div class="alert alert-success hidden" id="forgot-emessage" role="alert">
        <i class="fa fa-check"></i> We cannot find this email.
      </div>

      <div class="progress hidden" id="login-progress">
        <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
          Log In...
        </div>
      </div>

      <div class="alert alert-success hidden" id="login-message" role="alert">
        <i class="fa fa-check"></i> Login Success. Please wait for loading.
      </div>
      <div class="alert alert-success hidden" id="login-emessage" role="alert">
        <i class="fa fa-check"></i> Login Failed. Invalid Username or password.
      </div>

      <div class="box">
        <form id="login-form">
          <div class="control">
            <div class="label">Email Address</div>
            <input type="text" id="username" class="form-control" placeholder="Email"/>
          </div>
          <div class="control">
            <div class="label">Password</div>
            <input type="password"id="password" class="form-control" value="123456" />
          </div>
          <div class="login-button">
            <input type="submit" class="btn btn-orange" value="Login">
          </div>
        </form>
        <form id="register-form" class="hidden" action="<?=base_url()?>/register" action="post">
          <div class="control">
            <div class="label">Complete Name</div>
            <input type="text" name="name" class="form-control" placeholder="complete name"/>
          </div>
          <div class="control">
            <div class="label">Email Address</div>
            <input type="text" name="email" class="form-control" placeholder="Email"/>
          </div>
          <div class="control">
            <div class="label">Password</div>
            <input type="password"name="password" class="form-control" />
          </div>
          <div class="control">
            <div class="label">Password</div>
            <input type="password" name="confirmpassword" class="form-control" />
          </div>
          <div class="login-button">
            <input type="submit" class="btn btn-orange" value="Register">
          </div>
        </form>
        <form id="forgot-form" class="hidden">
          <div class="control">
            <div class="label">Email Address</div>
            <input type="text" id="femail" class="form-control" placeholder="Email"/>
          </div>
          <div class="login-button">
            <input type="submit" class="btn btn-orange" value="Send email">
          </div>
        </form>
      </div>
      <div class="info-box" id="info-login">
        <span class="text-left"><a id="register">Create new account</a></span>
        <span class="text-right"><a id="forgot">Forgot password?</a></span>
        <div class="clear-both"></div>
      </div>
      <div class="info-box hidden" id="inreg">
        <span class="text-left"><a id="login">Login</a></span>
        <span class="text-right"><a id="forgot">Forgot password?</a></span>
        <div class="clear-both"></div>
      </div>
    </div>
  </div>

  <script>
  $(document).ready(function(){
    $("#forgot").click(function(){
      $("#login-form").addClass("hidden");
      $("#register-form").addClass("hidden");
      $("#forgot-form").removeClass("hidden");
    });
    $("#register").click(function(){
      $("#login-form").addClass("hidden");
      $("#register-form").removeClass("hidden");
      $("#inreg").removeClass("hidden");
      $("#info-login").addClass("hidden");
      $("#forgot-form").addClass("hidden");
    });
    $("#login").click(function(){
      $("#login-form").removeClass("hidden");
      $("#register-form").addClass("hidden");
      $("#inreg").addClass("hidden");
      $("#info-login").removeClass("hidden");
      $("#forgot-form").addClass("hidden");
    });
    $("#forgot-form").submit(function(){
      $("#forgot-progress").removeClass("hidden");
      setTimeout(function(){
      var email = $("#femail").val();

      $.ajax({
        url: "<?=base_url()?>/reset",
        type:"POST",
        data:{
          email: email
        },
        success: function(rp){
          if(rp == 1){
            $("#forgot-message").removeClass("hidden");
            $("#login-form").removeClass("hidden");
            $("#forgot-form").addClass("hidden");
          }else{
            $("#forgot-message").addClass("hidden");
            $("#forgot-emessage").removeClass("hidden");
          }
        }
      });
    }, 1000);
    return false;
  });

    $("#login-form").submit(function() {
      $("#login-progress").removeClass("hidden");
      setTimeout(function(){
        $("#login-progress").addClass("hidden");

        var username = $("#username").val();
        var password = $("#password").val();
        if( username != "" && password != "" ){
          // console.lsog(username);
          $.ajax({
            url: "<?=base_url()?>/auth",
            type: "POST",
            data: {
              username:username,
              password:password,
            },
            success:function(response){
              var msg = "";
              if(response == 1){
                $("#login-message").removeClass("hidden");
                window.location = "<?=base_url()?>/validates";
              }else{
                console.log(response);
                $("#login-emessage").removeClass("hidden");
              }

            }
          })
        }
      }, 1000);
      return false;
    });
  });

  </script>
</body>

</html>
