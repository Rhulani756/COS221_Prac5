<?php
include "config.php";
session_start();

if (isset($_POST['delete'])) {
    // Check if movie_id is set and not empty
    if (isset($_POST['series_id']) && !empty($_POST['series_id'])) {
        // Sanitize input to prevent SQL injection
        $series_id= mysqli_real_escape_string($conn, $_POST['series_id']);

        // Construct SQL query to delete the movie
        $sql = "DELETE FROM series WHERE seriesID = '$series_id'";

        // Attempt to execute the query
        if (mysqli_query($conn, $sql)) {
            echo "Series deleted successfully.";
            // Redirect back to the view page
            header("Location: tvseries.php");
            exit();
        } else {
            echo "Error deleting series: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid series ID.";
    }
} else {
    echo "Invalid request.";
}
?>