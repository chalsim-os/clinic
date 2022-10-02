<?=$this->include('clinic/inc/top')?>
<body class="flat-blue sidebar-collapse">
  <?=$this->include('clinic/inc/sidebar')?>
  <div class="content-container wrap">
    <?=$this->include('clinic/inc/navbar')?>
    <div class="container-fluid">
      <div class="row">
          <div class="col-xs-12">
              <span class="page-title red"><h2><?=$area?></h2></span>
          </div>
          <div class="row">
              <div class="col-xs-12">

                  <ol class="breadcrumb">
                      <li><a href="/clinicmg">Home</a>
                      </li>
                      <li class="active"><?=$area?></a>
                      </li>
                  </ol>
              </div>
          </div>
          <?=$this->include('clinic/inc/bcrumbs')?>
      </div>
      <div class="container-fluid">
        <?php if(session()->getFlashdata('msg')):?>
            <div class="alert alert-warning">
               <?= session()->getFlashdata('msg') ?>
            </div>
        <?php endif;?>
      <div class="row">

          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <div class="content-block">
                  <div class="block-title">Current Chat Settings
                    <div class="progress hidden" id="checking">
                      <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        Checking ...
                      </div>
                    </div>
                    <div class="alert alert-success hidden" id="chat-success" role="alert">
                      <i class="fa fa-check"></i> Configuration was saved!
                    </div>

                    <br><br><br>
                    <form id="csettings">
                      <label>Page ID</label>
                      <input type="text" name="chatid" class="form-control" id="chatid" placeholder="Enter your page_id here">
                      <br>
                      <input type="checkbox" name="activate" id="activate" value="true"> Activate
                      <br>
                      <br>
                      <a href="/clinic/howchat">How does it works?</a>
                      <br>
                      <button type="submit" name="button" class="btn btn-primary">Save</button>
                    </form>

                  </div>

                  <div class="block-content">

                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>

  <script>
  $(document).ready(function(){
    $("#csettings").submit(function() {
      $("#checking").removeClass("hidden");
      setTimeout(function(){
        $("#checking").addClass("hidden");
        var act = ("#activate").val();
        var page_id = ("#chatid").val();
        $.ajax({
            url: "<?=base_url()?>/clinicmg/chatsave",
            method: "post",
            data:{
              page_id : page_id,
              status: act
            },
            success:function(response){
              
            }
        })
      }, 1000);
      return false;
    });
  });
  </script>
