
<?php 
session_start();
 echo("<script>console.log('".session_id()."');</script>");
echo("<script>console.log('".$_SESSION['DonateOrg']."');</script>");
$error = array();

include('config.php');
$db = mysqli_connect ($db_host, $db_user, $db_password, $db_name) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());

if (isset($_GET['remove'])) {
    
$id = $_GET['item_id'];
    

         echo("<script>console.log('".$id."');</script>"); 
    echo("<script>console.log('".$recipientorg."');</script>");
    
   $sql = "DELETE FROM items WHERE item_id=$id" ;
    
   $result = mysqli_query($db, $sql) or die('Query failed: ' . mysqli_error($db));
    
                         
    $feedback = 'Item Removed';
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

<h3>Welcome, <?php echo $_SESSION['DonateOrg']?></h3>
        
    <a href="donateadd.php" class="btn btn-primary">Donate Food Items</a>
            <a href="deliveryreport.php" class="btn btn-primary">Generate Delivery Report</a>

        <h2>Items</h2>
        
        
        <table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Item Name</th>
      <th>Quantity</th>
      
      <th>Claimed?</th>
      <th>Claimed By</th>
       
    <th>Remove?</th>
    </tr>
  </thead>
  <tbody>
      
      <?php
    
    
    $sql = "SELECT item_id, item_name, item_quantity, item_donator, item_claimed, item_claimedby FROM items ORDER BY item_id desc";
				$result = mysqli_query($db, $sql) or die('Query failed: ' . mysqli_error($db));

            while ($row = mysqli_fetch_assoc($result)) {

                if($row['item_donator'] == $_SESSION['DonateOrg']) {
                    
                    
                    if($row['item_claimed'] == 0) {
                        
                     $claimed = 'No'; 
                    $claimedby = '--';  
                        
                        $remove = "<a href='welcomedonator.php?remove=true&item_id={$row['item_id']}' class='text-danger'>X</a>";
                    }
                    
                    else {
                        
                         $claimed = 'Yes'; 
                        $claimedby = $row['item_claimedby'];
                        $remove = "Claimed Items Cannot Be Removed";
                    }
                    
                    
                
                	echo "
                    <tr>
                    <td>{$row['item_name']}</td>
                    <td>{$row['item_quantity']}</td> 
                   
                     <td>".$claimed."</td> 
                    <td>".$claimedby."</td> 
                      
                     <td>$remove</td>   
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
