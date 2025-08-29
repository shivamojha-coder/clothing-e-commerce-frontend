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
    <title>My Cart - Trends</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(120deg, #667eea 0%, #764ba2 100%);
            animation: gradientMove 8s ease-in-out infinite alternate;
            color: #212529;
            margin: 0;
            padding: 0;
        }
        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            100% { background-position: 100% 50%; }
        }
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255,255,255,0.15);
            box-shadow: 0 8px 32px 0 rgba(31,38,135,0.18);
            backdrop-filter: blur(12px);
            border-radius: 18px;
            padding: 20px;
            margin: 24px 0 32px 0;
            animation: fadeInForm 1.2s;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            animation: fadeInForm 1.2s;
        }
        .cart-section {
            padding: 2rem 0 4rem;
        }
        .cart-header {
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #dee2e6;
            animation: fadeInForm 1.2s;
        }
        .cart-header h1 {
            font-size: 2.2rem;
            color: #212529;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }
        .cart-header p {
            color: #495057;
            font-size: 1.1rem;
        }
        .cart-list {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }
        .cart-card {
            background: rgba(255,255,255,0.18);
            border-radius: 18px;
            box-shadow: 0 8px 32px 0 rgba(31,38,135,0.12);
            overflow: hidden;
            transition: box-shadow 0.4s, transform 0.4s;
            animation: fadeInForm 1.2s;
        }
        .cart-card:hover {
            box-shadow: 0 16px 40px 0 rgba(31,38,135,0.18);
            transform: translateY(-6px) scale(1.02);
        }
        .cart-item {
            display: grid;
            grid-template-columns: 80px 1fr auto;
            align-items: center;
            gap: 1rem;
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #e9ecef;
            animation: fadeInForm 1.2s;
        }
        .cart-item:last-child {
            border-bottom: none;
        }
        .item-image {
            width: 70px;
            height: 70px;
            border-radius: 12px;
            overflow: hidden;
        }
        .item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .item-details h4 {
            margin: 0 0 0.25rem 0;
            font-size: 1rem;
            color: #343a40;
        }
        .item-price {
            color: #495057;
            margin: 0;
        }
        .item-quantity {
            color: #6c757d;
            font-size: 0.9rem;
        }
        .cart-summary {
            display: flex;
            justify-content: space-between;
            padding: 1.5rem;
            border-top: 1px solid #dee2e6;
        }
        .cart-total {
            text-align: right;
        }
        .cart-total-price {
            font-size: 1.4rem;
            font-weight: 600;
            color: #e62e5c;
            margin: 0;
        }
        .cart-total-items {
            color: #6c757d;
            font-size: 0.9rem;
            margin: 0;
        }
        .cart-footer {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            padding: 1rem 1.5rem;
            background: rgba(255,255,255,0.22);
            border-top: 1px solid #e9ecef;
        }
        .btn-checkout {
            background: linear-gradient(90deg, #2575fc 0%, #20c997 100%);
            color: #fff;
            padding: 0.6rem 1.2rem;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 500;
            display: inline-block;
            transition: background 0.3s, transform 0.2s;
            font-size: 0.95rem;
            border: none;
        }
        .btn-checkout:hover {
            background: linear-gradient(90deg, #20c997 0%, #2575fc 100%);
            transform: scale(1.06);
        }
        .btn-remove {
            background: #e9ecef;
            color: #343a40;
            padding: 0.6rem 1.2rem;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 500;
            display: inline-block;
            transition: background 0.3s, color 0.3s, transform 0.2s;
            font-size: 0.95rem;
        }
        .btn-remove:hover {
            background: #dee2e6;
            color: #e62e5c;
            transform: scale(1.06);
        }
        .empty-cart {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 3rem;
            background: rgba(255,255,255,0.18);
            border-radius: 18px;
            box-shadow: 0 8px 32px 0 rgba(31,38,135,0.12);
            text-align: center;
            animation: fadeInForm 1.2s;
        }
        .empty-cart i {
            color: #ced4da;
            margin-bottom: 1.5rem;
        }
        .empty-cart p {
            font-size: 1.5rem;
            color: #495057;
            margin-bottom: 2rem;
        }
        .btn-shop-now {
            background: linear-gradient(90deg, #ff3e6c 0%, #20c997 100%);
            color: #fff;
            padding: 0.85rem 1.5rem;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
            transition: background 0.3s, transform 0.2s;
        }
        .btn-shop-now:hover {
            background: linear-gradient(90deg, #20c997 0%, #ff3e6c 100%);
            transform: scale(1.06);
        }
        @keyframes fadeInForm {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes popSuccess {
            0% { opacity: 0; transform: scale(0.7) translateY(40px); }
            60% { opacity: 1; transform: scale(1.1) translateY(-10px); }
            80% { transform: scale(0.95) translateY(0); }
            100% { opacity: 1; transform: scale(1) translateY(0); }
        }
        @keyframes bounceIn {
            0% { opacity: 0; transform: scale(0.3); }
            50% { opacity: 1; transform: scale(1.05); }
            70% { transform: scale(0.9); }
            100% { opacity: 1; transform: scale(1); }
        }
        @media (max-width: 768px) {
            .cart-summary {
                flex-direction: column;
                gap: 1rem;
            }
            .cart-total {
                text-align: left;
            }
            nav .logo {
                margin-left: 10px;
            }
            nav ul {
                margin-right: 10px;
                flex-wrap: wrap;
                justify-content: center;
            }
            nav ul li a {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
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
            <li><a href="cart.php" class="active">Cart</a></li>
            <li> <a href="logout.php" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a></li>
        </ul>
    </nav>
    <div class="container">
        <section class="cart-section">
            <div class="cart-header">
                <h1><i class="fas fa-shopping-cart"></i> My Cart</h1>
                <p>Review and manage your cart items</p>
            </div>
            <!-- Fix: Add cart-items and cart-summary containers for JS -->
            <div id="cart-items" class="cart-list"></div>
            <div id="cart-summary" class="cart-summary"></div>
            <div class="cart-actions" style="display:none; margin-top:2rem;">
                <button class="btn-checkout" onclick="showCheckout()">Proceed to Checkout</button>
                <button class="btn-remove" onclick="clearCart()">Clear Cart</button>
            </div>
            <!-- Checkout form and success message (hidden by default) -->
            <div id="checkout-form" style="display:none; margin-top:2rem;">
                <form id="checkoutForm" onsubmit="event.preventDefault(); placeOrder();" style="background:rgba(255,255,255,0.18);padding:2rem;border-radius:18px;max-width:500px;margin:auto;">
                    <h2 style="text-align:center;margin-bottom:1.5rem;">Checkout</h2>
                    <input type="text" id="fullname" class="form-control" placeholder="Full Name" style="width:100%;margin-bottom:1rem;padding:0.7rem;border-radius:8px;border:1px solid #ccc;" required>
                    <input type="email" id="email" class="form-control" placeholder="Email" style="width:100%;margin-bottom:1rem;padding:0.7rem;border-radius:8px;border:1px solid #ccc;" required>
                    <input type="tel" id="phone" class="form-control" placeholder="Phone Number" style="width:100%;margin-bottom:1rem;padding:0.7rem;border-radius:8px;border:1px solid #ccc;" required>
                    <input type="text" id="address" class="form-control" placeholder="Address" style="width:100%;margin-bottom:1rem;padding:0.7rem;border-radius:8px;border:1px solid #ccc;" required>
                    <input type="text" id="city" class="form-control" placeholder="City" style="width:100%;margin-bottom:1rem;padding:0.7rem;border-radius:8px;border:1px solid #ccc;" required>
                    <input type="text" id="pincode" class="form-control" placeholder="Pincode" style="width:100%;margin-bottom:1rem;padding:0.7rem;border-radius:8px;border:1px solid #ccc;" required>
                    <div style="margin-bottom:1rem;">
                        <label><input type="radio" name="payment" value="cod" checked> Cash on Delivery</label>
                        <label style="margin-left:1rem;"><input type="radio" name="payment" value="card"> Card</label>
                        <label style="margin-left:1rem;"><input type="radio" name="payment" value="upi"> UPI</label>
                    </div>
                    <div id="card-details" class="payment-details" style="display:none;">
                        <input type="text" id="card-number" class="form-control" placeholder="Card Number" style="width:100%;margin-bottom:1rem;padding:0.7rem;border-radius:8px;border:1px solid #ccc;">
                        <input type="text" id="expiry" class="form-control" placeholder="MM/YY" style="width:48%;margin-bottom:1rem;padding:0.7rem;border-radius:8px;border:1px solid #ccc;display:inline-block;">
                        <input type="text" id="cvv" class="form-control" placeholder="CVV" style="width:48%;margin-bottom:1rem;padding:0.7rem;border-radius:8px;border:1px solid #ccc;display:inline-block;float:right;">
                    </div>
                    <div id="upi-details" class="payment-details" style="display:none;">
                        <input type="text" id="upi-id" class="form-control" placeholder="UPI ID (example@upi)" style="width:100%;margin-bottom:1rem;padding:0.7rem;border-radius:8px;border:1px solid #ccc;">
                    </div>
                    <button type="submit" class="btn-checkout" style="width:100%;margin-top:1rem;">Place Order</button>
                </form>
            </div>
            <div id="success-message" style="display:none; margin-top:2rem; color:green; font-size:1.2rem; text-align:center; animation: popSuccess 1s cubic-bezier(.68,-0.55,.27,1.55); font-weight:600; letter-spacing:1px;">
                <i class="fas fa-check-circle" style="font-size:2.5rem; color:#20c997; animation: bounceIn 0.8s;"></i><br>
                Order placed successfully!
            </div>
        </section>
    </div>
    <script>
        // Cart loading function
        function loadCart() {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            let cartContainer = document.getElementById('cart-items');
            let cartSummary = document.getElementById('cart-summary');
            cartContainer.innerHTML = '';

            if (cart.length === 0) {
                cartContainer.innerHTML = `
                    <div class="empty-cart">
                        <i class="fas fa-shopping-cart fa-4x"></i>
                        <p>Your cart is empty</p>
                        <a href="men.php" class="btn-shop-now">Shop Now</a>
                    </div>`;
                
                cartSummary.innerHTML = '';
                document.querySelector('.cart-actions').style.display = 'none';
                return;
            }

            document.querySelector('.cart-actions').style.display = 'flex';
            
            let totalAmount = 0;
            let itemCount = 0;

            cart.forEach((product, index) => {
                let productElement = document.createElement('div');
                productElement.classList.add('cart-item');
                productElement.innerHTML = `
                    <div class="item-image">
                        <img src="${product.image}" alt="${product.name}">
                    </div>
                    <div class="item-details">
                        <h3>${product.name}</h3>
                        <p class="item-price">₹${product.price}</p>
                    </div>
                    <div class="item-quantity">
                        <button class="qty-btn" onclick="updateQuantity(${index}, -1)">-</button>
                        <span id="qty-${index}">1</span>
                        <button class="qty-btn" onclick="updateQuantity(${index}, 1)">+</button>
                    </div>
                    <div class="item-total">
                        <p>₹${product.price}</p>
                    </div>
                    <button class="btn-remove" onclick="removeItem(${index})">
                        <i class="fas fa-times"></i>
                    </button>
                `;
                cartContainer.appendChild(productElement);
                
                totalAmount += product.price;
                itemCount++;
            });

            // Update Cart Summary
            cartSummary.innerHTML = `
                <h3>Order Summary</h3>
                <div class="summary-item">
                    <span>Items (${itemCount}):</span>
                    <span>₹${totalAmount}</span>
                </div>
                <div class="summary-item">
                    <span>Shipping:</span>
                    <span>₹${totalAmount > 999 ? 0 : 99}</span>
                </div>
                <div class="summary-divider"></div>
                <div class="summary-item total">
                    <span>Total:</span>
                    <span>₹${totalAmount > 999 ? totalAmount : totalAmount + 99}</span>
                </div>
                <p class="shipping-note">${totalAmount > 999 ? 'Congratulations! You get FREE shipping!' : 'Get FREE shipping on orders over ₹999'}</p>
            `;
        }

        // Remove item from cart
        function removeItem(index) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart.splice(index, 1);
            localStorage.setItem('cart', JSON.stringify(cart));
            loadCart();
        }

        // Update item quantity
        function updateQuantity(index, change) {
            let qtyElement = document.getElementById(`qty-${index}`);
            let currentQty = parseInt(qtyElement.textContent);
            let newQty = currentQty + change;
            
            if (newQty > 0) {
                qtyElement.textContent = newQty;
                updateItemTotal(index, newQty);
            }
        }

        // Update item total price
        function updateItemTotal(index, qty) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            let itemTotalElement = document.querySelectorAll('.item-total')[index];
            let price = cart[index].price;
            
            itemTotalElement.innerHTML = `<p>₹${price * qty}</p>`;
            updateCartSummary();
        }

        // Update cart summary
        function updateCartSummary() {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            let cartSummary = document.getElementById('cart-summary');
            let totalAmount = 0;
            let itemCount = 0;
            
            document.querySelectorAll('.item-total').forEach((item, index) => {
                let qty = parseInt(document.getElementById(`qty-${index}`).textContent);
                let itemPrice = cart[index].price;
                totalAmount += (itemPrice * qty);
                itemCount += qty;
            });
            
            // Update summary
            cartSummary.innerHTML = `
                <h3>Order Summary</h3>
                <div class="summary-item">
                    <span>Items (${itemCount}):</span>
                    <span>₹${totalAmount}</span>
                </div>
                <div class="summary-item">
                    <span>Shipping:</span>
                    <span>₹${totalAmount > 999 ? 0 : 99}</span>
                </div>
                <div class="summary-divider"></div>
                <div class="summary-item total">
                    <span>Total:</span>
                    <span>₹${totalAmount > 999 ? totalAmount : totalAmount + 99}</span>
                </div>
                <p class="shipping-note">${totalAmount > 999 ? 'Congratulations! You get FREE shipping!' : 'Get FREE shipping on orders over ₹999'}</p>
            `;
        }

        // Clear cart
        function clearCart() {
            if (confirm('Are you sure you want to clear your cart?')) {
                localStorage.removeItem('cart');
                loadCart();
            }
        }

        // Show checkout form
        function showCheckout() {
            document.getElementById('checkout-form').style.display = 'block';
            document.getElementById('checkout-form').scrollIntoView({ behavior: 'smooth' });
        }

        // Show error message under an input field
        function showError(fieldId, message) {
            const field = document.getElementById(fieldId);
            if (!field) return;
            
            // Check if error message already exists
            let errorElement = field.nextElementSibling;
            if (!errorElement || !errorElement.classList.contains('error-message')) {
                // Create new error message element
                errorElement = document.createElement('span');
                errorElement.classList.add('error-message');
                
                // Insert after the field
                field.parentNode.insertBefore(errorElement, field.nextSibling);
            }
            
            // Set error message
            errorElement.textContent = message;
            
            // Highlight field
            field.style.borderColor = '#f44336';
        }

        // Place order function with validation
        function placeOrder() {
            // Get all form field values
            let fullname = document.getElementById('fullname').value.trim();
            let email = document.getElementById('email').value.trim();
            let phone = document.getElementById('phone').value.trim();
            let address = document.getElementById('address').value.trim();
            let city = document.getElementById('city').value.trim();
            let pincode = document.getElementById('pincode').value.trim();
            
            // Error flags
            let hasError = false;
            let errorMessages = [];
            
            // Reset all previous error messages
            document.querySelectorAll('.error-message').forEach(el => {
                if (el) el.remove();
            });
            
            // Reset all field borders
            document.querySelectorAll('.form-control').forEach(el => {
                el.style.borderColor = '';
            });
            
            // Validate full name (at least 3 characters)
            if (fullname.length < 3) {
                showError('fullname', 'Name must be at least 3 characters long');
                hasError = true;
                errorMessages.push("Name must be at least 3 lettersName must be at least 3 letters");
            }
            
            // Validate email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                showError('email', 'Please enter a valid email address');
                hasError = true;
                errorMessages.push("Please enter a valid email address");
            }
            
            // Validate phone (10 digits)
            const phoneRegex = /^[0-9]{10}$/;
            if (!phoneRegex.test(phone)) {
                showError('phone', 'Please enter a valid 10 digit phone number');
                hasError = true;
                errorMessages.push("Please enter a valid 10 digit phone number");
            }
            
            // Validate address (at least 10 characters)
            if (address.length < 10) {
                showError('address', 'Please enter full address (minimum 10 characters)');
                hasError = true;
                errorMessages.push("Please enter full address (minimum 10 characters)");
            }
            
            // Validate city (at least 3 characters)
            if (city.length < 3) {
                showError('city', 'Please enter a valid city name');
                hasError = true;
                errorMessages.push("Please enter a valid city name");
            }
            
            // Validate pincode (6 digits)
            const pincodeRegex = /^[0-9]{6}$/;
            if (!pincodeRegex.test(pincode)) {
                showError('pincode', 'Please enter a valid 6 digit Pincode');
                hasError = true;
                errorMessages.push("Please enter a valid 6 digit Pincode");
            }
            
            // Validate payment method selection
            const paymentMethod = document.querySelector('input[name="payment"]:checked').value;
            if (paymentMethod === 'card') {
                const cardNumber = document.getElementById('card-number').value.trim();
                const expiry = document.getElementById('expiry').value.trim();
                const cvv = document.getElementById('cvv').value.trim();
                
                // Card number validation (16 digits, can have spaces)
                const cardNumberClean = cardNumber.replace(/\s/g, '');
                if (cardNumberClean.length !== 16 || !/^\d+$/.test(cardNumberClean)) {
                    showError('card-number', 'Please enter a valid 16 digit card number');
                    hasError = true;
                    errorMessages.push("Please enter a valid 16 digit card number");
                }
                
                // Expiry validation (MM/YY format)
                const expiryRegex = /^(0[1-9]|1[0-2])\/([0-9]{2})$/;
                if (!expiryRegex.test(expiry)) {
                    showError('expiry', 'Please enter valid expiry date (MM/YY)');
                    hasError = true;
                    errorMessages.push("Please enter valid expiry date (MM/YY)");
                }
                
                // CVV validation (3 or 4 digits)
                const cvvRegex = /^[0-9]{3,4}$/;
                if (!cvvRegex.test(cvv)) {
                    showError('cvv', 'Please enter a valid CVV');
                    hasError = true;
                    errorMessages.push("Please enter a valid CVV");
                }
            } else if (paymentMethod === 'upi') {
                const upiId = document.getElementById('upi-id').value.trim();
                
                // UPI ID validation
                const upiRegex = /^[\w.-]+@[\w.-]+$/;
                if (!upiRegex.test(upiId)) {
                    showError('upi-id', 'Please enter a valid UPI ID (example@upi)');
                    hasError = true;
                    errorMessages.push("Please enter a valid UPI ID (example@upi)");
                }
            }
            
            // If there are errors, stop form submission
            if (hasError) {
                // Show alert with all error messages
                alert("Please correct the following errors:\n\n" + errorMessages.join("\n"));
                return;
            }
            
            // If all is valid, proceed with order placement
            
            // Get cart items and calculate total
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            let totalAmount = 0;
            let orderItems = [];
            
            // Process each cart item and create order items with quantity
            let processedItems = {};
            
            cart.forEach(item => {
                // Check if this item has been processed before
                if (processedItems[item.name]) {
                    // Increment quantity
                    processedItems[item.name].quantity += 1;
                } else {
                    // Add new item
                    processedItems[item.name] = {
                        name: item.name,
                        price: item.price,
                        image: item.image,
                        quantity: 1
                    };
                }
                
                totalAmount += item.price;
            });
            
            // Convert processed items object to array
            for (let key in processedItems) {
                orderItems.push(processedItems[key]);
            }
            
            // Add shipping if total is less than 999
            if (totalAmount < 999) {
                totalAmount += 99;
            }
            
            // Create order object
            let order = {
                orderId: 'ORD' + Date.now().toString().slice(-8),
                date: new Date(),
                status: 'Processing',
                items: orderItems,
                total: totalAmount,
                address: {
                    name: fullname,
                    street: address,
                    city: city,
                    pincode: pincode,
                    phone: phone,
                    email: email
                },
                paymentMethod: paymentMethod
            };
            
            // Get existing orders or create new array
            let orders = JSON.parse(localStorage.getItem('orders')) || [];
            
            // Add new order
            orders.push(order);
            
            // Save orders to localStorage
            localStorage.setItem('orders', JSON.stringify(orders));
            
            // Clear cart
            localStorage.removeItem('cart');
            
            // Show success message
            document.getElementById('checkout-form').style.display = 'none';
            document.getElementById('success-message').style.display = 'block';
            
            // Scroll to success message
            document.getElementById('success-message').scrollIntoView({ behavior: 'smooth' });
        }

        // Payment method selection
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize cart
            loadCart();
            
            // Payment method selection
            document.querySelectorAll('input[name="payment"]').forEach(input => {
                input.addEventListener('change', function() {
                    // Hide all payment details
                    document.querySelectorAll('.payment-details').forEach(detail => {
                        detail.style.display = 'none';
                    });
                    
                    // Show selected payment details
                    if (this.value === 'card') {
                        document.getElementById('card-details').style.display = 'block';
                    } else if (this.value === 'upi') {
                        document.getElementById('upi-details').style.display = 'block';
                    }
                });
            });
        });
    </script>
</body>
</html>