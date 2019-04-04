
<?php
session_start();

require_once ('classes/person.php');

$new = new person;

if (isset($_POST['submit'])) {


    $new->login();
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
                        <li> <a class="active" href = 'index.php'>Home</a> </li>
                        <li> <a href="#">About</a> </li>
                        <li> <a href="#">Contact us</a> </li>

                    </ul>
                </div>
            </div>
        </nav>


        <div id="home">
            <div class="landing-text">
                <h1> ISBN-E</h1>
                <h3> Welcome to our online library</h3> 
            </div> 
        </div>

        <div class="padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <img src="img/book5.jpeg">


                    </div>
                    <div class="col-sm-6 text-center">
                        <h2> Please login below </h2>
                        <form  class="text-center border border-light p-5" action = "index.php" method="POST" >
                                                   
                            <input id="defaultLoginFormEmail" class="form-control mb-4" type ="text" name ="Email" placeholder ="email">
                            <input id="defaultLoginFormPassword" class="form-control mb-4" type ="password" name ="password" placeholder ="password">
                            <button class="btn btn-info btn-block my-4" type ="submit" name="submit"> login </button>
                            
                        </form>
                    </div>                  
                </div>
            </div>         
        </div>

        <div class="padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <img src="img/book4.jpg">    
                    </div>
                    <div class="col-sm-6 text-center">
                        <h2> Don't have an account? sign up below! </h2>
                        <button> <a href = 'signup.php' >Sign Up </a> </button>
                    </div>
                </div>    
            </div>
        </div>

        <footer class='contain text-center'>
            <div class='row'>
                <div class=' col-sm-6'>
                    <h3>Contact us</h3>
                    <br>
                    <h4>ISBN-E@library.com</h4>
                </div>
                <div class=' col-sm-6'>
                    <h3>Connect with us</h3>
                    <a href="#" class='fa fa-facebook'> </a>
                    <a href="#" class='fa fa-twitter'> </a>
                    <a href="#" class='fa fa-instagram'> </a>
                </div>
                
            </div>
        </footer>


        <!--                <ul>
                            <li> <a href="index.php"> Home </a> </li>
                        </ul>
                        <div class="container-fluid">
                            <form action = "index.php" method="POST" >
                                <input type ="text" name ="Email" placeholder ="email">
                                <input type ="password" name ="password" placeholder ="password">
                                <button type ="submit" name="submit"> login </button>
                            </form>
                            <a href = 'signup.php' >Sign Up </a>
        
                        </div>-->


<!--        <section >

            <div class="container-fluid">
                <h2> Home </h2>
            </div>
        </section>-->

    </body>
</html>









