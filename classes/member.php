<?php
include_once './dbh.php';


Class member extends Dbh {

public function getAllmembers () {
    $stmt = $this->connect ()->query ("SELECT * FROM MemberTable");
    while ($row = $stmt->fetch()) {
     $firstname = $row ['Firstname'];
      return $firstname;
    }
    
}

public function Getmembers () {
    
    
}
    
}

?>
