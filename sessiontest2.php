<?php
    session_start();
    echo $_SESSION['variable_name'];

 echo("<script>console.log('".session_id()."');</script>");
    ?>