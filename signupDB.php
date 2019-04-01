<?php

if (isset($_POST['submit'])) {
    include_once 'dbh.php';
    $first = mysqli_real_escape_string( $dsn, $_POST ['firstname']);
    
    
} else {
    header ("Location: /signup.php");
    exit();
}

?>

