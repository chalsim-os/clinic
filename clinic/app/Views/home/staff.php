<?=$this->include('home/inc/top')?>
<?=$this->include('home/inc/header')?>
<div class="breadcrumbs overlay">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
        <div class="breadcrumbs-content">
          <h1 class="page-title"><?=$type?></h1>
        </div>
        <ul class="breadcrumb-nav">
          <li><a href="<?=base_url()?>/">Home</a></li>
          <li><?=$type?></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<section class="doctors section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-title">
          <h2 class="wow fadeInUp" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">Our Outstanding Team Is Active To Help You!</h2>
          <p class="wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">There are many variations of passages of Lorem
Ipsum available, but the majority have suffered alteration in some form.</p>
        </div>
      </div>
    </div>
    <div class="row">
      <?php foreach($staff as $dr): ?>
      <div class="col-lg-3 col-md-6 col-12">
        <div class="single-doctor wow fadeInUp" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
          <div class="image">
            <img src="<?=base_url($dr['picture'])?>" width="200" alt="#">
            <ul class="social">
              <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
              <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
              <li><a href="javascript:void(0)"><i class="lni lni-instagram"></i></a></li>
              <li><a href="javascript:void(0)"><i class="lni lni-youtube"></i></a></li>
            </ul>
          </div>
          <div class="content">
            <h5><?=$dr['type']?></h5>
            <h3><a href="doctor-details.html"><?=$dr['name']?></a></h3>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
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
