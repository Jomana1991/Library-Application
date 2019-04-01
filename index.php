
<?php
session_start();

require_once ('classes/log_in.php');

$new = new log_in;

if (isset($_POST['submit'])) {
    
   
   $new->login ();
}
?>


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
        <header>

            <div class="container-fluid">
                <ul>
                    <li> <a href="index.php"> Home </a> </li>
                </ul>
                <div class="container-fluid">
                    <form action = "index.php" method="POST" >
                        <input type ="text" name ="Email" placeholder ="email">
                        <input type ="password" name ="password" placeholder ="password">
                        <button type ="submit" name="submit"> login </button>
                    </form>
                    <a href = 'signup.php' >Sign Up </a>

                </div>

            </div>
        </header>


        <section >

            <div class="container-fluid">
                <h2> Home </h2>
            </div>
        </section>

    </body>
</html>









