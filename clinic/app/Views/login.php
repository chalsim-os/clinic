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
      </div>
      <div class="info-box">
        <span class="text-left"><a href="register.html">Create new account</a></span>
        <span class="text-right"><a href="#">Forgot password?</a></span>
        <div class="clear-both"></div>
      </div>
    </div>
  </div>

  <script>
  $(document).ready(function(){
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
