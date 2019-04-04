<?php
session_start();
require_once "classes/admin.php";
$new = new admin;

if (isset($_POST['search'])) {

    $new->searchmember();
} else {
    echo 'Sign-up failed';
}
?>




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
                        <li> <a class="active" href = 'index.php' >Home</a> </li>
                        <li> <a href="#">About</a> </li>
                        <li> <a href="#">Contact us</a> </li>

                    </ul>
                </div>
            </div>
        </nav>


        <div id="home">
            <div class="landing-text">
                <h1> Welcome Admin!</h1>
                <h4> Search for a member below </h4>
                <div  class="col-md-4 col-md-offset-4">
                    <form class="text-center border border-light p-5" method="POST" >
                        <label class="label label-default" for="Member">Member name</label>
                        <input id="defaultLoginFormEmail" class="form-control mb-4" type ="text" name ="firstname" placeholder ="Membername">

                        <button type ="submit" name="search"> Submit search </button>
                    </form>
                </div> 
            </div>   
        </div>


    </body>
</html>