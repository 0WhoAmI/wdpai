<!DOCTYPE html>

<head>
  <link rel="stylesheet" type="text/css" href="public/css/style.css" />
  <title>LOGIN PAGE</title>
</head>

<body>
  <div class="container">
    <div class="logo">
      <img src="public/img/logo.svg" />
    </div>
    <div class="login-container">
      <form class="login" action="login" method="POST">
        <div class="welcome-container">
          <h2>
            Welcome!<br /><br />
            Sign in to
          </h2>
          <h4>Lostfriends</h4>
        </div>

        <a style="color: red;">
          <?php
          if (isset($messages)) {
            foreach ($messages as $message) {
              echo $message;
            }
          }
          ?>
        </a>

        <span>Email</span>
        <input name="email" type="text" placeholder="Enter your email" />
        <span>Password</span>
        <input name="password" type="password" placeholder="Enter your password" />
        <button type="submit">LOGIN</button>
        <p style="color: #ababab">
          Don't have an Account?
          <a href="register" style="color: #28874d; font-weight: bold">Register</a>
        </p>
      </form>
    </div>
  </div>
</body>