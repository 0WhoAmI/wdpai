<!DOCTYPE html>

<head>
  <link rel="stylesheet" type="text/css" href="public/css/style.css" />
  <script type="text/javascript" src="./public/js/script.js" defer></script>
  <title>REGISTER PAGE</title>
</head>

<body>
  <div class="container">
    <div class="logo">
      <img src="public/img/logo.svg" />
    </div>
    <div class="login-container">
      <form class="login" action="register" method="POST">
        <div class="welcome-container">
          <h2>
            Welcome!<br /><br />
            Register in to
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
        <span>Confirm password</span>
        <input name="confirmedPassword" type="password" placeholder="Confirm your password" />
        <span>Name</span>
        <input name="name" type="text" placeholder="Enter your name" />
        <span>Surname</span>
        <input name="surname" type="text" placeholder="Enter your surname" />
        <button type="submit">Register</button>
        <p style="color: #ababab">
          Already have an Account?
          <a href="login" style="color: #28874d; font-weight: bold">Login</a>
        </p>
      </form>
    </div>
  </div>
</body>