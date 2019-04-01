<?php

Class sign_up {
    
public function signup () {
      require_once "dbh2.php";
 try {
        $connection = new PDO($dsn, $username, $password, $options);

        $new_user = array(
            "Firstname" => $_POST['Firstname'],
            "Lastname" => $_POST['Lastname'],
            "Age" => $_POST["Age"],
            "Email" => $_POST["Email"],
            "Streetaddress" => $_POST["Streetaddress"],
            "Postcode" => $_POST["Postcode"],
            "password" => $_POST["password"]
        );

        $sql = sprintf(
                "INSERT INTO %s (%s) values (%s)", "member", implode(", ", array_keys($new_user)), ":" . implode(", :", array_keys($new_user))
        );

        $statement = $connection->prepare($sql);
        $statement->execute($new_user);
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
}