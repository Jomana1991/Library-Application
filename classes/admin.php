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
    require_once "../admin/adminsearch.php";
   
                                    try {
                                        $obj = new Dbh;
                                        $pdo = $obj->connect();
                                        $search = $_POST['searchmember'];
                                        $sql = "SELECT Firstname,Lastname, Age, Email, Streetaddress, Postcode,joindate from member
                                        where firstname = '$search' OR lastname = '$search' OR Member_ID = '$search' ";
                                        $statement = $pdo->prepare($sql);
                                        $statement->execute();

                                        $result = $statement->fetchAll();
                                        return $result;
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
