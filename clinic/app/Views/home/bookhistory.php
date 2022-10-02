<?=$this->include('home/inc/top')?>
<?=$this->include('home/inc/header')?>
<div class="breadcrumbs overlay">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
        <div class="breadcrumbs-content">
          <h1 class="page-title">Request History </h1>
        </div>
        <ul class="breadcrumb-nav">
          <li><a href="<?=base_url()?>/">Home</a></li>
          <li>Request History </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<section class="appointment page section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="doctor-calendar-table table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Sickness/Complaints</th>
                <th>Medicine</th>
                <th>Given Quantity</th>
                <th>Status</th>
                <th>Date Requested</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($request as $r): ?>
              <tr>
                <td><?=$r['complaints']?></td>
                <td><?=$r['name']?></td>
                <td><?=$r['quantity']?></td>
                <td><?=$r['status']?></td>
                <td><?=$r['rcreated_at']?></td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
