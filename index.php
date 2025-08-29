<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trends - Fashion Store</title>
    <link rel="stylesheet" href="index.css">
    <script src="script.js"></script>

    <link
        href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Catamaran:wght@200&family=Courgette&family=Edu+TAS+Beginner:wght@700&family=Lato:wght@300;900&family=Mukta:wght@700&family=Mulish:wght@300&family=Open+Sans&family=PT+Sans:ital,wght@1,700&family=Piedra&family=Poppins:wght@300&family=Raleway:wght@100&family=Roboto&family=Roboto+Condensed:wght@700&family=Roboto+Slab&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

        <div class="mainPage" style="background: rgba(255,255,255,0.18); box-shadow: 0 8px 32px 0 rgba(31,38,135,0.12); border-radius: 18px; animation: fadeInForm 1.2s;">
            <div class="text">
                <h2>Trends...</h2>
                <h1 class="heads">Super Value Deals</h1>
                <h1>On All Products</h1>
                <p>Buy All Types Of Clothes And Shoes For Men,Women and Kids.</p>
                <button>Explore</button>
            </div>
            <img src="m3.png" alt="">
        </div>

        <!-- Men's Wear -->
        <div class="cardMen">
            <div class="head">
                <h1>Trends <span>Men's Wear</span></h1>
            </div>
            <div class="card" id="item1">
                <div class="crd">
                    <img src="srt1.webp" alt="">
                    <div class="txt">
                        <h3>Cutton Trending Shirt's</h3>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i><br>
                        <button onclick="addToCart('Cutton Trending Shirt', 999, 'srt1.webp')">Add To Cart</button>
                    </div>
                </div>
                <div class="crd">
                    <img src="srt2.webp" alt="">
                    <div class="txt">
                        <h3>Cutton Trending Shirt's</h3>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i><br>
                        <button onclick="addToCart('Cutton Trending Shirt', 899, 'srt2.webp')">Add To Cart</button>
                    </div>
                </div>
                <div class="crd">
                    <img src="srt6.webp" alt="">
                    <div class="txt">
                        <h3>Cutton Trending Shirt's</h3>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i><br>
                        <button onclick="addToCart('Cutton Trending Shirt', 799, 'srt6.webp')">Add To Cart</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Women's Wear -->
        <div class="cardgirl">
            <div class="head">
                <h1>Trends <span>Women's Wear</span></h1>
            </div>
            <div class="card">
                <div class="crd">
                    <img src="wn6.webp" alt="">
                    <div class="txt">
                        <h3>Trending Girl Tops</h3>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i><br>
                        <button onclick="addToCart('Trending Girl Tops', 1299, 'wn6.webp')">Add To Cart</button>
                    </div>
                </div>
                <div class="crd">
                    <img src="wn4.webp" alt="">
                    <div class="txt">
                        <h3>Trending Girl Tops</h3>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i><br>
                        <button onclick="addToCart('Trending Girl Tops', 1199, 'wn4.webp')">Add To Cart</button>
                    </div>
                </div>
                <div class="crd">
                    <img src="wn5.webp" alt="">
                    <div class="txt">
                        <h3>Trending Girl Tops</h3>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i><br>
                        <button onclick="addToCart('Trending Girl Tops', 999, 'wn5.webp')">Add To Cart</button>
                    </div>
                </div>
            </div>
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
                            <a href="https://www.instagram.com/trendy_clothings_store/?hl=en"><i
                                    class="fab fa-instagram"></i></a>
                            <a href="https://www.facebook.com/p/Trendy-Clothing-100095460605852/"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a href="https://www.linkedin.com/company/trendy-clothes?originalSubdomain=pk"><i
                                    class="fab fa-linkedin-in"></i></a>
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
        </footer>

        <script>
            // Cart functionality
            let currentProductDetail = {};

            // Show product details
            function showCard(img) {
                document.querySelector('.fullPage').style.display = 'flex';
                document.getElementById('cartImg').src = img.src;

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
                let cart = JSON.parse(localStorage.getItem('cart')) || [];

                cart.push({
                    name: name,
                    price: price,
                    image: image
                });

                localStorage.setItem('cart', JSON.stringify(cart));

                alert(name + " has been added to your cart!");

                // Redirect to cart.php instead of cart.html
                window.location.href = 'cart.php';
            }

            // Add to cart from detail view
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
