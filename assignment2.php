<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
            color: #333;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
        .success {
            color: green;
            margin-top: 10px;
            font-weight: bold;
        }
        .form-group {
            margin-bottom: 15px;
        }
        h1 {
            color: #444;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 1em;
            border-radius: 5px;
        }
        button:hover {
            background-color: #45a049;
        }
        input {
            padding: 8px;
            font-size: 1em;
            width: 100%;
            box-sizing: border-box;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <?php
    $errors = [];
    $successMessage = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Trim input and fetch POST data
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');

        // Validate Name
        if (!$name) {
            $errors['name'] = "Please enter your name.";
        }

        // Validate Email
        if (!$email) {
            $errors['email'] = "We need your email address.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Oops! That doesn't look like a valid email.";
        }

        // Validate Password
        if (!$password) {
            $errors['password'] = "Don't forget to add a password.";
        } elseif (strlen($password) < 6) {
            $errors['password'] = "Your password should have at least 6 characters.";
        }

        // Show success message if no errors
        if (empty($errors)) {
            $successMessage = "Hooray! Your form was submitted successfully.";
        }
    }
    ?>

    <h1>Welcome Back! Please Login</h1>
    <form method="POST" action="">
        <div class="form-group">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" placeholder="Enter your name" value="<?php echo htmlspecialchars($name ?? ''); ?>">
            <div class="error"> <?php echo $errors['name'] ?? ''; ?> </div>
        </div>

        <div class="form-group">
            <label for="email">Email:</label><br>
            <input type="text" id="email" name="email" placeholder="Enter your email" value="<?php echo htmlspecialchars($email ?? ''); ?>">
            <div class="error"> <?php echo $errors['email'] ?? ''; ?> </div>
        </div>

        <div class="form-group">
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" placeholder="Enter your password">
            <div class="error"> <?php echo $errors['password'] ?? ''; ?> </div>
        </div>

        <button type="submit">Login</button>
    </form>

    <?php if ($successMessage): ?>
        <div class="success">
            <?php echo $successMessage; ?>
        </div>
    <?php endif; ?>
</body>
</html>
