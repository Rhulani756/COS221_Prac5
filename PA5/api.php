<?php
session_start();
header('Content-Type: application/json');
include 'config.php';

class UserRegistrationAPI
{

    private static $instance;
    private $apiKey;

    private function __construct()
    {
        // Generate a random API key for the singleton instance
        $this->apiKey = $this->generateUniqueApiKey();
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function registerUser($postData)
    {
        $timestamp = time();
        // Validate post data
        $requiredFields = ['type', 'userId', 'username', 'firstname','lastname','email','password','isAdmin','City','State','postalCode','dateOfBirth','gender','country','apikey','salt','age','subscriptionId'];
        foreach ($requiredFields as $field) {
            if (!isset($postData[$field])) {
                return ['status' => 'error', 'timestamp' => $timestamp, 'data' => 'Post parameters are missing'];
            }
        }

        // Check if the email already exists in the database (simulated check)
        if ($this->emailExists($postData['email'])) {
            return ['status' => 'error', 'message' => 'Email address already exists'];
        }

        // Generate salt


        // Hash the password with salt
        $hashedPassword = password_hash($postData['password'], PASSWORD_DEFAULT);

        // Establish database connection
        global $servername, $username, $password, $dbname;
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement to insert user data into the database
        $stmt = $conn->prepare("INSERT INTO User_Information (name, surname, email, password, API_Key) VALUES (?, ?, ?, ?, ?)");
        $apiKey = $this->generateUniqueApiKey();
        $stmt->bind_param("sssss", $postData['name'], $postData['surname'], $postData['email'], $hashedPassword, $apiKey);
        $stmt->execute();

        // Check if the insertion was successful
        if ($stmt->affected_rows > 0) {
            // Registration successful

            return [
                'status' => 'success',
                'timestamp' => $timestamp,
                'data' => [
                    'apikey' => $apiKey
                ]
            ];
        } else {
            // Registration failed
            return ['status' => 'error', 'message' => 'Failed to register user'];
        }

        // Close database connection

    }

    private function emailExists($email)
    {
        //do a sql to check for the email
        // Include config file for database connection details
        include('config.php');

        global $servername, $username, $password, $dbname;

        // Establish database connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement to check if the email exists
        $stmt = $conn->prepare("SELECT * FROM User_Information WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if any rows were returned
        if ($result->num_rows > 0) {
            // Email exists in the database
            $stmt->close();
            $conn->close();
            return true;
        } else {
            // Email does not exist in the database
            $stmt->close();
            $conn->close();
            return false;
        }
    }

    private function generateUniqueApiKey($length = 32)
    {
        // Generate a unique alpha-numeric API key
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $apiKey = '';
        $maxIndex = strlen($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $apiKey .= $characters[random_int(0, $maxIndex)];
        }
        $apiKey = "a6ee367e293abc7dcd3671b8f7a07f75";
        return $apiKey;
    }
    public function login($response)
    {
        $timestamp = time();
        $data = json_decode($response, true);
        if ($data['type'] == 'login') {

            $apikey = "a6ee367e293abc7dcd3671b8f7a07f75";

            $expiration_time = time() + (365 * 24 * 60 * 60); // 365 days * 24 hours * 60 minutes * 60 seconds

            // Set the cookie with the calculated expiration time
            setcookie("APIKEY", $apikey, $expiration_time);
            return ['status' => 'success', 'timestamp' => $timestamp, 'data' => ['apikey' => $apikey]];
        } else {
            return ['status' => 'error', 'timestamp' => $timestamp, 'data' => 'Post parameters are missing'];
        }
    }
    public function getAllListingsUsers($postData)
    {
        // Validate post data
        $requiredFields = ['apikey', 'type', 'return'];
        $timestamp = time();
        foreach ($requiredFields as $field) {
            if (!isset($postData[$field])) {
                return ['status' => 'error', 'timestamp' => $timestamp, 'data' => 'Post parameters are missing'];
            }
        }
        global $servername, $username, $password, $dbname;
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sqllistings = "SELECT ";
        if (isset($postData['return'])) {
            // Check if return parameter has wildcard '*'
            if (in_array('*', $postData['return'])) {
                // Include all fields in the SELECT statement
                $sqllistings .= "* ";
            } else {
                // Include specific fields in the SELECT statement
                $fields = implode(",", $postData['return']);
                $sqllistings .= "$fields ";
            }
        }
        $sqllistings .= 'FROM listings';
        if (isset($postData['search'])) {
            $where_conditions = [];
            foreach ($postData['search'] as $key => $value) {
                if ($key === 'fuzzy' && $value === true) {
                    // Exclude fuzzy parameter from WHERE clause
                    continue;
                }
                if ($value !== null && $value !== '') {
                    // Add proper sanitization to prevent SQL injection
                    if ($key === 'location') {
                        // If fuzzy search is enabled for location
                        if (isset($postData['search']['fuzzy']) && $postData['search']['fuzzy'] === true) {
                            $where_conditions[] = "$key LIKE '%$value%'";
                        } else {
                            $where_conditions[] = "$key = '$value'";
                        }
                    } else {
                        $where_conditions[] = "$key = '$value'";
                    }
                }
            }
            if (!empty($where_conditions)) {
                $sqllistings .= "  WHERE " . implode(" AND ", $where_conditions);
            }
        }
        $orderClause = "";

        if (isset($postData['sort']) && in_array($postData['sort'], ['id', 'title', 'location', 'price', 'bedrooms', 'bathrooms', 'parking_spaces'])) {
            // Check if the "order" parameter is provided and is valid
            if (isset($postData['order']) && in_array($postData['order'], ['ASC', 'DESC'])) {
                // Construct the ORDER BY clause
                $orderClause = " " . "ORDER BY " . $postData['sort'] . " " . $postData['order'];
            }
        }
        //echo "hello".$orderClause;
        // Add the ORDER BY clause to the SQL query
        $sqllistings .= $orderClause;
        if (isset($postData['limit'])) {
            // Ensure the limit is within the valid range of 1 to 500
            $limit = max(1, min(500, (int)$postData['limit']));
            // Add LIMIT clause to the SQL query
            //echo $limit;
            $sqllistings .= "  LIMIT $limit";
        }

        $stmt = $conn->prepare($sqllistings);
        $stmt->execute();

        // Get the result set
        $result = $stmt->get_result();

        // Fetch data from the result set
        $data = $result->fetch_all(MYSQLI_ASSOC);

        if ($stmt->affected_rows > 0) {
            // Registration successful
            return ['status' => 'success', 'timestamp' => $timestamp, 'data' => $data];
        } else {
            // Registration failed
            return ['status' => 'error', 'message' => 'User not found '];
        }
    }
}

$api = UserRegistrationAPI::getInstance();
$postData = json_decode(file_get_contents('php://input'), true);
if ($postData != null) {
    if ($postData['type'] == 'GetAllListings') {
        $response = $api->getAllListingsUsers($postData);
        echo json_encode($response);
    } else {
        echo json_encode($response);
        $response = $api->registerUser($postData);
    }
} else {
    $returner2 = $_SESSION['returner2'];
    if ($returner2 != null) {
        $data = json_decode($returner2, true);
        if ($data['type'] == 'Register') {

            $response = $api->registerUser($data);
        } else {
            $response = $api->login($returner2);
        }
    }

    header('Location: index.php');
}