<?php
include_once './dbh.php';


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

public function addmember () {
    
    
}

public function updatemember () {
    
    
}
    
}

?>
