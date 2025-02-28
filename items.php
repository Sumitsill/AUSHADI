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
    <title>Herbal Plant Database</title>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideInFromTop {
            from { transform: translateY(-50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        @keyframes slideInFromLeft {
            from { transform: translateX(-50px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        
        @keyframes glow {
            0% { box-shadow: 0 0 5px rgba(46, 125, 50, 0.5); }
            50% { box-shadow: 0 0 20px rgba(46, 125, 50, 0.8); }
            100% { box-shadow: 0 0 5px rgba(46, 125, 50, 0.5); }
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8fbf8;
            color: #333;
            animation: fadeIn 1s ease;
        }
        
        header {
            background: linear-gradient(135deg, #2e7d32 0%, #1b5e20 100%);
            color: white;
            padding: 30px 0;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
            animation: slideInFromTop 1s ease;
        }
        
        header::before {
            content: "";
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            background: url('/api/placeholder/400/200') center;
            background-size: cover;
            opacity: 0.1;
            z-index: 0;
        }
        
        header h1, header p {
            position: relative;
            z-index: 1;
        }
        
        header h1 {
            margin-bottom: 10px;
            animation: pulse 3s infinite ease-in-out;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            animation: fadeIn 1.5s ease;
        }
        
        .search-container {
            display: flex;
            justify-content: center;
            margin: 30px 0;
            animation: slideInFromTop 1.2s ease;
        }
        
        .search-bar {
            width: 70%;
            max-width: 600px;
            padding: 15px 20px;
            font-size: 16px;
            border: 2px solid #2e7d32;
            border-radius: 30px 0 0 30px;
            outline: none;
            transition: all 0.3s ease;
        }
        
        .search-bar:focus {
            border-color: #1b5e20;
            box-shadow: 0 0 15px rgba(46, 125, 50, 0.3);
        }
        
        .search-button {
            padding: 15px 25px;
            background: linear-gradient(to right, #2e7d32, #1b5e20);
            color: white;
            border: none;
            border-radius: 0 30px 30px 0;
            cursor: pointer;
            font-size: 16px;
            transition: all 0.3s ease;
            animation: glow 3s infinite;
        }
        
        .search-button:hover {
            background: linear-gradient(to right, #1b5e20, #0a3d0a);
            transform: scale(1.05);
        }
        
        .plants-table-container {
            overflow: hidden;
            border-radius: 12px;
            margin: 40px 0;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1.8s ease, float 6s infinite ease-in-out;
        }
        
        .plants-table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }
        
        .plants-table th {
            background: linear-gradient(135deg, #2e7d32 0%, #1b5e20 100%);
            color: white;
            padding: 18px 15px;
            text-align: left;
            font-weight: 600;
            position: relative;
            overflow: hidden;
        }
        
        .plants-table th::after {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: all 0.5s ease;
        }
        
        .plants-table thead:hover th::after {
            left: 100%;
        }
        
        .plants-table td {
            padding: 18px 15px;
            border-bottom: 1px solid #e0e0e0;
            transition: all 0.3s ease;
        }
        
        .plants-table tr:hover td {
            background-color: #f1f8e9;
            transform: translateX(5px);
        }
        
        .plants-table tr:last-child td {
            border-bottom: none;
            background-color: #e8f5e9;
        }
        
        .image-gallery {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin: 50px 0;
            animation: slideInFromLeft 2s ease;
        }
        
        .image-card {
            width: 23%;
            margin-bottom: 30px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.5s ease;
            position: relative;
            animation: fadeIn 2s ease;
        }
        
        .image-card:nth-child(odd) {
            animation: float 7s infinite ease-in-out;
        }
        
        .image-card:nth-child(even) {
            animation: float 8s infinite ease-in-out reverse;
        }
        
        .image-card:hover {
            transform: translateY(-15px) scale(1.03);
            box-shadow: 0 15px 30px rgba(46, 125, 50, 0.2);
        }
        
        .image-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            transition: all 0.5s ease;
        }
        
        .image-card:hover img {
            transform: scale(1.1);
        }
        
        .image-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, transparent 70%, rgba(46, 125, 50, 0.7));
            z-index: 1;
            opacity: 0;
            transition: all 0.5s ease;
        }
        
        .image-card:hover::before {
            opacity: 1;
        }
        
        .image-card-title {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 15px;
            color: white;
            font-weight: 600;
            z-index: 2;
            transform: translateY(50px);
            opacity: 0;
            transition: all 0.5s ease;
            box-sizing: border-box;
        }
        
        .image-card:hover .image-card-title {
            transform: translateY(0);
            opacity: 1;
        }
        
        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 30px;
            font-size: 28px;
            color: #2e7d32;
            animation: slideInFromLeft 1.5s ease;
        }
        
        .section-title::after {
            content: "";
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 4px;
            background-color: #2e7d32;
            animation: slideInFromLeft 2s ease;
        }
        
        footer {
            background: linear-gradient(135deg, #2e7d32 0%, #1b5e20 100%);
            color: white;
            text-align: center;
            padding: 25px 0;
            margin-top: 60px;
            position: relative;
            overflow: hidden;
            animation: slideInFromTop 1s ease reverse;
        }
        
        footer::before {
            content: "";
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            background: url('/api/placeholder/400/100') center;
            background-size: cover;
            opacity: 0.1;
            z-index: 0;
        }
        
        footer p {
            position: relative;
            z-index: 1;
            animation: pulse 5s infinite ease-in-out;
        }
        
        .leaf-decoration {
            position: fixed;
            width: 40px;
            height: 40px;
            background-color: rgba(46, 125, 50, 0.1);
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            z-index: -1;
            animation: float 10s infinite ease-in-out;
        }
        
        @media (max-width: 768px) {
            .search-bar {
                width: 100%;
            }
            
            .image-card {
                width: 48%;
            }
        }
        
        @media (max-width: 480px) {
            .image-card {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <!-- Decorative leaves in background -->
    <div class="leaf-decoration" style="top: 20%; left: 10%;"></div>
    <div class="leaf-decoration" style="top: 40%; right: 10%; animation-delay: 2s;"></div>
    <div class="leaf-decoration" style="bottom: 30%; left: 15%; animation-delay: 1s;"></div>
    <div class="leaf-decoration" style="bottom: 10%; right: 20%; animation-delay: 3s;"></div>
    
    <header>
        <h1>Medicinal Property</h1>
        <p>Discover the healing power of nature's pharmacy</p>
    </header>
    
    <div class="container">
        <form method="get" action="">
        <div class="search-container">
            <input type="text" name="search" class="search-bar" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>" placeholder="Search for plants by name (Hindi, English, or Botanical)...">
            <button class="search-button" type="submit">Search</button>
        </div>
        </form>
        
        <div class="plants-table-container">
            <table class="plants-table">
                <thead>
                    <tr>
                        <th>Hindi Name</th>
                        <th>English Name</th>
                        <th>Scientific Name</th>
                        <th>Use</th>
                        <th>Purchase link</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                include "backend/connect_db.php"; 
                
                if(isset($_GET['search'])){
                    $filtervalues = $_GET['search'];
                    $search_products_query = "SELECT * FROM products WHERE CONCAT(hindi_name, eng_name, botanical_name) LIKE '%$filtervalues%'";
                    $search_products = mysqli_query($connect, $search_products_query);

                    if(mysqli_num_rows($search_products) > 0){
                        foreach($search_products as $items){
                            ?>
                            <tr>
                                <td><?php echo $items['hindi_name']; ?></td>
                                <td><?php echo $items['eng_name']; ?></td>
                                <td><?php echo $items['botanical_name']; ?></td>
                                <td><?php echo $items['uses']; ?></td>
                                <td><a target="_blank" style="text-decoration: none; color: red; font-family: bold;" href="<?php echo $items['purchase_link']; ?>">Buy Now</a></td>
                            </tr>
                            <?php
                        }
                    }else{
                        ?>
                        <tr>
                            <td colspan="5">No record found...</td>
                        </tr>
                    <?php
                    }
                }else{
                    $search_products_query2 = "SELECT * FROM products";
                    $search_products2 = mysqli_query($connect, $search_products_query2);

                    while($product_row = mysqli_fetch_assoc($search_products2)){
                    ?>
                    <tr>
                        <td><?php echo $product_row['hindi_name']; ?></td>
                        <td><?php echo $product_row['eng_name']; ?></td>
                        <td><?php echo $product_row['botanical_name']; ?></td>
                        <td><?php echo $product_row['uses']; ?></td>
                        <td><a target="_blank" style="text-decoration: none; color: red; font-family: bold;" href="<?php echo $product_row['purchase_link']; ?>">Buy Now</a></td>
                    </tr>
                    <?php
                    }
                }

                ?>
                    <!-- <tr>
                        <td>तुलसी</td>
                        <td>Holy Basil</td>
                        <td>Ocimum sanctum</td>
                        <td>Respiratory conditions, stress, inflammation, immune support</td>
                    </tr>
                    <tr>
                        <td>अश्वगंधा</td>
                        <td>Ashwagandha</td>
                        <td>Withania somnifera</td>
                        <td>Stress reduction, energy, immune system, cognitive function</td>
                    </tr>
                    <tr>
                        <td>आंवला</td>
                        <td>Indian Gooseberry</td>
                        <td>Phyllanthus emblica</td>
                        <td>Vitamin C source, digestive health, hair growth, immunity</td>
                    </tr>
                    <tr>
                        <td>गिलोय</td>
                        <td>Giloy</td>
                        <td>Tinospora cordifolia</td>
                        <td>Immune boosting, fever, diabetes, arthritis</td>
                    </tr> -->
                    <!-- <tr class="results-row">
                        <td colspan="4">Search results will appear here...</td>
                    </tr> -->
                </tbody>
            </table>
        </div>
        
        <h2 class="section-title">Featured Medicinal Plants</h2>
        <div class="image-gallery">
            <div class="image-card">
                <img src="images/tulsi.jpg" alt="Tulsi (Holy Basil)">
                <div class="image-card-title">Tulsi (Holy Basil)</div>
            </div>
            <div class="image-card">
                <img src="images/Ashwagandha.jpg" alt="Ashwagandha">
                <div class="image-card-title">Ashwagandha</div>
            </div>
            <div class="image-card">
                <img src="images/amla.jpg" alt="Amla (Indian Gooseberry)">
                <div class="image-card-title">Amla (Indian Gooseberry)</div>
            </div>
            <div class="image-card">
                <img src="images/giloy.jpg" alt="Giloy">
                <div class="image-card-title">Giloy</div>
            </div>
        </div>
        
        <h2 class="section-title">Seasonal Herbs Collection</h2>
        <div class="image-gallery">
            <div class="image-card">
                <img src="images/Neem.jpg" alt="Neem">
                <div class="image-card-title">Neem</div>
            </div>
            <div class="image-card">
                <img src="images/brahmi.jpg" alt="Brahmi">
                <div class="image-card-title">Brahmi</div>
            </div>
            <div class="image-card">
                <img src="images/shatavari.jpg" alt="Shatavari">
                <div class="image-card-title">Shatavari</div>
            </div>
            <div class="image-card">
                <img src="images/trifala.jpg" alt="Triphala">
                <div class="image-card-title">Triphala</div>
            </div>
        </div>
    </div>
    
    <footer>
        <p>© 2025 Herbal Plant Database - Your Comprehensive Resource for Medicinal Plant Information</p>
    </footer>
</body>
</html>