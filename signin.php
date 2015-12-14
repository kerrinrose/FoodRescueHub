

   <?php 
session_start();
 echo("<script>console.log('".session_id()."');</script>");
 
include('config.php');
$db = mysqli_connect ($db_host, $db_user, $db_password, $db_name) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());

   

if(isset($_POST['Login']))
    
	{
    
    $error = array();
    
    if(empty($_POST['Email'])) {
        
     $error['Email'] = 'Required field';
        
    }
    
    if(empty($_POST['Password']))
	{
		$error['Password'] = 'Required field';
	} 
    
    
    if(!empty($_POST['Email']) && !empty($_POST['Password'])) {
        
        
      $sql = "SELECT org_id, orgname, orgtype, orgemail FROM users WHERE 
					orgemail = '{$_POST['Email']}' AND orgpass = sha1('{$_POST['Password']}') 
				LIMIT 1";  
        
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result); 
         
       echo("<script>console.log('org id:".$row['org_id']."');</script>");  
     
    }
    
    
    
    if(!$row['org_id'])
		{
			$error['user'] = 'Invalid email and/or password';
		}
    
    
    if(sizeof($error) == 0) {
        
        if($row['orgtype'] == 'donate') {
        
        $_SESSION['DonateOrg'] = $row['orgname'];
        
         echo("<script>location.href='welcomedonator.php'</script>") ; 
        
        }
        
         if($row['orgtype'] == 'receive') {
           $_SESSION['ReceiveOrg'] = $row['orgname'];
        
         echo("<script>location.href='welcomerecipient.php'</script>") ;   
         }
        
    }

}



?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Food Rescue Hub</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    </style>
    
    
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                
                
                <a class="navbar-brand" href="index.php">Food Rescue Hub</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

       <div class="row">
            <div class="col-lg-6 col-lg-offset-3 text-center">
                <h3>Login to Food Rescue Hub</h3>
           <form method="post" action="signin.php" class="form-horizontal">
               
                 <div class="form-group">
  
      <div class="col-lg-8 text-left">
          <span class="text-danger text-left"><?php echo $error['Email']; ?></span>
        <input type="text" class="big-input" name="Email" placeholder="Email">
      </div>
    </div>
    <div class="form-group">
  
      <div class="col-lg-8 text-left">
          <span class="text-danger"><?php echo $error['Password']; ?></span>
        <input type="password" class="big-input" name="Password" placeholder="Password">
       
      </div>
    </div>
             
              
                   <span class="text-danger"><?php echo $error['user']; ?></span>
                  <div class="form-group">
      <div class="col-lg-8 col-lg-offset-2 buttons">
        <button onclick="history.go(-1);" type="reset" class="btn btn-default">Cancel</button>
        <input type="submit" name="Login" value="Login" class="btn btn-primary">
      </div>
    </div>
               
               
</form>
      

            </div>
        </div>

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    

    
    
    
    
   

</body>
    
    
  


</html>
