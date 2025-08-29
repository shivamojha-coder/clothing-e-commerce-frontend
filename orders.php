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
    <title>My Orders - Trends</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

        .orders-section {
            padding: 2rem 0 4rem;
        }

        .orders-header {
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #dee2e6;
            animation: fadeInForm 1.2s;
        }

        .orders-header h1 {
            font-size: 2.2rem;
            color: #212529;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }

        .orders-header p {
            color: #495057;
            font-size: 1.1rem;
        }

        .orders-list {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .order-card {
            background: rgba(255,255,255,0.18);
            border-radius: 18px;
            box-shadow: 0 8px 32px 0 rgba(31,38,135,0.12);
            overflow: hidden;
            transition: box-shadow 0.4s, transform 0.4s;
            animation: fadeInForm 1.2s;
        }

        .order-card:hover {
            box-shadow: 0 16px 40px 0 rgba(31,38,135,0.18);
            transform: translateY(-6px) scale(1.02);
        }

        .order-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 1.5rem;
            background: rgba(255,255,255,0.22);
            border-bottom: 1px solid #dee2e6;
        }

        .order-id {
            font-weight: 600;
            color: #212529;
        }

        .order-date {
            color: #495057;
        }

        .order-status {
            padding: 0.3rem 0.8rem;
            border-radius: 999px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .status-delivered {
            background-color: #20c997;
            color: #fff;
        }

        .status-processing {
            background-color: #f0ad4e;
            color: #fff;
        }

        .status-shipping {
            background-color: #2575fc;
            color: #fff;
        }

        .order-content {
            padding: 1.5rem;
        }

        .order-items {
            margin-bottom: 1.5rem;
        }

        .order-item {
            display: grid;
            grid-template-columns: 80px 1fr auto;
            align-items: center;
            gap: 1rem;
            padding: 1rem 0;
            border-bottom: 1px solid #e9ecef;
            animation: fadeInForm 1.2s;
        }

        .order-item:last-child {
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

        .order-summary {
            display: flex;
            justify-content: space-between;
            padding-top: 1rem;
            border-top: 1px solid #dee2e6;
        }

        .order-address {
            flex: 1;
        }

        .order-address h4, 
        .order-total h4 {
            margin-top: 0;
            margin-bottom: 0.5rem;
            color: #343a40;
            font-size: 1rem;
        }

        .order-address p {
            margin: 0;
            color: #495057;
            font-size: 0.95rem;
            line-height: 1.5;
        }

        .order-total {
            text-align: right;
        }

        .order-total-price {
            font-size: 1.4rem;
            font-weight: 600;
            color: #e62e5c;
            margin: 0;
        }

        .order-total-items {
            color: #6c757d;
            font-size: 0.9rem;
            margin: 0;
        }

        .order-footer {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            padding: 1rem 1.5rem;
            background: rgba(255,255,255,0.22);
            border-top: 1px solid #e9ecef;
        }

        .btn-order-details {
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

        .btn-order-details:hover {
            background: #dee2e6;
            color: #2575fc;
            transform: scale(1.06);
        }

        .btn-reorder {
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

        .btn-reorder:hover {
            background: linear-gradient(90deg, #20c997 0%, #2575fc 100%);
            transform: scale(1.06);
        }

        .empty-orders {
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

        .empty-orders i {
            color: #ced4da;
            margin-bottom: 1.5rem;
        }

        .empty-orders p {
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

        @media (max-width: 768px) {
            .order-summary {
                flex-direction: column;
                gap: 1rem;
            }

            .order-total {
                text-align: left;
            }

            .order-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }

            .order-item {
                grid-template-columns: 60px 1fr;
                grid-template-rows: auto auto;
            }

            .item-details {
                grid-column: 2;
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
            <li><a href="orders.php" class="active">My Orders</a></li>
             <li> <a href="logout.php" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a></li>
        </ul>
    </nav>

    <div class="container">
        <section class="orders-section">
            <div class="orders-header">
                <h1><i class="fas fa-box"></i> My Orders</h1>
                <p>Track and manage your previous orders</p>
            </div>

            <div id="orders-container">
                </div>
        </section>
    </div>

    <script>
        // Load all orders
        function loadOrders() {
            let orders = JSON.parse(localStorage.getItem('orders')) || [];
            let ordersContainer = document.getElementById('orders-container');
            
            // Check if there are any orders
            if (orders.length === 0) {
                ordersContainer.innerHTML = `
                    <div class="empty-orders">
                        <i class="fas fa-shopping-bag fa-4x"></i>
                        <p>You haven't placed any orders yet</p>
                        <a href="men.html" class="btn-shop-now">Start Shopping</a>
                    </div>
                `;
                return;
            }
            
            // Create orders list
            let ordersList = document.createElement('div');
            ordersList.className = 'orders-list';
            
            // Sort orders by date (newest first)
            orders.sort((a, b) => new Date(b.date) - new Date(a.date));
            
            orders.forEach(order => {
                let statusClass;
                switch(order.status) {
                    case 'Delivered':
                        statusClass = 'status-delivered';
                        break;
                    case 'Processing':
                        statusClass = 'status-processing';
                        break;
                    case 'Shipping':
                        statusClass = 'status-shipping';
                        break;
                    default:
                        statusClass = '';
                }
                
                // Create order items HTML
                let itemsHTML = '';
                let totalItems = 0;
                
                order.items.forEach(item => {
                    totalItems += item.quantity;
                    itemsHTML += `
                        <div class="order-item">
                            <div class="item-image">
                                <img src="${item.image}" alt="${item.name}">
                            </div>
                            <div class="item-details">
                                <h4>${item.name}</h4>
                                <p class="item-price">₹${item.price}</p>
                            </div>
                            <span class="item-quantity">Qty: ${item.quantity}</span>
                        </div>
                    `;
                });
                
                // Create order card
                let orderCard = document.createElement('div');
                orderCard.className = 'order-card';
                orderCard.innerHTML = `
                    <div class="order-header">
                        <div>
                            <span class="order-id">Order #${order.orderId}</span>
                            <span class="order-date">${new Date(order.date).toLocaleDateString('en-IN', { day: 'numeric', month: 'short', year: 'numeric' })}</span>
                        </div>
                        <span class="order-status ${statusClass}">${order.status}</span>
                    </div>
                    
                    <div class="order-content">
                        <div class="order-items">
                            ${itemsHTML}
                        </div>
                        
                        <div class="order-summary">
                            <div class="order-address">
                                <h4>Shipping Address</h4>
                                <p>${order.address.name}<br>
                                ${order.address.street}<br>
                                ${order.address.city}, ${order.address.pincode}<br>
                                Phone: ${order.address.phone}</p>
                            </div>
                            
                            <div class="order-total">
                                <h4>Order Total</h4>
                                <p class="order-total-price">₹${order.total}</p>
                                <p class="order-total-items">${totalItems} item(s)</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="order-footer">
                        <a href="#" class="btn-order-details" onclick="viewOrderDetails('${order.orderId}')">View Details</a>
                        <a href="#" class="btn-reorder" onclick="reorder('${order.orderId}')">Buy Again</a>
                    </div>
                `;
                
                ordersList.appendChild(orderCard);
            });
            
            ordersContainer.innerHTML = '';
            ordersContainer.appendChild(ordersList);
        }
        
        // View order details (for future implementation)
        function viewOrderDetails(orderId) {
            alert(`Order details for order #${orderId} will be shown here.`);
        }
        
        // Reorder functionality
        function reorder(orderId) {
            let orders = JSON.parse(localStorage.getItem('orders')) || [];
            let order = orders.find(o => o.orderId === orderId);
            
            if (!order) {
                alert('Order not found!');
                return;
            }
            
            // Get current cart
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            
            // Add order items to cart
            order.items.forEach(item => {
                for (let i = 0; i < item.quantity; i++) {
                    cart.push({
                        name: item.name,
                        price: item.price,
                        image: item.image
                    });
                }
            });
            
            // Save cart
            localStorage.setItem('cart', JSON.stringify(cart));
            
            // Redirect to cart
            window.location.href = 'cart.html';
        }
        
        // Load orders when page loads
        window.onload = function() {
            loadOrders();
        };
    </script>
</body>
</html>