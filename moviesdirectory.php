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
        }

        #header {
            position: relative;
            background-color: #333;
            color: #fff;
            padding: 20px 0;
        }

        #logo img {
            width: 150px; /* Adjust the size of the logo*/
        }

        #navbar {
            text-align: center;
            background-color: #333;
            padding: 10px 0;
        }

        #navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        #navbar ul li {
            display: inline;
        }

        #navbar ul li a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            transition: color 0.3s ease;
            padding: 10px 20px;
        }

        #navbar ul li a:hover {
            color: #ccc;
            background-color: #555;
            border-radius: 5px;
        }
    </style>
</head>

<body class="bg-light">
    <header id="header">
        <div class="container">
            <div id="logo">
                <img src="images/logoPicture.jpg" alt="The Big 6 Movies & Series Logo">
            </div>
            <!-- Navbar -->
            <nav id="navbar">
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#tv-shows">TV Shows</a></li>
                    <li><a href="movies.php">Movies</a></li>
                    <li><a href="tvseries.php">Series</a></li>
                    <li><a href="#new-popular">New & Popular</a></li>
                    <li><a href="#my-favorites">My Favorites</a></li>
                    <li><a href="#recommended">Recommended</a></li>
                    <!--<li><a href="#profile">Profile</a></li>-->
                </ul>
            </nav>
        </div>
    </header>

    <form action="moviesdirectory.php" method="get" class="mb-4 text-center">
        <div class="form-row align-items-center justify-content-center">
            <div class="col-auto">
                <label class="sr-only" for="location">Movie Title</label>
                <input type="text" class="form-control mb-2" id="location" name="location" placeholder="Search by movie title">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-2">Search</button>
            </div>
        </div>
    </form>

    <div class="container my-4">
        <div class="row">
            <?php
            // Construct the SQL query with sorting and filtering conditions
            $sql = "SELECT * FROM movies WHERE 1=1";

            // Check if search query is submitted
            if (isset($_GET['location']) && !empty($_GET['location'])) {
                $location = $_GET['location'];
                $sql .= " AND title LIKE '%$location%'";
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
                $movieID = $rethabile['movieID'];
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
                            <form action="delete_movies.php" method="post">
                                <input type="hidden" name="movie_id" value="<?= $movieID ?>">
                                <button type="submit" class="btn btn-primary" name="delete">Delete</button>
                            </form>
                            <button class="btn btn-secondary">Edit</button>
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