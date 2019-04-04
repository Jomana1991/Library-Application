<?php

class book {
    
    public function getAllBooks() {
        
    }

    public function addbook() {
        
    }

    public function searchbook() {
        require_once "dbh.php";

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
                            $statement->bindParam(':Title', $Title, PDO::PARAM_STR);
                            $statement->execute();

                            $result = $statement->fetchAll();
                        } catch (PDOException $error) {
                            echo $sql . "<br>" . $error->getMessage();
                        }
                         if (isset($_POST['search'])) {
                            if ($result && $statement->rowCount() > 0) {
                                foreach ($result as $row) {
                                    
    }
                            }
                         }
    }

    public function requestbook() {
        
          require_once "dbh.php";

        try {
            $obj = new Dbh;
            $pdo = $obj->connect();
            $sql = "SELECT *
    FROM bookTable
    WHERE Title = :Title";
        } catch (PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
        
        
    }

    public function returnbook() {
        
    }

    public function updatebook() {
        
    }

}
