<?php 
  include "cv_admin/controller.php";
  include "cv_admin/response.php";

  $myFunction = new CV();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Fajar - CV</title>
  
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="assets/css/font-awesome.min.css" rel="stylesheet" media="screen">
  <link href="assets/css/animate.css" rel="stylesheet">
  <link href="assets/css/magnific-popup.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/css.css">
  <link href="assets/css/responsive.css" rel="stylesheet">
  <link rel="shortcut icon" href="assets/img/1.jpg">
  <link rel="stylesheet" href="assets/css/aos.css">

</head>

<body>

  <section id="home" class="tt-fullHeight">
    <div class="intro" data-aos="zoom-in" data-aos-delay="100" data-aos-duration="2000">
      <div class="intro-sub">Fajar Subeki</div>
      <h1>Android <span>Developer</span></h1>

      <div class="social-icons">
        <ul class="list-inline">
          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#"><i class="fa fa-instagram"></i></a></li>
          <li><a href="#"><i class="fa fa-google"></i></a></li>
          <li><a href="#"><i class="fa fa-github"></i></a></li>
        </ul>
      </div>
    </div>
  </section>

  <header class="header">
    <nav class="navbar navbar-custom" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#custom-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <div class="collapse navbar-collapse" id="custom-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#education">Education</a></li>
            <li><a href="#skills">Skills</a></li>
            <li><a href="#portofolio">Portofolio</a></li>
            <li><a href="#exprerience">Experience</a></li>
            <li><a href="#awards">Awards</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <section id="about" class="about-section section-padding">
    <div class="container">
      <h2 class="section-title" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="1000">About Me</h2>

      <div class="row">
        <div class="col-md-4">
          <?php 
                $about = $myFunction->select("tb_about");
                foreach($about as $about2)
                {
            ?>
          <div class="biography">
          <div class="card card-cascade">
            <div class="view overlay" data-aos="fade-up-right" data-aos-delay="400" data-aos-duration="1000">
              <img src="cv_admin/image/<?php echo $about2['foto']; ?>" class="img-fluid" alt="">
              <a>
                <div class="mask rgba-green-slight"></div>
              </a>
            </div>
            <div class="card-body text-center">
              <br>
              <h4 class="card-title"><strong><?php echo $about2['nama']; ?></strong></h4>
              <p><?php echo $about2['bagian']; ?></p>
            </div>
            <div class="card-body">
              <ul>
                <li><strong>Date Of Birth : </strong> <?php echo $about2['ttl'] ?></li>
                <li><strong>Address : </strong> <?php echo $about2['alamat'] ?></li>
                <li><strong>Nationality : </strong> <?php echo $about2['negara']; ?></li>
                <li><strong>Phone : </strong> <?php echo $about2['no_hp']; ?></li>
                <li><strong>Email : </strong> <?php echo $about2['email']; ?></li>
              </ul>
            </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="short-info" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
            <h3>What I Do ?</h3>
            <p><?php echo $about2['isi']; ?></p>

            <ul class="list-check">
                <li>Web Devoloper</li>
                <li>Design Web</li>
                <li>Debugger</li>
                <li>Program Tester</li>
                <li>Android Devoloper</li>
                <li>Database Analysctic</li>
              </ul>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>

  <section id="education">
    <div class="container">
      <h2 class="section-title" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="1000">Education</h2>
        <div class="row education">
            <?php 
                $education = $myFunction->select("tb_education");
                foreach($education as $education2)
                {
            ?>
            <div class="col-md-3" data-aos="fade-up-left" data-aos-delay="300" data-aos-duration="1000">
              <div class="box">
                <p class="name" style="font-size: 20px; color: #fff; font-weight: bold;"><?php echo $education2['nama_instan']; ?></p>
                <p class="nama"><?php echo $education2['nama_edu'] ?></p>
                <p class="nama"><?php echo $education2['tahun']; ?></p>
             </div>
            </div>
            <?php } ?>
        </div>
    </div>
  </section>

  <section id="skills" class="skills-section section-padding">
    <div class="container">
      <h2 class="section-title" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="1000">Skills</h2>
        <div class="row">
          <?php 
                $skill = $myFunction->select("tb_skill");
                foreach($skill as $skill2)
                {
            ?>
          <div class="col-md-6" data-aos="fade-up-right" data-aos-delay="500" data-aos-duration="1000">
            <div class="skill-progress">
              <div class="skill-title"><h3><?php echo $skill2['nama_skil'] ?></h3></div> 
              <div class="progress">
                <div class="progress-bar six-sec-ease-in-out" role="progressbar" aria-valuenow="<?php echo $skill2['percent'] ?>" aria-valuemin="0" aria-valuemax="100" ><span><?php echo $skill2['percent'] ?>%</span>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>

        <div class="skill-chart text-center" data-aos="fade-up" data-aos-delay="500" data-aos-duration="1000">
          <h3 style="font-weight: bold;">More Skills</h3>
        </div>

        <div class="row more-skill text-center" data-aos="fade-down" data-aos-delay="500" data-aos-duration="1000">
          <div class="col-xs-12 col-sm-4 col-md-2">
            <div class="chart" data-percent="91" data-color="e74c3c">
              <span class="percent"></span>
                <div class="chart-text">
                  <span>Leadership</span>
                </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-2">
            <div class="chart" data-percent="70" data-color="e74c3c">
              <span class="percent"></span>
                <div class="chart-text">
                  <span>Creativity</span>
                </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-2">
            <div class="chart" data-percent="85" data-color="e74c3c">
              <span class="percent"></span>
                <div class="chart-text">
                  <span>Management</span>
                </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-2">
            <div class="chart" data-percent="80" data-color="e74c3c">
              <span class="percent"></span>
                <div class="chart-text">
                  <span>Marketing</span>
                </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-2">
            <div class="chart" data-percent="95" data-color="e74c3c">
              <span class="percent"></span>
                <div class="chart-text">
                  <span>Motivation</span>
                </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-2">
            <div class="chart" data-percent="90" data-color="e74c3c">
              <span class="percent"></span>
                <div class="chart-text">
                  <span>Diligently</span>
                </div>
            </div>
          </div>
        </div>

      </div>
  </section>

  <section id="portofolio" class="work-section section-padding">
    <div class="container">
      <h2 class="section-title" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="1000">Portofolio</h2>
      <div class="row">
        <div class="grid" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-delay="400" data-aos-duration="1000">
           <?php 
                $porto = $myFunction->select("tb_portofolio");
                foreach($porto as $porto2)
                {
            ?>  
          <div class="portfolio-item col-xs-12 col-sm-4 col-md-3">
              <div class="portfolio-bg">
                <div class="portfolio">
                  <div class="tt-overlay"></div>
                  <div class="links text-center">
                    <a class="image-link" href="cv_admin/image/<?php echo $porto2['gambar_porto']; ?>"><i class="fa fa-search-plus"></i></a>            
                  </div>
                  <img src="cv_admin/image/<?php echo $porto2['gambar_porto']; ?>" alt="image"> 
                  <div class="portfolio-info">
                    <h3><?php echo $porto2['judul_porto'] ?></h3>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
        </div>
      </div>
    </div>
  </section>

  <section id="exprerience">
    <div class="container">
      <h2 class="section-title" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="1000">Experience</h2>
        <div class="row" data-aos="flip-right" data-aos-easing="ease-out-cubic" data-aos-delay="400" data-aos-duration="1000">
          <?php 
                $exprerience = $myFunction->select("tb_experience");
                foreach($exprerience as $exprerience2)
                {
            ?>  
          <div class="col-md-4">
            <div class="card">
              <img class="card-img-top img-thumbnail" src="cv_admin/image/<?php echo $exprerience2['foto_exper']; ?>">
              <div class="card-body">
                <br>
                <h3 class="card-title text-center"><?php echo $exprerience2['tahun']; ?></h3>
                <p class="card-text text-center" style="font-size: 20px;"><?php echo $exprerience2['judul_exper']; ?></p>
              </div>
              
            </div>
          </div>
          <?php } ?>
        </div>

    </div>
  </section>
  <br>
  <br>
  <section id="awards">
    <div class="container">
      <h2 class="section-title" data-aos="zoom-in" data-aos-delay="400" data-aos-duration="1000">Awards</h2>
      <div class="row">
        <ul class="fa-ul mb-0" data-aos="fade-up-left" data-aos-delay="500" data-aos-duration="1000">
            <?php 
              $award = $myFunction->select("tb_award");
              foreach($award as $awards)
              {

             ?>
            <li>
              <h4><i class="fa-li fa fa-trophy text-warning"></i>
              <strong><?php echo $awards['judul']; ?></strong>
            </h4>
            </li>
            <br>
            <?php } ?>
             
          </ul>
      </div>
    </div>
  </section>

  <section id="contact" class="contact-section section-padding">
      <div class="container">
        <h2 class="section-title" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="1000">Contact Me</h2>

        <div class="row" data-aos="fade-up-right" data-aos-delay="400" data-aos-duration="1000">
          <div class="col-md-6">
            <div class="contact-form">
              <strong>Send me a message</strong>
              <form name="contact-form" method="post" action="assets/php/sendemail.php">
                <div class="form-group">
                  <label for="InputName1">Name</label>
                  <input type="text" name="name" class="form-control" id="InputName1" required="">
                </div>
                <div class="form-group">
                  <label for="InputEmail1">Email</label>
                  <input type="email" name="email" class="form-control" id="InputEmail1" required="">
                </div>
                <div class="form-group">
                  <label for="InputSubject">Subject</label>
                  <input type="text" name="subject" class="form-control" id="InputSubject">
                </div>
                <div class="form-group">
                  <label for="InputTextarea">Message</label>
                  <textarea name="message" class="form-control" id="InputTextarea" rows="5" required=""></textarea>
                </div>

                <button type="submit" name="submit" class="btn btn-danger">Send Message</button>
            </div>
          </div>
        </form>

          <?php 
                $about = $myFunction->select("tb_about");
                foreach($about as $about2)
                {
            ?>
          <div class="col-md-6">
            <div class="row center-xs">
              <div class="col-sm-6">
                <i class="fa fa-map-marker"></i>
                <address>
                  <strong><?php echo $about2['alamat']; ?><br>
                </address>
              </div>

              <div class="col-sm-6">
                <i class="fa fa-mobile"></i>
                <div class="contact-number">
                  <strong>Phone Number</strong><br>
                  <?php echo $about2['no_hp']; ?>
                </div>
              </div>
            </div>
            <?php } ?>

          <div class="row">
            <div class="col-sm-12">
              <div class="location-map">
                <div id="mapCanvas" class="map-canvas"></div>
              </div>
            </div>
          </div>

          </div>
        </div>
      </div>
    </section>

  <footer class="footer-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="copyright text-center">
            <p>&copy; Fajar Subeki 2018</p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <div class="scroll-up">
    <a href="#home"><i class="fa fa-angle-up"></i></a>
  </div>

  
  <script src="assets/js/jquery.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.sticky.js"></script> <!-- untuk navbar diam ditempat -->
  <script src="assets/js/wow.min.js"></script> <!-- animasi  -->
  <script src="assets/js/jquery.countTo.js"></script> <!-- // untuk menghitung persentase skill -->
  <script src="assets/js/jquery.inview.min.js"></script> <!-- menjalankan persentase skill -->
  <script src="assets/js/jquery.easypiechart.js"></script> <!-- membuat persentase bulat berjalan  -->
  <script src="assets/js/jquery.shuffle.min.js"></script> <!-- untuk menzoom gambar -->
  <script src="assets/js/jquery.magnific-popup.min.js"></script> <!-- untuk menzoom gambar -->
  <script src="assets/js/jquery.fitvids.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/aos.js"></script>
</body>

<script>
  AOS.init();
</script>
</html>
