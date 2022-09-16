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

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="content-block">
                <div class="block-title">Clients Listing
                  <br>

                </div>

                <div class="block-content">
                    <table id="example" class="table table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                              <th>Name</th>
                              <th>email</th>
                              <th>phone</th>
                              <th></th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach($smdata as $med): ?>
                            <tr>
                                <td><?=$med['name']?></td>
                                <td><?=$med['email']?></td>
                                <td><?=$med['phone']?></td>
                                <td>
                                  <?php
                                  $encrypted_id = base64_encode($med['aid'] . $secret);
                                   ?>
                                  <a href="/clinicmg/viewrecords/<?=$encrypted_id?>">Records</a> </td>
                            </tr>
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
