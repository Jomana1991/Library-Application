<?php 
if (isset($_POST['request'])) {
    require_once "classes/dbh.php";
    try {
        $obj = new Dbh;
        $pdo = $obj->connect();
       $book = $row["Title"];
       $stock = $row["stock"];
       $location = $row["areaname"];
        
         $sql2 = " INSERT INTO loan_Table (Stock_ID)
             SELECT Stock_ID FROM stockTable
inner join stockTable
on bookTable.book_ID = stockTable.book_ID
inner join LocationTable
on LocationTable.Location_ID=stockTable.Location_ID
ON bookTable.Title = '$book'

Update stockTable
 INNER JOIN loan_Table on loan_Table.Stock_ID = stockTable.Stock_ID
Set stock = stock -1

UPDATE BookTable
        INNER JOIN
    StockTable ON BookTable.Book_ID = StockTable.Book_ID 
SET 
    no_of_copies = no_of_copies -1";
 
         $statement = $pdo->prepare($sql2);
       $statement->bindParam(':Title', $Title, PDO::PARAM_STR);
        $statement->execute();
        
          } catch (PDOException $error) {
        echo $sql2 . "<br>" . $error->getMessage();
    }
}
                 
        ?>
