
<?php 
 
session_start();
echo("<script>console.log('".$_SESSION['DonateOrg']."');</script>");
echo("<script>console.log('".session_id()."');</script>");
$error = array();

include('config.php');
$db = mysqli_connect ($db_host, $db_user, $db_password, $db_name) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());


if(isset($_POST['Add']))
	{
    
   
if(empty($_POST['FoodItem']))
		{
			$error['Food'] = 'Required field';
		}
    
    else if(empty($_POST['Quantity']))
		{
			$error['Quantity'] = 'Required field';
		}

else {

   $organization = mysqli_real_escape_string($db, $_SESSION['DonateOrg']);
    echo("<script>console.log('".$organization."');</script>");
    $itemname = mysqli_real_escape_string($db, $_POST['FoodItem']);
    $itemquantity = mysqli_real_escape_string($db, $_POST['Quantity']);
    
    
    	$sql = "INSERT INTO items (
						item_id,
						item_donator,
						item_name,
						item_quantity,
						item_claimed,
                        item_claimedby
                        
					) VALUES (
						null,
						'$organization',
						'$itemname',
						'$itemquantity',
						0,
                        null
					
					)";
			mysqli_query($db, $sql);

        $feedback = 'Item added! Add another or click back';
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
              <h4>
           <?php echo $feedback; ?></h4>  
           <form method="post" action="donateadd.php" class="form-horizontal">
               <p class="question">Enter Item Name and Quantity</p> 
               
             <div class="col-lg-8">
                  <span class="text-danger"><?php echo $error['Food']; ?></span>
                 <input class="big-input" type="text" name="FoodItem" value="" placeholder="Food Item Name">
                
               </div>
             
               
              
               
             <div class="col-lg-8">
                  <span class="text-danger"><?php echo $error['Quantity']; ?></span>
                 <input class="big-input" type="number" name="Quantity" value="" placeholder="Item Quantity">
                
               </div>
              
              
         
                  <div class="form-group">
                      
                     
      <div class="col-lg-8 col-lg-offset-2 buttons">
        <button onclick="location.href='welcomedonator.php'" type="reset" class="btn btn-default">Back</button>
        <input type="submit" name="Add" value="Add" class="btn btn-primary">
          
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
