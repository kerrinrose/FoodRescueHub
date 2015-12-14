 <?php
    session_start();
    $_SESSION['variable_name'] = 'string';

 echo("<script>console.log('".session_id()."');</script>");

    ?>

<h1>Hi <a href="sessiontest2.php">go to next page</a></h1>