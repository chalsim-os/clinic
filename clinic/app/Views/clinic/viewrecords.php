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
      <div class="alert alert-success hidden" id="login-message" role="alert">
        <i class="fa fa-check"></i> Login Success. Please wait for loading.
      </div>
      <div class="alert alert-success hidden" id="login-emessage" role="alert">
        <i class="fa fa-check"></i> Login Failed. Invalid Username or password.
      </div>
    <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="content-block">
                <div class="block-title">New Appointment Request
                </div>

                <div id="reg" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                      </div>
                      <div class="modal-body">
                        <form action="<?=base_url()?>/clinicmg/registerstaff" method="post" enctype="multipart/form-data">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                        <label>Type</label>
                        <select class="form-control" name="type">
                          <option value="College Dentist">College Dentist</option>
                          <option value="College Physiscian">College Physiscian</option>
                          <option value="College Nurse">College Nurse</option>
                        </select>
                        <label>Picure</label>
                        <input type="file" name="picture" placeholder="picure" class="form-control" accept="image/png, image/gif, image/jpeg" />
                      </div>
                      <div class="modal-footer">
                        <input type="submit" name="submit" value="Add" class="btn btn-primary">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </form>
                      </div>
                    </div>

                  </div>
                </div>
                <div class="block-content">
                    <table id="example" class="table table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                              <th>Name</th>
                              <th>Type</th>
                              <th>Date</th>
                              <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach($smdata as $med): ?>
                            <tr>
                                <td>
                                  <?=$med['name']?>

                                </td>
                                <td><?=$med['type']?></td>
                                <td>
                                  <?=$med['date'] . '  -  '  . $med['time']?>
                                  </td>
                                  <td>
                                    <?php $smed = new \App\Models\SMed; ?>
                                    <?php $ds = $smed->where('scid', $med['scid'])->findAll();
                                    foreach ($ds as $vs) {
                                      echo $vs['medname'] . ' - ' . $vs['take'];
                                    } ?>
                                  </td>
                            </tr>
                            <div id="sched<?= $med['csid'];?>" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"></h4>
                                  </div>
                                  <div class="modal-body">
                                    <p>change schedule:  <b><?php echo $med['name'];?></b></p>
                                    <form action="/clinicmg/changesched" method="post">
                                    <input type="hidden" name="csid" value="<?=$med['csid']?>">
                                    <br>
                                    <input type="checkbox" name="schedule[]" value="MONDAY">MONDAY
                                    <br>
                                    <input type="checkbox" name="schedule[]" value="TUESDAY">TUESDAY
                                    <br>
                                    <input type="checkbox" name="schedule[]" value="WEDNESDAY">WEDNESDAY
                                    <br>
                                    <input type="checkbox" name="schedule[]" value="THURSDAY">THURSDAY
                                    <br>
                                    <input type="checkbox" name="schedule[]" value="FRIDAY">FRIDAY
                                  </div>
                                  <div class="modal-footer">
                                    <input type="submit" name="submit" value="Add" class="btn btn-primary">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </form>
                                  </div>
                                </div>

                              </div>
                            </div>
                          <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
<footer class="footer">
        <span><i class="fa fa-copyright"></i> Tui2Tone Labs, 2015</span>
</footer>
<script type="text/javascript">
$(function() {
    $('#example').DataTable();
});
</script>
</body>
