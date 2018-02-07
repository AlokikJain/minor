<?php
 require("pages/layout.php");
 $_SESSION['id'] = '';
 $_SESSION['name'] = '';
 session_destroy();
 echo("Successfully logout");
 echo '<script>location.href="index.php";</script>';
?>