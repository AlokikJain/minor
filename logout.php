<?php
 require_once("pages/layout.php");

 // deleting the memory
 $_SESSION['id'] = '';
 $_SESSION['name'] = '';

 // still not satisfied, will destroy the whole session of client
 session_destroy();

 echo("Successfully logout");
 
 // for a new start
 echo '<script>location.href="index.php";</script>';
?>