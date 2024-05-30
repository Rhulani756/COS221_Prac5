User Registration and Login:
-Before using the app a user should register for the website and thus create a profile. If a user is an admin they will be taken to an admin version of the application, else they will be taken to a normal website with less priviledges.

Users should be able to log in securely using their credentials (username/email and password are required for this). 
The application hashes and add a salt to password for extra security on credidentials.

For admin users they can navigate to series and movies pages where they can search for and delete, update or insert movies and series.
For normal users they can view listing and sort or filter based on various options.
Web application should be able to show series and movies pulled from the database.

Users are able to review a movie or series.

The database was populated by using a pythong script which fetched data from the IMDB public api and inserts it into the database. This was done in order to accomodate for images. The script also accomodates other aspects by generating artificial data.
