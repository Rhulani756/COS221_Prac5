<?php 
include "config.php"; 
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>View</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .alb {
            width: 100%;
            height: 200px;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .alb img {
            width: 100%;
            height: auto;
        }

        a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container my-4">
        <div class="row">
            <div class="col-12 mb-3">
                <a href="index.php" class="btn btn-secondary">&#8592; Back</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <form method="GET" action="" class="form-inline">
                    <label for="location" class="mr-2">Search by Location:</label>
                    <input type="text" name="location" id="location" class="form-control mr-2">
                    <input type="submit" value="Search" class="btn btn-primary">
                </form>
            </div>

            <div class="col-md-4 mb-3">
                <form method="GET" action="" class="form-inline">
                    <label for="sort" class="mr-2">Sort by Duration:</label>
                    <select name="sort" id="sort" class="form-control mr-2">
                        <option value="asc">Ascending</option>
                        <option value="desc">Descending</option>
                    </select>
                    <input type="submit" value="Sort" class="btn btn-primary">
                </form>
            </div>

            <div class="col-md-4 mb-3">
                <form method="GET" action="" class="form-inline">
                    <label for="min_duration" class="mr-2">Minimum Duration:</label>
                    <input type="number" name="min_duration" id="min_duration" class="form-control mr-2">
                    <label for="max_duration" class="mr-2">Maximum Duration:</label>
                    <input type="number" name="max_duration" id="max_duration" class="form-control mr-2">
                    <input type="submit" value="Filter" class="btn btn-primary">
                </form>
            </div>
        </div>

        <div class="row">
            <?php
            // Construct the SQL query with sorting and filtering conditions
            $sql = "SELECT * FROM movies";

            // Check if search query is submitted
            if (isset($_GET['location'])) {
                $location = $_GET['location'];
                $sql .= " WHERE title LIKE '%$location%'";
            }

            // Check if minimum and maximum duration inputs are set
            if (isset($_GET['min_duration']) && isset($_GET['max_duration'])) {
                $min_duration = $_GET['min_duration'];
                $max_duration = $_GET['max_duration'];

                // Add a condition to filter movies based on duration within the specified range
                $sql .= " WHERE duration BETWEEN $min_duration AND $max_duration";
            } elseif (isset($_GET['min_duration'])) {
                // If only minimum duration is set
                $min_duration = $_GET['min_duration'];
                $sql .= " WHERE duration >= $min_duration";
            } elseif (isset($_GET['max_duration'])) {
                // If only maximum duration is set
                $max_duration = $_GET['max_duration'];
                $sql .= " WHERE duration <= $max_duration";
            }

            $res = mysqli_query($conn, $sql);

            // Display movies
            while ($rethabile = mysqli_fetch_assoc($res)) {
                $newimage = $rethabile["images"];
                $bedrooms = $rethabile['genre'];
                $bathrooms = $rethabile['plot'];
                $title = $rethabile['title'];
                $location = $rethabile['duration'];
                $price = $rethabile['rating'];
                ?>

                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="alb">
                            <img src="<?= $newimage ?>" class="card-img-top" alt="Property Image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $title ?></h5>
                            <p class="card-text">Duration: <?= $location ?></p>
                            <p class="card-text">Ratings: <?= $price ?></p>
                            <p class="card-text">Plot: <?= $bathrooms ?></p>
                            <p class="card-text">Genre: <?= $bedrooms ?></p>
                            <button class="btn btn-primary" onclick='viewDetails()'>Watch Movie</button>
                            <button class="btn btn-secondary" onclick="addToFavorites(<?= $rethabile['movieID'] ?>)">Add to Favorites</button>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
