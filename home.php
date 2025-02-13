<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HonkAndSmile - Home</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="navbar">
    <!--<a href="#hero-image"><img src="Rcarlogo.png" height = 60 width = 30/></a>-->
        <!--<a href="#hero-image"><img src="Rcarlogo.png" alt="Logo" height = 60/></a>-->
        <!--<a href="#hero-image"><img src="Rcarlogo.png" alt="Logo" height="60" style="margin-right: 20px;" /></a>-->
        <a href="#hero-image"><img src="Rcarlogo.png" alt="Logo" height="60" style="margin-right: 20px;" /></a>

        <div class="menu">
            <a href="#hero-image">Home</a>
            <a href="#browse-cars">Browse Cars</a>
            <a href="#most-rented">Cars of the Month</a>
            <a href="#meet-the-hosts">Meet the Hosts</a>
            <a href="#contact-info">Contact Us</a>
        </div>
        <div class="auth-buttons">
            <button onclick="window.location.href='signup.php'">Sign Up</button>
            <button onclick="window.location.href='login.php'">Log In</button>
        </div>
    </div>

    <!-- Background Image Section -->
    <div id="hero-image" class="hero-image">
    <div class="hero-content">
        <h1>Welcome to HonkAndSmile!</h1>
        <p>Your trusted car rental service with flexible payment plans up to 3 months.</p>
        <!-- Search Section -->
        <div class="search-section">
            <form action="dayorweek.php" method="get">
                <label for="where">Where</label>
                <!--<input type="text" id="where" name="where" placeholder="Search for a location" required>-->
                <input type="text" id="where" placeholder="Enter a location" autocomplete="off">
                
                <label for="from">From</label>
                <input type="datetime-local" id="from" name="from" required>
            
                <label for="until">Until</label>
                <input type="datetime-local" id="until" name="until" required>
            
                <button type="submit" class="btn-search">Search</button>

                <div id="map"></div>
                <p id="error-message"></p>

                <script>
                    let map;
                    let autocomplete;
                    let marker;

                    function initMap() {
                    // Create the map container, hidden by default
                        map = new google.maps.Map(document.getElementById("map"), {
                            zoom: 14,
                        });

                        marker = new google.maps.Marker({
                            map: map,
                            visible: false,
                        });

                        // Setup autocomplete
                        const input = document.getElementById("where");
                        autocomplete = new google.maps.places.Autocomplete(input, {
                             types: ["geocode"],
                        });

                        autocomplete.addListener("place_changed", () => {
                            const place = autocomplete.getPlace();
                            const errorMessage = document.getElementById("error-message");

                        if (!place.geometry) {
                        // If no geometry, show error
                            errorMessage.textContent = "Sorry, this place cannot be found.";
                            document.getElementById("map").style.display = "none";
                            marker.setVisible(false);
                            return;
                        }

                        // Clear any previous error messages
                        errorMessage.textContent = "";

                        // Show the map and update location
                        document.getElementById("map").style.display = "block";
                        map.setCenter(place.geometry.location);
                        map.setZoom(14);
                        marker.setPosition(place.geometry.location);
                        marker.setVisible(true);
                    });
                }
                </script>

                    <!-- Load the Google Maps API -->
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCelw4cTPbbBcxST_7k53wvy5U9G1JkLTE&libraries=places&callback=initMap" async defer></script>
            </form>
        </div>
    </div>
</div>

    <!-- Car Image Slideshow -->
    <div class="car-image-slider">
        <img src="car1.jpg" alt="Car 1" class="car-image">
        <img src="car2.jpg" alt="Car 2" class="car-image">
        <img src="car3.jpg" alt="Car 3" class="car-image">
    </div>

    <!-- Browse Cars Section -->
    <div id="browse-cars" class="browse-cars">
        <h2>Browse Cars for Rent</h2>
        <button onclick="window.location.href='browse-cars.php'">Browse Cars</button>
    </div>

    <!-- Most Rented Cars Section -->
    <div id="most-rented" class="most-rented">
        <h2>Most Rented Cars This Month</h2>
        <div class="cars">
            <div class="car-item">Car 1</div>
            <div class="car-item">Car 2</div>
            <div class="car-item">Car 3</div>
        </div>
    </div>

    <!-- Meet the Hosts Section -->
    <section id="meet-the-hosts">
    <h2>Meet the Hosts</h2>
    <div class="hosts-container">
        <div class="host">
            <img src="https://via.placeholder.com/150" alt="Michelle Williams">
            <h3>Michelle Williams</h3>
            <p>Email: <a href="mailto:hh0111@wayne.edu">hh0111@wayne.edu</a></p>
        </div>
        <div class="host">
            <img src="https://via.placeholder.com/150" alt="Faiza Laskar">
            <h3>Faiza Laskar</h3>
            <p>Email: <a href="mailto:hh0237@wayne.edu">hh0237@wayne.edu</a></p>
        </div>
        <div class="host">
            <img src="https://via.placeholder.com/150" alt="Tim Bui">
            <h3>Tim Bui</h3>
            <p>Email: <a href="mailto:buitimanh@wayne.edu">buitimanh@wayne.edu</a></p>
        </div>
        <div class="host">
            <img src="https://via.placeholder.com/150" alt="Dheye Algalhan">
            <h3>Dheye Algalhan</h3>
            <p>Email: <a href="mailto:hz8323@wayne.edu">hz8323@wayne.edu</a></p>
        </div>
    </div>
</section>
<section id="contact">
    <h2>Contact Us</h2>
    <div class="contact-box">
        <p>For any inquiries, reach out to us:</p>
        <p>Email: <a href="mailto:team@yourproject.com">team@yourproject.com</a></p>
    </div>
</section>

    <!-- Contact Information Section -->
    <div id="contact-info" class="contact-info">
        <h2>Contact Us</h2>
        <ul>
            <li>Faiza Laskar - Phone: 313-603-1960 - Email: hh0237@wayne.edu</li>
            <li>Teammate one - Phone: 123-456-7891 - Email: aa1234@wayne.edu</li>
            <li>Teammate two - Phone: 123-456-7892 - Email: ab1234@wayne.edu</li>
            <li>Teammate three - Phone: 123-456-7893 - Email: ac1234@wayne.edu</li>
            <li>Teammate four - Phone: 123-456-7894 - Email: ad1234@wayne.edu</li>
        </ul>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 HonkAndSmile</p>
        <p><a href="termsandconditions.php">Terms and Conditions</a> | <a href="privacy.php">Privacy</a></p>
    </footer>

</body>
</html>
