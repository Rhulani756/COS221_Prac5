<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOOP Movies & Series</title>
    <link rel="stylesheet" href="StyleLooks2.css"> <!-- Link to the CSS file -->
</head>
<body>
<header id="header">
    <div class="container">
        <div id="logo">
            <img src="images/logoPicture.jpg" alt="The Big 6 Movies & Series Logo">
        </div>
        <div id="search-bar">
            <label>
                <input type="text" placeholder="Search...">
            </label>
            <button type="submit">Search</button>
        </div>
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
                <li><a href="#login.php">Login</a></li>
                <li><a href="#loginout.php">Logout</a></li>
                <!--<li><a href="#profile">Profile</a></li>--> <!-- Add a link to the profile page -->
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
        <!-- Money Heist -->
        <div class="movie">
            <img src="images/Money-Heist.webp" alt="Money Heist">
            <div class="movie-details">
                <h3>Money Heist</h3>
                <p>A criminal mastermind who goes by "The Professor" has a plan to pull off the biggest heist in recorded history -- to print billions of euros in the Royal Mint of Spain.</p>
            </div>
        </div>

        <!-- Power Book II -->
        <div class="movie">
            <img src="images/Power.jpg" alt="Power Book II">
            <div class="movie-details">
                <h3>Power Book II</h3>
                <p>Picking up just days after the "Power" finale, this sequel series follows Tariq navigating his new life, in which his desire to shed his father's legacy comes up against the mounting pressure to save his family.</p>
            </div>
        </div>

        <!-- John Wick: The Series -->
        <div class="movie">
            <img src="images/john_wick.jpg" alt="John Wick: The Series">
            <div class="movie-details">
                <h3>John Wick: The Series</h3>
                <p>Expands on the action-packed world of the John Wick franchise, following the legendary hitman as he navigates through the criminal underworld.</p>
            </div>
        </div>

        <!-- The Real Housewives of Beverly Hills -->
        <div class="movie">
            <img src="images/real_housewives.jpg" alt="The Real Housewives of Beverly Hills">
            <div class="movie-details">
                <h3>The Real Housewives of Beverly Hills</h3>
                <p>Offers a glimpse into the lavish lifestyles and dramatic interactions of affluent women living in Beverly Hills, with plenty of gossip, drama, and luxury.</p>
            </div>
        </div>

        <!-- Peaky Blinders -->
        <div class="movie">
            <img src="images/peaky_blinders.jpg" alt="Peaky Blinders">
            <div class="movie-details">
                <h3>Peaky Blinders</h3>
                <p>Set in post-World War I Birmingham, this gritty crime drama follows the Shelby crime family as they rise to power and confront enemies while navigating the dangerous streets.</p>
            </div>
        </div>

        <!-- The Witcher -->
        <div class="movie">
            <img src="images/the_witcher.jpg" alt="The Witcher">
            <div class="movie-details">
                <h3>The Witcher</h3>
                <p>Based on the popular book series, this fantasy epic follows Geralt of Rivia, a monster hunter known as a Witcher, as he battles supernatural beasts and political intrigue in a world filled with magic.</p>
            </div>
        </div>

        <!-- Add more featured shows here -->
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
        <div class="carousel-item">
            <img src="images/Championz.jpg" alt="This is Championz">
            <h3>Champions</h3>
            <p>A heartwarming comedy series following the ups and downs of a soccer team's journey to victory.</p>
        </div>
        <div class="carousel-item">
            <img src="images/Gqeberha.jpg" alt="This is Gqeberha">
            <h3>Gqeberha</h3>
            <p>A captivating drama series set in the vibrant city of Gqeberha, exploring themes of love, betrayal, and redemption.</p>
        </div>
        <div class="carousel-item">
            <img src="images/Friends.jpg" alt="Friends">
            <p>Description for Friends</p>
        </div>
        <div class="carousel-item">
            <img src="images/Stranger_Things.jpg" alt="Stranger Things">
            <p>Description for Stranger Things</p>
        </div>
        <div class="carousel-item">
            <img src="images/The_Mandalorian.jpg" alt="The Mandalorian">
            <p>Description for The Mandalorian</p>
        </div>
        <div class="carousel-item">
            <img src="images/Big_Bang_Theory.jpg" alt="Big Bang Theory">
            <p>Description for Big Bang Theory</p>
        </div>
        <div class="carousel-item">
            <img src="images/The_Office_US.jpg" alt="The Office (US)">
            <p>Description for The Office (US)</p>
        </div>
    </div>
    <div class="content">
        <p>Explore our vast collection of TV shows spanning various genres and categories.</p>
    </div>
</section>

<section id="movies">
    <h2>Movies</h2>
    <div class="carousel">
        <div class="carousel-item">
            <img src="images/Bad Boys.jpg" alt="This is Bad Boys">
            <h3>Bad Boys 2024</h3>
            <p>The latest installment in the action-packed Bad Boys franchise, featuring explosive car chases and thrilling shootouts.</p>
        </div>
        <div class="carousel-item">
            <img src="images/Extraction.jpg" alt="This is Extraction">
            <h3>Extraction</h3>
            <p>A mercenary is hired to rescue the kidnapped son of an international crime lord.</p>
        </div>
        <div class="carousel-item">
            <img src="images/Inception.jpg" alt="Inception">
            <p>Description for Inception</p>
        </div>
        <div class="carousel-item">
            <img src="images/Pulp_Fiction.jpg" alt="Pulp Fiction">
            <p>Description for Pulp Fiction</p>
        </div>
        <div class="carousel-item">
            <img src="images/The_Dark_Knight.jpg" alt="The Dark Knight">
            <p>Description for The Dark Knight</p>
        </div>
        <div class="carousel-item">
            <img src="images/Avatar.jpg" alt="Avatar">
            <p>Description for Avatar</p>
        </div>
        <div class="carousel-item">
            <img src="images/Fight_Club.jpg" alt="Fight Club">
            <p>Description for Fight Club</p>
        </div>
    </div>
    <div class="content">
        <p>Dive into a diverse selection of movies, ranging from classics to the latest blockbusters.</p>
    </div>
</section>

<section id="series">
    <h2>Series</h2>
    <div class="carousel">
        <div class="carousel-item">
            <img src="images/Suits.jpg" alt="This is Suits">
            <h3>Suits</h3>
            <p>A legal drama series following the high-stakes world of corporate law and courtroom battles.</p>
        </div>
        <div class="carousel-item">
            <img src="images/Redemption.jpg" alt="This is Redemption">
            <h3>Redemption</h3>
            <p>A thrilling action movie about a former special ops soldier seeking redemption.</p>
        </div>
        <div class="carousel-item">
            <img src="images/Game_of_Thrones.jpg" alt="Game of Thrones">
            <p>Description for Game of Thrones</p>
        </div>
        <div class="carousel-item">
            <img src="images/The_Witcher.jpg" alt="The Witcher">
            <p>Description for The Witcher</p>
        </div>
        <div class="carousel-item">
            <img src="images/Black_Mirror.jpg" alt="Black Mirror">
            <p>Description for Black Mirror</p>
        </div>
        <div class="carousel-item">
            <img src="images/The_Walking_Dead.jpg" alt="The Walking Dead">
            <p>Description for The Walking Dead</p>
        </div>
        <div class="carousel-item">
            <img src="images/Breaking_Bad.jpg" alt="Breaking Bad">
            <p>Description for Breaking Bad</p>
        </div>
    </div>
    <div class="content">
        <p>Get hooked on our captivating series, featuring compelling storylines and memorable characters.</p>
    </div>
</section>

<section id="new-popular">
    <h2>New & Popular</h2>
    <div class="carousel">
        <div class="carousel-item">
            <img src="images/Power.jpg" alt="This is Power">
            <h3>Power</h3>
            <p>A gripping crime drama series revolving around a drug dealer and his network of allies and enemies.</p>
        </div>
        <div class="carousel-item">
            <img src="images/Bad Boys.jpg" alt="This is Bad Boys">
            <h3>Bad Boys 2024</h3>
            <p>The latest installment in the action-packed Bad Boys franchise, featuring explosive car chases and thrilling shootouts.</p>
        </div>
        <div class="carousel-item">
            <img src="images/Squid_Game.jpg" alt="Squid Game">
            <p>Description for Squid Game</p>
        </div>
        <div class="carousel-item">
            <img src="images/Bridgerton.jpg" alt="Bridgerton">
            <p>Description for Bridgerton</p>
        </div>
        <div class="carousel-item">
            <img src="images/Loki.jpg" alt="Loki">
            <p>Description for Loki</p>
        </div>
        <div class="carousel-item">
            <img src="images/Money_Heist.jpg" alt="Money Heist">
            <p>Description for Money Heist</p>
        </div>
        <div class="carousel-item">
            <img src="images/The_Queens_Gambit.jpg" alt="The Queen's Gambit">
            <p>Description for The Queen's Gambit</p>
        </div>
    </div>
    <div class="content">
        <p>Check out our latest releases and trending titles that everyone is talking about.</p>
    </div>
</section>

<section id="my-favorites">
    <h2>My Favorites</h2>
    <div class="carousel">
        <div class="carousel-item">
            <img src="images/Extraction.jpg" alt="This is Extraction">
            <h3>Extraction</h3>
            <p>A mercenary is hired to rescue the kidnapped son of an international crime lord.</p>
        </div>
        <div class="carousel-item">
            <img src="images/Daughter%20of%20a%20wolf.webp" alt="This is Daughter of a wolf">
            <h3>Daughter of a Wolf</h3>
            <p>A suspenseful thriller about a woman seeking revenge for her father's murder.</p>
        </div>
        <div class="carousel-item">
            <img src="images/Sherlock.jpg" alt="Sherlock">
            <p>Description for Sherlock</p>
        </div>
        <div class="carousel-item">
            <img src="images/Brooklyn_Nine-Nine.jpg" alt="Brooklyn Nine-Nine">
            <p>Description for Brooklyn Nine-Nine</p>
        </div>
        <div class="carousel-item">
            <img src="images/Narcos.jpg" alt="Narcos">
            <p>Description for Narcos</p>
        </div>
        <div class="carousel-item">
            <img src="images/The_Haunting_of_Hill_House.jpg" alt="The Haunting of Hill House">
            <p>Description for The Haunting of Hill House</p>
        </div>
        <div class="carousel-item">
            <img src="images/Stranger_Things.jpg" alt="Stranger Things">
            <p>Description for Stranger Things</p>
        </div>
    </div>
    <div class="content">
        <p>Discover and save your favorite movies and series to your personal favorites list.</p>
    </div>
</section>

<section id="recommended">
    <h2>Recommended</h2>
     <div class="carousel">
         <div class="carousel-item">
             <img src="images/12%20Strong.jpg" alt="This is 12 Strong">
             <h3>12 Strong</h3>
             <p>A riveting war drama based on the true story of a U.S. Special Forces team deployed to Afghanistan after 9/11.</p>
         </div>
          <div class="carousel-item">
              <img src="images/Money-Heist.webp" alt="This is Money Heist">
              <h3>Money Heist</h3>
              <p>A criminal mastermind orchestrates an ambitious heist at the Royal Mint of Spain.</p>
          </div>
         <div class="carousel-item">
             <img src="images/The_Marvelous_Mrs_Maisel.jpg" alt="The Marvelous Mrs. Maisel">
             <p>Description for The Marvelous Mrs. Maisel</p>
         </div>
         <div class="carousel-item">
             <img src="images/The_Crown.jpg" alt="The Crown">
             <p>Description for The Crown</p>
         </div>
         <div class="carousel-item">
             <img src="images/Fleabag.jpg" alt="Fleabag">
             <p>Description for Fleabag</p>
         </div>
         <div class="carousel-item">
             <img src="images/Schitts_Creek.jpg" alt="Schitt's Creek">
             <p>Description for Schitt's Creek</p>
         </div>
         <div class="carousel-item">
             <img src="images/Cobra_Kai.jpg" alt="Cobra Kai">
             <p>Description for Cobra Kai</p>
         </div>
     </div>
    <div class="content">
        <p>Find personalized recommendations based on your viewing history and preferences.</p>
    </div>
</section>

<!--<div id="profile-icon">-->
    <!-- If the user is logged in, show their profile picture -->
    <!--<img src="images/profile_picture.jpg" alt="Profile Picture">-->
    <!-- If the user is not logged in, show a sticker -->
   <!-- <div class="sticker">+</div>-->
<!--</div>-->

<footer id="footer">
    <div class="container">
        <p>&copy; 2024 HOOP Movies & Series. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
