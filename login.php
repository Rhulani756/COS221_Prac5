<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="StyleLooks2.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoop User Login</title>
    
</head>
<body>
    <head>
        <nav id="navbar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="indexAdmin.php">Admin</a></li>
                <li><a href="#tv-shows">TV Shows</a></li>
                <li><a href="movies.php">Movies</a></li>
                <li><a href="tvseries.php">Series</a></li>
                <li><a href="#new-popular">New & Popular</a></li>
                <li><a href="#my-favorites">My Favorites</a></li>
                <li><a href="#recommended">Recommended</a></li>
                <li><a href="loginout.php">Logout</a></li>
                <li><a href="Register.php">Register</a></li>
            </ul>
        </nav>
    </head>
    <div class="header">
        <img src="img/images.png" alt="My Logo" class="logo">
        <h1>Hoop</h1>
    </div>
    <form action="loginout.php" id="retha" method="post">
        <label for="email">Email:</label><br>
        <input type="email" name="email"><br>
        <label for="password">Password:</label><br>
        <input type="password" name="password"><br>
        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>
