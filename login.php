<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <style>
    .error {
      color: #FF0000;
    }

    body {
      font-family: 'Arial';
      background: linear-gradient(to right, #fff8e1, #ffe0b2);
      padding: 20px;
    }

    form {
      background-color: white;
      padding: 25px;
      border-radius: 10px;
      max-width: 400px;
      margin: auto;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 6px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      background-color: orange;
      color: black;
      padding: 12px 20px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      width: 100%;
      font-size: 16px;
    }

    input[type="submit"]:hover {
      background-color: darkorange;
    }

    p {
      font-size: 0.95em;
      text-align: center;
    }

    .signup-link {
      display: block;
      text-align: center;
      margin-top: 20px;
    }

    .signup-link a {
      display: inline-block;
      padding: 10px 20px;
      color: black;
      text-decoration: none;
      border-radius: 6px;
      font-size: 16px;
      background-color: #ddd;
    }

    .signup-link a:hover {
      background-color: #ccc;
    }
  </style>
</head>

<body>

  <form id="Validation_form" action="login1.php" onsubmit="return validationform()" method="POST">
    <h2>Login</h2>

    Username:
    <input type="text" name="username" id="username" autocomplete="username" required>

    Password:
    <input type="password" name="password" id="password" autocomplete="current-password" required>

    <input type="submit" name="Login" value="Login">

    <p>Don't have an account? <a href="signup.php">Signup</a></p>
  </form>

  <script>
    function validationform() {
      const username = document.getElementById("username").value.trim();
      const password = document.getElementById("password").value.trim();
      let error = "";

      if (!username) {
        error += "Username is required.\n";
      }

      if (!password) {
        error += "Password is required.\n";
      }

      if (error) {
        alert(error);
        return false;
      }

      return true;
    }
  </script>

</body>
</html>
