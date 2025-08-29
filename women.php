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
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Women's Fashion - Trends</title>
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="women.css">
        <link
            href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Catamaran:wght@200&family=Courgette&family=Edu+TAS+Beginner:wght@700&family=Lato:wght@300;900&family=Mukta:wght@700&family=Mulish:wght@300&family=Open+Sans&family=PT+Sans:ital,wght@1,700&family=Poppins:wght@300&family=Raleway:wght@100&family=Roboto&family=Roboto+Condensed:wght@700&family=Roboto+Slab&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        
    </head>
    <body>
        <div class="container">
           <nav>
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
            <!-- Women's Products Section -->
            <section class="men-products">
                <div class="section-header">
                    <h1>Women's Collection</h1>
                    <p>Discover our latest Women's fashion trends that blend style
                        and comfort.</p>
                </div>
                <div class="products-container">
                    <!-- Product 1 -->
                    <div class="product-card">
                        <div class="product-badge">New</div>
                        <div class="product-image">
                            <img src="women.jpg" alt="" width="380px">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">Qena Women Maxi Green Dress</h3>
                            <div class="product-price">
                                <span class="current-price">₹379</span>
                                <span class="original-price">₹499</span>
                            </div>
                            <p class="product-description"> The dress features a black, lace-like bodice and a flowing, floor-length, olive green skirt.</p>
                            
                            <div class="product-actions">
                                <button class="btn-add-to-cart" onclick="addToCart('Qena Women Maxi Green Dress', 379, 'women.jpg')">
                                    <i class="fas fa-shopping-cart"></i> Add to
                                    Cart
                                </button>
                               
                            </div>
                        </div>
                    </div>
                    <!-- Product 2 -->
                    <div class="product-card">
                        <div class="product-image">
                            <img src="wn6.webp" alt="image" width="380px">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">Casual Maxi Dress</h3>
                            <div class="product-price">
                                <span class="current-price">₹499</span>
                            </div>
                            <p class="product-description">The dress is a women's casual maxi dress with a fit and flare silhouette.</p>
                            
                            <div class="product-actions">
                                <button class="btn-add-to-cart" onclick="addToCart('Casual Maxi Dress', 499, 'wn6.webp')">
                                    <i class="fas fa-shopping-cart"></i> Add to
                                    Cart
                                </button>
                               
                            </div>
                        </div>
                    </div>
                    <!-- Product 3 -->
                    <div class="product-card">
                        <div class="product-badge sale-badge">Sale</div>
                        <div class="product-image">
                            <img src="wn5.webp" width="380px">
                                
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">Women's Summer  Rayon  Maxi Dress</h3>
                            <div class="product-price">
                                <span class="current-price">₹459</span>
                                <span class="original-price">₹1,199</span>
                            </div>
                            <p class="product-description">A high neckline, long sleeves, and a tiered skirt. A lightweight fabric and has a relaxed fit.</p>
                           
                            <div class="product-actions">
                                <button class="btn-add-to-cart" onclick="addToCart('Women\'s Summer Rayon Maxi Dress', 459, 'wn5.webp')">
                                    <i class="fas fa-shopping-cart"></i> Add to
                                    Cart
                                </button>
                                
                            </div>
                        </div>
                    </div>
                    <!-- Product 4 -->
                    <div class="product-card">
                        <div class="product-image">
                            <img src="wn4.webp" width="380px">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">pink Floral Print  Midi Dress</h3>
                            <div class="product-price">
                                <span class="current-price">₹899</span>
                            </div>
                            <p class="product-description">Sky International Digital Printed Casual Calf Legth Dress for Woman.</p>
                            
                            <div class="product-actions">
                                <button class="btn-add-to-cart" onclick="addToCart('Pink Floral Print Midi Dress', 899, 'wn4.webp')">
                                    <i class="fas fa-shopping-cart"></i> Add to
                                    Cart
                                </button>
                                
                            </div>
                        </div>
                    </div>
                    <!-- Product 5 -->
                    <div class="product-card">
                        <div class="product-badge">New</div>
                        <div class="product-image">
                            <img src="wn3.webp" alt="" width="380px">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">Anarkali suit</h3>
                            <div class="product-price">
                                <span class="current-price">₹1,299</span>
                            </div>
                            <p class="product-description">Women's Cotton Embroidered Chikankari Kurti with Dupatta Set.</p>
                            
                            <div class="product-actions">
                                <button class="btn-add-to-cart" onclick="addToCart('Anarkali suit', 1299, 'wn3.webp')">
                                    <i class="fas fa-shopping-cart"></i> Add to
                                    Cart
                                </button>
                               
                            </div>
                        </div>
                    </div>
                    <!-- Product 6 -->
                    <div class="product-card">
                        <div class="product-badge sale-badge">Sale</div>
                        <div class="product-image">
                            <img src="wn1.webp" alt="" width="380px">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">Victorian Lace Blouse</h3>
                            <div class="product-price">
                                <span class="current-price">₹799</span>
                                <span class="original-price">₹999</span>
                            </div>
                            <p class="product-description">Victorian Drop Shoulder Lace Blouse. White with long, voluminous sleeves and a high neckline</p>
                           
                            <div class="product-actions">
                                <button class="btn-add-to-cart" onclick="addToCart('Victorian Lace Blouse', 799, 'wn1.webp')">
                                    <i class="fas fa-shopping-cart"></i> Add to
                                    Cart
                                </button>
                                
                            </div>
                        </div>
                    </div>

                    <!-- Additional Pants Product 1 -->
                    <div class="product-card">
                        <div class="product-badge">New</div>
                        <div class="product-image">
                            <img src="wn9.webp" alt="" width="380px">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">Bootcut Jeans</h3>
                            <div class="product-price">
                                <span class="current-price">₹479</span>
                                <span class="original-price">₹699</span>
                            </div>
                            <p class="product-description"> designed to be fitted around the waist  and then gradually flare out from the knee to the ankle.</p>
                            
                            <div class="product-actions">
                                <button class="btn-add-to-cart" onclick="addToCart('Bootcut Jeans', 479, 'wn9.webp')">
                                    <i class="fas fa-shopping-cart"></i> Add to
                                    Cart
                                </button>
                               
                            </div>
                        </div>
                    </div>

                    <!-- Additional Pants Product 2 -->
                    <div class="product-card">
                        <div class="product-badge sale-badge">Sale</div>
                        <div class="product-image">
                        <img src="wn7.webp" alt="Cargo Pants" width="380px">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">Leg Loose Baggy Jeans</h3>
                            <div class="product-price">
                                <span class="current-price">₹499</span>
                                <span class="original-price">₹799</span>
                            </div>
                            <p class="product-description">Functional cargo
                                pants with multiple pockets and comfortable
                                elastic cuffs.</p>
                           
                            <div class="product-actions">
                                <button class="btn-add-to-cart" onclick="addToCart('Leg Loose Baggy Jeans', 499, 'wn7.webp')">
                                    <i class="fas fa-shopping-cart"></i> Add to
                                    Cart
                                </button>
                                
                            </div>
                        </div>
                    </div>
                    <!-- Additional Pants Product 2 -->
                    <div class="product-card">
                        <div class="product-badge sale-badge">Sale</div>
                        <div class="product-image">
                            <img src="wn0.webp" alt="Cargo Pants" width="380px">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">Casual Cargo Pants</h3>
                            <div class="product-price">
                                <span class="current-price">₹399</span>
                                <span class="original-price">₹699</span>
                            </div>
                            <p class="product-description">Functional cargo
                                pants with multiple pockets and comfortable
                                elastic cuffs.</p>
                           
                            <div class="product-actions">
                                <button class="btn-add-to-cart" onclick="addToCart('Casual Cargo Pants', 399, 'wn0.webp')">
                                    <i class="fas fa-shopping-cart"></i> Add to
                                    Cart
                                </button>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

         <!-- Footer -->
  <footer class="footer">
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
        
        
        </div>
      </div>
      
      <div class="footer-bottom">
        <p>&copy; <span id="current-year">2025</span> Fashion Store. All Rights Reserved.</p>
      </div>
    </div>
  </footer>

        <script>
            // Add to Cart function - localStorage
            function addToCart(name, price, image) {
                // cart getting and create array
                let cart = JSON.parse(localStorage.getItem('cart')) || [];
                
                // create new product
                let product = {
                    name: name,
                    price: price,
                    image: image
                };
                
                
                cart.push(product);
                
                // save updated cart in localstorage
                localStorage.setItem('cart', JSON.stringify(cart));
                
                // Optional: User को alert 
                alert(name + " has been added to your cart!");
                
                //  Cart page redirect
                window.location.href = 'cart.php';
            }
        </script>
    </body>
</html>