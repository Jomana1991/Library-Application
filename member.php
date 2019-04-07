<?php
session_start();
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
                        <li> <a href = 'logout.php'>Logout</a> </li>

                    </ul>
                </div>
            </div>
        </nav>

        <div id="home">
            <div class="landing-text">


                <h4> Welcome <?php
                    if (isset($_SESSION ["Email"])) {
                        echo "" . $_SESSION ["Email"] . ",";
                    }
                    ?>  please search for your book below

                </h4>
                <div  class="col-md-4 col-md-offset-4">
                    <form class="text-center border border-light p-5" method="POST" >
                        <label class="label label-default" for="Booktitle">Book name</label>
                        <input id="defaultLoginFormEmail" class="form-control mb-4" type ="text" name ="Title" placeholder ="Book Title">

                        <button type ="submit" name="search"> Submit search </button>
                    </form>
                </div> 
                <div class="col-md-4 col-md-offset-4">

                    <h2>Results</h2>
                    <table>
                        <thead>
                            <tr>
                                <th style="margin: 10px; padding: 15px;" >Book name</th>
                                <th style="margin: 10px; padding: 15px;" >Number of copies</th>
                                <th style="margin: 10px; padding: 15px;">Location</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_POST['search'])) {
                                require_once "classes/dbh.php";
                                try {
                                    $obj = new Dbh;
                                    $pdo = $obj->connect();

                                    $Title = $_POST['Title'];

                                    $sql = "SELECT Title, stock, areaname
                                    from bookTable
                                    inner join stockTable
                                    on bookTable.book_ID=stockTable.book_ID
                                    inner join LocationTable
                                    on LocationTable.Location_ID=stockTable.Location_ID
                                    WHERE bookTable.Title = '$Title'";

                                    $statement = $pdo->prepare($sql);
                                    
                                    $statement->execute();

                                    $result = $statement->fetchAll();
                                } catch (PDOException $error) {
                                    echo $sql . "<br>" . $error->getMessage();
                                }

                                if (isset($_POST['search'])) {
                                    if ($result && $statement->rowCount() > 0) {
                                        foreach ($result as $row) {
                                            ?>
                                            <tr>
                                                <td><?php echo ($row["Title"]); ?></td>
                                                <td><?php echo ($row["stock"]); ?></td>
                                                <td><?php echo ($row["areaname"]); ?></td>
                                                <td><form action=" " method="POST" >
                                                        <input type="hidden" name="areaname" value ="<?php echo ($row["areaname"]); ?>">
                                                        <input type="hidden" name="stock" value ="<?php echo ($row["stock"]); ?>">
                                                        <input type="hidden" name="Title" value ="<?php echo ($row["Title"]); ?>">
                                                        <button value = "Title" type ="submit" name="request"> request book </button> 
                                                    </form></td>
                                            </tr>

                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        <?php
                    }
                    ?>
                </div> 
            </div>   
        </div>
        <?php
        if (isset($_POST['request'])) {
            require_once "classes/dbh.php";
            $email = $_SESSION ["Email"];
            try {
                $obj = new Dbh;
                $pdo = $obj->connect();
                $book = $_POST["Title"];
                $stock = $_POST["stock"];
                $location = $_POST["areaname"];

                $sql2 = "CALL bookloan ('$email', '$location', '$book', '$stock')";
                $result2 = $statement2 = $pdo->prepare($sql2);
                $statement2->execute();
            } catch (PDOException $error) {
                echo $sql2 . "<br>" . $error->getMessage();
            }
            if ($result2 && $statement2) { ?>
      <div class ="container-fuild" >    
        <h3>  <?php echo 'your request has been submitted!'; ?> </h3>
      </div>
        <?php
            }
            
        }
        ?>
    </body>
    
</html>
