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
      <div class="modal fade" id="modify" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <!-- <div class="modal fade" id="Apply" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"> -->
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"><?=$new['jname']?></h4>
            </div>
            <div class="modal-body">
              <form action="<?=base_url()?>/clinicmg/updatemed" method="post">
                <input type="hidden" name="id" class="medid">
                <label>Name</label>
                <input type="text" name="name" class="form-control name"  required>
                <label>Description</label>
                <textarea name="description" rows="8" cols="80" class="form-control description" required></textarea required>
                <label>Type</label>
                <select class="form-control" name="type" required>
                  <option value="Capsule">capsule</option>
                  <option value="Drops">Drops</option>
                </select>
                <label>Category</label>
                <select class="form-control" name="category" required>
                  <option value="Analgesics">Analgesics</option>
                  <option value="Antacids">Antacids</option>
                  <option value="Antianxiety Drugs">Antianxiety Drugs</option>
                </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
          </div>

        </div>
      </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="content-block">
                <div class="block-title">Medicine Listing</div>
                <div class="block-content">
                    <table id="example" class="table table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Category</th>
                                <th>Quantity</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach($medicine as $med): ?>
                            <tr>
                                <td><?=$med['name']?></td>
                                <td><?=$med['type']?></td>
                                <td><?=$med['category']?></td>
                                <td><?=$med['stocks']?></td>
                                <td>
                                  <div class="btn-group">
                                      <button type="button" class="btn btn-info">Action</button>
                                      <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                      </button>
                                      <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item"data-toggle="modal" data-target="#message<?=$med['id']?>">Add Stocks</a>
                                        <a class="dropdown-item" href="/clinicmg/history/<?=$med['id']?>">History</a>
                                        <div class="dropdown-divider"></div>
                                        <!-- <a class="dropdown-item update" data-toggle="modal" data-target="#modify" data-jobid="<?=$j['id']?>" data-position="<?=$j['jname']?>" data-description="<?=$j['jdescription']?>" data-skills="<?=$j['skills']?>" data-education="<?=$j['education']?>" data-rate="<?=$j['rate']?>" data-location="<?=$j['location']?>" data-type="<?=$j['jtype']?>" data-vacancy="<?=$j['vacancy']?>" data-validity="<?=$j['deadline']?>">Update</a> -->
                                        <a class="dropdown-item update" data-toggle="modal" data-target="#modify" data-medid="<?=$med['id']?>" data-name="<?= $med['name']?>" data-description="<?=$med['description'] ?>" data-type="<?=$med['type'] ?>" data-category="<?=$med['category'] ?>">Update Details</a>
                                      </div>
                                    </div>
                                </td>
                                <div id="message<?=$med['id']?>" class="modal fade" role="dialog">
                                  <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"></h4>
                                      </div>
                                      <div class="modal-body">
                                        <p>Add Stocks:  <b><?php echo $med['name'];?></b></p>
                                        <form action="<?=base_url()?>/clinicmg/addstock" method="post">
                                        <input type="hidden" name="name" value="<?=$med['name']?>">
                                        <input type="hidden" name="id" value="<?=$med['id']?>">
                                        <input type="hidden" name="oldq" value="<?=$med['stocks']?>">
                                        <input type="hidden" name="type" value="inbound">
                                        <label>Quantity</label>
                                        <input type="number" name="quantity" class="form-control" placeholder="Quantity" required>
                                        Expiry
                                        <input type="date" name="validity" class="form-control" required>
                                      </div>
                                      <div class="modal-footer">
                                        <input type="submit" name="submit" value="Add" class="btn btn-primary">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </form>
                                      </div>
                                    </div>

                                  </div>
                                </div>
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
$(document).ready(function(){
  $(".update").click(function(){
    var medid = $(this).attr("data-medid");
    var name = $(this).attr("data-name");
    var description = $(this).attr("data-description");
    $(".name").val(name);
    $(".description").val(description);
    $(".medid").val(medid);
  });
});
$(function() {
    $('#example').DataTable();
});
</script>
</body>
