<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products | LavaLust</title>
    <link rel="stylesheet" href="/styles.css">
</head>
<body>
    <div class="app-shell product-card">
        <h1>Products</h1>

        <?php if (!empty($success)) : ?><p class="flash-success"><?= htmlspecialchars($success) ?></p><?php endif; ?>
        <?php if (!empty($error)) : ?><p class="flash-error"><?= htmlspecialchars($error) ?></p><?php endif; ?>

        <div class="product-actions nav-links">
            <a class="btn" href="/products/create">Add Product</a>
            <a class="btn" href="/logout">Logout</a>
        </div>

        <table class="product-table">
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>

            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?= (int) $product['id']; ?></td>
                    <td><?= htmlspecialchars($product['product_name']); ?></td>
                    <td><?= htmlspecialchars($product['description']); ?></td>
                    <td><?= htmlspecialchars($product['price']); ?></td>
                    <td><?= (int) $product['quantity']; ?></td>
                    <td><?= htmlspecialchars($product['created_at']); ?></td>
                    <td class="table-actions">
                        <a href="/products/edit/<?= (int) $product['id']; ?>">Edit</a> |
                        <a href="/products/delete/<?= (int) $product['id']; ?>" onclick="return confirm('Delete this product?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
