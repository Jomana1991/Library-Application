<?php
session_start();
require_once "classes/person.php";
$new = new person;

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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="style.css" rel="stylesheet" type="text/css"/>

        <title></title>
    </head>
    <body>
        <nav class ="navbar navbar-default navbar-fixed-top" role= "navigation">
            <div class ="container-fuild" >
                <div class =" navbar-header"> 
                    <button type ="button" class="navbar-toggle" data-toggle=" collapse" data-target="navbar-collapse-main">
                        <span class ="sr-only" > toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class ="collapse navbar-collapse" id="navbar-collapse-main">
                    <ul class="nav navbar-nav navbar-right">
                        <li> <a class="active" href = 'index.php'>Home</a> </li>
                        <li> <a href="#">About</a> </li>
                        <li> <a href="#">Contact us</a> </li>

                    </ul>
                </div>
            </div>
        </nav>

        <div id="home">
            <div class="landing-text">
                <h1> Sign up below!</h1>
                  <div  class="col-md-4 col-md-offset-4">
                        <form class="text-center border border-light p-5" action=" " method="POST" >
                            <input id="defaultLoginFormEmail" class="form-control mb-4" type = 'text' name ='Firstname' placeholder="firstname">
                            <input id="defaultLoginFormEmail" class="form-control mb-4" type = 'text' name ='Lastname' placeholder="lastname">
                            <input id="defaultLoginFormEmail" class="form-control mb-4" type = 'text' name ='Age' placeholder="age">
                            <input id="defaultLoginFormEmail" class="form-control mb-4" type = 'text' name ='Email' placeholder="email">
                            <input id="defaultLoginFormEmail" class="form-control mb-4" type = 'text' name ='Streetaddress' placeholder="address">
                            <input id="defaultLoginFormEmail" class="form-control mb-4" type = 'text' name ='Postcode' placeholder="Postcode">
                            <input id="defaultLoginFormPassword" class="form-control mb-4" type = 'text' name ='password' placeholder="password">

                            <button class="btn btn-default" type ='submit' name="submit" >Submit</button>
                        </form>
                       </div>   
                    </div>   
        </div>


    </body>
</html>



