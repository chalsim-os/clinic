<?= $this->include('home/inc/top') ?>
<?=$this->include('home/inc/header')?>
<section class="hero-area ">
  <div class="shapes">
    <img src="<?=base_url()?>/files/home/assets/images/hero/05.svg" class="shape1" alt="#">
    <img src="<?=base_url()?>/files/home/assets/images/hero/01.svg" class="shape2" alt="#">
  </div>
  <div class="hero-slider">
    <div class="single-slider">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-12 col-12">
            <div class="hero-text">
              <div class="section-heading">
                <h2 class="wow fadeInLeft" data-wow-delay=".3s">Find A Doctor & <br>Book Appointment</h2>
                <p class="wow fadeInLeft" data-wow-delay=".5s">Since the first days of operation of
                  MediGrids, our teaming has been focused on
                  building a high-qualities medicals service by MediGrids.</p>
                  <div class="button wow fadeInLeft" data-wow-delay=".7s">
                    <a href="<?=base_url('appointment')?>" class="btn">Book Appointment</a>
                    <a href="<?=base_url('request/medicine')?>" class="btn">Medicine Request</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12">
              <div class="hero-image wow fadeInRight" data-wow-delay=".5s">
                <img src="<?=base_url()?>/files/home/assets/images/hero/02.png" alt="#">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="single-slider">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-12 col-12">
              <div class="hero-text wow fadeInLeft" data-wow-delay=".3s">

                <div class="section-heading">
                  <h2>We only give <br> Best care to your eyes</h2>
                  <p>Since the first days of operation of MediGrids, our teaming has been focused
                    on
                    building a high-qualities medicals service by MediGrids.</p>
                    <div class="button">
                      <a href="<?=base_url('appointment')?>" class="btn">Book Appointment</a>
                      <a href="<?=base_url('request/medicine')?>" class="btn">Medicine Request</a>
                    </div>
                  </div
                </div>
              </div>
              <div class="col-lg-6 col-md-12 col-12">
                <div class="hero-image">
                  <img src="<?=base_url()?>/files/home/assets/images/hero/slider-2.png" alt="#">
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="single-slider">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 col-md-12 col-12">
                <div class="hero-text wow fadeInLeft" data-wow-delay=".3s">

                  <div class="section-heading">
                    <h2>Superior solutions that <br> help you to shine.</h2>
                    <p>Since the first days of operation of MediGrids, our teaming has been focused
                      on
                      building a high-qualities medicals service by MediGrids.</p>
                      <div class="button">
                        <a href="<?=base_url('appointment')?>" class="btn">Book Appointment</a>
                        <a href="<?=base_url('request/medicine')?>" class="btn">Medicine Request</a>
                      </div>
                    </div>

                  </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                  <div class="hero-image">
                    <img src="<?=base_url()?>/files/home/assets/images/hero/slider-3.png" alt="#">
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </section>


      <?=$this->include('home/check')?>


      <section class="about-us section">
        <div class="container">
          <div class="row align-items-center">


            <div class="doctor-calendar-table table-responsive">
              <h3 align="center">Upcoming schedules</h3>
              <table class="table">
                <thead>
                  <?php echo "Today is " . date("l"); ?>

                  <tr>
                    <?php
                    $date =date("Y-m-d");
                    // echo "today is:".$date;
                    $newdate;
                    $check = new \App\Models\AppointmentModel();
                    $er;
                    while ($day < 5) {
                      $day++;
                      $newdate[] = date('Y-m-d', strtotime("+$day days"));
                    }
                    $d1 = date('l', strtotime($newdate[0]));
                    $d2 = date('l', strtotime($newdate[1]));
                    $d3 = date('l', strtotime($newdate[2]));
                    $d4 = date('l', strtotime($newdate[3]));
                    $d5 = date('l', strtotime($newdate[4]));
                    echo "<th>" .$newdate[0] . "<br>". $d1 ."</th>";
                    echo "<th>" .$newdate[1] . "<br>". $d2 ."</th>";
                    echo "<th>" .$newdate[2] . "<br>". $d3 ."</th>";
                    echo "<th>" .$newdate[3] . "<br>". $d4 ."</th>";
                    echo "<th>" .$newdate[4] . "<br>". $d5 ."</th>";
                    ?>
                  </tr>
                  <tbody>
                    <?php
                    echo "<tr>";
                    foreach ($newdate as $f):
                      echo '<th>';
                      $er= $check->where('date', $f)->orderBy('date', 'ASC')->findAll();
                      foreach ($er as $er) {
                        echo $er['name'] . '<br>'. $er['type'] ."<hr>";
                      }
                      echo '</th>';
                    endforeach;
                    echo "<tr>";
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </section>


        <section class="departments section">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="section-title">
                  <h3>Departments</h3>
                  <h2 class="wow fadeInUp" data-wow-delay=".4s">Specialities available at MediGrids</h2>
                  <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem
                    Ipsum available, but the majority have suffered alteration in some form.</p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="cardiology-tab" data-bs-toggle="tab" data-bs-target="#cardiology" type="button" role="tab" aria-controls="cardiology" aria-selected="true"><i class="lni lni-heart"></i> Cardiology</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="stomatology-tab" data-bs-toggle="tab" data-bs-target="#stomatology" type="button" role="tab" aria-controls="stomatology" aria-selected="false"><i class="lni lni-syringe"></i> Stomatology</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="radiology-tab" data-bs-toggle="tab" data-bs-target="#radiology" type="button" role="tab" aria-controls="radiology" aria-selected="false"><i class="lni lni-first-aid"></i> Radiology</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="neurology-tab" data-bs-toggle="tab" data-bs-target="#neurology" type="button" role="tab" aria-controls="neurology" aria-selected="false"><i class="lni lni-pulse"></i> Neurology</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="ophthalmology-tab" data-bs-toggle="tab" data-bs-target="#ophthalmology" type="button" role="tab" aria-controls="ophthalmology" aria-selected="false"><i class="lni lni-sthethoscope"></i> Ophthalmology</button>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="cardiology" role="tabpanel" aria-labelledby="cardiology-tab">
                      <div class="department-content">
                        <div class="row align-items-center">
                          <div class="col-lg-6 col-md-12 col-12">
                            <div class="image">
                              <img src="<?=base_url()?>/files/home/assets/images/departments/image1.jpg" alt="#">
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-12 col-12">
                            <div class="text">
                              <h3>Cardiology</h3>
                              <ul class="list">
                                <li><i class="lni lni-checkbox"></i>Get the oars in the water and start
                                  rowing</li>
                                  <li><i class="lni lni-checkbox"></i>Introspection is the trick.
                                  </li>
                                  <li><i class="lni lni-checkbox"></i>Most people believe that success is
                                    difficult.
                                  </li>
                                </ul>
                                <p>For those of you who are serious about having more, doing more, giving
                                  more and being more, success is achievable with some understanding of
                                  what to do, some discipline around planning and execution of those plans
                                  and belief that you can achieve your desires.</p>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non leo
                                    nunc. Vivamus lacinia massa nec sem sagittis.</p>
                                    <div class="button">
                                      <a href="javascript:void(0)" class="btn">View Speciality</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="tab-pane fade" id="stomatology" role="tabpanel" aria-labelledby="stomatology-tab">
                            <div class="department-content">
                              <div class="row align-items-center">
                                <div class="col-lg-6 col-md-6 col-12">
                                  <div class="image">
                                    <img src="<?=base_url()?>/files/home/assets/images/departments/image2.jpg" alt="#">
                                  </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                  <div class="text">
                                    <h3>Stomatology</h3>
                                    <ul class="list">
                                      <li><i class="lni lni-checkbox"></i>Get the oars in the water and start
                                        rowing</li>
                                        <li><i class="lni lni-checkbox"></i>Introspection is the trick.
                                        </li>
                                        <li><i class="lni lni-checkbox"></i>Most people believe that success is
                                          difficult.
                                        </li>
                                      </ul>
                                      <p>For those of you who are serious about having more, doing more, giving
                                        more and being more, success is achievable with some understanding of
                                        what to do, some discipline around planning and execution of those plans
                                        and belief that you can achieve your desires.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non leo
                                          nunc. Vivamus lacinia massa nec sem sagittis.</p>
                                          <div class="button">
                                            <a href="javascript:void(0)" class="btn">View Speciality</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="tab-pane fade" id="radiology" role="tabpanel" aria-labelledby="radiology-tab">
                                  <div class="department-content">
                                    <div class="row align-items-center">
                                      <div class="col-lg-6 col-md-6 col-12">
                                        <div class="image">
                                          <img src="<?=base_url()?>/files/home/assets/images/departments/image3.jpg" alt="#">
                                        </div>
                                      </div>
                                      <div class="col-lg-6 col-md-6 col-12">
                                        <div class="text">
                                          <h3>Radiology</h3>
                                          <ul class="list">
                                            <li><i class="lni lni-checkbox"></i>Get the oars in the water and start
                                              rowing</li>
                                              <li><i class="lni lni-checkbox"></i>Introspection is the trick.
                                              </li>
                                              <li><i class="lni lni-checkbox"></i>Most people believe that success is
                                                difficult.
                                              </li>
                                            </ul>
                                            <p>For those of you who are serious about having more, doing more, giving
                                              more and being more, success is achievable with some understanding of
                                              what to do, some discipline around planning and execution of those plans
                                              and belief that you can achieve your desires.</p>
                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non leo
                                                nunc. Vivamus lacinia massa nec sem sagittis.</p>
                                                <div class="button">
                                                  <a href="javascript:void(0)" class="btn">View Speciality</a>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="tab-pane fade" id="neurology" role="tabpanel" aria-labelledby="neurology-tab">
                                        <div class="department-content">
                                          <div class="row align-items-center">
                                            <div class="col-lg-6 col-md-6 col-12">
                                              <div class="image">
                                                <img src="<?=base_url()?>/files/home/assets/images/departments/image4.jpg" alt="#">
                                              </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                              <div class="text">
                                                <h3>Neurology</h3>
                                                <ul class="list">
                                                  <li><i class="lni lni-checkbox"></i>Get the oars in the water and start
                                                    rowing</li>
                                                    <li><i class="lni lni-checkbox"></i>Introspection is the trick.
                                                    </li>
                                                    <li><i class="lni lni-checkbox"></i>Most people believe that success is
                                                      difficult.
                                                    </li>
                                                  </ul>
                                                  <p>For those of you who are serious about having more, doing more, giving
                                                    more and being more, success is achievable with some understanding of
                                                    what to do, some discipline around planning and execution of those plans
                                                    and belief that you can achieve your desires.</p>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non leo
                                                      nunc. Vivamus lacinia massa nec sem sagittis.</p>
                                                      <div class="button">
                                                        <a href="javascript:void(0)" class="btn">View Speciality</a>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="tab-pane fade" id="ophthalmology" role="tabpanel" aria-labelledby="ophthalmology-tab">
                                              <div class="department-content">
                                                <div class="row align-items-center">
                                                  <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="image">
                                                      <img src="<?=base_url()?>/files/home/assets/images/departments/image5.jpg" alt="#">
                                                    </div>
                                                  </div>
                                                  <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="text">
                                                      <h3>Ophthalmology</h3>
                                                      <ul class="list">
                                                        <li><i class="lni lni-checkbox"></i>Get the oars in the water and start
                                                          rowing</li>
                                                          <li><i class="lni lni-checkbox"></i>Introspection is the trick.
                                                          </li>
                                                          <li><i class="lni lni-checkbox"></i>Most people believe that success is
                                                            difficult.
                                                          </li>
                                                        </ul>
                                                        <p>For those of you who are serious about having more, doing more, giving
                                                          more and being more, success is achievable with some understanding of
                                                          what to do, some discipline around planning and execution of those plans
                                                          and belief that you can achieve your desires.</p>
                                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non leo
                                                            nunc. Vivamus lacinia massa nec sem sagittis.</p>
                                                            <div class="button">
                                                              <a href="javascript:void(0)" class="btn">View Speciality</a>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </section
                                        <?= $this->include('home/inc/counter') ?>
                                        <section class="services section">
                                          <div class="container">
                                            <div class="row">
                                              <div class="col-12">
                                                <div class="section-title">
                                                  <h3>Services</h3>
                                                  <h2 class="wow fadeInUp" data-wow-delay=".4s">Services Provided By MediGrids</h2>
                                                  <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem
                                                    Ipsum available, but the majority have suffered alteration in some form.</p>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-lg-12">
                                                  <div class="services-content">
                                                    <div class="row">
                                                      <div class="col-lg-4 col-md-6 col-12 custom-padding-right">

                                                        <div class="single-list custom-border-right custom-border-bottom wow fadeInUp" data-wow-delay=".2s">
                                                          <img class="shape1" src="<?=base_url()?>/files/home/assets/images/service/shape1.svg" alt="#">
                                                          <img class="shape2" src="<?=base_url()?>/files/home/assets/images/service/shape2.svg" alt="#">
                                                          <i class="lni lni-ambulance"></i>
                                                          <h4><a href="service-single.html">Fast Ambulance</a></h4>
                                                          <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                                            have suffered.</p>
                                                          </div>

                                                        </div>
                                                        <div class="col-lg-4 col-md-6 col-12 custom-padding-left custom-padding-right ">

                                                          <div class="single-list custom-border-right custom-border-bottom wow fadeInUp" data-wow-delay=".4s">
                                                            <img class="shape1" src="<?=base_url()?>/files/home/assets/images/service/shape1.svg" alt="#">
                                                            <img class="shape2" src="<?=base_url()?>/files/home/assets/images/service/shape2.svg" alt="#">
                                                            <i class="lni lni-sthethoscope"></i>
                                                            <h4><a href="service-single.html">Dental Specialist</a></h4>
                                                            <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                                              have suffered.</p>
                                                            </div>

                                                          </div>
                                                          <div class="col-lg-4 col-md-6 col-12 custom-padding-left">

                                                            <div class="single-list custom-border-bottom wow fadeInUp" data-wow-delay=".6s">
                                                              <img class="shape1" src="<?=base_url()?>/files/home/assets/images/service/shape1.svg" alt="#">
                                                              <img class="shape2" src="<?=base_url()?>/files/home/assets/images/service/shape2.svg" alt="#">
                                                              <i class="lni lni-microscope"></i>
                                                              <h4><a href="service-single.html">Modern Laboratory</a></h4>
                                                              <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                                                have suffered.</p>
                                                              </div>

                                                            </div>
                                                            <div class="col-lg-4 col-md-6 col-12 custom-padding-right">

                                                              <div class="single-list custom-border-right wow fadeInUp" data-wow-delay=".2s">
                                                                <img class="shape1" src="<?=base_url()?>/files/home/assets/images/service/shape1.svg" alt="#">
                                                                <img class="shape2" src="<?=base_url()?>/files/home/assets/images/service/shape2.svg" alt="#">
                                                                <i class="lni lni-users"></i>
                                                                <h4><a href="service-single.html">Children Center</a></h4>
                                                                <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                                                  have suffered.</p>
                                                                </div>

                                                              </div>
                                                              <div class="col-lg-4 col-md-6 col-12 custom-padding-left custom-padding-right">

                                                                <div class="single-list custom-border-right wow fadeInUp" data-wow-delay=".4s">
                                                                  <img class="shape1" src="<?=base_url()?>/files/home/assets/images/service/shape1.svg" alt="#">
                                                                  <img class="shape2" src="<?=base_url()?>/files/home/assets/images/service/shape2.svg" alt="#">
                                                                  <i class="lni lni-heart"></i>
                                                                  <h4><a href="service-single.html">Heart Surgery</a></h4>
                                                                  <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                                                    have suffered.</p>
                                                                  </div>

                                                                </div>
                                                                <div class="col-lg-4 col-md-6 col-12 custom-padding-left">

                                                                  <div class="single-list wow fadeInUp" data-wow-delay=".6s">
                                                                    <img class="shape1" src="<?=base_url()?>/files/home/assets/images/service/shape1.svg" alt="#">
                                                                    <img class="shape2" src="<?=base_url()?>/files/home/assets/images/service/shape2.svg" alt="#">
                                                                    <i class="lni lni-hand"></i>
                                                                    <h4><a href="service-single.html">Care Advice</a></h4>
                                                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                                                      have suffered.</p>
                                                                    </div>

                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </section>


                                                      <section class="portfolio-section section">
                                                        <div class="container">
                                                          <div class="row">
                                                            <div class="col-12">
                                                              <div class="section-title">
                                                                <h3>Projects</h3>
                                                                <h2 class="wow fadeInUp" data-wow-delay=".4s">Here is Some of our <br>Latest Cases</h2>
                                                                <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem
                                                                  Ipsum available, but the majority have suffered alteration in some form.</p>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div class="row">
                                                              <div class="col-12">
                                                                <div class="portfolio-btn-wrapper wow fadeInUp" data-wow-delay=".4s">
                                                                  <button class="portfolio-btn active" data-filter="*">Show All</button>
                                                                  <button class="portfolio-btn" data-filter=".cardiology">Cardiology</button>
                                                                  <button class="portfolio-btn" data-filter=".diabetes">Diabetes</button>
                                                                  <button class="portfolio-btn" data-filter=".pediatric">Pediatric</button>
                                                                  <button class="portfolio-btn" data-filter=".neurosurgery">Neurosurgery</button>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div class="row grid">
                                                              <div class="col-lg-4 col-md-6 grid-item diabetes">
                                                                <div class="portfolio-item-wrapper">
                                                                  <div class="portfolio-img">
                                                                    <img src="<?=base_url()?>/files/home/assets/images/portfolio/pf1.jpg" alt="#">
                                                                  </div>
                                                                  <div class="portfolio-overlay">
                                                                    <div class="pf-content">
                                                                      <a href="portfolio-details.html" class="detail-btn"><i class="lni lni-link"></i></a>
                                                                      <span class="category">Cardiac Surgery</span>
                                                                      <h4><a href="portfolio-details.html">Qualified Physicians</a></h4>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <div class="col-lg-4 col-md-6 grid-item diabetes">
                                                                <div class="portfolio-item-wrapper">
                                                                  <div class="portfolio-img">
                                                                    <img src="<?=base_url()?>/files/home/assets/images/portfolio/pf2.jpg" alt="#">
                                                                  </div>
                                                                  <div class="pf-content">
                                                                    <a href="portfolio-details.html" class="detail-btn"><i class="lni lni-link"></i></a>
                                                                    <span class="category">Cloud Services</span>
                                                                    <h4><a href="portfolio-details.html">Personalized Medication</a></h4>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <div class="col-lg-4 col-md-6 grid-item pediatric">
                                                                <div class="portfolio-item-wrapper">
                                                                  <div class="portfolio-img">
                                                                    <img src="<?=base_url()?>/files/home/assets/images/portfolio/pf3.jpg" alt="#">
                                                                  </div>
                                                                  <div class="pf-content">
                                                                    <a href="portfolio-details.html" class="detail-btn"><i class="lni lni-link"></i></a>
                                                                    <span class="category">Dietetics</span>
                                                                    <h4><a href="portfolio-details.html">Excellence And Safety</a></h4>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <div class="col-lg-4 col-md-6 grid-item cardiology">
                                                                <div class="portfolio-item-wrapper">
                                                                  <div class="portfolio-img">
                                                                    <img src="<?=base_url()?>/files/home/assets/images/portfolio/pf4.jpg" alt="#">
                                                                  </div>
                                                                  <div class="pf-content">
                                                                    <a href="portfolio-details.html" class="detail-btn"><i class="lni lni-link"></i></a>
                                                                    <span class="category">Eye Surgery</span>
                                                                    <h4><a href="portfolio-details.html">Dry Eye Surgery</a></h4>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <div class="col-lg-4 col-md-6 grid-item pediatric">
                                                                <div class="portfolio-item-wrapper">
                                                                  <div class="portfolio-img">
                                                                    <img src="<?=base_url()?>/files/home/assets/images/portfolio/pf5.jpg" alt="#">
                                                                  </div>
                                                                  <div class="pf-content">
                                                                    <a href="portfolio-details.html" class="detail-btn"><i class="lni lni-link"></i></a>
                                                                    <span class="category">Surgical</span>
                                                                    <h4><a href="portfolio-details.html">Surgical Procedure</a></h4>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <div class="col-lg-4 col-md-6 grid-item neurosurgery">
                                                                <div class="portfolio-item-wrapper">
                                                                  <div class="portfolio-img">
                                                                    <img src="<?=base_url()?>/files/home/assets/images/portfolio/pf6.jpg" alt="#">
                                                                  </div>
                                                                  <div class="pf-content">
                                                                    <a href="portfolio-details.html" class="detail-btn"><i class="lni lni-link"></i></a>
                                                                    <span class="category">Eye Surgery</span>
                                                                    <h4><a href="portfolio-details.html">Dry Eye Surgery</a></h4>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </section>


                                                        <section class="pricing-table section">
                                                          <div class="container">
                                                            <div class="row">
                                                              <div class="col-12">
                                                                <div class="section-title">
                                                                  <h3>pricing</h3>
                                                                  <h2 class="wow fadeInUp" data-wow-delay=".4s">Pricing Plan</h2>
                                                                  <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem
                                                                    Ipsum available, but the majority have suffered alteration in some form.</p>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <div class="row">
                                                                <div class="col-lg-4 col-md-6 col-12">

                                                                  <div class="single-table wow fadeInUp" data-wow-delay=".2s">

                                                                    <div class="table-head">
                                                                      <h4 class="title">Basic</h4>
                                                                      <div class="price">
                                                                        <h2 class="amount">$45<span class="duration">/ Monthly</span></h2>
                                                                      </div>
                                                                    </div>


                                                                    <ul class="table-list">
                                                                      <li>Routine Checkup</li>
                                                                      <li>24Th Assisance</li>
                                                                      <li>100 Text & Treatments</li>
                                                                      <li>Regular Health Checkups</li>
                                                                    </ul>


                                                                    <div class="button">
                                                                      <a class="btn" href="javascript:void(0)">Make Payment</a>
                                                                    </div>

                                                                  </div>

                                                                </div>
                                                                <div class="col-lg-4 col-md-6 col-12">

                                                                  <div class="single-table wow fadeInUp" data-wow-delay=".4s">

                                                                    <div class="table-head">
                                                                      <h4 class="title">Advance</h4>
                                                                      <div class="price">
                                                                        <h2 class="amount">$204<span class="duration">/ Monthly</span></h2>
                                                                      </div>
                                                                    </div>


                                                                    <ul class="table-list">
                                                                      <li>Routine Checkup</li>
                                                                      <li>24Th Assisance</li>
                                                                      <li>100 Text & Treatments</li>
                                                                      <li>Regular Health Checkups</li>
                                                                    </ul>


                                                                    <div class="button">
                                                                      <a class="btn" href="javascript:void(0)">Make Payment</a>
                                                                    </div>

                                                                  </div>

                                                                </div>
                                                                <div class="col-lg-4 col-md-6 col-12">

                                                                  <div class="single-table wow fadeInUp" data-wow-delay=".6s">

                                                                    <div class="table-head">
                                                                      <h4 class="title">Premium</h4>
                                                                      <div class="price">
                                                                        <h2 class="amount">$355<span class="duration">/ Monthly</span></h2>
                                                                      </div>
                                                                    </div>


                                                                    <ul class="table-list">
                                                                      <li>Routine Checkup</li>
                                                                      <li>24Th Assisance</li>
                                                                      <li>100 Text & Treatments</li>
                                                                      <li>Regular Health Checkups</li>
                                                                    </ul>


                                                                    <div class="button">
                                                                      <a class="btn" href="javascript:void(0)">Make Payment</a>
                                                                    </div>

                                                                  </div>

                                                                </div>
                                                              </div>
                                                            </div>
                                                          </section>


                                                          <section class="testimonials section">
                                                            <div class="container">
                                                              <div class="row">
                                                                <div class="col-12">
                                                                  <div class="section-title align-center gray-bg">
                                                                    <h3>testimonials</h3>
                                                                    <h2 class="wow fadeInUp" data-wow-delay=".4s">What People Say</h2>
                                                                    <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem
                                                                      Ipsum available, but the majority have suffered alteration in some form.</p>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                                <div class="row testimonial-slider">
                                                                  <div class="col-lg-4 col-md-6 col-12">

                                                                    <div class="single-testimonial">
                                                                      <div class="text">
                                                                        <div class="quote-icon">
                                                                          <i class="lni lni-quotation"></i>
                                                                        </div>
                                                                        <p>"It’s amazing how much easier it has been to meet new people and create instant
                                                                          connections."</p>
                                                                        </div>
                                                                        <div class="author">
                                                                          <img src="<?=base_url()?>/files/home/assets/images/testimonial/testi1.jpg" alt="#">
                                                                          <h4 class="name">
                                                                            Jane Anderson
                                                                            <span class="deg">Cancer client</span>
                                                                          </h4>
                                                                        </div>
                                                                      </div>

                                                                    </div>
                                                                    <div class="col-lg-4 col-md-6 col-12">

                                                                      <div class="single-testimonial">
                                                                        <div class="text">
                                                                          <div class="quote-icon">
                                                                            <i class="lni lni-quotation"></i>
                                                                          </div>
                                                                          <p>"It’s amazing how much easier it has been to meet new people and create instant
                                                                            connections."</p>
                                                                          </div>
                                                                          <div class="author">
                                                                            <img src="<?=base_url()?>/files/home/assets/images/testimonial/testi2.jpg" alt="#">
                                                                            <h4 class="name">
                                                                              Paul Flavius
                                                                              <span class="deg">Heather</span>
                                                                            </h4>
                                                                          </div>
                                                                        </div>

                                                                      </div>
                                                                      <div class="col-lg-4 col-md-6 col-12">

                                                                        <div class="single-testimonial">
                                                                          <div class="text">
                                                                            <div class="quote-icon">
                                                                              <i class="lni lni-quotation"></i>
                                                                            </div>
                                                                            <p>"It’s amazing how much easier it has been to meet new people and create instant
                                                                              connections."</p>
                                                                            </div>
                                                                            <div class="author">
                                                                              <img src="<?=base_url()?>/files/home/assets/images/testimonial/testi3.jpg" alt="#">
                                                                              <h4 class="name">
                                                                                Harry Russel
                                                                                <span class="deg">Surgery client</span>
                                                                              </h4>
                                                                            </div>
                                                                          </div>

                                                                        </div>
                                                                        <div class="col-lg-4 col-md-6 col-12">

                                                                          <div class="single-testimonial">
                                                                            <div class="text">
                                                                              <div class="quote-icon">
                                                                                <i class="lni lni-quotation"></i>
                                                                              </div>
                                                                              <p>"It’s amazing how much easier it has been to meet new people and create instant
                                                                                connections."</p>
                                                                              </div>
                                                                              <div class="author">
                                                                                <img src="<?=base_url()?>/files/home/assets/images/testimonial/testi4.jpg" alt="#">
                                                                                <h4 class="name">
                                                                                  Alice Williams
                                                                                  <span class="deg">Mother</span>
                                                                                </h4>
                                                                              </div>
                                                                            </div>

                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                                    </section>


                                                                    <section class="doctors section">
                                                                      <div class="container">
                                                                        <div class="row">
                                                                          <div class="col-12">
                                                                            <div class="section-title">
                                                                              <h3>Doctors</h3>
                                                                              <h2 class="wow fadeInUp" data-wow-delay=".4s">Our Outstanding Team Is Active To Help You!</h2>
                                                                              <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem
                                                                                Ipsum available, but the majority have suffered alteration in some form.</p>
                                                                              </div>
                                                                            </div>
                                                                          </div>
                                                                          <div class="row">
                                                                            <div class="col-lg-3 col-md-6 col-12">

                                                                              <div class="single-doctor wow fadeInUp" data-wow-delay=".2s">
                                                                                <div class="image">
                                                                                  <img src="<?=base_url()?>/files/home/assets/images/doctors/doctor1.jpg" alt="#">
                                                                                  <ul class="social">
                                                                                    <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                                                                                    <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                                                                    <li><a href="javascript:void(0)"><i class="lni lni-instagram"></i></a></li>
                                                                                    <li><a href="javascript:void(0)"><i class="lni lni-youtube"></i></a></li>
                                                                                  </ul>
                                                                                </div>
                                                                                <div class="content">
                                                                                  <h5>Cardiologist</h5>
                                                                                  <h3><a href="doctor-details.html">Dr.Felica Queen</a></h3>
                                                                                </div>
                                                                              </div>

                                                                            </div>
                                                                            <div class="col-lg-3 col-md-6 col-12">

                                                                              <div class="single-doctor wow fadeInUp" data-wow-delay=".4s">
                                                                                <div class="image">
                                                                                  <img src="<?=base_url()?>/files/home/assets/images/doctors/doctor2.jpg" alt="#">
                                                                                  <ul class="social">
                                                                                    <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                                                                                    <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                                                                    <li><a href="javascript:void(0)"><i class="lni lni-instagram"></i></a></li>
                                                                                    <li><a href="javascript:void(0)"><i class="lni lni-youtube"></i></a></li>
                                                                                  </ul>
                                                                                </div>
                                                                                <div class="content">
                                                                                  <h5>Neurologist</h5>
                                                                                  <h3><a href="doctor-details.html">Dr.Alice Williams</a></h3>
                                                                                </div>
                                                                              </div>

                                                                            </div>
                                                                            <div class="col-lg-3 col-md-6 col-12">

                                                                              <div class="single-doctor wow fadeInUp" data-wow-delay=".6s">
                                                                                <div class="image">
                                                                                  <img src="<?=base_url()?>/files/home/assets/images/doctors/doctor3.jpg" alt="#">
                                                                                  <ul class="social">
                                                                                    <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                                                                                    <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                                                                    <li><a href="javascript:void(0)"><i class="lni lni-instagram"></i></a></li>
                                                                                    <li><a href="javascript:void(0)"><i class="lni lni-youtube"></i></a></li>
                                                                                  </ul>
                                                                                </div>
                                                                                <div class="content">
                                                                                  <h5>Physician Assistant</h5>
                                                                                  <h3><a href="doctor-details.html">Dr.Paul Flavius</a></h3>
                                                                                </div>
                                                                              </div>

                                                                            </div>
                                                                            <div class="col-lg-3 col-md-6 col-12">

                                                                              <div class="single-doctor wow fadeInUp" data-wow-delay=".8s">
                                                                                <div class="image">
                                                                                  <img src="<?=base_url()?>/files/home/assets/images/doctors/doctor4.jpg" alt="#">
                                                                                  <ul class="social">
                                                                                    <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                                                                                    <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                                                                    <li><a href="javascript:void(0)"><i class="lni lni-instagram"></i></a></li>
                                                                                    <li><a href="javascript:void(0)"><i class="lni lni-youtube"></i></a></li>
                                                                                  </ul>
                                                                                </div>
                                                                                <div class="content">
                                                                                  <h5>Physician Assistant</h5>
                                                                                  <h3><a href="doctor-details.html">Dr.Michael Bean</a></h3>
                                                                                </div>
                                                                              </div>

                                                                            </div>
                                                                          </div>
                                                                        </div>
                                                                      </section>


                                                                      <section class="how-works">
                                                                        <div class="container-fluid">
                                                                          <div class="row">
                                                                            <div class="col-lg-4 col-md-4 col-12 p-0">

                                                                              <div class="single-work first">
                                                                                <div class="main-icon">
                                                                                  <i class="lni lni-agenda"></i>
                                                                                </div>
                                                                                <h3>Best Monitoring System</h3>
                                                                                <p>Despite advances in technology and understanding of biological systems, drug discovery is
                                                                                  still a lengthy, expensive.</p>
                                                                                </div>

                                                                              </div>
                                                                              <div class="col-lg-4 col-md-4 col-12 p-0">

                                                                                <div class="single-work middle">
                                                                                  <div class="main-icon">
                                                                                    <i class="lni lni-hospital"></i>
                                                                                  </div>
                                                                                  <h3>Advanced Operating Room</h3>
                                                                                  <p>Despite advances in technology and understanding of biological systems, drug discovery is
                                                                                    still a lengthy, expensive.</p>
                                                                                  </div>

                                                                                </div>
                                                                                <div class="col-lg-4 col-md-4 col-12 p-0">

                                                                                  <div class="single-work last">
                                                                                    <div class="main-icon">
                                                                                      <i class="lni lni-sthethoscope"></i>
                                                                                    </div>
                                                                                    <h3>Only Best Doctors</h3>
                                                                                    <p>Despite advances in technology and understanding of biological systems, drug discovery is
                                                                                      still a lengthy, expensive.</p>
                                                                                    </div>

                                                                                  </div>
                                                                                </div>
                                                                              </div>
                                                                            </section>


                                                                            <div class="latest-news-area section">
                                                                              <div class="container">
                                                                                <div class="row">
                                                                                  <div class="col-12">
                                                                                    <div class="section-title">
                                                                                      <h3>Blogs</h3>
                                                                                      <h2 class="wow fadeInUp" data-wow-delay=".4s">latest news</h2>
                                                                                      <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem
                                                                                        Ipsum available, but the majority have suffered alteration in some form.</p>
                                                                                      </div>
                                                                                    </div>
                                                                                  </div>
                                                                                  <div class="row">
                                                                                    <div class="col-lg-6 col-md-12 col-12">

                                                                                      <div class="single-news wow fadeInUp" data-wow-delay=".2s">
                                                                                        <div class="row">
                                                                                          <div class="col-lg-5 col-md-5 col-12 pr-0">
                                                                                            <div class="image">
                                                                                              <a href="blog-single-sidebar.html"><img src="<?=base_url()?>/files/home/assets/images/blog/blog1.jpg" alt="#"></a>
                                                                                            </div>
                                                                                          </div>
                                                                                          <div class="col-lg-7 col-md-7 col-12  pl-0">
                                                                                            <div class="content">
                                                                                              <h2 class="title"><a href="blog-single-sidebar.html">These blood markers may higher risk of disease</a></h2>
                                                                                              <p>The price is something not defined as financial. It could be time.</p>
                                                                                              <ul class="meta-info">
                                                                                                <li>
                                                                                                  <a href="javascript:void(0)"><img src="<?=base_url()?>/files/home/assets/images/blog/comment1.jpg" alt="#"> Alice
                                                                                                    Williams</a>
                                                                                                  </li>
                                                                                                  <li>
                                                                                                    <a href="javascript:void(0)">08 Mar 2023 </a>
                                                                                                  </li>
                                                                                                </ul>
                                                                                              </div>
                                                                                            </div>
                                                                                          </div>
                                                                                        </div>


                                                                                        <div class="single-news wow fadeInUp" data-wow-delay=".2s">
                                                                                          <div class="row">
                                                                                            <div class="col-lg-5 col-md-5 col-12 pr-0">
                                                                                              <div class="image">
                                                                                                <a href="blog-single-sidebar.html"><img src="<?=base_url()?>/files/home/assets/images/blog/blog2.jpg" alt="#"></a>
                                                                                              </div>
                                                                                            </div>
                                                                                            <div class="col-lg-7 col-md-7 col-12  pl-0">
                                                                                              <div class="content">
                                                                                                <h2 class="title"><a href="blog-single-sidebar.html">Brushing your teeth may keep your heart healthy</a></h2>
                                                                                                <p>The price is something not defined as financial. It could be time.</p>
                                                                                                <ul class="meta-info">
                                                                                                  <li>
                                                                                                    <a href="javascript:void(0)"><img src="<?=base_url()?>/files/home/assets/images/blog/comment2.jpg" alt="#"> Alrado
                                                                                                      Deyam</a>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                      <a href="javascript:void(0)">10 Feb 2023 </a>
                                                                                                    </li>
                                                                                                  </ul>
                                                                                                </div>
                                                                                              </div>
                                                                                            </div>
                                                                                          </div>

                                                                                        </div>
                                                                                        <div class="col-lg-6 col-md-12 col-12">

                                                                                          <div class="single-news style2 wow fadeInUp" data-wow-delay=".4s">
                                                                                            <div class="row">
                                                                                              <div class="col-12">
                                                                                                <div class="image">
                                                                                                  <a href="blog-single-sidebar.html"><img src="<?=base_url()?>/files/home/assets/images/blog/blog3.jpg" alt="#"></a>
                                                                                                </div>
                                                                                              </div>
                                                                                              <div class="col-12">
                                                                                                <div class="content">
                                                                                                  <h2 class="title"><a href="blog-single-sidebar.html">Using anthrax to fight cancer
                                                                                                    effectively</a></h2>
                                                                                                    <p>The price is something not necessarily defined as financial. It could be time,
                                                                                                      effort and sacrifice.</p>
                                                                                                      <ul class="meta-info">
                                                                                                        <li>
                                                                                                          <a href="javascript:void(0)"><img src="<?=base_url()?>/files/home/assets/images/blog/comment3.jpg" alt="#"> Zenifer
                                                                                                            Suie</a>
                                                                                                          </li>
                                                                                                          <li>
                                                                                                            <a href="javascript:void(0)">02 Jan 2023</a>
                                                                                                          </li>
                                                                                                        </ul>
                                                                                                      </div>
                                                                                                    </div>
                                                                                                  </div>
                                                                                                </div>

                                                                                              </div>
                                                                                            </div>
                                                                                          </div>
                                                                                        </div>


                                                                                        <footer class="footer overlay">

                                                                                          <div class="footer-top">
                                                                                            <div class="container">
                                                                                              <div class="row">
                                                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                                                  <div class="cta">
                                                                                                    <h3>Need Help?</h3>
                                                                                                    <p>Please feel free to contact our friendly reception staff with any medical enquiry, or
                                                                                                      call <a href="javascript:void(0)">+880 12345678901</a></p>
                                                                                                    </div>
                                                                                                  </div>
                                                                                                  <div class="col-lg-6 col-md-6 col-12">
                                                                                                    <div class="form">
                                                                                                      <h3>Subscribe Newsletter</h3>
                                                                                                      <form action="#" method="get" target="_blank" class="newsletter-form">
                                                                                                        <input name="EMAIL" placeholder="Your email address" type="email">
                                                                                                        <div class="button">
                                                                                                          <button class="btn">Subscribe<span class="dir-part"></span></button>
                                                                                                        </div>
                                                                                                      </form>
                                                                                                    </div>
                                                                                                  </div>
                                                                                                </div>
                                                                                              </div>
                                                                                            </div>


                                                                                            <div class="footer-middle">
                                                                                              <div class="container">
                                                                                                <div class="row">
                                                                                                  <div class="col-lg-3 col-md-6 col-12">

                                                                                                    <div class="single-footer f-about">
                                                                                                      <div class="logo">
                                                                                                        <a href="index.html">
                                                                                                          <img src="<?=base_url()?>/files/home/assets/images/logo/white-logo.svg" alt="#">
                                                                                                        </a>
                                                                                                      </div>
                                                                                                      <p>There’s nothing in this story to make us think he was dreaming about riches.</p>
                                                                                                      <ul class="social">
                                                                                                        <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                                                                                                        <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                                                                                        <li><a href="javascript:void(0)"><i class="lni lni-instagram"></i></a></li>
                                                                                                        <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                                                                                                        <li><a href="javascript:void(0)"><i class="lni lni-youtube"></i></a></li>
                                                                                                      </ul>
                                                                                                    </div>

                                                                                                  </div>
                                                                                                  <div class="col-lg-3 col-md-6 col-12">

                                                                                                    <div class="single-footer f-link">
                                                                                                      <h3>Useful Links</h3>
                                                                                                      <div class="row">
                                                                                                        <div class="col-lg-6 col-md-6 col-12">
                                                                                                          <ul>
                                                                                                            <li><a href="javascript:void(0)">About</a></li>
                                                                                                            <li><a href="javascript:void(0)">Team</a></li>
                                                                                                            <li><a href="javascript:void(0)">Before After</a></li>
                                                                                                            <li><a href="javascript:void(0)">Cost Calculator</a></li>
                                                                                                            <li><a href="javascript:void(0)">Working Hours</a></li>
                                                                                                          </ul>
                                                                                                        </div>
                                                                                                        <div class="col-lg-6 col-md-6 col-12">
                                                                                                          <ul>
                                                                                                            <li><a href="javascript:void(0)">Appointment</a></li>
                                                                                                            <li><a href="javascript:void(0)">Gallery</a></li>
                                                                                                            <li><a href="javascript:void(0)">Timetable</a></li>
                                                                                                            <li><a href="javascript:void(0)">Departments</a></li>
                                                                                                            <li><a href="javascript:void(0)">Contact Us</a></li>
                                                                                                          </ul>
                                                                                                        </div>
                                                                                                      </div>
                                                                                                    </div>

                                                                                                  </div>
                                                                                                  <div class="col-lg-3 col-md-6 col-12">

                                                                                                    <div class="single-footer opening-hours">
                                                                                                      <h3>Opening Hours</h3>
                                                                                                      <ul>
                                                                                                        <li>
                                                                                                          <span class="day"><i class="lni lni-timer"></i> Mon - Tue</span>
                                                                                                          <span class="time">08:30 - 18:30</span>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                          <span class="day"><i class="lni lni-timer"></i> Wed- Thu</span>
                                                                                                          <span class="time">08:30 - 18:30</span>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                          <span class="day"><i class="lni lni-timer"></i> Friday</span>
                                                                                                          <span class="time">08:30 - 18:30</span>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                          <span class="day"><i class="lni lni-timer"></i> Saturday</span>
                                                                                                          <span class="time">08:30 - 18:30</span>
                                                                                                        </li>
                                                                                                      </ul>
                                                                                                    </div>

                                                                                                  </div>
                                                                                                  <div class="col-lg-3 col-md-6 col-12">

                                                                                                    <div class="single-footer last f-contact">
                                                                                                      <h3>Contact</h3>
                                                                                                      <ul>
                                                                                                        <li><i class="lni lni-map-marker"></i> 23 New Design Str, Lorem Upsum 10 Hudson Yards,
                                                                                                          USA</li>
                                                                                                          <li><i class="lni lni-phone"></i> Tel. +(123) 1800-567-8990 </li>
                                                                                                          <li><i class="lni lni-envelope"></i> Mail. <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="1a696f6a6a75686e5a79767b6969737d68737e6934797577">[email&#160;protected]</a></li>
                                                                                                        </ul>
                                                                                                      </div>

                                                                                                    </div>
                                                                                                  </div>
                                                                                                </div>
                                                                                              </div>


                                                                                              <div class="footer-bottom">
                                                                                                <div class="container">
                                                                                                  <div class="inner">
                                                                                                    <div class="row">
                                                                                                      <div class="col-lg-6 col-md-6 col-12">
                                                                                                        <div class="content">
                                                                                                          <p class="copyright-text">Designed and Developed by <a href="https://graygrids.com/" rel="nofollow" target="_blank">GrayGrids</a>
                                                                                                          </p>
                                                                                                        </div>
                                                                                                      </div>
                                                                                                      <div class="col-lg-6 col-md-6 col-12">
                                                                                                        <ul class="extra-link">
                                                                                                          <li><a href="javascript:void(0)">Terms & Conditions</a></li>
                                                                                                          <li><a href="javascript:void(0)">FAQ</a></li>
                                                                                                          <li><a href="javascript:void(0)">Privacy Policy</a></li>
                                                                                                        </ul>
                                                                                                      </div>
                                                                                                    </div>
                                                                                                  </div>
                                                                                                </div>
                                                                                              </div>

                                                                                            </footer>


                                                                                            <a href="#" class="scroll-top">
                                                                                              <i class="lni lni-chevron-up"></i>
                                                                                            </a>
                                                                                            <?=$this->include('home/inc/end')?>
