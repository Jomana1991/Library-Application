<?php

if (isset($_POST['search'])) {
    require_once "classes/dbh.php";
    try {
        $obj = new Dbh;
        $pdo = $obj->connect();
//        $sql = "SELECT *
//    FROM bookTable
//    WHERE Title = :Title";
        $Title = $_POST['Title'];

        $sql = "SELECT Title, stock, areaname
from bookTable
inner join stockTable
on bookTable.book_ID=stockTable.book_ID
inner join LocationTable
on LocationTable.Location_ID=stockTable.Location_ID
WHERE bookTable.Title = '$Title'";

        $statement = $pdo->prepare($sql);
        $statement->bindParam(':Title', $Title, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetchAll();
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
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
            <form action=" " method="POST" >
                <label for="Booktitle">Book name</label>
                <input  type ="text" name ="Title" placeholder ="Book Title">
                <button type ="submit" name="search"> Submit search </button>
            </form>
            <?php
            if (isset($_POST['search'])) {
                if ($result && $statement->rowCount() > 0) {
                    foreach ($result as $row) {
                        echo ($row["Title"]) . " ";
                        echo ($row["stock"]) . " ";
                        echo ($row["areaname"]) . '<br>';
                        ?>
             <form action=" " method="POST" >
                        <button type ="submit" name="request"> request book </button> 
             </form>
                        <br>
                        <?php
                    }
                }
            }
         else {
            echo 'no results found for this book';
        }
}
        ?>

    </body>
</html>
