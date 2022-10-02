<?=$this->include('home/inc/top')?>
<?=$this->include('home/inc/header')?>
<div class="breadcrumbs overlay">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
        <div class="breadcrumbs-content">
          <h1 class="page-title">Request Medicine</h1>
        </div>
        <ul class="breadcrumb-nav">
          <li><a href="<?=base_url()?>/">Home</a></li>
          <li>Request Medicine</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<section class="appointment page section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2 col-md-12 col-12">

        <div class="appointment-form">
          <div class="row">
            <div class="col-12">
              <div class="appointment-title">
                <h2>Request Medicine</h2>
                <h4> <?=$date?></h4>
                <p>Our medical personal will notify with your request and you will receive notification with any action done.</p>
                </div>
              </div>
            </div>
            <form id="medi-form">
              <div class="row">
                <div class="alert alert-success collapse" id="ap-message" role="alert">
                    <i class="fa fa-check"></i>  Success. Please wait while system validating your request.
                </div>
                <div class="alert alert-success collapse" id="ap-messages" role="alert">
                    <i class="fa fa-check"></i> Success!
                </div>
                <div class="alert alert-success collapse" id="ap-emessage" role="alert">
                    <i class="fa fa-check"></i>  Failed. Invalid Username or password.
                </div>
                <div class="col-lg-6 col-md-6 col-12 p-0">
                  <div class="appointment-input">
                    <label for="name"><i class="lni lni-user"></i></label>
                    <input type="text" name="name" id="name" placeholder="Your Name" value="<?= session()->get('name')?>">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12 p-0">
                  <div class="appointment-input">
                    <label for="number"><i class="lni lni-phone-set"></i></label>
                    <input type="text" name="number" id="phone" placeholder="Phone Number" value="<?= session()->get('phone')?>">
                  </div>
                </div>
                <div class="col-12 p-0">
                  <div class="appointment-input">
                    <textarea id="complaints" placeholder="tell us how do you feel"></textarea>
                  </div>
                </div>
                <label>Medicine</label>
                <div class="col-12 p-0">
                  <div class="appointment-input">
                  <select id="medicine">
                    <?php foreach ($med as $med): ?>
                    <option value="<?=$med['id']?>"><?=$med['name']?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                </div>
                <br>
                <br>
                <div class="col-lg-6 col-md-6 col-12 p-0">
                  <div class="appointment-btn button">
                    <button type="button"class="btn btn-orange" id="ap">Request</button>
                    <a href="<?=base_url()?>/hrequest" class="btn btn-orange">Request History</a>
                  </div>
                </div>

              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>



<?= $this->include('home/inc/end') ?>
<script>
  $(document).ready(function(){
    $("#ap").click(function() {
      setTimeout(function(){
        // $("#ap-message").toggle();
         var name = $("#name").val();
         var phone = $("#phone").val();
         var complaints = $("#complaints").val();
         var medicine = $("#medicine").val();
         console.log(medicine);
        $.ajax({
          url: "<?=base_url()?>/requestmed",
          type: "POST",
          data:{
            name: name,
            phone: phone,
            complaints:complaints,
            medicine:medicine
          },
          success:function(rp){
            console.log(rp);
            if(rp == 1){
              $("#ap-messages").toggle();
            }else if(rp == 2){
              alert('meron na');
            }
          }

        })
      }, 1000);
    });
  })
</script>
