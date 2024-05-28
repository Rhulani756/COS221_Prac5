<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"]) || empty($_POST["password"])) {
        echo "SOME PARAMETERS ARE MISSING";
        return;
    }

    class emailchecker {
        public function emailExists($email, $pass) {
            include('config.php');

            $conn = new mysqli($servername, $username, $password, $database);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if ($row["password"] == $pass) {
                    return $row;
                } else {
                    echo "PASSWORD INCORRECT";
                    return false;
                }
            } else {
                return false;
            }
        }
    }

    $myObject = new emailchecker();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = $myObject->emailExists($email, $password);

    if ($user == false) {
        echo "password or email is wrong";
    } else {
        $_SESSION['email'] = $user['email'];
        $_SESSION['isAdmin'] = $user['isAdmin'];

        if ($user['isAdmin'] == 1) {
            header('Location: indexadmin.php');
        } else {
            header('Location: index.php');
        }
        exit();
    }
}
?>
