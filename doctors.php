<?php
session_start();

if(!isset($_SESSION['username'])){
  header("location:home.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Doctors Nearby</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lucide-static@0.344.0/font/lucide.min.css">
</head>

<body>
    <!-- Animated falling leaves -->
    <div class="leaf" style="left: 10%; animation-delay: 0s;"></div>
    <div class="leaf" style="left: 20%; animation-delay: 2s;"></div>
    <div class="leaf" style="left: 35%; animation-delay: 4s;"></div>
    <div class="leaf" style="left: 50%; animation-delay: 6s;"></div>
    <div class="leaf" style="left: 65%; animation-delay: 8s;"></div>
    <div class="leaf" style="left: 80%; animation-delay: 10s;"></div>
    <div class="leaf" style="left: 90%; animation-delay: 12s;"></div>

    <!-- Header -->
    <header class="header">
        <div class="header-bg"></div>
        <div class="header-content">
            <h1 class="header-title animate-pulse">Find Doctors Nearby</h1>
            <p class="header-subtitle">Connect with the best healthcare professionals in your area</p>
        </div>
    </header>

    <?php
    include "backend/connect_db.php";

    $search_doctors_query = "SELECT * FROM doctors";
    $search_doctors = mysqli_query($connect, $search_doctors_query);
    ?>

    <div class="container">
        <!-- Search Container -->
        <div class="search-container fade-in-up">
            <h2 class="search-title">Search for Doctors</h2>
            <div class="search-inputs">
                <form action="" method="get">
                    <div class="input-wrapper">
                        <i class="lucide lucide-search"></i>
                        <input type="text" name="doctor_or_speciality" value="<?php if (isset($_GET['doctor_or_speciality'])) {
                                                                                    echo $_GET['doctor_or_speciality'];
                                                                                } ?>" placeholder="Doctor name or specialty..." class="search-input"><br><br>
                        <button class="search-button animate-pulse" type="submit">Find Doctors by Name/Speciality</button>
                    </div>
                </form>
                <form action="" method="get">
                    <div class="input-wrapper">
                        <i class="lucide lucide-map-pin"></i>
                        <input type="text" name="location" placeholder="Your location or city..." value="<?php if (isset($_GET['location'])) {
                                                                                                                echo $_GET['location'];
                                                                                                            } ?>" class="search-input"><br><br>
                        <button class="search-button animate-pulse" type="submit">Find Doctors by Location/City</button>
                    </div>
                </form>
            </div>
        </div>

        <?php

        if (isset($_GET['doctor_or_speciality'])) {
            $filterdoctors = $_GET['doctor_or_speciality'];
            $search_docbynameorspeciality_query = "SELECT * FROM doctors WHERE CONCAT(name, speciality) LIKE '%$filterdoctors%'";
            $search_docbynameorspeciality = mysqli_query($connect, $search_docbynameorspeciality_query);

            if (mysqli_num_rows($search_docbynameorspeciality) > 0) {

        ?>

                <div class="section fade-in-up delay-300">
                    <h2 class="section-title">
                        Search Results
                        <span class="title-underline"></span>
                    </h2>

                    <div class="doctor-grid">
                        <!-- Doctor Card 1 -->
                        <?php foreach ($search_docbynameorspeciality as $doc_details) { ?>
                            <div class="doctor-card">

                                <div class="doctor-image-container">
                                    <div class="image-overlay"></div>
                                    <img src="<?php echo $doc_details['image']; ?>" alt="Dr. Priya Sharma" class="doctor-image">
                                </div>
                                <div class="doctor-details">
                                    <h3 class="doctor-name">Dr. <?php echo $doc_details['name']; ?></h3>
                                    <p class="doctor-specialty"><?php echo $doc_details['speciality']; ?></p>
                                    <div class="doctor-info">
                                        <div class="info-item">
                                            <i class="lucide lucide-dollar-sign"></i>
                                            <span class="fee">₹<?php echo $doc_details['fee']; ?> per consultation</span>
                                        </div>
                                        <div class="info-item">
                                            <i class="lucide lucide-map-pin"></i>
                                            <span><?php echo $doc_details['location']; ?></span>
                                        </div>
                                        <div class="info-item">
                                            <i class="lucide lucide-phone"></i>
                                            <span><?php echo $doc_details['phone']; ?></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php } ?>

                    </div>
                </div>

            <?php

            } else {
                echo "No results.";
            }
        } elseif (isset($_GET['location'])) {
            $filterdoctors = $_GET['location'];
            $search_docbynameorspeciality_query = "SELECT * FROM doctors WHERE CONCAT(location) LIKE '%$filterdoctors%'";
            $search_docbynameorspeciality = mysqli_query($connect, $search_docbynameorspeciality_query);

            if (mysqli_num_rows($search_docbynameorspeciality) > 0) {

            ?>

                <div class="section fade-in-up delay-300">
                    <h2 class="section-title">
                        Search Results
                        <span class="title-underline"></span>
                    </h2>

                    <div class="doctor-grid">
                        <!-- Doctor Card 1 -->
                        <?php foreach ($search_docbynameorspeciality as $doc_details) { ?>
                            <div class="doctor-card">

                                <div class="doctor-image-container">
                                    <div class="image-overlay"></div>
                                    <img src="<?php echo $doc_details['image']; ?>" alt="Dr. Priya Sharma" class="doctor-image">
                                </div>
                                <div class="doctor-details">
                                    <h3 class="doctor-name">Dr. <?php echo $doc_details['name']; ?></h3>
                                    <p class="doctor-specialty"><?php echo $doc_details['speciality']; ?></p>
                                    <div class="doctor-info">
                                        <div class="info-item">
                                            <i class="lucide lucide-dollar-sign"></i>
                                            <span class="fee">₹<?php echo $doc_details['fee']; ?> per consultation</span>
                                        </div>
                                        <div class="info-item">
                                            <i class="lucide lucide-map-pin"></i>
                                            <span><?php echo $doc_details['location']; ?></span>
                                        </div>
                                        <div class="info-item">
                                            <i class="lucide lucide-phone"></i>
                                            <span><?php echo $doc_details['phone']; ?></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php } ?>

                    </div>
                </div>

            <?php

            } else {
                echo "No results.";
            }
        } else {
            ?>


            <!-- Doctors Section -->
            <div class="section fade-in-up delay-300">
                <h2 class="section-title">
                    Top Rated Doctors
                    <span class="title-underline"></span>
                </h2>

                <div class="doctor-grid">
                    <!-- Doctor Card 1 -->
                    <?php
                    while ($doctors_row = mysqli_fetch_assoc($search_doctors)) {

                    ?>
                        <div class="doctor-card">

                            <div class="doctor-image-container">
                                <div class="image-overlay"></div>
                                <img src="<?php echo $doctors_row['image']; ?>" alt="Dr. Priya Sharma" class="doctor-image">
                            </div>
                            <div class="doctor-details">
                                <h3 class="doctor-name">Dr. <?php echo $doctors_row['name']; ?></h3>
                                <p class="doctor-specialty"><?php echo $doctors_row['speciality']; ?></p>
                                <div class="doctor-info">
                                    <div class="info-item">
                                        <i class="lucide lucide-dollar-sign"></i>
                                        <span class="fee">₹<?php echo $doctors_row['fee']; ?> per consultation</span>
                                    </div>
                                    <div class="info-item">
                                        <i class="lucide lucide-map-pin"></i>
                                        <span><?php echo $doctors_row['location']; ?></span>
                                    </div>
                                    <div class="info-item">
                                        <i class="lucide lucide-phone"></i>
                                        <span><?php echo $doctors_row['phone']; ?></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php } ?>
                    <!-- Doctor Card 2 -->
                    <!-- <div class="doctor-card">
                    <div class="doctor-image-container">
                        <div class="image-overlay"></div>
                        <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Dr. Rajesh Patel" class="doctor-image">
                    </div>
                    <div class="doctor-details">
                        <h3 class="doctor-name">Dr. Rajesh Patel</h3>
                        <p class="doctor-specialty">Homeopathy Expert</p>
                        <div class="doctor-info">
                            <div class="info-item">
                                <i class="lucide lucide-dollar-sign"></i>
                                <span class="fee">₹600 per consultation</span>
                            </div>
                            <div class="info-item">
                                <i class="lucide lucide-map-pin"></i>
                                <span>Kalyani</span>
                            </div>
                            <div class="info-item">
                                <i class="lucide lucide-phone"></i>
                                <span>+91 87654 32109</span>
                            </div>
                        </div>
                    </div>
                </div> -->

                    <!-- Doctor Card 3 -->
                    <!-- <div class="doctor-card">
                    <div class="doctor-image-container">
                        <div class="image-overlay"></div>
                        <img src="https://images.unsplash.com/photo-1594824476967-48c8b964273f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Dr. Anjali Gupta" class="doctor-image">
                    </div>
                    <div class="doctor-details">
                        <h3 class="doctor-name">Dr. Anjali Gupta</h3>
                        <p class="doctor-specialty">Naturopathy Practitioner</p>
                        <div class="doctor-info">
                            <div class="info-item">
                                <i class="lucide lucide-dollar-sign"></i>
                                <span class="fee">₹750 per consultation</span>
                            </div>
                            <div class="info-item">
                                <i class="lucide lucide-map-pin"></i>
                                <span>Kharagpur</span>
                            </div>
                            <div class="info-item">
                                <i class="lucide lucide-phone"></i>
                                <span>+91 76543 21098</span>
                            </div>
                        </div>
                    </div>
                </div> -->

                    <!-- Doctor Card 4 -->
                    <!-- <div class="doctor-card">
                    <div class="doctor-image-container">
                        <div class="image-overlay"></div>
                        <img src="https://images.unsplash.com/photo-1622253692010-333f2da6031d?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Dr. Sunil Verma" class="doctor-image">
                    </div>
                    <div class="doctor-details">
                        <h3 class="doctor-name">Dr. Sunil Verma</h3>
                        <p class="doctor-specialty">Herbal Medicine Specialist</p>
                        <div class="doctor-info">
                            <div class="info-item">
                                <i class="lucide lucide-dollar-sign"></i>
                                <span class="fee">₹900 per consultation</span>
                            </div>
                            <div class="info-item">
                                <i class="lucide lucide-map-pin"></i>
                                <span>Howrah</span>
                            </div>
                            <div class="info-item">
                                <i class="lucide lucide-phone"></i>
                                <span>+91 65432 10987</span>
                            </div>
                        </div>
                    </div>
                </div> -->
                </div>
            </div>


        <?php
        }

        ?>


        <!-- Plants Section -->
        <div class="section fade-in-up delay-500">
            <h2 class="section-title">
                Healing Plants & Herbs
                <span class="title-underline"></span>
            </h2>

            <div class="plants-grid">
                <!-- Plant Card 1 -->
                <div class="plant-card" style="animation-delay: 0s;">
                    <div class="plant-overlay"></div>
                    <img src="images/tulsi.jpg">
                    <div class="plant-name">
                        <i class="lucide lucide-leaf"></i>
                        <span>Tulsi</span>
                    </div>
                </div>

                <!-- Plant Card 2 -->
                <div class="plant-card" style="animation-delay: 0.5s;">
                    <div class="plant-overlay"></div>
                    <img src="images/Neem.jpg" alt="Neem" class="plant-image">
                    <div class="plant-name">
                        <i class="lucide lucide-leaf"></i>
                        <span>Neem</span>
                    </div>
                </div>

                <!-- Plant Card 3 -->
                <div class="plant-card" style="animation-delay: 1s;">
                    <div class="plant-overlay"></div>
                    <img src="images/Ashwagandha.jpg" alt="Ashwagandha" class="plant-image">
                    <div class="plant-name">
                        <i class="lucide lucide-leaf"></i>
                        <span>Ashwagandha</span>
                    </div>
                </div>

                <!-- Plant Card 4 -->
                <div class="plant-card" style="animation-delay: 1.5s;">
                    <div class="plant-overlay"></div>
                    <img src="images/brahmi.jpg" alt="Brahmi" class="plant-image">
                    <div class="plant-name">
                        <i class="lucide lucide-leaf"></i>
                        <span>Brahmi</span>
                    </div>
                </div>

                <!-- Plant Card 5 -->
                <div class="plant-card" style="animation-delay: 2s;">
                    <div class="plant-overlay"></div>
                    <img src="images/aleo vera.jpg" alt="Aloe Vera" class="plant-image">
                    <div class="plant-name">
                        <i class="lucide lucide-leaf"></i>
                        <span>Aloe Vera</span>
                    </div>
                </div>

                <!-- Plant Card 6 -->
                <div class="plant-card" style="animation-delay: 2.5s;">
                    <div class="plant-overlay"></div>
                    <img src="images/ginger.jpg" alt="Ginger" class="plant-image">
                    <div class="plant-name">
                        <i class="lucide lucide-leaf"></i>
                        <span>Ginger</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer fade-in delay-700">
        <div class="footer-bg"></div>
        <div class="footer-content">
            <p>© 2025 Doctor Finder - Connecting You With Healthcare Professionals</p>
        </div>
    </footer>

    <script>
        // Simple script to add loaded class to body for animations
        document.addEventListener('DOMContentLoaded', function() {
            document.body.classList.add('loaded');
        });
    </script>
</body>

</html>