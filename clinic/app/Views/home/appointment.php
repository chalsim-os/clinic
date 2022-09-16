<?=$this->include('home/inc/top')?>
<?=$this->include('home/inc/header')?>
<div class="breadcrumbs overlay">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
        <div class="breadcrumbs-content">
          <h1 class="page-title">Appointment</h1>
        </div>
        <ul class="breadcrumb-nav">
          <li><a href="<?=base_url()?>/">Home</a></li>
          <li>appointment</li>
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
                <h2>Book An Appointment</h2>
                <h4> <?=$date?></h4>
                <p>Please feel welcome to contact our friendly reception staff with any general or
                  medical
                  enquiry. Our doctors will receive or return any urgent calls.</p>
                </div>
              </div>
            </div>
            <form id="book-form">
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
                <div class="col-lg-6 col-md-6 col-12 p-0">
                  <div class="appointment-input">
                    <label for="number"><i class="lni lni-folder"></i></label>
                    <select  id="aptype">
                      <option value="none" selected="" disabled="">Appointment Type</option>
                      <option value="medical checkup">medical checkup</option>
                      <option value="dental checkup">dental checkup</option>
                      <option value="checkup">checkup</option>
                    </select>

                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12 p-0">
                  <div class="appointment-input">
                    <label for="department"><i class="lni lni-notepad"></i></label>
                    <select name="department" id="department">
                      <option value="none" selected="" disabled="">Department</option>
                      <option value="none">General Surgery</option>
                      <option value="none">Gastroenterology</option>
                      <option value="none">Nutrition &amp; Dietetics</option>
                      <option value="none">Cardiology</option>
                      <option value="none">Neurology</option>
                      <option value="none">Pediatric</option>
                    </select>
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-12 p-0">
                  <div class="appointment-input">
                    <label for="date"></label>
                    <input type="date" name="date" id="apdate" value="<?=$date?>">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12 p-0">
                  <div class="appointment-input">
                    <label for="time"></label>
                    <input type="time" name="time" id="aptime" step="900">
                  </div>
                </div>
                <div class="col-12 p-0">
                  <div class="appointment-input">
                    <textarea placeholder="Write Your Message Here....." id="notes"></textarea>
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-12 p-0">
                  <div class="appointment-btn button">
                    <!-- <input type="submit" class="btn btn-orange" value="Get Appointment"> -->
                    <button type="button"class="btn btn-orange" id="ap">Get Appointment</button>
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
        $("#ap-message").toggle();
         var name = $("#name").val();
         var phone = $("#phone").val();
         var department = $("#department").val();
         var date = $("#apdate").val();
         var time = $("#aptime").val();
         var notes = $("#notes").val();
         var type = $("#aptype").val();
        // $("#ap-message").toggle();
        $.ajax({
          url: "<?=base_url()?>/book",
          type: "POST",
          data:{
            name: name,
            phone: phone,
            department: department,
            date: date,
            time:time,
            type:type,
            notes: notes
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
