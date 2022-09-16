<?= $this->include('home/inc/top') ?>
<?= $this->include('home/inc/header') ?>
<section class="doctor-calendar-area section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-title">
          <h3>Staff availability</h3>
          <h2 class="wow fadeInUp" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">Determine Your Date to Come</h2>
          <p class="wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">There are many variations of passages of Lorem
            Ipsum available, but the majority have suffered alteration in some form.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="doctor-calendar-table table-responsive">
            <table class="table">
              <thead>
                <tr>

                  <th>Monday</th>
                  <th>Tuesday</th>
                  <th>Wednesday</th>
                  <th>Thursday</th>
                  <th>Friday</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($sched as $s) {
                  ?>
                <tr>

                  <td><?php $sched = $s['schedule'];?>
                    <?php if(strpos($sched, 'MONDAY') !== false){
                      echo '<h3>'. $s['name'] .'</h3>';
                      echo '<span>'.$s['type'] . '</span>';
                    } ?>
                  </td>

                    <td>
                      <?php if(strpos($sched, 'TUESDAY') !== false){
                        echo '<h3>'. $s['name'] .'</h3>';
                        echo '<span>'.$s['type'] . '</span>';
                      } ?>
                    </td>


                    <td>
                      <?php if(strpos($sched, 'WEDNESDAY') !== false){
                        echo '<h3>'. $s['name'] .'</h3>';
                        echo '<span>'.$s['type'] . '</span>';
                      } ?>
                    </td>
                      <td>
                        <?php $sched = $s['schedule']; ?>
                          <?php if(strpos($sched, 'THURSDAY') !== false){
                            echo '<h3>'. $s['name'] .'</h3>';
                            echo '<span>'.$s['type'] . '</span>';
                          } ?>
                      </td>

                  <td><?php $sched = $s['schedule']; ?>
                      <?php if(strpos($sched, 'FRIDAY') !== false){
                        echo '<h3>'. $s['name'] .'</h3>';
                        echo '<span>'.$s['type'] . '</span>';
                      } ?>
                  </td>

                  </tr>
                <?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</section>
