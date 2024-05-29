<?php
include "config.php"; 
session_start();

if(isset($_POST['submit'])) {
    // Retrieve series data from the form
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $plot = $_POST['plot'];
    $duration = $_POST['duration'];
    $language = $_POST['language'];
    $country = $_POST['country'];
    $creator = $_POST['creator'];
    $seasons = $_POST['seasons'];
    $episodes = $_POST['episodes'];
    $rating = $_POST['rating'];
    $productionCompany = $_POST['productionCompany'];
    $userRatings = $_POST['userRatings'];
    $lead = $_POST['lead'];
    $supporting = $_POST['supporting'];
    $recurring = $_POST['recurring'];
    $images = $_POST['images'];

    // Insert series data into the database
    $sql = "INSERT INTO series (title, genre, plot, duration, language, country, creator, seasons, episodes, rating, productionCompany, userRatings, lead, supporting, recurring, images) 
            VALUES ('$title', '$genre', '$plot', '$duration', '$language', '$country', '$creator', '$seasons', '$episodes', '$rating', '$productionCompany', '$userRatings', '$lead', '$supporting', '$recurring', '$images')";

    if(mysqli_query($conn, $sql)) {
        echo "<script>alert('Series added successfully');</script>";
    } else {
        echo "<script>alert('Error: " . $sql . "<br>" . mysqli_error($conn) . "');</script>";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Series</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="mt-4 mb-3">Add New Series</h2>
        <form action="addseries.php" method="post">
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
                <label for="creator">Creator</label>
                <input type="text" class="form-control" id="creator" name="creator">
            </div>
            <div class="form-group">
                <label for="seasons">Seasons</label>
                <input type="number" class="form-control" id="seasons" name="seasons" required>
            </div>
            <div class="form-group">
                <label for="episodes">Episodes</label>
                <input type="number" class="form-control" id="episodes" name="episodes" required>
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
                <label for="recurring">Recurring</label>
                <input type="text" class="form-control" id="recurring" name="recurring">
            </div>
            <div class="form-group">
                <label for="images">Images</label>
                <input type="text" class="form-control" id="images" name="images">
            </div>
            <button type="submit" class="btn btn-primary">Add Series</button>
        </form>
    </div>
</body>
</html>
