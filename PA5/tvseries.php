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
                    <label for="sort" class="mr-2">Sort by ID:</label>
                    <select name="sort" id="sort" class="form-control mr-2">
                        <option value="asc">Ascending</option>
                        <option value="desc">Descending</option>
                    </select>
                    <input type="submit" value="Sort" class="btn btn-primary">
                </form>
            </div>

            <div class="col-md-4 mb-3">
                <form method="GET" action="" class="form-inline">
                    <label for="min_price" class="mr-2">Minimum Price:</label>
                    <input type="number" name="min_price" id="min_price" class="form-control mr-2">
                    <label for="max_price" class="mr-2">Maximum Price:</label>
                    <input type="number" name="max_price" id="max_price" class="form-control mr-2">
                    <input type="submit" value="Filter" class="btn btn-primary">
                </form>
            </div>
        </div>

        <div class="row">
            <?php
            $condition = "";
            if (isset($_GET['location'])) {
                $location = $_GET['location'];
                $condition .= " AND location = '$location'";
            }

            $sort = "DESC";
            if (isset($_GET['sort'])) {
                if ($_GET['sort'] === 'asc') {
                    $sort = "ASC";
                }
            }

            $price_condition = "";
            if (isset($_GET['min_price']) && isset($_GET['max_price'])) {
                $min_price = $_GET['min_price'];
                $max_price = $_GET['max_price'];
                $price_condition = " AND price BETWEEN $min_price AND $max_price";
            }

            $sql = "SELECT * FROM movies WHERE 1=1 $condition $price_condition ORDER BY movieID $sort";
            $res = mysqli_query($conn,  $sql);

            while ($rethabile = mysqli_fetch_assoc($res)) {
                $newimages =$rethabile["images"];
                $bedrooms = $rethabile['genre'];
                $bathrooms = $rethabile['plot'];
                $title = $rethabile['title'];
                $location = $rethabile['seasons'];
                $price = $rethabile['rating'];
            ?>

            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="alb">
                        <img src="<?= $newimage ?>" class="card-img-top" alt="Property Image">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $title ?></h5>
                        <p class="card-text">duration: <?= $location ?></p>
                        <p class="card-text">Ratings <?= $price ?></p>
                        <p class="card-text">plot: <?= $bathrooms ?></p>
                        <p class="card-text">genre: <?= $bedrooms ?></p>
                        <button class="btn btn-primary" onclick='viewDetails()'>View More</button>
                        <button class="btn btn-secondary" onclick="addToFavorites(<?= $rethabile['movieID'] ?>)">Add to Favorites</button>
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
++
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>