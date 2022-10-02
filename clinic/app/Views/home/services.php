<?= $this->include('home/inc/top') ?>
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
<section class="section latest-news-area blog-list">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-12 col-12">

        <?php foreach ($services as $sr): ?>
          <?php $encrypted_id = base64_encode($sr['sid'] . $secret);?>
          <div class="single-news">
            <div class="row">
              <div class="col-lg-5 col-md-5 col-12 pr-0">
                <div class="image">
                  <a href="blog-single-sidebar.html"><img src="assets/images/blog/blog1.jpg" alt="#"></a>
                </div>
              </div>
              <div class="col-lg-7 col-md-7 col-12  pl-0">
                <div class="content">
                  <h2 class="title"><a href="<?=base_url()?>/services/view/<?=$encrypted_id?>"><?=$sr['description'] ?></a>
                  </h2>
                  <p><?=$sr['content']?></p>
                    <ul class="meta-info">
                      <li>
                        <a href="javascript:void(0)"><img src="assets/images/blog/comment1.jpg" alt="#">
                          Alice Williams</a>
                        </li>
                        <li>
                          <a href="javascript:void(0)">08 Mar 2023 </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
            <div class="pagination left blog-grid-page">
              <ul class="pagination-list">
                <?php if ($pager) :?>
                  <?php $pagi_path= $link .'/services/'; ?>
                  <?php $pager->setPath($pagi_path); ?>
                  <?= "<li>". $pager->links() . "</li>"?>
                <?php endif ?>
              </ul>
            </div>

          </div>
          <aside class="col-lg-4 col-md-12 col-12">
            <div class="sidebar blog-grid-page">

              <div class="widget search-widget">
                <h5 class="widget-title">Search This Site</h5>
                <form action="#">
                  <input type="text" placeholder="Search Here...">
                  <button type="submit"><i class="lni lni-search-alt"></i></button>
                </form>
              </div>


              <div class="widget popular-feeds">
                <h5 class="widget-title">Popular Feeds</h5>
                <div class="popular-feed-loop">
                  <div class="single-popular-feed">
                    <div class="feed-desc">
                      <a class="feed-img" href="blog-single-sidebar.html">
                        <img src="assets/images/blog/sidebar-img1.jpg" alt="#">
                      </a>
                      <h6 class="post-title"><a href="blog-single-sidebar.html">Your Affect How Well
                        Your Mind Functions</a></h6>
                        <span class="time"><i class="lni lni-calendar"></i> 05th Nov 2023</span>
                      </div>
                    </div>
                    <div class="single-popular-feed">
                      <div class="feed-desc">
                        <a class="feed-img" href="blog-single-sidebar.html">
                          <img src="assets/images/blog/sidebar-img2.jpg" alt="#">
                        </a>
                        <h6 class="post-title"><a href="blog-single-sidebar.html">What Know About Pain
                          Can Hurt Everyone</a></h6>
                          <span class="time"><i class="lni lni-calendar"></i> 24th March 2023</span>
                        </div>
                      </div>
                      <div class="single-popular-feed">
                        <div class="feed-desc">
                          <a class="feed-img" href="blog-single-sidebar.html">
                            <img src="assets/images/blog/sidebar-img3.jpg" alt="#">
                          </a>
                          <h6 class="post-title"><a href="blog-single-sidebar.html">We Are Provide Update
                            Nano Technology Care</a></h6>
                            <span class="time"><i class="lni lni-calendar"></i> 30th Jan 2023</span>
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="widget categories-widget">
                      <h5 class="widget-title">Categories</h5>
                      <ul class="custom">
                        <li>
                          <a href="javascript:void(0)">Finance</a>
                        </li>
                        <li>
                          <a href="javascript:void(0)">Marketing</a>
                        </li>
                        <li>
                          <a href="javascript:void(0)">Operations</a>
                        </li>
                        <li>
                          <a href="javascript:void(0)">Strategy</a>
                        </li>
                        <li>
                          <a href="javascript:void(0)">People</a>
                        </li>
                        <li>
                          <a href="javascript:void(0)">Jobs</a>
                        </li>
                      </ul>
                    </div>


                    <div class="widget popular-tag-widget">
                      <h5 class="widget-title">Popular Tags</h5>
                      <div class="tags">
                        <a href="javascript:void(0)">Operations</a>
                        <a href="javascript:void(0)">People</a>
                        <a href="javascript:void(0)">HR</a>
                        <a href="javascript:void(0)">Finance</a>
                        <a href="javascript:void(0)">Interview</a>
                        <a href="javascript:void(0)">Jobs</a>
                        <a href="javascript:void(0)">Business</a>
                        <a href="javascript:void(0)">Salary</a>
                        <a href="javascript:void(0)">Disease</a>
                        <a href="javascript:void(0)">Consult</a>
                        <a href="javascript:void(0)">Employee</a>
                      </div>
                    </div>


                    <div class="widget appointment-widget">
                      <h5 class="widget-title">Make An Appointment</h5>
                      <form class="form" action="#" method="POST">
                        <div class="form-box form-group">
                          <input type="text" name="name" class="form-control form-control-custom" placeholder="Your Name">
                        </div>
                        <div class="form-box form-group">
                          <input type="email" name="email" class="form-control form-control-custom" placeholder="Your Email">
                        </div>
                        <div class="form-box form-group">
                          <textarea name="#" class="form-control form-control-custom" placeholder="Your Message"></textarea>
                        </div>
                        <div class="button">
                          <button type="submit" class="btn">Submit</button>
                        </div>
                      </form>
                    </div>


                    <div class="widget help-call">
                      <h5 class="widget-title">Need Help?</h5>
                      <div class="inner">
                        <h3>
                          Online Help!
                          <span>+(123) 456-78-90</span>
                        </h3>
                      </div>
                    </div>

                  </div>
                </aside>
              </div>
            </div>
          </section>
          <?=$this->include('home/inc/end')?>
