<?php
session_start();
session_destroy();

echo 'log out successful';

?>

<html>
    <head>
        <meta charset="UTF-8">
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <title></title>
    </head>
    <body>
        <header>
            
                <div class = "main-wrapper">
                    <ul>
                        <li> <a href="index.php"> Home </a> </li>
                    </ul>
                    <div class = "nav-login">
                        <form action = "index.php" method="POST" >
                            <input type ="text" name ="Email" placeholder ="email">
                            <input type ="password" name ="password" placeholder ="password">
                            <button type ="submit" name="submit"> login </button>
                        </form>
                        <a href = 'signup.php' >Sign Up </a>

                    </div>

                </div>
        </header>
    </body>
</html>




