<?php
include "config.php"; 
session_start();

if(isset($_POST['submit'])) {
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $plot = $_POST['plot'];
    $duration = $_POST['duration'];
    $language = $_POST['language'];
    $country = $_POST['country'];
    $director = $_POST['director'];
    $releaseDate = $_POST['releaseDate'];
    $rating = $_POST['rating'];
    $productionCompany = $_POST['productionCompany'];
    $userRatings = $_POST['userRatings'];
    $lead = $_POST['lead'];
    $supporting = $_POST['supporting'];
    $extras = $_POST['extras'];
    $images = $_POST['images'];

    // Insert the data into the database
    $sql = "INSERT INTO movies (title, genre, plot, duration, language, country, director, releaseDate, rating, productionCompany, userRatings, lead, supporting, extras, images)
            VALUES ('$title', '$genre', '$plot', '$duration', '$language', '$country', '$director', '$releaseDate', '$rating', '$productionCompany', '$userRatings', '$lead', '$supporting', '$extras', '$images')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Movie added successfully');</script>";
    } else {
        echo "<script>alert('Error: " . $sql . "<br>" . mysqli_error($conn) . "');</script>";
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Movie</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: black;
            color: darkgray;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding-top: 50px;
        }

        form {
            background-color: #333;
            padding: 20px;
            border-radius: 8px;
            color: white;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            background-color: #555;
            border: none;
            border-radius: 4px;
            color: white;
        }

        .btn-primary {
            background-color: #4CAF50;
            border: none;
        }

        .btn-primary:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container">
        <h2 class="text-center">Add New Movie</h2>
        <form action="addmovie.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="genre">Genre</label>
                <input type="text" class="form-control" id="genre" name="genre" required>
            </div>
            <div class="form-group">
                <label for="plot">Plot</label>
                <textarea class="form-control" id="plot" name="plot" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="duration">Duration</label>
                <input type="text" class="form-control" id="duration" name="duration">
            </div>
            <div class="form-group">
                <label for="language">Language</label>
                <input type="text" class="form-control" id="language" name="language" required>
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <input type="text" class="form-control" id="country" name="country" required>
            </div>
            <div class="form-group">
                <label for="director">Director</label>
                <input type="text" class="form-control" id="director" name="director" required>
            </div>
            <div class="form-group">
                <label for="releaseDate">Release Date</label>
                <input type="date" class="form-control" id="releaseDate" name="releaseDate" required>
            </div>
            <div class="form-group">
                <label for="rating">Rating</label>
                <input type="number" class="form-control" id="rating" name="rating">
            </div>
            <div class="form-group">
                <label for="productionCompany">Production Company</label>
                <input type="text" class="form-control" id="productionCompany" name="productionCompany" required>
            </div>
            <div class="form-group">
                <label for="userRatings">User Ratings</label>
                <input type="number" class="form-control" id="userRatings" name="userRatings">
            </div>
            <div class="form-group">
                <label for="lead">Lead</label>
                <input type="text" class="form-control" id="lead" name="lead">
            </div>
            <div class="form-group">
                <label for="supporting">Supporting</label>
                <input type="text" class="form-control" id="supporting" name="supporting">
            </div>
            <div class="form-group">
                <label for="extras">Extras</label>
                <input type="text" class="form-control" id="extras" name="extras">
            </div>
            <div class="form-group">
                <label for="images">Images</label>
                <input type="text" class="form-control" id="images" name="images">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Add Movie</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
