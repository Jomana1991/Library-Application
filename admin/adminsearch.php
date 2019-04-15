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
        <link href="../style.css" rel="stylesheet" type="text/css"/>
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
                <h4> Search for a member by Firstname, Lastname or Member ID below </h4>
                 <div  class="col-md-4 col-md-offset-4">
                    <form class="text-center border border-light p-5" method="POST" >
<!--                        <input list="Search">
                        <datalist id="Searchmember">
                            <option value="Firstname">
                            <option value="Lastname">
                            <option value="Member_ID">
                        </datalist> -->
<!--                        <select name="search">
                            <option value="Firstname">Firstname</option>
                            <option value="Lastname">Lastname</option>
                            <option value="Member_ID">Member_ID</option>
                        </select>-->
                        <input class="form-control mb-4" type ="text" name ="searchmember" placeholder ="search for member">
                        <button type ="submit" name="search"> Submit search </button>
                    </form>
                    <div class="col-md-4 col-md-offset-4">

                        <h2>Results</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th style="margin: 10px; padding: 30px;">Firstname</th>
                                    <th style="margin: 10px; padding: 30px;" >Lastname</th>
                                    <th style="margin: 10px; padding: 30px;">Age</th>
                                    <th style="margin: 10px; padding: 30px;">Email</th>
                                    <th style="margin: 10px; padding: 30px;">Street Address</th>
                                    <th style="margin: 10px; padding: 30px;">Postcode</th>
                                    <th style="margin: 10px; padding: 30px;">Join date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once "../classes/admin.php";
                                $new = new admin;

                                if (isset($_POST['search'])) {
                                    require_once "../classes/dbh.php";
                                    try {
                                        $obj = new Dbh;
                                        $pdo = $obj->connect();
                                    $search = $_POST['searchmember'];


                                        $sql = "SELECT Firstname,Lastname, Age, Email, Streetaddress, Postcode,joindate from member
                                        where firstname = '$search' OR lastname = '$search' OR Member_ID = '$search' ";
                                        $statement = $pdo->prepare($sql);
                                        $statement->execute();

                                        $result = $statement->fetchAll();
                                    } catch (PDOException $error) {
                                        echo $sql . "<br>" . $error->getMessage();
                                    }
                                }
                                if (isset($_POST['search'])) {
                                    if ($result && $statement->rowCount() > 0) {
                                        foreach ($result as $row) {
                                            ?>

                                            <tr>
                                                <td><?php echo ($row["Firstname"]); ?></td>
                                                <td><?php echo ($row["Lastname"]); ?></td>
                                                <td><?php echo ($row["Age"]); ?></td>
                                                <td><?php echo ($row["Email"]); ?></td>
                                                <td><?php echo ($row["Streetaddress"]); ?></td>
                                                <td><?php echo ($row["Postcode"]); ?></td>
                                                <td><?php echo ($row["joindate"]); ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                }
                                ?>



                            </tbody>
                        </table>

                    </div>         
                </div> 
            </div>   
        </div>


    </body>
</html>