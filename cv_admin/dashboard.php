    <!-- Author Putay Ganteng -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CV - Admin</title>
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/sweetalert2.min.js"></script>
    <?php 
        include "controller.php";
            
        $myFunction = new CV();
        session_start();
        
        // Mengecek user sudah login atau belum
        $response = $myFunction->sessionCheck();
        if($response == "false"){
            header("Location:index.php");
        }

        // Penggunaan syntax logout
        if(isset($_GET['logout'])){
            $myFunction->logout();
        }
        $barangCount = new CV();
        $distributorCount = new CV();
        // Mengambil jumlah data barang di database
        $rowsBarang  = $barangCount->getCountRows("tb_about");
        // Mengambil jumlah data distributor yang ada di database
        
    ?>

</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
<div class="container">
    <div class="navbar-header">

        <!-- Collapsed Hamburger -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Branding Image -->
        <a class="navbar-brand" href="">
            Admin - CV
        </a>
    </div>


    

    <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <!-- Left Side Of Navbar -->
        <ul class="nav navbar-nav">
            &nbsp;
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
                <li>
                   <a href="dashboard.php?logout" onclick="return confirm('Yakin')">Logout</a> 
                </li>
            
        </ul>
    </div>
</div>
</nav>

<style>
    .active{
            background: linear-gradient(90deg,#5AEE4B,#1ABC9C);
        }
    .shadow{
            box-shadow: 2px 2px 10px rgba(0,0,0,.2);
    }
</style>

<div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="list-group">
                    <a class="list-group-item active" href="" id="item-dashboard">Dashboard</a>
                    <a class="list-group-item" href="?page=about" id="item-about">About Me Data</a>
                    <a class="list-group-item" href="?page=education" id="item-education">Education Data</a>
                    <a class="list-group-item" href="?page=skills" id="item-skills">Skills Data</a>
                    <a class="list-group-item" href="?page=portofolio" id="item-portofolio">Portofolio Data</a>
                    <a class="list-group-item" href="?page=experience" id="item-experience">Experience Data</a>
                    <a class="list-group-item" href="?page=awards" id="item-awards">Awards Data</a>
                    <a class="list-group-item" href="?page=contact" id="item-contact">Contact Data</a>
                </div>
                <?php include "response.php"; ?>
            </div>
            <div class="col-sm-9">
                <?php 
                    @$page = $_GET['page'];
                    if(!$page){
                        include "dashboard_inc.php";
                    }else if($page == "about"){
                        include "about.php";
                    }else if($page == "updateAbout"){
                        include "updateAbout.php";
                    }else if($page == "education"){
                        include "education.php";
                    }else if($page == "addEducation"){
                        include "addEducation.php";
                    }else if($page == "updateEducation"){
                        include "updateEducation.php";
                    }else if($page == "skills"){
                        include "skills.php";
                    }else if($page == "addSkills"){
                        include "addSkills.php";
                    }else if($page == "updateSkill"){
                        include "updateSkill.php";
                    }else if($page == "portofolio"){
                        include "portofolio.php";
                    }else if($page == "addPortofolio"){
                        include "addPortofolio.php";
                    }else if($page == "updatePortofolio"){
                        include "updatePortofolio.php";
                    }else if($page == "experience"){
                        include "experience.php";
                    }else if($page == "addExperience"){
                        include "addExperience.php";
                    }else if($page == "updateExperience"){
                        include "updateExperience.php";
                    }else if($page == "awards"){
                        include "awards.php";
                    }else if($page == "addAwards"){
                        include "addAwards.php";
                    }else if($page == "updateAwards"){
                        include "updateAwards.php";
                    }else if($page == "contact"){
                        include "contact.php";
                    }
                 ?>
            </div>
        </div>
    </div>
    

</body>
</html>

