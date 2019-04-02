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
            $sql = "SELECT *
    FROM bookTable
    WHERE Title = :Title";

            $Title = $_POST['Title'];

            $statement = $pdo->prepare($sql);
            $statement->bindParam(':Title', $Title, PDO::PARAM_STR);
            $statement->execute();

            $result = $statement->fetchAll();
            
             if ($result && $statement->rowCount() > 0) {
                    foreach ($result as $row);
                    echo ($row["Book_ID"]);
                    echo ($row["Title"]);
                    echo ($row["Date_published"]);
                    echo ($row["No_of_Copies"]);
                } else {
                    echo "no results found for" . $_POST['Title'];
    }
        } catch (PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }

    public function requestbook() {
        
    }

    public function returnbook() {
        
    }

    public function updatebook() {
        
    }

}
