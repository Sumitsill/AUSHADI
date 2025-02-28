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
    <title>Research and Knowlodge - Ancient Wisdom in Modern Healthcare</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f9f7f2;
            color: #333;
            line-height: 1.6;
        }
        
        header {
            background: linear-gradient(to right, #2e7d32, #4caf50);
            color: white;
            text-align: center;
            padding: 2rem 0;
            position: relative;
            overflow: hidden;
        }
        
        .header-content {
            position: relative;
            z-index: 2;
        }
        
        header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('/api/placeholder/1200/400');
            background-size: cover;
            background-position: center;
            opacity: 0.2;
            z-index: 1;
        }
        
        h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        
        h2 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            color: #2e7d32;
        }
        
        p {
            margin-bottom: 1rem;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        .intro {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .plants-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }
        
        .plant-card {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgb(235, 252, 5);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .plant-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(214, 236, 9, 0.884);
        }
        
        .plant-image {
            height: 200px;
            background-size: cover;
            background-position: center;
        }
        
        .plant-info {
            padding: 1.5rem;
        }
        
        .plant-name {
            font-size: 1.4rem;
            margin-bottom: 0.5rem;
            color: #2e7d32;
        }
        
        .plant-sanskrit {
            font-style: italic;
            color: #666;
            margin-bottom: 1rem;
        }
        
        .benefits-list {
            list-style-type: none;
        }
        
        .benefits-list li {
            padding-left: 1.5rem;
            position: relative;
            margin-bottom: 0.5rem;
        }
        
        .benefits-list li::before {
            content: "•";
            color: #4caf50;
            font-weight: bold;
            position: absolute;
            left: 0;
        }
        
        .read-more {
            display: inline-block;
            margin-top: 1rem;
            color: #2e7d32;
            font-weight: bold;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .read-more:hover {
            color: #1b5e20;
        }
        
        .research-section {
            background-color: #e8f5e9;
            padding: 3rem 2rem;
            border-radius: 8px;
            margin-bottom: 3rem;
        }
        
        .tabs {
            display: flex;
            border-bottom: 1px solid #ddd;
            margin-bottom: 2rem;
        }
        
        .tab-btn {
            padding: 1rem 2rem;
            background: none;
            border: none;
            font-size: 1rem;
            font-weight: 600;
            color: #666;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .tab-btn.active {
            color: #2e7d32;
            border-bottom: 3px solid #2e7d32;
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
        }
        
        .research-list {
            list-style-type: none;
        }
        
        .research-item {
            background-color: white;
            padding: 1.5rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            box-shadow: 0 2px 4px rgb(9, 238, 238);
        }
        
        .research-title {
            font-weight: bold;
            margin-bottom: 0.5rem;
        }
        
        .search-container {
            margin-bottom: 2rem;
            display: flex;
            justify-content: center;
        }
        
        .search-box {
            width: 100%;
            max-width: 500px;
            padding: 0.8rem 1.5rem;
            border: 2px solid #ddd;
            border-radius: 30px;
            font-size: 1rem;
            outline: none;
            transition: border-color 0.3s ease;
        }
        
        .search-box:focus {
            border-color: #2e7d32;
        }
        
        .footer {
            background-color: #2e7d32;
            color: white;
            text-align: center;
            padding: 2rem 0;
            margin-top: 3rem;
        }
        
        .contact-form {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(15, 209, 243, 0.925);
            max-width: 600px;
            margin: 0 auto;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }
        
        input, textarea {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }
        
        button.submit-btn {
            background-color: #2e7d32;
            color: white;
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        button.submit-btn:hover {
            background-color: #1b5e20;
        }
        
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }
            
            h2 {
                font-size: 1.5rem;
            }
            
            .plants-grid {
                grid-template-columns: 1fr;
            }
            
            .tabs {
                flex-direction: column;
                border-bottom: none;
            }
            
            .tab-btn {
                border-bottom: 1px solid #ddd;
            }
            
            .tab-btn.active {
                border-bottom: 1px solid #2e7d32;
                background-color: #e8f5e9;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="header-content">
            <h1>Research and Knowledge</h1>
            <p>Ancient Wisdom for Modern Healthcare</p>
        </div>
    </header>
    
    <div class="container">
        <section class="intro">
            <h2>Bridging Traditional Knowledge with Scientific Research</h2>
            <p>The ancient tradition of Aushadi, rooted in Ayurvedic principles, has been a cornerstone of holistic healing for over 5,000 years. These medicinal plants, carefully documented in ancient texts like the Charaka Samhita and Sushruta Samhita, continue to offer valuable insights for modern healthcare applications.</p>
            <p>Explore our collection of thoroughly researched Aushadi plants and discover how ancient wisdom is being validated and integrated into contemporary medical practices.</p>
        </section>
        
        <div class="search-container">
            <input type="text" id="plantSearch" class="search-box" placeholder="Search for plants by name or properties...">
        </div>
        
        <section class="plants-section">
            <h2>Prominent Aushadi Medicinal Plants</h2>
            <div class="plants-grid" id="plantsGrid">
                <!-- Plant cards will be generated here via JavaScript -->
            </div>
        </section>
        
        <section class="research-section">
            <h2>Current Research & Applications</h2>
            <div class="tabs">
                <button class="tab-btn active" data-tab="clinical">Clinical Studies</button>
                <button class="tab-btn" data-tab="phytochemical">Phytochemical Research</button>
                <button class="tab-btn" data-tab="applications">Modern Applications</button>
            </div>
            
            <div class="tab-content active" id="clinical">
                <ul class="research-list">
                    <li class="research-item">
                        <div class="research-title">Randomized Control Trial of Turmeric Extract for Inflammatory Conditions</div>
                        <p>Recent clinical trials demonstrate curcumin's effectiveness in reducing markers of inflammation comparable to some conventional medications, with fewer side effects. The study involved 120 participants over 8 months.</p>
                    </li>
                    <li class="research-item">
                        <div class="research-title">Systematic Review of Ashwagandha for Stress and Anxiety Management</div>
                        <p>A comprehensive meta-analysis of 12 clinical studies confirms significant reductions in cortisol levels and anxiety scores when using standardized ashwagandha extracts for 6-12 weeks.</p>
                    </li>
                    <li class="research-item">
                        <div class="research-title">Comparative Study of Neem Derivatives in Dermatological Applications</div>
                        <p>Clinical evaluation shows promising results for neem-based formulations in treating various skin conditions, with 78% of participants showing improvement compared to 45% with conventional treatments.</p>
                    </li>
                </ul>
            </div>
            
            <div class="tab-content" id="phytochemical">
                <ul class="research-list">
                    <li class="research-item">
                        <div class="research-title">Isolation of Novel Compounds from Tulsi (Holy Basil)</div>
                        <p>Advanced chromatography techniques have identified over 30 bioactive compounds in Tulsi with potential applications in antimicrobial and antidiabetic formulations.</p>
                    </li>
                    <li class="research-item">
                        <div class="research-title">Molecular Mechanism of Triphala's Antioxidant Properties</div>
                        <p>Research has uncovered the synergistic action of polyphenols and flavonoids in Triphala, explaining its potent free-radical scavenging abilities at the cellular level.</p>
                    </li>
                    <li class="research-item">
                        <div class="research-title">Bioavailability Enhancement of Curcumin through Nanoformulations</div>
                        <p>Innovative delivery systems have increased curcumin bioavailability by up to 2000%, paving the way for more effective therapeutic applications.</p>
                    </li>
                </ul>
            </div>
            
            <div class="tab-content" id="applications">
                <ul class="research-list">
                    <li class="research-item">
                        <div class="research-title">Integration of Aushadi Principles in Integrative Oncology</div>
                        <p>Leading cancer centers are incorporating selected Aushadi plants as complementary approaches to manage side effects of conventional treatments and improve quality of life metrics.</p>
                    </li>
                    <li class="research-item">
                        <div class="research-title">Standardized Herbal Formulations in Primary Healthcare</div>
                        <p>Several countries have officially integrated standardized Aushadi formulations into their primary healthcare systems, particularly for chronic condition management.</p>
                    </li>
                    <li class="research-item">
                        <div class="research-title">Dermatological Applications of Aushadi-Inspired Formulations</div>
                        <p>Major skincare companies have developed clinically-tested product lines based on traditional Aushadi plants, with particularly strong results in sensitive skin conditions.</p>
                    </li>
                </ul>
            </div>
        </section>
        
        <section class="contact-section">
            <h2>Connect With Our Experts</h2>
            <p class="intro">Have questions about Aushadi plants or interested in collaboration opportunities? Our team of researchers and practitioners is available to provide guidance.</p>
           
            <form action="https://api.web3forms.com/submit" method="POST">
                <input type="hidden" name="access_key" value="41860a88-37e8-4cce-8842-b1d0bb9bbb34">
            <div class="contact-form">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="Your name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Your email address">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5" placeholder="Your inquiry or comments"></textarea>
                </div>
                <input type="hidden" name="redirect" value="thank_you.html">
                <button type="submit" class="submit-btn" id="contactSubmit">Submit Inquiry</button>
            </div>
        </section>
    </div>
    
    <footer class="footer">
        <p>© 2025 Aushadi Research Initiative. All rights reserved.</p>
        <p>Bridging ancient wisdom with modern science for a healthier future.</p>
    </footer>
    
    <script>
        // Plant data
        const plantsData = [
            {
                name: "Turmeric (Curcuma longa)",
                sanskrit: "Haridra",
                image: "images/turmeric.jpg",
                benefits: [
                    "Powerful anti-inflammatory properties",
                    "Supports joint health and mobility",
                    "Enhances digestion and liver function",
                    "Contains curcumin, a potent antioxidant"
                ],
                description: "Known as the golden spice, turmeric has been used for over 4,000 years in Ayurvedic medicine. Modern research validates its remarkable anti-inflammatory and antioxidant properties."
            },
            {
                name: "Ashwagandha (Withania somnifera)",
                sanskrit: "Ashwagandha",
                image: "images/Ashwagandha.jpg",
                benefits: [
                    "Adaptogenic properties help manage stress",
                    "Supports healthy immune function",
                    "Enhances energy and vitality",
                    "Promotes cognitive function"
                ],
                description: "Often called 'Indian Ginseng,' Ashwagandha is renowned for its adaptogenic properties that help the body resist physiological and psychological stressors."
            },
            {
                name: "Holy Basil (Ocimum sanctum)",
                sanskrit: "Tulsi",
                image: "images/tulsi.jpg",
                benefits: [
                    "Adaptogenic herb that helps manage stress",
                    "Supports respiratory health",
                    "Contains powerful antioxidants",
                    "Promotes mental clarity and focus"
                ],
                description: "Revered as 'The Queen of Herbs' in Ayurveda, Tulsi is considered sacred and has been used for thousands of years for its diverse healing properties."
            },
            {
                name: "Indian Gooseberry (Emblica officinalis)",
                sanskrit: "Amalaki",
                image: "images/amla.jpg",
                benefits: [
                    "Exceptionally high in vitamin C",
                    "Rejuvenative properties for all bodily systems",
                    "Supports digestive health",
                    "Promotes healthy skin and hair"
                ],
                description: "Amalaki is one of the most important herbs in Ayurveda and a key ingredient in the renowned formulation Triphala. It's known for its rejuvenative and antioxidant properties."
            },
            {
                name: "Neem (Azadirachta indica)",
                sanskrit: "Nimba",
                image: "images/Neem.jpg",
                benefits: [
                    "Powerful antimicrobial properties",
                    "Supports healthy skin and treats various skin conditions",
                    "Natural blood purifier",
                    "Promotes oral health"
                ],
                description: "Often called 'Nature's Pharmacy,' neem has been used in traditional medicine for over 5,000 years. Every part of the tree—leaves, bark, seeds, and oil—has therapeutic value."
            },
            {
                name: "Brahmi (Bacopa monnieri)",
                sanskrit: "Brahmi",
                image: "images/brahmi.jpg",
                benefits: [
                    "Enhances memory and cognitive function",
                    "Supports learning and concentration",
                    "Adaptogenic properties help manage stress",
                    "Promotes longevity and rejuvenation"
                ],
                description: "Brahmi has been used in Ayurvedic medicine for centuries to improve memory, learning, and concentration. Modern research supports its cognitive-enhancing effects."
            }
        ];
        
        // Generate plant cards
        function generatePlantCards(plants) {
            const plantsGrid = document.getElementById('plantsGrid');
            plantsGrid.innerHTML = '';
            
            if (plants.length === 0) {
                plantsGrid.innerHTML = '<p>No plants match your search criteria. Please try different keywords.</p>';
                return;
            }
            
            plants.forEach(plant => {
                const plantCard = document.createElement('div');
                plantCard.className = 'plant-card';
                
                let benefitsList = '';
                plant.benefits.forEach(benefit => {
                    benefitsList += `<li>${benefit}</li>`;
                });
                
                plantCard.innerHTML = `
                    <div class="plant-image" style="background-image: url('${plant.image}')"></div>
                    <div class="plant-info">
                        <h3 class="plant-name">${plant.name}</h3>
                        <p class="plant-sanskrit">${plant.sanskrit}</p>
                        <p>${plant.description}</p>
                        <h4>Benefits:</h4>
                        <ul class="benefits-list">
                            ${benefitsList}
                        </ul>
                      
                    </div>
                `;
                
                plantsGrid.appendChild(plantCard);
            });
        }
        
        // Tab functionality
        const tabButtons = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');
        
        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all buttons and contents
                tabButtons.forEach(btn => btn.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));
                
                // Add active class to clicked button and corresponding content
                button.classList.add('active');
                const tabId = button.getAttribute('data-tab');
                document.getElementById(tabId).classList.add('active');
            });
        });
        
        // Search functionality
        const searchBox = document.getElementById('plantSearch');
        searchBox.addEventListener('input', () => {
            const searchTerm = searchBox.value.toLowerCase();
            const filteredPlants = plantsData.filter(plant => {
                return (
                    plant.name.toLowerCase().includes(searchTerm) ||
                    plant.sanskrit.toLowerCase().includes(searchTerm) ||
                    plant.description.toLowerCase().includes(searchTerm) ||
                    plant.benefits.some(benefit => benefit.toLowerCase().includes(searchTerm))
                );
            });
            
            generatePlantCards(filteredPlants);
        });
        
        // Contact form functionality
        // const contactForm = document.getElementById('contactSubmit');
        // contactForm.addEventListener('click', (e) => {
        //     e.preventDefault();
        //     const name = document.getElementById('name').value;
        //     const email = document.getElementById('email').value;
        //     const message = document.getElementById('message').value;
            
        //     if (name && email && message) {
        //         alert('Thank you for your inquiry! Our team will get back to you soon.');
        //         document.getElementById('name').value = '';
        //         document.getElementById('email').value = '';
        //         document.getElementById('message').value = '';
        //     } else {
        //         alert('Please fill in all fields.');
        //     }
        // });
        
        // Initialize plants grid
        document.addEventListener('DOMContentLoaded', () => {
            generatePlantCards(plantsData);
            
            // Add click handler for "Learn more" links
            document.addEventListener('click', (e) => {
                if (e.target.classList.contains('read-more')) {
                    e.preventDefault();
                    const plantName = e.target.closest('.plant-card').querySelector('.plant-name').textContent;
                    alert(`More detailed information about ${plantName} will be available in the complete website.`);
                }
            });
        });
    </script>
</body>
</html>
