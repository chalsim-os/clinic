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
      <?php
      foreach ($smdata as $fd) {
        $name = $fd['name'];
        $desc = $fd['description'];
      }

       ?>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="content-block">
                <div class="block-title">Medicine Listing
                  <br>
                  <h3>  <?= $name?></h3>
                  <h4>  <?= $desc?></h4>
                </div>

                <div class="block-content">
                    <table id="example" class="table table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                              <th>Old Quantity</th>
                              <th>type</th>
                              <th>Added</th>
                              <th>New Quantity</th>
                              <th>validity</th>
                              <th>Date Adjusted</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach($smdata as $med): ?>
                            <tr>
                                <td><?=$med['oldq']?></td>
                                <td><?=$med['type']?></td>
                                <td><?=$med['quantity']?></td>
                                <td>
                                  <?php if($med['type'] == 'inbound'): ?>
                                    <?=$med['oldq'] + $med['quantity']?></td>
                                  <?php elseif($med['type'] == 'outbound'): ?>
                                    <?=$med['oldq'] - $med['quantity']?></td>
                                  <?php endif; ?>


                                <td><?=$med['validity']?></td>
                                <td><?=$med['screated_at']?></td>
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
