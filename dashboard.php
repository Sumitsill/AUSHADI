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
  <title>Aushadi</title>
  <link rel="stylesheet" href="css/styles2.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="container">
    <!-- Header -->
    <header class="header">
      <div class="header-container">
        <div class="logo">
          <a href="/">
            <div class="logo-icon">
              <i class="fas fa-leaf"></i>
            </div>
            <span class="logo-text">Aushadi</span>
          </a>
        </div>
        
        <!-- Desktop Navigation -->
        <nav class="desktop-nav" style="margin-right: 20px;">
          <a href="#home" class="nav-link">Home</a>
          <a href="#plants" class="nav-link">Plants</a>
          <a href="#Aushadi" class="nav-link">Aushadi Systems</a>
          <a href="https://leafy-baklava-282ea6.netlify.app/" class="nav-link">3D Garden</a>
          <a href="#About" class="nav-link">About</a>
          <a href="backend/logout.php"><i class='bx bxs-user-pin' style="font-size: 40px;";></i></a>
        </nav>
        
        <!-- Mobile menu button -->
        <div class="mobile-menu-btn">
          <button id="menu-toggle">
            <span class="sr-only">Open menu</span>
            <i class="fas fa-bars" id="menu-icon"></i>
          </button>
        </div>
      </div>
      
      <!-- Mobile menu -->
      <div class="mobile-menu" id="mobile-menu">
        <div class="mobile-menu-links">
          <a href="#home" class="mobile-link">Home</a>
          <a href="#plants" class="mobile-link">Plants</a>
          <a href="#Aushadi" class="mobile-link">Aushadi Systems</a>
          <a href="https://leafy-baklava-282ea6.netlify.app/" class="mobile-link">3D Garden</a>
          <a href="#About" class="mobile-link">About</a>
          <a href="backend/logout.php"><i class='bx bxs-user-circle' style="font-size: 30px;";></i></a>
        </div>
      </div>
    </header>
    
    <main>
      <!-- Hero Section -->
      <section class="hero" id="home">
        <div class="hero-pattern"></div>
        
        <div class="hero-container">
          <div class="hero-content">
            <div class="hero-text">
              <h1>
                Discover the Healing Power of <span class="highlight">Medicinal Plants</span>
              </h1>
              <p>
                Explore our interactive virtual garden featuring medicinal plants used in Ayurveda, Yoga, Siddha, and Homeopathy.
              </p>
              
              <div class="hero-buttons">
                <a href="https://leafy-baklava-282ea6.netlify.app/"class="primary-btn">
                  Explore Garden
                  <i class="fas fa-arrow-right"></i>
                </a>
                <a href="research.php" class="secondary-btn">
                  Learn About Aushadi
                </a>
              </div>
            </div>
            
            <div class="hero-card">
              <div class="card-content">
                <img 
                  src="https://images.unsplash.com/photo-1540420773420-3366772f4999?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                  alt="Medicinal herbs and plants" 
                  class="card-image"
                />
                <div class="system-tags">
                  <span class="tag ayurveda">Ayurveda</span>
                  <span class="tag yoga">Yoga</span>
                  <span class="tag siddha">Siddha</span>
                  <span class="tag homeopathy">Homeopathy</span>
                </div>
                <p class="card-description">
                  Discover 500+ medicinal plants with detailed information about their properties, uses, and cultivation methods.
                </p>
                <div class="search-container" id="plants">
                  <input
                    type="text"
                    placeholder="Search for a plant..."
                    class="hero-search"
                  />
                  <i class="fas fa-search search-icon"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      <!-- Search and Filter Section -->
      <section class="search-section">
        <div class="search-container">
          <div class="search-box">
            <div class="search-input-container">
              <input
                type="text"
                id="search-input"
                placeholder="Search plants by name or scientific name..."
                class="search-input"
              />
              <i class="fas fa-search search-icon-main"></i>
            </div>
            
            <div class="filter-label">
              <i class="fas fa-filter"></i>
              <span>Filter by:</span>
            </div>
            
            <div class="system-filters" id="system-filters">
              <!-- System filters will be added by JavaScript -->
            </div>
          </div>
          
          <div class="category-filters" id="category-filters">
            <!-- Category filters will be added by JavaScript -->
          </div>
        </div>
      </section>
      
      <!-- Plants Gallery -->
      <section class="plants-gallery">
        <h2 class="section-title">
          <i class="fas fa-leaf"></i>
          Medicinal Plants Collection
          <span id="plants-count" class="count-badge"></span>
        </h2>
        
        <div id="plants-container" class="plants-grid">
          <!-- Plant cards will be added by JavaScript -->
        </div>
        
        <div id="no-plants" class="no-plants-found hidden">
          <div class="no-plants-icon">
            <i class="fas fa-leaf"></i>
          </div>
          <h3>No plants found</h3>
          <p>Try adjusting your search or filters</p>
        </div>
      </section>
      
      <!-- Features Section -->
      <section id="Aushadi" class="features-section">
        <div class="features-container">
          <h2 class="features-title">Explore Our Features</h2>
          
          <div class="features-grid">
            <a href="doctors.php">
            <div class="feature-card">
              <div class="feature-icon green">
                <i class="fas fa-book-open"></i>
              </div>
              
              <h3>Consult a Doctor</h3>
              <p>Get advices and cure from the experts at your comfort.</p>
            </div>
          </a>
            
            <div class="feature-card">
              <div class="feature-icon amber">
                <i class="fas fa-map"></i>
              </div>
              <h3>Interactive Garden</h3>
              <p>Explore a virtual 3D garden with detailed plant models and information.</p>
            </div>
            
            <a href="items.php">
            <div class="feature-card">
              <div class="feature-icon blue">
                <i class="fas fa-info-circle"></i>
              </div>
              <h3>Medicinal Properties</h3>
              <p>Learn about the healing properties and traditional uses of each plant.</p>
            </div>
          </a>

            <a href="research.php">
            <div class="feature-card">
              <div class="feature-icon purple">
                <i class="fas fa-home"></i>
              </div>
              <h3>Research and Knowledge</h3>
              <p>Bridging additional knowledge with scientific research.</p>
            </div>
          </a>
          </div>
        </div>
      </section>
      
      <!-- Call to Action -->
      <section class="cta-section">
        <div class="cta-container">
          <h2>Experience the Healing Power of Nature</h2>
          <p>
            Discover the ancient wisdom of Aushadi medicinal plants and their applications in modern healthcare.
          </p>
          <a href="https://leafy-baklava-282ea6.netlify.app/" class="cta-button">
            Explore 3D Garden
            <i class="fas fa-arrow-right"></i>
          </a>
        </div>
      </section>
    </main>
    
    <!-- Footer -->
    <footer id="About" class="footer">
      <div class="footer-container">
        <div class="footer-grid">
          <div class="footer-about">
            <div class="footer-logo">
              <div class="footer-logo-icon">
                <i class="fas fa-leaf"></i>
              </div>
              <span>Aushadi</span>
            </div>
            <p>
              An interactive educational platform showcasing medicinal plants used in Aushadi systems.
            </p>
            <div class="social-links">
              <a href="#" class="social-link"><i class="fab fa-facebook"></i></a>
              <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
              <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
              <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
            </div>
          </div>
          
          <div class="footer-links">
            <h3>Quick Links</h3>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">Plants Database</a></li>
              <li><a href="#">3D Garden</a></li>
              <li><a href="#">Aushadi Systems</a></li>
              <li><a href="#">Growing Guide</a></li>
            </ul>
          </div>
          
          <div class="footer-links">
            <h3>Aushadi Systems</h3>
            <ul>
              <li><a href="#">Ayurveda</a></li>
              <li><a href="#">Yoga & Naturopathy</a></li>
              <li><a href="#">Siddha</a></li>
              <li><a href="#">Homeopathy</a></li>
            </ul>
          </div>
          
          <div class="footer-contact">
            <h3>Contact Us</h3>
            <ul>
              <li class="contact-item">
                <i class="fas fa-map-marker-alt"></i>
                <span>chowbaga,anandapur,kolkata-107</span>
              </li>
              <li class="contact-item">
                <i class="fas fa-phone"></i>
                <span>+91-8975936927</span>
              </li>
              <li class="contact-item">
                <i class="fas fa-envelope"></i>
                <span>info.aushadi@gmail.com</span>
              </li>
            </ul>
          </div>
        </div>
        
        <div class="footer-bottom">
          <p>&copy; <span id="current-year"></span> Aushadi. All rights reserved.</p>
          <div class="footer-policies">
            <ul>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Terms of Service</a></li>
              <li><a href="#">Cookie Policy</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>

  <script src="data.js"></script>
  <script src="js/script.js"></script>
</body>
</html>
