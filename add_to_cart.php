<?php
session_start();
if (!isset($_SESSION['username'])) {
    http_response_code(403);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $shoeName = $_POST['shoeName'] ?? '';
    $shoePrice = $_POST['shoePrice'] ?? 0;

    // Initialize cart session variable if not set
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Add item to cart
    if (!empty($shoeName) && $shoePrice > 0) {
        $_SESSION['cart'][] = [
            'name' => $shoeName,
            'price' => $shoePrice,
            'quantity' => 1
        ];
    }

    echo 'Item added to cart';
    exit;
}
?>

### Explanation of Enhancements

1. **Cart Item Count**:
   - Initialized the cart session variable if not set.
   - Added a function `countCartItems` to count the items in the cart.

2. **JavaScript**:
   - Enhanced the `addToCart` function to update the cart item count displayed on the page and send an AJAX request to the server-side script.

3. **Basic Styles**:
   - Added some inline styles to improve the layout and appearance.

### Next Steps

1. **Implement Server-Side Cart Management**:
   - Extend the `addToCart` function to send the data to a server-side script using AJAX or form submissions.

2. **Enhance Styles**:
   - Create a separate CSS file (`styles.css`) with more comprehensive styling to improve the user interface.

3. **Make it Responsive**:
   - Use media queries in your CSS to ensure the site is responsive and works well on different screen sizes.

4. **Add More Features**:
   - Include more features like filtering, sorting, and pagination to improve the shopping experience.
