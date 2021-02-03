<?php 
  include "cv_admin/controller.php";
  include "cv_admin/response.php";

  $myFunction = new CV();

  if(!empty($_GET['id'])){
    $whereValueslogin=$_GET['id'];
  }else{
    $whereValueslogin=1;
  }

 ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<!-- Favicons -->
<link rel="shortcut icon" href="favicon.png">
<link rel="apple-touch-icon" href="apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="apple-touch-icon-114x114.png">

<title>Yusuf Putra - CV Online</title> 

<!-- Styles -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:500,600,700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,400i&display=swap" rel="stylesheet">
<link href="assetscv/css/style.css" rel="stylesheet" media="screen">
</head>
<body>
    <?php
          $about = $myFunction->selectWhere("tb_about",'id',$whereValueslogin);

          ?>
  <div class="animsition">   
    <div class="loader"><div class="spinner"><div class="double-bounce1"></div><div class="double-bounce2"></div></div></div>

    <!-- Content CLick Capture-->

    <div class="click-capture"></div>

    <!-- Sidebar Menu-->

    <div class="menu"> 
      <span class="close-menu icon-cross2 right-boxed"></span>
      <ul class="menu-list right-boxed">
        <li  data-menuanchor="page1">
          <a  href="#page1">Home</a>
        </li>
        <li  data-menuanchor="page2">
          <a href="#page2">Spesialisasi</a>
        </li>
        
        <li  data-menuanchor="page3">
          <a href="#page3">Pengalaman</a>
        </li>
        <li  data-menuanchor="page4">
          <a href="#page4">Projek</a>
        </li>
       
        <li  data-menuanchor="page5">
          <a href="#page5">Pengalaman Kerja</a>
        </li>
        <li  data-menuanchor="page6">
          <a href="#page6">Alat & Skill</a>
        </li>
      </ul>
      <div class="menu-footer right-boxed">
        <div class="social-list">
          <a href="" class="icon ion-social-twitter"></a>
          <a href="" class="icon ion-social-facebook"></a>
          <a href="" class="icon ion-social-googleplus"></a>
          <a href="" class="icon ion-social-linkedin"></a>
          <a href="" class="icon ion-social-dribbble-outline"></a>
        </div>
        <div class="copy">© Yusuf 2021. All Rights Reseverd</div>
      </div>
    </div>

    <!-- Navbar -->

    <header class="navbar navbar-fullpage boxed">
      <div class="navbar-bg"></div>
      <a class="brand" href="index.php">
        <img alt="" src="assetscv/images/brand.png">
        <div class="brand-info">
      
          <div class="brand-name"><?php echo $about['nama']; ?></div>
         
        </div>
      </a>

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
  
      <div class="contacts d-none d-md-block">
        <div class="contact-item">
        <?php echo $about['no_hp']; ?>
        </div>
        <div class="contact-item spacer">
          /
        </div>
        <div class="contact-item">
          <a href="<?php echo $about['email']; ?>"><?php echo $about['email']; ?></a>
        </div>
      </div>
  
    </header>
    <div class="copy-bottom white boxed">© <?php echo $about['nama']; ?> 2021.</div>
    <div class="social-list social-list-bottom boxed">
        <a href="" class="icon ion-social-twitter"></a>
        <a href="" class="icon ion-social-facebook"></a>
        <a href="" class="icon ion-social-googleplus"></a>
        <a href="" class="icon ion-social-linkedin"></a>
        <a href="" class="icon ion-social-dribbble-outline"></a>
      </div>
    <div class="pagepiling">
      <div data-anchor="page1" class="pp-scrollable text-white section section-1">
        <div class="scroll-wrap">
          <div class="section-bg" style="background-image:url(assetscv/images/bg/main.jpg);"></div>
          <div class="scrollable-content">
            <div class="vertical-centred">
              <div class="boxed boxed-inner">
                <div class="boxed">
                  <div class="container">
                    <div class="intro">
                      <div class="row">
                        <div class="col-md-8 col-lg-6">
                          <h3 class="text-white  wow fadeIn" data-wow-delay="0.1s"><span class="text-primary">Halo</span> Saya <?php echo $about['nama']; ?></h3>
                          <h1 class="display-2 text-white  wow fadeIn" data-wow-delay="0.1s"><span class="">Frontend Developer & <span class="text-primary">UIUX</span></h1>
                          
                            <div class="col-sm-12"  style="padding-top:15px;padding-left:5px"><button type="submit" class="btn"><span style="font-size:16px" class="icon ion-ios-download-outline"></span> Download CV</button></div>
                         
                          <!-- <a class="popup-youtube"  href="http://www.youtube.com/watch?v=0O2aH4XLbto"><span class="icon ion-ios-play"></span>Watch video </a> -->
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
      <div data-anchor="page2" class="pp-scrollable section section-2">
        <div class="scroll-wrap">
          <div class="scrollable-content">
            <!-- <div class="vertical-title text-white  d-none d-lg-block"><span>what I do</span></div> -->
            <div class="vertical-centred">
              <div class="boxed boxed-inner">
                <div class="boxed">
                  <div class="container">
                    <div class="intro">
                      <h2 class="title mb-5 pb-5"> <span class="text-primary"></span> Spesialisasi</h2>
                      <div class="row-specialization row">

                      <?php 
                          $spesialis = $myFunction->selectWhereAll("tb_specialis",'about_id',$whereValueslogin);
                      
                          foreach($spesialis as $spesialis2)
                          {
                      ?>
                        <div class="col-specialization col-md-6 col-lg-4">
                          <span class="icon-specialization <?php echo $spesialis2['icon_spes'];  ?>"></span>
                          <h4 class="text-uppercase"><?php echo $spesialis2['nama_spes'];   ?></h4>
                          <p><?php echo $spesialis2['desk_spes'];   ?></p>
                        </div>

                        <?php 

                          }
                       ?>
                      
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     
      <div data-anchor="page3" class="pp-scrollable section section-4">
        <div class="scroll-wrap">
          <div class="section-bg bg-about" style="background-image:url(assetscv/images/bg/about.jpg);"></div>
          <div class="scrollable-content">
            <!-- <div class="vertical-title text-white  d-none d-lg-block"><span>about us</span></div> -->
            <div class="vertical-centred">
              <div class="boxed boxed-inner">
                <div class="boxed">
                  <div class="container">
                    <div class="intro">
                      <div class="row align-items-center">
                        <div class="col-lg-6 offset-xl-1">
                          <div class="experience-box">
                            <div class="experience-content">
                              <div class="experience-number"><?php echo $about['tahun_exper'];  ?></div>
                              <div class="experience-info"><div>Tahun<br>Pengalaman<br>Kerja</div></div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-5 mt-5 mt-xl-0">
                          <h2 class="title"> <span class="text-primary">Diagram</span> Skill</h2>
                        
                          <div class="progress-bars">
                            <?php 
                                  $skill = $myFunction->selectWhereAll("tb_skill",'about_id',$whereValueslogin);
                              
                                  foreach($skill as $skill2)
                                  {
                              ?>
                            <div class="clearfix">
                              <div class="number float-left"><?php echo $skill2['nama_skil'];  ?></div>
                              <div class="number float-right"><?php echo $skill2['percent'];  ?></div>
                            </div>
                            <div class="progress">
                              <div class="progress-bar-wrp">
                                <div class="progress-bar" role="progressbar" style="width: <?php echo $skill2['percent'];  ?>%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </div>
                           <?php } ?>
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
      </div>
      <div data-anchor="page4" class="pp-scrollable text-white section section-5">
        <div class="scroll-wrap">
          <!-- <div class="bg-changer">
            <div class="section-bg" style="background-image:url(assetscv/images/bg/project1.jpg);"></div>
            <div class="section-bg" style="background-image:url(assetscv/images/bg/project2.jpg);"></div>
            <div class="section-bg" style="background-image:url(assetscv/images/bg/project3.jpg);"></div>
            <div class="section-bg" style="background-image:url(assetscv/images/bg/project4.jpg);"></div>
          </div> -->
          <div class="section-bg bg-about" style="background-image:url(assetscv/images/bg/blackbg.jpg);"></div>
          <div class="scrollable-content">
            <!-- <div class="vertical-title  d-none d-lg-block"><span>my works</span></div> -->
            <div class="vertical-centred">
              <div class="boxed boxed-inner">
                <div class="boxed">
                  <div class="container">
                    <div class="intro">
                      <div class="row">
                        <div class="col-md-12">
                        <?php 
                                  $project = $myFunction->selectWhereAll("tb_project",'about_id',$whereValueslogin);
                                   
                                  foreach($project as $project2)
                                  {
                              ?>
                          <div class="project-row">
                            <a class="active" href="project-detail.php?id=<?php echo $project2['id']  ?>">
                              <!-- <span class="project-number"><?php echo $i ?></span> -->
                              <h2 class="project-title"><?php echo $project2['nama_project'];  ?></h2>
                              <div class="project-category"></div>
                            </a>
                          </div>
                          <?php
                         
                            }
                          ?>
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
      <div data-anchor="page5" class="pp-scrollable section section-6">
        <div class="scroll-wrap">
          <div class="scrollable-content">
            <!-- <div class="vertical-title text-white d-none d-lg-block"><span>partners</span></div> -->
            <div class="vertical-centred">
              <div class="boxed boxed-inner">
                <div class="boxed">
                  <div class="container">
                    <div class="intro">
                       <h2 class="title text-white"><span class="text-primary">Pengalaman </span>Bekerja</h2>
                      <div class="row row-partners">
                      <?php 
                                  $perusahaan = $myFunction->selectWhereAll("tb_work",'about_id',$whereValueslogin);
                                   
                                  foreach($perusahaan as $perusahaan2)
                                  {
                        ?>
                        <div class="col-sm-6 col-md-6 col-xl-6 col-partner">
                          <div class="partner-inner"><img alt="" src="assetscv/images/perusahaan/<?php echo $perusahaan2['image']  ?>"></div>
                        </div>
                        <?php }  ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     
      <div data-anchor="page6" class="pp-scrollable section section-8">
        <div class="scroll-wrap">
          <div class="scrollable-content">
            <!-- <div class="vertical-title text-white d-none d-lg-block"><span>partners</span></div> -->
            <div class="vertical-centred">
              <div class="boxed boxed-inner">
                <div class="boxed">
                  <div class="container">
                    <div class="intro">
                       <h2 class="title text-white"><span class="text-primary">Alat</span> & Skill</h2>
                      <div class="row row-partners">
                        <?php 
                                  $tools = $myFunction->selectWhereAll("tb_tools",'about_id',$whereValueslogin);
                                   
                                  foreach($tools as $tools2)
                                  {
                        ?>
                        <div class="col-sm-6 col-md-4 col-xl-4 col-partner">
                          <div class="partner-inner"><img alt="" src="assetscv/images/tempat kerja/<?php echo $tools2['img']  ?>"></div>
                        </div>
                        <?php }  ?>
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
  </div>
<!-- jQuery -->

<script src="assetscv/js/jquery.min.js"></script>
<script src="assetscv/js/wow.min.js"></script>
<script src="assetscv/js/smoothscroll.js"></script>
<script src="assetscv/js/animsition.js"></script>
<script src="assetscv/js/jquery.validate.min.js"></script>
<script src="assetscv/js/jquery.magnific-popup.min.js"></script>
<script src="assetscv/js/owl.carousel.min.js"></script>
<script src="assetscv/js/jquery.pagepiling.min.js"></script>

<!-- Scripts -->
<script src="assetscv/js/scripts.js"></script> 
</body>
</html>