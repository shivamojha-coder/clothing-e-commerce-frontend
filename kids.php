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
        <title>Kids Fashion - Trends</title>
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
            <!-- Kids Products Section -->
            <section class="men-products" style="background: rgba(255,255,255,0.18); box-shadow: 0 8px 32px 0 rgba(31,38,135,0.12); border-radius: 18px; animation: fadeInForm 1.2s;">
                <div class="section-header">
                    <h1>Kid's Collection</h1>
                    <p>Discover our latest kid's fashion trends that blend style
                        and comfort.</p>
                </div>
                <div class="products-container">
                    <!-- Product 1 -->
                    <div class="product-card">
                        <div class="product-badge">New</div>
                        <div class="product-image">
                            <img src="kid1.webp" alt="" width="380px">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">Green Alan Shirt + Green Neo Pant.</h3>
                            <div class="product-price">
                                <span class="current-price">₹1,599</span>
                                <span class="original-price">₹2,999</span>
                            </div>
                            <p class="product-description">This dress is crafted from breathable cotton, keeping you cool while exuding effortless style.</p>
                           
                            <div class="product-actions">
                                <button class="btn-add-to-cart" onclick="addToCart('Green Alan Shirt + Green Neo Pant', 1599, 'kid1.webp')">
                                    <i class="fas fa-shopping-cart"></i> Add to
                                    Cart
                                </button>
                                
                            </div>
                        </div>
                    </div>
                    <!-- Product 2 -->
                    <div class="product-card">
                        <div class="product-image">
                            <img src="kid5.jpg" alt="" width="380px" >
                        </div>
                        <div class="product-info">
                            <h3 class="product-title"> Kids trending wear/ kids half clothing sets</h3>
                            <div class="product-price">
                                <span class="current-price">₹699</span>
                            </div>
                            <p class="product-description">Baby Boys & Baby Girls Casual T-shirt Pant, Pyjama, Track Suit, Trouser  (Yellow)</p>
                            
                            <div class="product-actions">
                                <button class="btn-add-to-cart" onclick="addToCart('Kids trending wear/ kids half clothing sets', 699, 'kid5.jpg')">
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
                         <img src="kid3.jpg" alt="" width="380px">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">Cutieful Summer Kids T-shirt and Shorts Set</h3>
                            <div class="product-price">
                                <span class="current-price">₹999</span>
                                <span class="original-price">₹1,499</span>
                            </div>
                            <p class="product-description">Timeless denim jacket
                                with a modern cut and premium quality.</p>
                            
                            <div class="product-actions">
                                <button class="btn-add-to-cart" onclick="addToCart('Cutieful Summer Kids T-shirt and Shorts Set', 999, 'kid3.jpg')">
                                    <i class="fas fa-shopping-cart"></i> Add to
                                    Cart
                                </button>
                                
                            </div>
                        </div>
                    </div>
                    <!-- Product 4 -->
                    <div class="product-card">
                        <div class="product-image">
                            <img src="kid4.jpg" alt="" width="380px">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">Stylish kids clothing set</h3>
                            <div class="product-price">
                                <span class="current-price">₹1,199</span>
                            </div>
                            <p class="product-description"> A children's clothing set, specifically a red sleeveless top and black shorts, designed for boys.</p>
                            
                            <div class="product-actions">
                                <button class="btn-add-to-cart" onclick="addToCart('Stylish kids clothing set', 1199, 'kid4.jpg')">
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
                            <img src="kid2.webp" alt="" width="380px">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">Long Sleeve T-Shirt & Casual Trousers</h3>
                            <div class="product-price">
                                <span class="current-price">₹999</span>
                            </div>
                            <p class="product-description">T-Shirt & Casual Trousers/Stylish Sweatshirt Tracksuit Set, Comfortable Tshirt & Pant set.</p>
                            
                            <div class="product-actions">
                                <button class="btn-add-to-cart" onclick="addToCart('Long Sleeve T-Shirt & Casual Trousers', 999, 'kid2.webp')">
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
                            <img src="kid6.webp" alt="" width="380px">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">Girls' Top with Shorts</h3>
                            <div class="product-price">
                                <span class="current-price">₹789</span>
                                <span class="original-price">₹999</span>
                            </div>
                            <p class="product-description"> A black t-shirt and a pair of blue denim shorts, likely a clothing set for children.</p>
                           
                            <div class="product-actions">
                                <button class="btn-add-to-cart" onclick="addToCart('Girls Top with Shorts', 789, 'kid6.webp')">
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
                            <img src="kid7.webp" alt="" width="380px">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">Baby Boys Casual T-shirt Pant With Pink And Black Colour </h3>
                            <div class="product-price">
                                <span class="current-price">₹1,079</span>
                                <span class="original-price">₹1,499</span>
                            </div>
                            <p class="product-description">Modern slim fit jeans
                                in premium stretch denim for ultimate
                                comfort.</p>
                            
                            <div class="product-actions">
                                <button class="btn-add-to-cart" onclick="addToCart('Baby Boys Casual T-shirt Pant With Pink And Black Colour', 1079, 'kid7.webp')">
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
                        <img src="kid8.webp" alt="Cargo Pants" width="380px">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title"> CUTIECRAZE Boy's Cotton T Shirt And Shorts Set</h3>
                            <div class="product-price">
                                <span class="current-price">₹599</span>
                                <span class="original-price">₹799</span>
                            </div>
                            <p class="product-description">T-shirt has a round neckline and short sleeves, with a small pocket on the chest .</p>
                            
                            <div class="product-actions">
                                <button class="btn-add-to-cart" onclick="addToCart('CUTIECRAZE Boys Cotton T Shirt And Shorts Set', 599, 'kid8.webp')">
                                    <i class="fas fa-shopping-cart"></i> Add to
                                    Cart
                                </button>
                                
                            </div>
                        </div>
                    </div>
                    <!-- Additional Pants Product 3 -->
                    <div class="product-card">
                        <div class="product-badge sale-badge">Sale</div>
                        <div class="product-image">
                            <img src="kid9.webp" alt="Cargo Pants" width="380px">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">HONYHANY Little Boy Clothing Sets</h3>
                            <div class="product-price">
                                <span class="current-price">₹799</span>
                                <span class="original-price">₹1,299</span>
                            </div>
                            <p class="product-description">Baby Boy Clothing Sets Short Sleeve Shirt Shorts 2 Pieces Summer Casual Outfit Sets</p>
                           
                            <div class="product-actions">
                                <button class="btn-add-to-cart" onclick="addToCart('HONYHANY Little Boy Clothing Sets', 799, 'kid9.webp')">
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
            // Add to Cart function - localStorage 
            function addToCart(name, price, image) {
              
                let cart = JSON.parse(localStorage.getItem('cart')) || [];
                
            //   new product create
                let product = {
                    name: name,
                    price: price,
                    image: image
                };
                
               
                cart.push(product);
                
                // Updated cart save in localsotrage
                localStorage.setItem('cart', JSON.stringify(cart));
                
                //  User alert
                alert(name + " has been added to your cart!");
                
                // cart page redirect
                window.location.href = 'cart.php';
            }
        </script>
    </body>
</html>