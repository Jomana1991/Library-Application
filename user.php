<?php
session_start();

if (isset($_POST['submit'])) {
    require_once "dbh2.php";

    try {
        $connection = new PDO($dsn, $username, $password, $options);

        $sql = "SELECT *
    FROM bookTable
    WHERE Title = :Title";

        $Title = $_POST['Title'];

        $statement = $connection->prepare($sql);
        $statement->bindParam(':Title', $Title, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetchAll();
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
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
            <?php
            if (isset($_POST['submit'])) {
                if ($result && $statement->rowCount() > 0) {
                    ?>

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
                            <?php foreach ($result as $row) { ?>
                                <tr>
                                    <td><?php echo ($row["Book_ID"]); ?></td>
                                    <td><?php echo ($row["Title"]); ?></td>
                                    <td><?php echo ($row["Date_published"]); ?></td>
                                    <td><?php echo ($row["ISBN"]); ?></td>
                                    <td><?php echo ($row["No_of_Copies"]); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php
                } else {
                    echo "no results found for" . $_POST['Title'];
                }
            }
            ?> 
        </div>

    </body>
</html>