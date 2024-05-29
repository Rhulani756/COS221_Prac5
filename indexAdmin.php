<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOOP Movies & Series</title>
    <link rel="stylesheet" href="StyleLooks.css"> <!-- Link to the CSS file -->
</head>
<body>
<header id="header">
    <div class="container">
        <div id="logo">
            <img src="images/logoPicture.jpg" alt="The Big 6 Movies & Series Logo">
        </div>
        <nav id="navbar">
            <ul>
                <li><a href="#indexAdmin.php">Home</a></li>
                <li><a href="moviesdirectory.php">Movies</a></li>
                <li><a href="tvseries.php">Series</a></li><!-- New Add Actors link -->
            </ul>
        </nav>
    </div>
</header>
<section id="hero-section">
    <div id="hero-text">
        Welcome to HOOP Movies & Series!<br>
        Check out our latest releases.
    </div>
</section>


<div id="content">
    <h2>Most Watched Shows</h2>
    <div class="movie-container">
        <!-- Movies and series details go here -->
    </div>
</div>
<section id="home">
    <div class="hero">
        <h1>Welcome to The Big 6 Movies & Series</h1>
        <p>Discover a world of entertainment with our collection of movies and series.</p>
        <a href="#new-popular" class="btn">Explore Now</a>
    </div>
</section>

<section id="tv-shows">
    <h2>TV Shows</h2>
    <div class="carousel">
        <!-- TV Shows carousel items go here -->
    </div>
    <div class="content">
        <p>Explore our vast collection of TV shows spanning various genres and categories.</p>
    </div>
</section>

<section id="movies">
    <h2>Movies</h2>
    <div class="carousel">
        <!-- Movies carousel items go here -->
    </div>
    <div class="content">
        <p>Dive into a diverse selection of movies, ranging from classics to the latest blockbusters.</p>
    </div>
</section>

<section id="series">
    <h2>Series</h2>
    <div class="carousel">
        <!-- Series carousel items go here -->
    </div>
    <div class="content">
        <p>Immerse yourself in captivating series with compelling storylines and unforgettable characters.</p>
    </div>
</section>

<section id="new-popular">
    <h2>New & Popular</h2>
    <div class="carousel">
        <!-- New & Popular carousel items go here -->
    </div>
    <div class="content">
        <p>Discover the latest and most popular shows and movies that everyone is talking about.</p>
    </div>
</section>

<section id="my-favorites">
    <h2>My Favorites</h2>
    <div class="carousel">
        <!-- My Favorites carousel items go here -->
    </div>
    <div class="content">
        <p>Explore a curated collection of your favorite shows and movies, handpicked just for you.</p>
    </div>
</section>

<section id="recommended">
    <h2>Recommended</h2>
    <div class="carousel">
        <!-- Recommended carousel items go here -->
    </div>
    <div class="content">
        <p>Get personalized recommendations based on your viewing history and preferences.</p>
    </div>
</section>

<footer id="footer">
    <div class="container">
        <p>&copy; 2024 HOOP Movies & Series. All rights reserved.</p>
    </div>
</footer>

<script>
    document.getElementById('delete-developer-form').addEventListener('submit', function(event) {
        event.preventDefault();

        let employeeID = document.getElementById('employeeID').value;

        fetch('api.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                type: 'deleteDeveloper',
                employeeID: employeeID
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert('Developer deleted successfully');
            } else {
                alert('Failed to delete developer: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while processing the request.');
        });
    });

    document.getElementById('add-developer-form').addEventListener('submit', function(event) {
        event.preventDefault();

        let employeeID = document.getElementById('employeeID').value;
        let programmer = parseInt(document.getElementById('programmer').value); // Convert to integer
        let web_dev = parseInt(document.getElementById('web_dev').value); // Convert to integer
        let cyberSecurity = parseInt(document.getElementById('cyberSecurity').value); // Convert to integer

        fetch('api.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                type: 'addDeveloper',
                employeeID: employeeID,
                programmer: programmer,
                web_dev: web_dev,
                cyberSecurity: cyberSecurity
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert('Developer added successfully');
            } else {
                alert('Failed to add developer: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while processing the request.');
        });
    });
</script>
</body>
</html>
