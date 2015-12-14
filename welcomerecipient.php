
<?php 
session_start();
 echo("<script>console.log('".session_id()."');</script>");
echo("<script>console.log('".$_SESSION['ReceiveOrg']."');</script>");
$error = array();

$recipientorg = $_SESSION['ReceiveOrg'] ;

include('config.php');
$db = mysqli_connect ($db_host, $db_user, $db_password, $db_name) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());

if (isset($_GET['claim'])) {
    
$id = $_GET['item_id'];
    

         echo("<script>console.log('".$id."');</script>"); 
    echo("<script>console.log('".$recipientorg."');</script>");
    
   $sql = "UPDATE items SET item_claimed=1, item_claimedby='$recipientorg' WHERE item_id=$id" ;
    
   $result = mysqli_query($db, $sql) or die('Query failed: ' . mysqli_error($db));
    
                         
    $feedback = 'Items claimed! Check your donation report to confirm all claimed items';
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

<h3>Welcome, <?php echo $_SESSION['ReceiveOrg']?></h3>
        
         
        
      <a href="donationreport.php" class="btn btn-primary">Generate Donation Report</a>

        <h2>Items to be claimed  </h2>
        <h4> <span class="text-center"><?php echo $feedback; ?></span><br></h4>
         
        <table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Item Name</th>
      <th>Quantity</th>
     
      <th>Donated By</th>
        <th>Claim?</th>
    </tr>
  </thead>
  <tbody>
      
      <?php
    
    
    $sql = "SELECT item_id, item_name, item_claimed, item_quantity, item_donator FROM items ORDER BY item_id desc";
				$result = mysqli_query($db, $sql) or die('Query failed: ' . mysqli_error($db));

            while ($row = mysqli_fetch_assoc($result)) {

                if($row['item_claimed'] == 0) {
                    
                    
            
                    
                    
                
                	echo "
                    <tr>
                    <td>{$row['item_name']}</td>
                    <td>{$row['item_quantity']}</td> 
                  
                    <td>{$row['item_donator']}</td>   
                     <td><a href='welcomerecipient.php?claim=true&item_id={$row['item_id']}' class='text-success'>Claim</a></td>   
                    </tr>"    ;
                
            }
                
              
                
            }
    
    ?>
      
      
      
      

    
  </tbody>
</table> 
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    

    
    
    
    
   

</body>
    
    
  


</html>
