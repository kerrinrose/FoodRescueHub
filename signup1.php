

   <?php 
session_start();
 echo("<script>console.log('".session_id()."');</script>");
 
   

if(isset($_POST['Next']))
	{
    
    

    
    echo("<script>console.log('".$_POST['accountType']."');</script>");
  
    if($_POST['accountType'] == 'donate') {
        
      echo("<script>console.log('equals donate');</script>") ; 
       
        
        echo("<script>localStorage.accountType='donate';</script>") ; 
      $_SESSION['accountType'] = 'donate';
      echo("<script>console.log('".$_SESSION['accountType']."');</script>");  
        
    //couldn't get header(Location:#) to work?    
      echo("<script>location.href='signupdonate1.php'</script>") ; 
    }
    
    else {
        
     $_SESSION['accountType'] = 'receive';   
        echo("<script>location.href='signupreceive1.php'</script>") ; 
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
                
           <form method="post" action="signup1.php" class="form-horizontal">
               <h3>Okay, let's sign you up for the Food Rescue Hub.</h3> <h3> First, are you here to donate or receive food?</h3>
            
               <div class="form-group large">
    
      <div class="col-lg-8 col-lg-offset-2 text-left">
        <div class="radio">
          <label>
            <input type="radio" name="accountType" id="donate" value="donate" checked="">
My organization would like to donate food
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="accountType" id="receive" value="receive">
My organization would like to receive food        </label>
        </div>
      </div>
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
