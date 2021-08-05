<?php
    include_once '../config/db.php';
    $title= "Team | Nishka HMS";
    $page_name= "Team";
?>
<!DOCTYPE html>
<html>
  <?php
      include_once '../comps/head.php';
  ?>
  <body>
    <style>
      .container,
      hr {
        margin-top: 1rem;
      }
      .container {
        margin-bottom: 4rem;
      }
    </style>
    <?php
      include_once '../comps/header.php';
    ?>
    <main class="team">
      <div class="container">
        <h1 class="title" data-aos="fade-right" data-aos-duration="1100">Nishka HMS's family like team</h1>
        <div class="hero">
          <div class="content">
            <h2 class="team-desc" data-aos="fade-down" data-aos-duration="800">
              Team is the root or foundation of any system, <br />
              if you build nice team with amazing skills sets, enthusiastic
              <br />to learn new things, and respect every member <br />you can
              achieve anything.
            </h2>
            <img src="../media/team/team-hero.png" alt="Team Hero Image" />
          </div>
          <hr />
          <div class="team-list">
            <h2 class="team-name mt-5" data-aos="fade-right" data-aos-duration="1100">Experienced Doctors</h2>
            <div class="team-card-container">
              <div class="card-team" data-aos="fade-down" data-aos-duration="800">
                <div class="img">
                  <img src="https://static.developar.in/images/team/rajat.jpg" alt="Aakash" />
                </div>
                <div class="team-card-body">
                  <h3 class="name">Dr.Rajat Sharma</h3>
                  <h5 class="designation">Neurosurgen</h5>
                </div>
              </div>
              <div class="card-team" data-aos="fade-down" data-aos-duration="1000">
                <div class="img">
                  <img src="https://ionicframework.com/img/team/apply.jpg" alt="Aakash" />
                </div>
                <div class="team-card-body">
                  <h3 class="name">Dr.Mark Zuckerberg</h3>
                  <h5 class="designation">Physician</h5>
                </div>
              </div>
              <div class="card-team" data-aos="fade-down" data-aos-duration="1200">
                <div class="img">
                  <img src="https://ionicframework.com/img/team/apply.jpg" alt="Shubham Rastogi" />
                </div>
                <div class="team-card-body">
                  <h3 class="name">Dr.John Doe</h3>
                  <h5 class="designation">Cardiologist</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </body>
    
  <script>
    AOS.init();
  </script>
</html>
