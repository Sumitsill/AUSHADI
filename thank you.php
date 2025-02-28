<?php
session_start();

if(!isset($_SESSION['username'])){
  header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thank You for Logging In</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: linear-gradient(135deg, #6e8efb, #a777e3);
      overflow: hidden;
    }
    
    .container {
      text-align: center;
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 20px;
      padding: 40px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
      max-width: 500px;
      position: relative;
      animation: fadeIn 1s ease-out;
    }
    
    h1 {
      color: #333;
      margin-bottom: 20px;
      animation: slideDown 1s ease-out;
    }
    
    p {
      color: #666;
      margin-bottom: 30px;
      line-height: 1.6;
      animation: slideUp 1.2s ease-out;
    }
    
    .check-icon {
      width: 80px;
      height: 80px;
      background-color: #4CAF50;
      border-radius: 50%;
      margin: 0 auto 30px;
      position: relative;
      animation: scaleIn 0.5s ease-out 0.5s both;
    }
    
    .check-icon:before {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -60%) rotate(45deg);
      width: 25px;
      height: 50px;
      border-right: 5px solid white;
      border-bottom: 5px solid white;
    }
    
    .back-button {
      display: inline-block;
      padding: 12px 30px;
      background-color: #6e8efb;
      color: white;
      text-decoration: none;
      border-radius: 30px;
      font-weight: bold;
      transition: transform 0.3s, box-shadow 0.3s;
      animation: bounceIn 1s ease-out 1s both;
      border: none;
      cursor: pointer;
    }
    
    .back-button:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    
    .confetti {
      position: absolute;
      width: 10px;
      height: 10px;
      background-color: #f00;
      opacity: 0;
    }
    
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
    
    @keyframes slideDown {
      from { transform: translateY(-50px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }
    
    @keyframes slideUp {
      from { transform: translateY(50px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }
    
    @keyframes scaleIn {
      from { transform: scale(0); }
      to { transform: scale(1); }
    }
    
    @keyframes bounceIn {
      0% { transform: scale(0); opacity: 0; }
      60% { transform: scale(1.1); opacity: 1; }
      100% { transform: scale(1); }
    }
    
    @keyframes confettiFall {
      0% { transform: translateY(-100px) rotate(0deg); opacity: 1; }
      100% { transform: translateY(1000px) rotate(360deg); opacity: 0; }
    }
    
    .wave {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 100px;
      background: url('data:image/svg+xml;utf8,<svg viewBox="0 0 1440 320" xmlns="http://www.w3.org/2000/svg"><path fill="%23ffffff" fill-opacity="1" d="M0,192L48,197.3C96,203,192,213,288,229.3C384,245,480,267,576,250.7C672,235,768,181,864,181.3C960,181,1056,235,1152,234.7C1248,235,1344,181,1392,154.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
      background-size: 1440px 100px;
      animation: waveAnimation 10s linear infinite;
    }
    
    @keyframes waveAnimation {
      0% { background-position-x: 0; }
      100% { background-position-x: 1440px; }
    }
  </style>
</head>
<body>
  <div class="wave"></div>
  
  <div class="container">
    <div class="check-icon"></div>
    <h1>Thank You for Logging In!</h1>
    <p>Your login was successful. You now have access to all features and content of our website. We're excited to have you with us!</p>
    <button class="back-button" onclick="goBack()">Back to Website</button>
  </div>
  
  <script>
    // Function to go back to the main website
    function goBack() {
      window.location.href = "index.html";
    }
    
    // Create confetti animation
    function createConfetti() {
      const colors = ['#f00', '#0f0', '#00f', '#ff0', '#0ff', '#f0f'];
      const container = document.body;
      
      for (let i = 0; i < 100; i++) {
        const confetti = document.createElement('div');
        confetti.className = 'confetti';
        
        // Random position, color, and size
        const left = Math.random() * 100;
        const size = Math.random() * 10 + 5;
        const color = colors[Math.floor(Math.random() * colors.length)];
        
        confetti.style.left = left + 'vw';
        confetti.style.width = size + 'px';
        confetti.style.height = size + 'px';
        confetti.style.backgroundColor = color;
        
        // Set animation
        confetti.style.animation = `confettiFall ${Math.random() * 3 + 2}s linear forwards`;
        confetti.style.animationDelay = Math.random() * 5 + 's';
        
        container.appendChild(confetti);
        
        // Remove confetti after animation completes
        setTimeout(() => {
          confetti.remove();
        }, 8000);
      }
    }
    
    // Run animations when page loads
    window.onload = function() {
      createConfetti();
      
      // Create new confetti every few seconds
      setInterval(createConfetti, 5000);
    };
  </script>
</body>
</html>
