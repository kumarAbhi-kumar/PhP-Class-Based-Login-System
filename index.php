<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MoneyMan | Login</title>
    <link rel="stylesheet" href="CSS/loginStyle.css" />
  </head>
  <body>

<div class="container" id="container">
      <div class="form-container sign-up-container">
        <form method="POST" action="includes/signup.inc.php">
          <h1>Create Account</h1>
          <br>
          <input name="newUserName" type="text" placeholder="Name" />
          <input name="newUserId" type="text" placeholder="Registration Number" />
          <input name="newUserEmail" type="email" placeholder="Email" />
          <input name="newUserPsd" type="password" placeholder="Password" />
          <input name="newUserRPsd" type="password" placeholder="Repeat Password" />
          <button name = 'signUp' type="submit">Sign Up</button>
        </form>
      </div>
      <div class="form-container sign-in-container">
        <form method="POST" action="includes/login.inc.php">
          <h1>Login</h1>
          <input type="text" name="uid" placeholder="Email / Registration Number" />
          <input type="password" name="psd" placeholder="Password" />
          <!-- <a href="#">Forgot your password?</a> -->
          <button name = 'login' type="submit">Sign In</button>
        </form>
      </div>
      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel overlay-left">
            <h1>Welcome Back!</h1>
            <p>
              To keep connected with us please login with your personal info
            </p>
            <button class="ghost" id="signIn">Sign In</button>
          </div>
          <div class="overlay-panel overlay-right">
            <h1>Hello, Friend!</h1>
            <p>Enter your personal details and start journey with us</p>
            <button class="ghost" id="signUp">Sign Up</button>
          </div>
        </div>
      </div>
    </div>

    <footer>
      <p>
        All rights reserved &copy; Kumar & Shubham Studios | 2023
      </p>
    </footer>

    <script>
      const signUpButton = document.getElementById("signUp");
      const signInButton = document.getElementById("signIn");
      const container = document.getElementById("container");

      signUpButton.addEventListener("click", () => {
        container.classList.add("right-panel-active");
      });

      signInButton.addEventListener("click", () => {
        container.classList.remove("right-panel-active");
      });
    </script>
  </body>
</html>

