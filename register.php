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
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .header {
            text-align: center;
            margin: 20px 0;
        }

        .logo {
            width: 100px;
            height: auto;
        }

        .form-container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group label {
            font-weight: bold;
        }

        .btn {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="img/images.png" alt="My Logo" class="logo">
        <h1>HOUSE PROPERTY DEVELOPMENT</h1>
    </div>
    <div class="form-container">
        <form action="register.php" id="retha" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="fname">First Name:</label>
                <input type="text" name="fname" class="form-control">
            </div>
            <div class="form-group">
                <label for="lname">Last Name:</label>
                <input type="text" name="lname" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group form-check">
                <input type="hidden" name="isAdmin" value="0">
                <input type="checkbox" name="isAdmin" value="1" class="form-check-input">
                <label for="isAdmin" class="form-check-label">Admin (True/False)</label>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" name="city" class="form-control">
            </div>
            <div class="form-group">
                <label for="state">State:</label>
                <input type="text" name="state" class="form-control">
            </div>
            <div class="form-group">
                <label for="postalCode">Postal Code:</label>
                <input type="text" name="postalCode" class="form-control">
            </div>
            <div class="form-group">
                <label for="dateOfBirth">Date of Birth:</label>
                <input type="date" name="dateOfBirth" class="form-control">
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <input type="text" name="gender" class="form-control">
            </div>
            <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" name="country" class="form-control">
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" name="age" class="form-control">
            </div>
            <button type="submit" name="submit" value="Register" class="btn btn-primary">Register</button>
            <button type="button" name="submit" value="Login" class="btn btn-secondary" onclick="redirectToIndex()">Login</button>
        </form>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function redirectToIndex() {
            window.location.href = "login.php";
        }
    </script>
</body>

</html>

