<?php
session_start();
require_once "classes/book.php";
$new = new book;

if (isset($_POST['submit'])) {
    
$new->searchbook();

   
               
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
            <div >
                <ul>
                    <li> <a href="index.php"> Home </a> </li>
                </ul>
                <div>

                    <button>  <a href = 'logout.php' >Log out</a> </button>



                </div>

            </div>
        </header>

        <div>
            <?php
            if (isset($_SESSION ["Email"])) {
                echo 'login successful, welcome ' . $_SESSION ["Email"] . ' please search for your book below';
            } else {
                header('location:index.php');
            }
            ?>
            <form  method="POST" >
                <label for="Booktitle">Book name</label>
                <input type ="text" name ="Title" placeholder ="Book Title">

                <button type ="submit" name="submit"> Submit search </button>
            </form>
            <a href = 'index.php' >back to Home page </a>
        </div>
        <div>
           

                    <h2> Results </h2>

                    <table>
                        <thead>
                            <tr>

                                <th>Book_ID</th>
                                <th>Title</th>
                                <th>Date_published</th>
                                <th>ISBN</th>
                                <th>No_of_Copies</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                          
                        </tbody>
                    </table>
                    
        </div>

    </body>
</html>