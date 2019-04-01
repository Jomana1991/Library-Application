<?php

class log_in {

    public function login()
    {
    
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


                    if (count($results) == 1) {
                        $user = $results[0];
                        $_SESSION["Email"] = $user["Email"];
                        $_SESSION["permission"] = $user["permission"];
                    } switch ($user['permission']) {
                        case 'Admin':
                            header('location:admin.php?loginsuccess');
                            break;
                        case 'user':
                            header('location:user.php?loginsuccess');
                            break;
                    }
                }
            } else {
                echo 'no user found';
            }
        } catch (PDOException $error) {
            $message = $error->getMessage();
        }
    }
}
    