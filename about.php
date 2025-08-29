<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>About - Trends</title>
  <link rel="stylesheet" href="about.css" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Lato:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body style="min-height:100vh; background: linear-gradient(120deg, #667eea 0%, #764ba2 100%); animation: gradientMove 8s ease-in-out infinite alternate;">

  <div class="container" style="animation: fadeInForm 1.2s;">
    <!-- Navigation Bar -->
   <nav style="background: rgba(255,255,255,0.15); box-shadow: 0 8px 32px 0 rgba(31,38,135,0.18); backdrop-filter: blur(12px); border-radius: 18px; animation: fadeInForm 1.2s;">
    <div class="logo">
        <h1>Trends</h1>
    </div>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li class="dropdown">
            <a href="men.php">Shop</a>
            <ul class="dropdown-content">
                <li><a href="men.php">Men's</a></li>
                <li><a href="women.php">Women's</a></li>
                <li><a href="kids.php">Kids</a></li>
            </ul>
        </li>
        <li><a id="about" href="about.php">About</a></li>
        <li><a id="contact" href="contact.php">Contact</a></li>
        <li><a href="orders.php">My Orders</a></li>
         <li> <a href="logout.php" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a></li>
    </ul>
</nav>

    <!-- About Header -->
    <div class="about-header" style="background: rgba(255,255,255,0.18); box-shadow: 0 8px 32px 0 rgba(31,38,135,0.12); border-radius: 18px; animation: fadeInForm 1.2s;">
      <h1>About Trends</h1>
      <p>Your one-stop destination for fashion that defines the future. Discover our journey, mission, and the team that makes it all possible.</p>
    </div>

    <main>
    

      <!-- Our Team Section -->
      <section class="about-section" style="background: rgba(255,255,255,0.18); box-shadow: 0 8px 32px 0 rgba(31,38,135,0.12); border-radius: 18px; animation: fadeInForm 1.2s;">
        <div class="card">
          <h2 class="team">Our Team</h2>
         
          
          <div class="team-members">
          <div class="team-member">
  <div class="team-member-img">
    <img src="shivamojha.jpg" alt="Shivam" height="248px;" width="300px";>

  </div>
  <div class="team-member-info">
    <h3>Shivam</h3>
    <div class="social-links">
      <a href="#"><i class="fab fa-linkedin"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
    </div>
  </div>
</div>

            
            <div class="team-member">
              <div class="team-member-img">
               <img src="shivam.jpg" alt="Shivam" height="248px;" width="300px";>
              </div>
              <div class="team-member-info">
                <h3>Shivam</h3>
               
                <div class="social-links">
                  <a href="#"><i class="fab fa-linkedin"></i></a>
                  <a href="#"><i class="fab fa-behance"></i></a>
                </div>
              </div>
            </div>
            
              <!-- Removed duplicate Shivam team member -->
          </div>
        </div>
      </section>

      <!-- Our Mission Section -->
      <section class="about-section" style="background: rgba(255,255,255,0.18); box-shadow: 0 8px 32px 0 rgba(31,38,135,0.12); border-radius: 18px; animation: fadeInForm 1.2s;">
        <div class="card">
          <h2 class="mission">Our Mission</h2>
          <p>At Trends, our mission is to inspire confidence and self-expression through fashion that is accessible, sustainable, and forward-thinking. We believe that great style shouldn't come at the expense of our planet or communities.</p>
          <p>We strive to:</p>
          <ul>
            <li>Create timeless yet modern designs that cater to diverse tastes and needs</li>
            <li>Source materials responsibly and partner with ethical manufacturers</li>
            <li>Minimize our environmental footprint across all operations</li>
            <li>Foster an inclusive fashion community where everyone feels represented</li>
            <li>Innovate constantly while honoring the best traditions of craftsmanship</li>
          </ul>
        </div>
      </section>

      <!-- Our Values Section -->
      <section class="about-section" style="background: rgba(255,255,255,0.18); box-shadow: 0 8px 32px 0 rgba(31,38,135,0.12); border-radius: 18px; animation: fadeInForm 1.2s;">
        <div class="card">
          <h2 class="values">Our Values</h2>
          <p>At the heart of everything we do at Trends are these core values that guide our decisions and define our brand identity.</p>
          
          <div class="values-grid">
            <div class="value-item">
              <div class="value-icon">
                <i class="fas fa-lightbulb"></i>
              </div>
              <h3>Innovation</h3>
              <p>We constantly push boundaries to create fashion-forward designs that anticipate trends rather than follow them.</p>
            </div>
            
            <div class="value-item">
              <div class="value-icon">
                <i class="fas fa-leaf"></i>
              </div>
              <h3>Sustainability</h3>
              <p>We're committed to reducing our environmental impact and promoting ethical practices across our operations.</p>
            </div>
            
            <div class="value-item">
              <div class="value-icon">
                <i class="fas fa-users"></i>
              </div>
              <h3>Inclusivity</h3>
              <p>We celebrate diversity and create fashion that empowers people of all backgrounds, sizes, and styles.</p>
            </div>
            
            <div class="value-item">
              <div class="value-icon">
                <i class="fas fa-gem"></i>
              </div>
              <h3>Quality</h3>
              <p>We never compromise on craftsmanship, materials, or attention to detail in everything we create.</p>
            </div>
          </div>
        </div>
      </section>

      <!-- Why Choose Us Section -->
      <section class="about-section" style="background: rgba(255,255,255,0.18); box-shadow: 0 8px 32px 0 rgba(31,38,135,0.12); border-radius: 18px; animation: fadeInForm 1.2s;">
        <div class="card">
          <h2 class="why-choose">Why Choose Trends</h2>
          <p>In a world of fast fashion and fleeting trends, we stand apart with our commitment to style that lasts and values that matter.</p>
          
          <ul>
            <li><strong>Curated Collections</strong> - Each piece is thoughtfully designed to be both on-trend and timeless</li>
            <li><strong>Ethical Production</strong> - All our manufacturing partners adhere to fair labor practices and safe working conditions</li>
            <li><strong>Quality Materials</strong> - We source premium fabrics and materials for durability and comfort</li>
            <li><strong>Inclusive Sizing</strong> - Our designs are available in a wide range of sizes to fit diverse body types</li>
            <li><strong>Personalized Experience</strong> - From shopping assistance to styling advice, we're here to help</li>
            <li><strong>Community Focus</strong> - We give back to communities through various social initiatives and partnerships</li>
          </ul>
        </div>
      </section>

     

      <!-- Awards & Recognition Section -->
      <section class="about-section" style="background: rgba(255,255,255,0.18); box-shadow: 0 8px 32px 0 rgba(31,38,135,0.12); border-radius: 18px; animation: fadeInForm 1.2s;">
        <div class="card">
          <h2 class="awards">Awards & Recognition</h2>
          <p>Our dedication to excellence has been recognized by industry leaders and organizations worldwide.</p>
          
          <div class="awards-grid">
            <div class="award">
              <div class="award-icon">
                <i class="fas fa-trophy"></i>
              </div>
              <h3>Sustainable Fashion Award</h3>
              <p>2022 - Fashion Forward Foundation</p>
            </div>
            
            <div class="award">
              <div class="award-icon">
                <i class="fas fa-medal"></i>
              </div>
              <h3>Best Online Retailer</h3>
              <p>2021 - Global E-commerce Summit</p>
            </div>
            
            <div class="award">
              <div class="award-icon">
                <i class="fas fa-award"></i>
              </div>
              <h3>Innovation in Design</h3>
              <p>2020 - International Fashion Council</p>
            </div>
            
            <div class="award">
              <div class="award-icon">
                <i class="fas fa-star"></i>
              </div>
              <h3>Customer Service Excellence</h3>
              <p>2019 - Retail Industry Association</p>
            </div>
          </div>
        </div>
      </section>

      <!-- Call to Action Section -->
      <section class="cta-section">
        <h2>Join the Trends Family</h2>
        <p>Experience fashion that's as unique as you are. Explore our latest collections and find your style today.</p>
        <a href="index.php" class="cta-button">Shop Now</a>
      </section>
    </main>

    <!-- Footer -->
  <footer class="footer" style="background: rgba(255,255,255,0.15); box-shadow: 0 8px 32px 0 rgba(31,38,135,0.18); border-radius: 18px; animation: fadeInForm 1.2s;">
    <div class="container">
      <div class="footer-content">
        <div class="footer-col">
          <div class="footer-logo">
            <i class="fa-solid fa-shirt"></i>
            <span>Fashion Store</span>
          </div>
          <p>Your one-stop destination for the latest fashion trends and styles.</p>
          <div class="social-icons">
            <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i></a>
          </div>
          
        </div>
        
        <div class="footer-col">
          <h3>Quick Links</h3>
          <ul>
         
            <li><a href="index.php">Home</a></li>
            <li class="shop-item">
              <a href="men.php">Shop</a>
              <ul class="shop-submenu">
                <li><a href="men.php">Men</a></li>
                <li><a href="women.php">Women</a></li>
                <li><a href="kids.php">Kids</a></li>
              </ul>
            </li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="contact.php">Contact</a></li>
          
            
          </ul>
        </div>
        
        
        
        <div class="footer-col">
          <h3>Customer Service</h3>
          <ul>
            <li><a href="faq.html">FAQ</a></li>
            <li><a href="shipping-returns.html">Shipping & Returns</a></li>
            <li><a href="terms.html">Terms & Conditions</a></li>
            <li><a href="privacy.html">Privacy Policy</a></li>
           
          </ul>
        </div>
        
        
          </form>
        </div>
      </div>
      
      <div class="footer-bottom">
        <p>&copy; <span id="current-year">2025</span> Fashion Store. All Rights Reserved.</p>
      </div>
    </div>
  </footer>
