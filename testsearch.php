
<html>
    <head>
        
    </head>
 <body>
            <form action=" " method="POST" >
                <label for="Booktitle">Book name</label>
                <input  type ="text" name ="Title" placeholder ="Book Title">
                <button type ="submit" name="search"> Submit search </button>
            </form>
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
  

            if (isset($_POST['search'])) {
                if ($result && $statement->rowCount() > 0) {
                    foreach ($result as $row) {
                        echo ($row["Title"]) . " ";
                        echo ($row["stock"]) . " ";
                        echo ($row["areaname"]) . '<br>';
                        ?>
                        <button type ="submit" name="request"> request book </button> 
                        <br>
                        <?php
                    }
                }
            }
         else {
            echo 'no results found for this book';
        }
} ?>
     
    </body>
</html>
