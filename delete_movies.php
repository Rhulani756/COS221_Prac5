<?php
include "config.php";
session_start();

if (isset($_POST['delete'])) {
    // Check if movie_id is set and not empty
    if (isset($_POST['movie_id']) && !empty($_POST['movie_id'])) {
        // Sanitize input to prevent SQL injection
        $movie_id = mysqli_real_escape_string($conn, $_POST['movie_id']);

        // Construct SQL query to delete the movie
        $sql = "DELETE FROM movies WHERE movieID = '$movie_id'";

        // Attempt to execute the query
        if (mysqli_query($conn, $sql)) {
            echo "Movie deleted successfully.";
            // Redirect back to the view page
            header("Location: moviesdirectory.php");
            exit();
        } else {
            echo "Error deleting movie: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid movie ID.";
    }
} else {
    echo "Invalid request.";
}
?>
