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
  <title>Contact Us - Fashion Store</title>
  <link rel="stylesheet" href="contact.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
  
  </style>
</head>
<body style="min-height:100vh; background: linear-gradient(120deg, #667eea 0%, #764ba2 100%); animation: gradientMove 8s ease-in-out infinite alternate;">
 
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
      

  <!-- Mobile Menu -->
  <div class="mobile-menu">
    <div class="mobile-menu-header">
      <div class="logo">
        <a href="index.html">
          <i class="fa-solid fa-shirt"></i>
          <span>Fashion Store</span>
        </a>
      </div>
      <button class="close-menu">
        <i class="fa-solid fa-xmark"></i>
      </button>
    </div>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="shop.php">Shop</a></li>
        <li><a href="collection.php">Collection</a></li>
        <li><a href="contact.php" class="active">Contact</a></li>
      </ul>
    </nav>
    <div class="mobile-icons">
      <a href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
      <a href="#"><i class="fa-solid fa-bag-shopping"></i></a>
      <a href="#"><i class="fa-solid fa-user"></i></a>
    </div>
  </div>

  <!-- Contact Banner -->
  <div class="contact-banner" style="background: rgba(255,255,255,0.18); box-shadow: 0 8px 32px 0 rgba(31,38,135,0.12); border-radius: 18px; animation: fadeInForm 1.2s;">
    <div class="container">
      <h1> Connect Us</h1>
      <p>We would love to hear from you! Let's talk about fashion, trends, or any questions you might have.</p>
    </div>
  </div>

  
          
          
          

  <!-- Contact Form -->
  <section class="contact-form-section" style="background: rgba(255,255,255,0.18); box-shadow: 0 8px 32px 0 rgba(31,38,135,0.12); border-radius: 18px; animation: fadeInForm 1.2s;">
    <div class="container">
      <div class="form-container">
        <div class="form-info">
          <h2>Get in Touch</h2>
          <p>
            Have questions about our products or services? Fill out the form and our team will get back to you as soon as possible.
          </p>
          
          <div class="service-features">
            <div class="feature">
              <i class="fa-solid fa-headset"></i>
              <div>
                <h3>Customer Support</h3>
                <p>We're here to help you</p>
              </div>
            </div>
            
            <div class="feature">
              <i class="fa-solid fa-truck"></i>
              <div>
                <h3>Free Shipping</h3>
                <p>On orders above ₹999</p>
              </div>
            </div>
            
            <div class="feature">
              <i class="fa-solid fa-rotate-left"></i>
              <div>
                <h3>Easy Returns</h3>
                <p>30-day return policy</p>
              </div>
            </div>
          </div>
        </div>
        
        <div class="form">
          <h2>Connect with Us. Fill the Form</h2>
          <form id="contact-form">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" id="name" name="name" placeholder="Enter Your Name" required>
              <span class="error-message"></span>
            </div>
            
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" placeholder="Enter Your Email" required>
              <span class="error-message"></span>
            </div>
            
            <div class="form-group">
              <label for="subject">Subject</label>
              <input type="text" id="subject" name="subject" placeholder="Enter Subject" required>
              <span class="error-message"></span>
            </div>
            
            <div class="form-group">
              <label for="message">Message</label>
              <textarea id="message" name="message" rows="4" placeholder="Enter Your Message" required></textarea>
              <span class="error-message"></span>
            </div>
            
            <button type="submit" class="submit-btn">
              <span>Submit</span>
              <i class="fa-solid fa-arrow-right"></i>
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ Section -->
  <section class="faq-section" style="padding: 50px 0;">
    <div class="container">
      <div class="section-header" style="text-align: center; margin-bottom: 30px;">
        <h2>Frequently Asked Questions</h2>
        <p>Find answers to the most common questions about our products, services, and policies.</p>
      </div>
      
      <div class="accordion">
  
        <!-- FAQ Item 1 -->
        <div class="accordion-item">
          <div class="accordion-header">
            <i class="fa-solid fa-circle-question"></i>
            <h3>What is your return policy?</h3>
            <i class="fa-solid fa-chevron-down toggle-icon"></i>
          </div>
          <div class="accordion-content">
            <p>We offer a 30-day return policy. If you're not satisfied with your purchase, you can return it within 30 days for a full refund or exchange.</p>
          </div>
        </div>
  
        <!-- FAQ Item 2 -->
        <div class="accordion-item">
          <div class="accordion-header">
            <i class="fa-solid fa-circle-question"></i>
            <h3>How can I track my order?</h3>
            <i class="fa-solid fa-chevron-down toggle-icon"></i>
          </div>
          <div class="accordion-content">
            <p>Once your order is shipped, you'll receive a tracking number via email. You can use this number to track your package on our website or the courier's website.</p>
          </div>
        </div>
  
        <!-- FAQ Item 3 -->
        <div class="accordion-item">
          <div class="accordion-header">
            <i class="fa-solid fa-circle-question"></i>
            <h3>Do you ship internationally?</h3>
            <i class="fa-solid fa-chevron-down toggle-icon"></i>
          </div>
          <div class="accordion-content">
            <p>Yes, we ship to most countries worldwide. Shipping costs and delivery times vary depending on the destination.</p>
          </div>
        </div>
  
        <!-- FAQ Item 4 -->
        <div class="accordion-item">
          <div class="accordion-header">
            <i class="fa-solid fa-circle-question"></i>
            <h3>How do I care for my fashion items?</h3>
            <i class="fa-solid fa-chevron-down toggle-icon"></i>
          </div>
          <div class="accordion-content">
            <p>Care instructions are provided on each product page and on the label of the item. Generally, we recommend washing in cold water and air drying for most garments.</p>
          </div>
        </div>
        
        <!-- FAQ Item 5 -->
        <div class="accordion-item">
          <div class="accordion-header">
            <i class="fa-solid fa-circle-question"></i>
            <h3>What payment methods do you accept?</h3>
            <i class="fa-solid fa-chevron-down toggle-icon"></i>
          </div>
          <div class="accordion-content">
            <p>We accept all major credit cards (Visa, MasterCard, American Express), PayPal, UPI, and Cash on Delivery for domestic orders.</p>
          </div>
        </div>
        
        <!-- FAQ Item 6 -->
        <div class="accordion-item">
          <div class="accordion-header">
            <i class="fa-solid fa-circle-question"></i>
            <h3>How long does shipping take?</h3>
            <i class="fa-solid fa-chevron-down toggle-icon"></i>
          </div>
          <div class="accordion-content">
            <p>Domestic shipping typically takes 3-5 business days. International shipping can take 7-14 business days depending on the destination and customs processing.</p>
          </div>
        </div>
  
      </div>
    </div>
  </section>

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
            <a href="https://www.facebook.com/trendsemporium/"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/trendsemporium_/?hl=en"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://www.linkedin.com/in/jass-trends-emporium-97333b2b1/?originalSubdomain=in"><i class="fa-brands fa-linkedin-in"></i></a>
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
    
    // FAQ Accordion
    const accordionItems = document.querySelectorAll('.accordion-item');
    
    accordionItems.forEach(item => {
      const header = item.querySelector('.accordion-header');
      
      header.addEventListener('click', () => {
        item.classList.toggle('active');
        
        // Close other items
        accordionItems.forEach(otherItem => {
          if (otherItem !== item) {
            otherItem.classList.remove('active');
          }
        });
      });
    });
    
    // Simple form validation
    const contactForm = document.getElementById('contact-form');
    
    if (contactForm) {
      contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        let valid = true;
        const name = document.getElementById('name');
        const email = document.getElementById('email');
        const subject = document.getElementById('subject');
        const message = document.getElementById('message');
        
        // Reset errors
        const errorMessages = document.querySelectorAll('.error-message');
        errorMessages.forEach(error => error.textContent = '');
        
        // Validate name
        if (name.value.length < 2) {
          name.nextElementSibling.textContent = 'Name must be at least 2 characters.';
          valid = false;
        }
        
        // Validate email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email.value)) {
          email.nextElementSibling.textContent = 'Please enter a valid email address.';
          valid = false;
        }
        
        // Validate subject
        if (subject.value.length < 5) {
          subject.nextElementSibling.textContent = 'Subject must be at least 5 characters.';
          valid = false;
        }
        
        // Validate message
        if (message.value.length < 10) {
          message.nextElementSibling.textContent = 'Message must be at least 10 characters.';
          valid = false;
        }
        
        // Submit form if valid
        if (valid) {
          // Show success message
          alert('Thank you for your message. We\'ll get back to you soon!');
          contactForm.reset();
        }
      });
    }
  </script>
</body>
</html>