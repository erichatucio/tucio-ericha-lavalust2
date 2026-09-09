<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Product</title>
    <link rel="stylesheet" href="/styles.css">
</head>
<body>
    <div class="app-shell product-card">
        <h1>Create Product</h1>
        <form class="login-form" method="post" action="/products/store">
            <label>Product Name</label>
            <input type="text" name="product_name" required>

            <label>Description</label>
            <textarea name="description" required></textarea>

            <label>Price</label>
            <input type="number" step="0.01" name="price" required>

            <label>Quantity</label>
            <input type="number" name="quantity" required>

            <button type="submit">Save Product</button>
            <a class="btn" href="/products">Back</a>
        </form>
    </div>
</body>
</html>
