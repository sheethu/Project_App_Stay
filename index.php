<?php
/**
    * Admin Registration for App Stay
    *
    * Details about the Hotels and their specials
    *
    * LICENSE: Root5 
    *
    * @copyright  Copyright (c) 2005-2015 Root5  (http://www.root5solutions.com)
    * @license    http://www.root5.com/license   BSD License
    * @version    1.0.0  
    * @since      File available since Release 1.0.0
    * @author     sheethal
    */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Login to App Stay</title>
    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/form-elements.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
</head>
<body>
<?php  
   require '/pages/core/inti.php';
	if(empty($_POST)===false)
	   {
            if(empty($_POST['form-username'])===true||($_POST['form-password']===true))
                {
?>
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <div class="alert alert-warning alert-dismissible" role="alert">All fields required</div>
<?php
                }
            else
                {
                    $username=$_POST['form-username'];
                    $password=$_POST['form-password'];
/**
    * get the passwordand username data from databae
    *
    * @param  variables  $username   admin username
    * @param  variables  $password   admin password
    * @return true or false
*/   
                    $login=login($username,$password);
                    if($login)
                        {
                            $str=$_POST['form-password'];
                            if(md5($str) == '32250170a0dca92d53ec9624f336ca24')
                                {
                           		   $_SESSION['active']=true; 
         	                       header('location:/root5/admin/template/pages/profile.php');
  			                    }
                        }
                    else
                        {
?>
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            <div class="alert alert-danger alert-dismissible" role="alert">Invalid username or password</div>
<?php
		                }
                }
        }
?>
    <!-- Top content -->
    <div class="top-content"> 	
        <div class="inner-bg">
            <div class="container">   
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 form-box">
                    	<div class="form-top">
                        	<div class="form-top-left">
                        		<h3>Login to App Stay</h3>
                            	<p>Enter your username and password to log on:</p>
                        	</div>
                        	<div class="form-top-right">
                        		<i class="glyphicon glyphicon-home"></i>
                        	</div>
                        </div>
                        <div class="form-bottom">
			                <form role="form" action="index.php" method="post" class="login-form">
			             	<div class="form-group">
			                 	<label class="sr-only" for="form-username">Username</label>
			                 	<input type="text" name="form-username" placeholder="Username..." class="form-username form-control" id="form-username">
			                </div>
			                <div class="form-group">
			                    <label class="sr-only" for="form-password">Password</label>
			                 	<input type="password" name="form-password" placeholder="Password..." class="form-password form-control" id="form-password">
			                </div>
			                     <button type="submit" class="btn">Sign in!</button>      
			                </form>
		                </div>
                    </div>
                </div>
            </div>
        </div>            
    </div> 
    <!-- Javascript -->
    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.backstretch.min.js"></script>
    <script src="assets/js/scripts.js"></script>        
    <!--[if lt IE 10]>
    <script src="assets/js/placeholder.js"></script>
    <![endif]-->
</body>
</html>