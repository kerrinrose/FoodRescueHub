
<?php 
session_start();
 echo("<script>console.log('".session_id()."');</script>");
$error = array();


if(isset($_POST['Next']))
	{
   
if(empty($_POST['ReceiveOrgPassword']))
		{
			$error['Name'] = 'Required field';
		}

else {
    

    
 $_SESSION['ReceiveOrgPassword'] =  $_POST['ReceiveOrgPassword'];  
     echo("<script>location.href='signupreceive5.php'</script>") ; 
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
                
           <form method="post" action="signupreceive4.php" class="form-horizontal">
               <p class="question">And lastly, a password.</p> 
               
                        <div class="col-lg-8">
                  <span class="text-danger"><?php echo $error['Name']; ?></span>
                 <input class="big-input" type="password" name="ReceiveOrgPassword" value="" placeholder="Password">
                
               </div>
             
              
         
                  <div class="form-group">
      <div class="col-lg-8 col-lg-offset-2 buttons">
        <button onclick="history.go(-1);" type="reset" class="btn btn-default">Back</button>
        <input type="submit" name="Next" value="Next" class="btn btn-primary">
      </div>
    </div>
               
               
</form>
      

            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    

    
    
    
    
   

</body>
    
    
  


</html>
