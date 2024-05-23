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
<header id="header">
        <div class="container">
            <div id="logo">
                <img src="images/logoPicture.jpg" alt="The Big 6 Movies & Series Logo">
            </div>
            <div id="search-bar">
                <label>
                    <!-- <input type="text" placeholder="Search..."> -->
                </label>
                <button type="submit">Search</button>
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
    <div class="container my-4">
        <div class="row">
            <div class="col-12 mb-3">
                <a href="index.php" class="btn btn-secondary">&#8592; Back</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <form method="GET" action="" class="form-inline">
                    <label for="location" class="mr-2">Search by Title:</label>
                    <input type="text" name="location" id="location" class="form-control mr-2">
                    <input type="submit" value="Search" class="btn btn-primary">
                </form>
            </div>

            <div class="col-md-4 mb-3">
                <form method="GET" action="" class="form-inline">
                    <label for="sort" class="mr-2">Sort by ID:</label>
                    <select name="sort" id="sort" class="form-control mr-2">
                        <option value="asc" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'asc') echo 'selected'; ?>>Ascending</option>
                        <option value="desc" <?php if (!isset($_GET['sort']) || $_GET['sort'] == 'desc') echo 'selected'; ?>>Descending</option>
                    </select>
                    <input type="submit" value="Sort" class="btn btn-primary">
                </form>
            </div>

            <div class="col-md-4 mb-3">
                <form method="GET" action="" class="form-inline">
                    <label for="min_price" class="mr-2">Minimum Rating:</label>
                    <input type="number" name="min_price" id="min_price" class="form-control mr-2">
                    <label for="max_price" class="mr-2">Maximum Rating:</label>
                    <input type="number" name="max_price" id="max_price" class="form-control mr-2">
                    <input type="submit" value="Filter" class="btn btn-primary">
                </form>
            </div>
        </div>

        <div class="row">
            <?php
            $conditions = [];
            if (isset($_GET['location']) && $_GET['location'] !== '') {
                $location = mysqli_real_escape_string($conn, $_GET['location']);
                $conditions[] = "title LIKE '%$location%'";
            }

            if (isset($_GET['min_price']) && $_GET['min_price'] !== '' && isset($_GET['max_price']) && $_GET['max_price'] !== '') {
                $min_price = (int)$_GET['min_price'];
                $max_price = (int)$_GET['max_price'];
                $conditions[] = "rating BETWEEN $min_price AND $max_price";
            }

            $sort = "DESC";
            if (isset($_GET['sort']) && $_GET['sort'] === 'asc') {
                $sort = "ASC";
            }

            $condition = '';
            if (!empty($conditions)) {
                $condition = "WHERE " . implode(' AND ', $conditions);
            }

            $sql = "SELECT * FROM series $condition ORDER BY seriesID $sort";
            $res = mysqli_query($conn, $sql);

            if (!$res) {
                echo "Error: " . mysqli_error($conn);
            }

            while ($rethabile = mysqli_fetch_assoc($res)) {
                $newimage = $rethabile["images"];
                $bedrooms = $rethabile['genre'];
                $bathrooms = $rethabile['plot'];
                $title = $rethabile['title'];
                $price = $rethabile['rating'];
                $duration = $rethabile['duration'];
            ?>

            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="alb">
                        <img src="<?= htmlspecialchars($newimage) ?>" class="card-img-top" alt="Series Image">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($title) ?></h5>
                        <p class="card-text">Duration: <?= htmlspecialchars($duration) ?></p>
                        <p class="card-text">Ratings: <?= htmlspecialchars($price) ?></p>
                        <p class="card-text">Plot: <?= htmlspecialchars($bathrooms) ?></p>
                        <p class="card-text">Genre: <?= htmlspecialchars($bedrooms) ?></p>
                        <button class="btn btn-primary" onclick='viewDetails()'>View More</button>
                        <button class="btn btn-secondary" onclick="addToFavorites(<?= (int)$rethabile['seriesID'] ?>)">Add to Favorites</button>
                    </div>
                </div>
            </div>

            <script>
                function addToFavorites(propertyId) {
                    window.location.href = 'favoritesadder.php?property_id=' + propertyId;
                }
            </script>

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
