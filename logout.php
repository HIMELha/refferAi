<?php
   session_start();
if(isset($_SESSION['name'])){

   $_SESSION['name'];
   session_destroy();
   header( 'location: index.php' );
}else{
    header( 'location: login.php' );
}

?>