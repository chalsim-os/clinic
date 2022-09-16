<section class="appointment">
  <div class="container">

    <div class="appointment-form">
      <div class="row">
        <div class="col-lg-6 col-12">
          <div class="appointment-title">
            <span>Appointment</span>
            <h2>Check Availability of schedule</h2>
            <p>Please feel welcome to contact our friendly reception staff with our medical team.
              Our clinic staff, Doctors and Nurses will receive Notification with your successful appointment</p>
            </div>
          </div>
        </div>
        <form method="post" action="<?=base_url()?>/check">
        <div class="row">

          <div class="col-lg-3 col-md-6 col-12 p-0">
            <div class="appointment-input">
              <!-- <label for="name"><i class="lni lni-user"></i></label> -->
              <input type="date" name="date" id="date" placeholder="date" required>
            </div>
          </div>
          <!-- <div class="col-lg-3 col-md-6 col-12 p-0">
            <div class="appointment-input">

              <input type="time" name="time" id="time" placeholder="prefer time" >
            </div>
          </div> -->
          <div class="col-lg-3 col-md-6 col-12 custom-padding">
            <div class="appointment-btn button">
              <button type="submit" name="check" class="btn">Check Schedule</button>
            </div>
          </div>

        </div>
        </form>
      </div>
    </div>
</section>
