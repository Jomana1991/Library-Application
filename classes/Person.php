<?php

class person {
    
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

  public function login() {

        require_once 'dbh.php';

        try {

            if (isset($_POST["submit"])) {
                if (empty($_POST["Email"]) || empty($_POST["password"])) {
                    $message = '<label> All fields are required </label>';
                } else {
                    $obj = new Dbh;
                    $pdo = $obj->connect();
                    $query = $pdo->prepare("SELECT * FROM member WHERE Email = :Email AND password = :password");

                    $query->execute(
                            array(
                                'Email' => $_POST["Email"],
                                'password' => $_POST["password"]
                            )
                    );
                    $results = $query->fetchAll();

                    if (count($results) == 0) {
                        echo 'user not found';
                    }
                    else if (count($results) == 1) {
                        $user = $results[0];
                        $_SESSION["Email"] = $user["Email"];
                        $_SESSION["permission"] = $user["permission"];
                    } switch ($user['permission']) {
                        case 'Admin':
                            header('location:admin/adminlanding.php?loginsuccess');
                            break;
                        case 'user':
                            header('location:member.php?loginsuccess');
                            break;
                    }
                }
            }
        } catch (PDOException $error) {
            $message = $error->getMessage();
        }
    }
}