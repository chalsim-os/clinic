<header class="header navbar-area">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-12">
        <div class="nav-inner">
          <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="/">
              <img src="<?=base_url()?>/files/home/assets/images/logo/logo.svg" alt="Logo">
            </a>
            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="toggler-icon"></span>
              <span class="toggler-icon"></span>
              <span class="toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
            <ul id="nav" class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="page-scroll active dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-1" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Home</a>
                <ul class="sub-menu collapse" id="submenu-1-1">
                  <li class="nav-item active"><a href="/">Home Default</a></li>
                  <li class="nav-item"><a href="index2.html">Home Version 2</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="page-scroll dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-2" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Pages</a>
                <ul class="sub-menu collapse" id="submenu-1-2">
                  <li class="nav-item"><a href="about-us.html">About Us</a></li>
                  <li class="nav-item"><a href="appointment.html">Appointment</a></li>
                  <li class="nav-item"><a href="time-table.html">Time Table</a></li>
                  <li class="nav-item"><a href="testimonials.html">Testimonials</a></li>
                  <li class="nav-item"><a href="portfolio-details.html">Project Details</a>
                  </li>
                  <li class="nav-item"><a href="pricing.html">Our Pricing</a></li>
                  <li class="nav-item"><a href="registration.html">Sign Up</a></li>
                  <li class="nav-item"><a href="login.html">Login</a></li>
                  <li class="nav-item"><a href="faq.html">Faq</a></li>
                  <li class="nav-item"><a href="mail-success.html">Mail Success</a></li>
                  <li class="nav-item"><a href="404.html">404 Error</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="page-scroll dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-3" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Services</a>
                <ul class="sub-menu collapse" id="submenu-1-3">
                  <li class="nav-item"><a href="services.html">Services</a></li>
                  <li class="nav-item"><a href="service-single.html">Service Details</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="page-scroll dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-4" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Staff</a>
                <ul class="sub-menu collapse" id="submenu-1-4">
                  <li class="nav-item"><a href="doctors.html">Doctors</a></li>
                  <li class="nav-item"><a href="doctor-details.html">Nurses</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="page-scroll dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-5" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Blog</a>
                <ul class="sub-menu collapse" id="submenu-1-5">
                  <li class="nav-item">
                    <a href="blog-grid-sidebar.html">Blog Grid Sidebar</a>
                  </li>
                  <li class="nav-item"><a href="blog-single.html">Blog Single</a></li>
                  <li class="nav-item"><a href="blog-single-sidebar.html">Blog Single
                    Sibebar</a></li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="contact.html" aria-label="Toggle navigation">Contact</a>
                </li>
              </ul>
            </div>
            <div class="button add-list-button">
              <?php
              $isLoggedIn = session()->get('isLoggedIn');
              $user =session()->get('type');
              if($isLoggedIn):
                if($user == 'student'):?>
              <a href="<?=base_url()?>/appointment" class="btn">Book Appointment</a>
            <?php else: ?>
              <a href="<?=base_url()?>/clinicmg" class="btn">Management</a>
            <?php endif; ?>
          <?php else: ?>
            <a href="<?=base_url()?>/login" class="btn">Login</a>
          <?php endif; ?>
            </div>
          </nav>

        </div>
      </div>
    </div>
  </div>
</header>
