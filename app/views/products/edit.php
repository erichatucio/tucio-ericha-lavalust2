<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <link rel="stylesheet" href="/styles.css">
</head>
<body>
    <div class="app-shell product-card">
        <h1>Edit Product</h1>
        <form class="login-form" method="post" action="/products/update/<?php echo (int) $product['id']; ?>">
            <label>Product Name</label>
            <input type="text" name="product_name" value="<?php echo htmlspecialchars($product['product_name']); ?>" required>

            <label>Description</label>
            <textarea name="description" required><?php echo htmlspecialchars($product['description']); ?></textarea>

            <label>Price</label>
            <input type="number" step="0.01" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" required>

            <label>Quantity</label>
            <input type="number" name="quantity" value="<?php echo htmlspecialchars($product['quantity']); ?>" required>

            <button type="submit">Update Product</button>
            <a class="btn" href="/products">Back</a>
        </form>
    </div>
</body>
</html>
