<?php
session_start();
require_once "classes/sign_up.php";
$new = new sign_up;

if (isset($_POST['submit'])) {
 
      $new->signup(); 
  header('location:index.php?registersuccess'); 
} else {
    echo 'Sign-up failed';
}
?>


<!--// if (isset($_POST['submit']) && $statement) {
//    header('location:index.php?registersuccess');
//}
//-->


<html>
    <head>
        <meta charset="UTF-8">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <title></title>
    </head>
    <body>
        <section >
            <div >
                <h2> Sign Up </h2>    
                <form class = 'sign-up-form' action=" " method="POST" >
                    <input type = 'text' name ='Firstname' placeholder="firstname">
                    <input type = 'text' name ='Lastname' placeholder="lastname">
                    <input type = 'text' name ='Age' placeholder="age">
                    <input type = 'text' name ='Email' placeholder="email">
                    <input type = 'text' name ='Streetaddress' placeholder="address">
                    <input type = 'text' name ='Postcode' placeholder="Postcode">
                    <input type = 'text' name ='password' placeholder="password">

                    <button type ='submit' name="submit" >Submit</button>
                </form>
            </div>
        </section>
    </body>
</html>



