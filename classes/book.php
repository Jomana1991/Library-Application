<?php ?>


<?php

class book {

    public function getAllBooks() {
        
    }

    public function addbook() {
        
    }

    public function searchbook() {
        require_once './member.php';
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

            $statement->execute();

            $result = $statement->fetchAll();
            return $result;
        } catch (PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }

    public function requestbook() {
        require_once './member.php';
        require_once "dbh.php";

        try {
            $obj = new Dbh;
            $pdo = $obj->connect();
            $email = $_SESSION ["Email"];
            $book = $_POST["Title"];
            $stock = $_POST["stock"];
            $location = $_POST["areaname"];
            $sql2 = "CALL bookloan ('$email', '$location', '$book', '$stock')";
            $statement2 = $pdo->prepare($sql2);
            $result2 = $statement2->execute();
            return $result2;
        } catch (PDOException $error) {
            echo $sql2 . "<br>" . $error->getMessage();
        }
    }

    public function returnbook() {
        
    }

    public function updatebook() {
        
    }

}
