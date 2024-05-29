<?php
//include 'header.php';
include 'config.php';

global $servername, $username, $password, $dbname; 

// Establish database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])) {
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if($password == $row['password']) {
            session_start();
            $_SESSION['login'] = true;
            $_SESSION['APIkey'] = $row['apikey'];
            $_SESSION['username'] = $row['username'];
            
            header('Location: response.php');
            
            $stmt->close();
            $conn->close();
            exit;
        } else {
            echo "<script>alert('Wrong password');</script>";
        }
    } else {
        echo "<script>alert('User not registered');</script>";
    }

    $stmt->close();
    $conn->close();
}

echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    color: #333;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

h2 {
    color: #4CAF50;
    margin-bottom: 350px;
 
}

form {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}

input[type='text'] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
}

button:hover {
    background-color: #45a049;
}

hr {
    border: 0;
    height: 1px;
    background: #ddd;
    margin: 20px 0;
}
</style>";
echo "</head>";
echo "<body>";



echo '<form action="" method="post" autocomplete="off">
<label for="Email">Email:</label>
<input type="text" id="Email" name="Email" required><br>
<label for="Password">Password:</label>
<input type="text" id="Password" name="Password" required><br>
<button type="submit" name="submit">Log In</button>
</form><hr>';

echo "</body>";
echo "</html>";
?>

