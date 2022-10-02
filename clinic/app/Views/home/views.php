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

<section class="section blog-single">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-12 col-12">
        <div class="single-inner">
          <div class="post-thumbnils">
            <img src="assets/images/blog/blog-single.jpg" alt="#">
          </div>
          <div class="post-details">
            <div class="detail-inner">
              <h2 class="post-title">
                <a href="blog-single.html"><?=$views['description']?></a>
              </h2>

              <ul class="meta-info">
                <li>
                  <a href="javascript:void(0)"><img src="assets/images/blog/comment2.jpg" alt="#">
                    Alrado
                    Deyam</a>
                  </li>
                  <li>
                    <a href="javascript:void(0)"><i class="lni lni-timer"></i> <?=$views['created_at']?></a>
                  </li>
                </ul>
                <p><?=$views['content']?></p>
              </div>

              <div class="post-comments">
                <h3 class="comment-title"><span>Post comments</span></h3>
                <ul class="comments-list">
                  <li>
                    <div class="comment-img">
                      <img src="assets/images/blog/comment1.jpg" alt="img">
                    </div>
                    <div class="comment-desc">
                      <div class="desc-top">
                        <h6>Arista Williamson</h6>
                        <span class="date">19th May 2023</span>
                        <a href="javascript:void(0)" class="reply-link"><i class="lni lni-reply"></i>Reply</a>
                      </div>
                      <p>
                        Donec aliquam ex ut odio dictum, ut consequat leo interdum. Aenean nunc
                        ipsum, blandit eu enim sed, facilisis convallis orci. Etiam commodo
                        lectus
                        quis vulputate tincidunt. Mauris tristique velit eu magna maximus
                        condimentum.
                      </p>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="comment-form">
                <h3 class="comment-reply-title">Leave a comment</h3>
                <?php
                $isLoggedIn = session()->get('isLoggedIn');
                if($isLoggedIn):
                ?>
                <form action="#" method="POST">
                  <div class="row">
                    <div class="col-lg-6 col-12">
                      <div class="form-box form-group">
                        <input type="text" name="name" class="form-control form-control-custom" placeholder="Website URL">
                      </div>
                    </div>
                    <div class="col-lg-6 col-12">
                      <div class="form-box form-group">
                        <input type="text" name="email" class="form-control form-control-custom" placeholder="Your Name">
                      </div>
                    </div>
                    <div class="col-lg-6 col-12">
                      <div class="form-box form-group">
                        <input type="email" name="email" class="form-control form-control-custom" placeholder="Your Email">
                      </div>
                    </div>
                    <div class="col-lg-6 col-12">
                      <div class="form-box form-group">
                        <input type="text" name="name" class="form-control form-control-custom" placeholder="Phone Number">
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-box form-group">
                        <textarea name="#" class="form-control form-control-custom" placeholder="Your Comments"></textarea>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="button">
                        <button type="submit" class="btn">Post Comment</button>
                      </div>
                    </div>
                  </div>
                </form>
              <?php else: ?>
                Please Sign in to Comment
              <?php endif; ?>
              </div>
            </div>
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
                      Your
                      Mind Functions</a></h6>
                      <span class="time"><i class="lni lni-calendar"></i> 05th Nov 2023</span>
                    </div>
                  </div>
                  <div class="single-popular-feed">
                    <div class="feed-desc">
                      <a class="feed-img" href="blog-single-sidebar.html">
                        <img src="assets/images/blog/sidebar-img2.jpg" alt="#">
                      </a>
                      <h6 class="post-title"><a href="blog-single-sidebar.html">What Know About Pain
                        Can
                        Hurt Everyone</a></h6>
                        <span class="time"><i class="lni lni-calendar"></i> 24th March 2023</span>
                      </div>
                    </div>
                    <div class="single-popular-feed">
                      <div class="feed-desc">
                        <a class="feed-img" href="blog-single-sidebar.html">
                          <img src="assets/images/blog/sidebar-img3.jpg" alt="#">
                        </a>
                        <h6 class="post-title"><a href="blog-single-sidebar.html">We Are Provide Update
                          Nano
                          Technology Care</a></h6>
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
