<?php
    session_start();
    session_destroy();
    header("Location:superAdmin-Login.php");
?>