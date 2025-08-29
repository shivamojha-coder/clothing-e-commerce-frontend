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
        <title>Men's Fashion - Trends</title>
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="men.css">
        <link
            href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Catamaran:wght@200&family=Courgette&family=Edu+TAS+Beginner:wght@700&family=Lato:wght@300;900&family=Mukta:wght@700&family=Mulish:wght@300&family=Open+Sans&family=PT+Sans:ital,wght@1,700&family=Poppins:wght@300&family=Raleway:wght@100&family=Roboto&family=Roboto+Condensed:wght@700&family=Roboto+Slab&display=swap"
            rel="stylesheet">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
       
    </head>
    <body style="min-height:100vh; background: linear-gradient(120deg, #667eea 0%, #764ba2 100%); animation: gradientMove 8s ease-in-out infinite alternate;">
        <div class="container" style="animation: fadeInForm 1.2s;">
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
            <!-- Men's Products Section -->
            <section class="men-products" style="background: rgba(255,255,255,0.18); box-shadow: 0 8px 32px 0 rgba(31,38,135,0.12); border-radius: 18px; animation: fadeInForm 1.2s;">
                <div class="section-header">
                    <h1>Men's Collection</h1>
                    <p>Discover our latest men's fashion trends that blend style
                        and comfort.</p>
                </div>
                <div class="products-container">
                    <!-- Product 1 -->
                    <div class="product-card">
                        <div class="product-badge">New</div>
                        <div class="product-image">
                            <img
                                src="https://images.pexels.com/photos/1656684/pexels-photo-1656684.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                alt="Premium Cotton T-Shirt">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">Premium Cotton
                                T-Shirt</h3>
                            <div class="product-price">
                                <span class="current-price">₹499</span>
                                <span class="original-price">₹799</span>
                            </div>
                            <p class="product-description">Lightweight and
                                breathable cotton t-shirt perfect for everyday
                                wear.</p>
                           
                            <div class="product-actions">
                                <button class="btn-add-to-cart" onclick="addToCart('Premium Cotton T-shirt', 499, 'https://images.pexels.com/photos/1656684/pexels-photo-1656684.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1')">
                                    <i class="fas fa-shopping-cart"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                   
                    <!-- Product 2 -->
                    <div class="product-card">
                        <div class="product-image">
                            <img
                                src="https://images.pexels.com/photos/1183266/pexels-photo-1183266.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                alt="Slim Fit Hoodie">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">Slim Fit Hoodie</h3>
                            <div class="product-price">
                                <span class="current-price">₹799</span>
                            </div>
                            <p class="product-description">Stylish and
                                comfortable hoodie with modern slim fit
                                design.</p>
                            
                            <div class="product-actions">
                                <button class="btn-add-to-cart" onclick="addToCart('Slim Fit Hoodie', 799, 'https://images.pexels.com/photos/1183266/pexels-photo-1183266.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1')">
                                    <i class="fas fa-shopping-cart"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Product 3 -->
                    <div class="product-card">
                        <div class="product-badge sale-badge">Sale</div>
                        <div class="product-image">
                            <img
                                src="https://images.pexels.com/photos/1040945/pexels-photo-1040945.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                alt="Classic Denim Jacket">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">Classic Denim Jacket</h3>
                            <div class="product-price">
                                <span class="current-price">₹999</span>
                                <span class="original-price">₹1,499</span>
                            </div>
                            <p class="product-description">Timeless denim jacket
                                with a modern cut and premium quality.</p>
                            
                            <div class="product-actions">
                                <button class="btn-add-to-cart" onclick="addToCart('Classic Denim Jacket', 999, 'https://images.pexels.com/photos/1040945/pexels-photo-1040945.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1')">
                                    <i class="fas fa-shopping-cart"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Product 4 -->
                    <div class="product-card">
                        <div class="product-image">
                            <img
                                src="https://images.pexels.com/photos/1598507/pexels-photo-1598507.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                alt="Casual Chino Pants">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">Casual Chino Pants</h3>
                            <div class="product-price">
                                <span class="current-price">₹1,699</span>
                            </div>
                            <p class="product-description">Versatile chino pants
                                that can be dressed up or down for any
                                occasion.</p>
                            
                            <div class="product-actions">
                                <button class="btn-add-to-cart" onclick="addToCart('Casual Chino Pants', 1699, 'https://images.pexels.com/photos/1598507/pexels-photo-1598507.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1')">
                                    <i class="fas fa-shopping-cart"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Product 5 -->
                    <div class="product-card">
                        <div class="product-badge">New</div>
                        <div class="product-image">
                            <img
                                src="https://images.pexels.com/photos/297933/pexels-photo-297933.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                alt="Tailored Button-Up Shirt">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">Tailored Button-Up
                                Shirt</h3>
                            <div class="product-price">
                                <span class="current-price">₹1,599</span>
                            </div>
                            <p class="product-description">Classic button-up
                                shirt with a modern tailored fit for a sharp
                                look.</p>
                            
                            <div class="product-actions">
                                <button class="btn-add-to-cart" onclick="addToCart('Tailored Button-Up Shirt', 1599, 'https://images.pexels.com/photos/297933/pexels-photo-297933.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1')">
                                    <i class="fas fa-shopping-cart"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Product 6 -->
                    <div class="product-card">
                        <div class="product-badge sale-badge">Sale</div>
                        <div class="product-image">
                            <img
                                src="https://images.pexels.com/photos/1124468/pexels-photo-1124468.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                alt="Premium Leather Jacket">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">Premium Leather
                                Jacket</h3>
                            <div class="product-price">
                                <span class="current-price">₹2,799</span>
                                <span class="original-price">₹2,999</span>
                            </div>
                            <p class="product-description">Authentic leather
                                jacket with stylish design and durable
                                construction.</p>
                           
                            <div class="product-actions">
                                <button class="btn-add-to-cart" onclick="addToCart('Premium Leather Jacket', 2799, 'https://images.pexels.com/photos/1124468/pexels-photo-1124468.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1')">
                                    <i class="fas fa-shopping-cart"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Pants Product 1 -->
                    <div class="product-card">
                        <div class="product-badge">New</div>
                        <div class="product-image">
                            <img src="loose fit jeans.webp" alt="Slim Fit Jeans" width="400px">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">Loose Fit jeans</h3>
                            <div class="product-price">
                                <span class="current-price">₹1,079</span>
                                <span class="original-price">₹1,499</span>
                            </div>
                            <p class="product-description">Modern slim fit jeans
                                in premium stretch denim for ultimate
                                comfort.</p>
                            
                            <div class="product-actions">
                                <button class="btn-add-to-cart" onclick="addToCart('Loose Fit jeans', 1079, 'loose fit jeans.webp')">
                                    <i class="fas fa-shopping-cart"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Pants Product 2 -->
                    <div class="product-card">
                        <div class="product-badge sale-badge">Sale</div>
                        <div class="product-image">
                            <img src="bell.webp" alt="Cargo Pants" width="390px">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">Bell Bottom Jeans</h3>
                            <div class="product-price">
                                <span class="current-price">₹1,299</span>
                                <span class="original-price">₹1,999</span>
                            </div>
                            <p class="product-description">Functional cargo pants
                                with multiple pockets for a practical yet stylish
                                look.</p>
                            
                            <div class="product-actions">
                                <button class="btn-add-to-cart" onclick="addToCart('Bell Bottom Jeans', 1299, 'bell.webp')">
                                    <i class="fas fa-shopping-cart"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
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
        
        
        </div>
      </div>
      
      <div class="footer-bottom">
        <p>&copy; <span id="current-year">2025</span> Fashion Store. All Rights Reserved.</p>
      </div>
    </div>
  </footer>

  <script>
 
    // Mobile menu toggle
    const menuToggle = document.querySelector('.menu-toggle');
    const mobileMenu = document.querySelector('.mobile-menu');
    const closeMenu = document.querySelector('.close-menu');
    
    if (menuToggle) {
        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
    }
    
    if (closeMenu) {
        closeMenu.addEventListener('click', () => {
            mobileMenu.classList.remove('active');
            document.body.style.overflow = 'auto';
        });
    }
    
    // Cart functionality
    let currentProductDetail = {};
    
    // Function to show product details
    function showCard(img) {
        document.querySelector('.fullPage').style.display = 'flex';
        document.getElementById('cartImg').src = img.src;
        
        // Store current product details
        if (img.src.includes('srt')) {
            currentProductDetail = {
                name: "Cutton Trending Shirt",
                price: 999,
                image: img.src
            };
        } else if (img.src.includes('wn')) {
            currentProductDetail = {
                name: "Trending Girl Tops",
                price: 1199,
                image: img.src
            };
        }
    }
    
    // Add to cart from product list
    function addToCart(name, price, image) {
        // Get existing cart or create new array
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        
        // Add item to cart
        cart.push({
            name: name,
            price: price,
            image: image
        });
        
        // Save to localStorage
        localStorage.setItem('cart', JSON.stringify(cart));
        
        // Alert user
        alert(name + " has been added to your cart!");
        
        // Redirect to cart page
        window.location.href = 'cart.php';
    }
    
    // Add to cart from product detail view
    function addToCartFromDetail() {
        if (!currentProductDetail.name) {
            alert("Please select a product first");
            return;
        }
        
        addToCart(currentProductDetail.name, currentProductDetail.price, currentProductDetail.image);
    }
  </script>
</body>

</html>
