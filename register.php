<?php
session_start();
require 'config.php';

function generateRandomsubcriptionID() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $subscriptionId = '';
    $maxIndex = strlen($characters) - 1;
    for ($i = 0; $i < 10; $i++) {
        $subscriptionId .= $characters[random_int(0, $maxIndex)];
    }
    return $subscriptionId;
}
function generateUniqueApiKey($length = 15) {
    // Generate a unique alpha-numeric API key
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $apiKey = '';
    $maxIndex = strlen($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $apiKey .= $characters[random_int(0, $maxIndex)];
    }
    return $apiKey;
}

if (isset($_POST["submit"])) {
    $userID = NULL; // Assuming auto-increment
    $username = $_POST["username"];
    $firstname = $_POST["fname"];
    $lastname = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $isAdmin = isset($_POST['isAdmin']) ? (int)$_POST['isAdmin'] : 0;
    $city = $_POST["city"];
    $state = $_POST["state"];
    $postalCode = $_POST["postalCode"];
    $dateOfBirth = $_POST["dateOfBirth"];
    $gender = $_POST["gender"];
    $country = $_POST["country"];
    $apikey = generateUniqueApiKey();
    $salt = bin2hex(random_bytes(16));
    $age = $_POST["age"];
    $subscriptionId = generateRandomsubcriptionID();

    // Check for duplicate email
    $duplicate = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script>alert('Email Has Already Been Taken');</script>";
    } else {
        $query = $conn->prepare("INSERT INTO users (userID, username, firstname, lastname, email, password, isAdmin, City, State, postalCode, dateOfBirth, gender, country, apikey, salt, age, subscriptionId) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $query->bind_param("isssssiissssssisi", $userID, $username, $firstname, $lastname, $email, $password, $isAdmin, $city, $state, $postalCode, $dateOfBirth, $gender, $country, $apikey, $salt, $age, $subscriptionId);
        $query->execute();
        echo "<script>alert('Registration successful');</script>";
        header("Location: login.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
</head>

<body>
    <div class="header">
        <img src="img/images.png" alt="My Logo" class="logo">
        <h1>HOUSE PROPERTY DEVELOPMENT</h1>
    </div>
    <form action="register.php" id="retha" method="post">
        <label for="username">Username:</label><br>
        <input type="text" name="username"><br>
        <label for="fname">First Name:</label><br>
        <input type="text" name="fname"><br>
        <label for="lname">Last Name:</label><br>
        <input type="text" name="lname"><br>
        <label for="email">Email:</label><br>
        <input type="email" name="email"><br>
        <label for="password">Password:</label><br>
        <input type="password" name="password"><br>
        <label for="isAdmin">Admin (True/False):</label><br>
        <input type="hidden" name="isAdmin" value="0"> <!-- Hidden field to ensure a value is always sent -->
        <input type="checkbox" name="isAdmin" value="1"><br>
        <label for="city">City:</label><br>
        <input type="text" name="city"><br>
        <label for="state">State:</label><br>
        <input type="text" name="state"><br>
        <label for="postalCode">Postal Code:</label><br>
        <input type="text" name="postalCode"><br>
        <label for="dateOfBirth">Date of Birth:</label><br>
        <input type="date" name="dateOfBirth"><br>
        <label for="gender">Gender:</label><br>
        <input type="text" name="gender"><br>
        <label for="country">Country:</label><br>
        <input type="text" name="country"><br>
        <label for="age">Age:</label><br>
        <input type="number" name="age"><br>
       
        <input type="submit" name="submit" value="Register">
        <input type="submit" name="submit" value="Login" onclick="redirectToIndex()">
    </form>
    <script>
        function redirectToIndex() {
            window.location.href = "login.php";
        }
    </script>
</body>

</html>
