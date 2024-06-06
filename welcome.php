<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit;
}

// Initialize cart session variable if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Function to count items in the cart
function countCartItems() {
    return array_sum(array_column($_SESSION['cart'], 'quantity'));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoe Store</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .cart {
            margin-bottom: 20px;
        }
        .shoe {
            margin-bottom: 20px;
        }
        .shoe img {
            max-width: 100%;
            height: auto;
        }
        .shoe h3, .shoe p {
            margin: 10px 0;
        }
        button {
            cursor: pointer;
        }
    </style>
    <script>
        function addToCart(shoeName, shoePrice) {
            // Send AJAX request to add item to cart
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "add_to_cart.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert(shoeName + " has been added to your cart for $" + shoePrice);
                    // Update cart item count
                    var cartItemCount = document.getElementById('cartItemCount');
                    cartItemCount.textContent = parseInt(cartItemCount.textContent) + 1;
                }
            };
            xhr.send("shoeName=" + encodeURIComponent(shoeName) + "&shoePrice=" + encodeURIComponent(shoePrice));
        }
    </script>
</head>
<body>
    <h2>Welcome to the Shoe Store, <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
    <p><a href="logout.php">Logout</a></p>

    <div class="cart">
        <p>Cart Items: <span id="cartItemCount"><?php echo countCartItems(); ?></span></p>
    </div>

    <div class="shoe">
        <h3>Soccer Shoe</h3>
        <img src="download.jpg" alt="Soccer Shoe">
        <p>Price: $70</p>
        <button onclick="addToCart('Soccer Shoe', 70)">Add to Cart</button>
    </div>

    <div class="shoe">
        <h3>Basketball Shoe</h3>
        <img src="FZ2202_png.png" alt="Basketball Shoe" height="200px">
        <p>Price: $100</p>
        <button onclick="addToCart('Basketball Shoe', 100)">Add to Cart</button>
    </div>

    <div class="shoe">
        <h3>Running Shoe</h3>
        <img src="png-transparent-n" alt="Running Shoe" height="200px">
        <p>Price: $50</p>
        <button onclick="addToCart('Running Shoe', 50)">Add to Cart</button>
    </div>
</body>
</html>

C:\xampp\htdocs\your_project_directory\welcome.php