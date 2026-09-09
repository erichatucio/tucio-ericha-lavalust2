<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | LavaLust Products</title>
    <link rel="stylesheet" href="/styles.css">
</head>
<body>
    <div class="app-shell login-card">
        <h1>Login</h1>

        <?php if (!empty($error)) : ?>
            <p class="flash-error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <form class="login-form" method="post" action="/authenticate">
            <label>Email or Username</label>
            <input type="text" name="username" value="tucioericha@gmail.com" required>

            <label>Password</label>
            <input type="password" name="password" value="12345go" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
