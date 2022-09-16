<?= $this->include('home/inc/top') ?>
<?= $this->include('home/inc/header') ?>
<section class="doctor-calendar-area section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-title">
          <h3>Time Table</h3>
          <h2 class="wow fadeInUp" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">Determine Your Date to Come</h2>
          <p class="wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">There are many variations of passages of Lorem
            Ipsum available, but the majority have suffered alteration in some form.</p>
          </div>
        </div>
      </div>
      <h2>
      Showing schedule :
      <?php
      $dayofweek = date('l', strtotime($date));
      echo $dayofweek . ', ' . $date;?>
      <br>
      Max 50 per day</h2>
      <br>
      <a href="<?=base_url()?>/appointment/<?=$date?>" class="btn btn-success">Book Appointment</a>
      <br>
      <br>
      <div class="row">
        <div class="col-12">
          <div class="doctor-calendar-table table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Time</th>
                  <th> </th>
                </tr>
              </thead>
              <tbody>
                  <?php foreach($schedule as $sched): ?>
                  <tr>
                    <td><?php
                    $newDateTime = date('h:i A', strtotime($sched['time']));
                    echo $newDateTime;
                    ?></td>
                     <td>
                      <?php  $ap = new \App\Models\AppointmentModel;
                      $data = $ap->where('date', $date)->findAll();
                      echo $sched['name'];
                      ?>
                     </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
