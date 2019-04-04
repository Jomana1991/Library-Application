<?php
include_once 'dbh.php';


Class admin {
    
public function getAllmembers () {
    $stmt = $this->connect ()->query ("SELECT * FROM member");
    while ($row = $stmt->fetch()) {
     $firstname = $row ['Firstname'];
      return $firstname;
    }
    
}

public function deletemember () {
    
    
}

public function searchmember () {
    
   
 try {
        $connection = new PDO($dsn, $username, $password, $options);

  $sql =      "SELECT * from member
where firstname = ";
      $statement = $pdo->prepare($sql);
                            $statement->bindParam(':Title', $Title, PDO::PARAM_STR);
                            $statement->execute();

                            $result = $statement->fetchAll();
                        } catch (PDOException $error) {
                            echo $sql . "<br>" . $error->getMessage();
                        }
}

public function addmember () {
    
    
}

public function updatemember () {
    
    
}
    
}

?>
