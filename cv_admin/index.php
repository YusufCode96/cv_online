<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootswatch.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Admin - Login</title>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/mdb.min.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <?php 

    	include "controller.php";
    	session_start();

    	$myFunction = new CV();
    	if(isset($_POST['getLogin'])){
    		$username = strtolower(htmlspecialchars($_POST['username']));
    		$password = htmlspecialchars($_POST['password']);

    		$response = $myFunction->login($username, $password);
    		if($response['response'] == "positive"){
    			$_SESSION['username'] = $username;
    			echo "<script>alert('Login Berhasil')
    			window.location.href='dashboard.php';</script>";
    		}
    	}

     ?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-offset-4">
				<div class="panel panel-success" style="margin-top: 150px;">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        <form method="post">
                            <div class="form-group">
                                <input type="text" name="username" required="" autofocus="" class="form-control" placeholder="Username">  
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" required="" class="form-control" placeholder="Password">  
                            </div>
                            <button type="submit" class="btn btn-lg btn-success btn-block" name="getLogin">Login <i class="fa fa-sign-in"></i></button>
                        </form>
                    </div>
                    
                </div>
			</div>
		</div>
	</div>

	<script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/mdb.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/sweetalert2.min.js"></script>
</body>
</html>