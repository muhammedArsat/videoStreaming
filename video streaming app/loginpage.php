
<style>
  body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: red;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    background-color:'#814D13';
    background-size: cover;
  }

  .login-container {
    background-color: black;
    padding: 3rem; /* Increased padding */
    max-width: 500px; /* Increased max-width */
    border-radius: 10px;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.2); 
    animation: slide-up 0.5s ease-in-out;
  }

  .login-header {
    text-align: center;
    margin-bottom: 2rem; /* Increased margin */
  }

  .login-title {
    font-size: 2.5rem; /* Increased font size */
    color: white;
  }

  .login-form {
    display: flex;
    flex-direction: column;
    gap: 1.5rem; /* Increased gap */
  }

  .form-group {
    display: flex;
    flex-direction: column;
    gap: 1rem; /* Increased gap */
  }

  .form-label {
    font-size: 1.2rem; /* Increased font size */
    color: white;
  }

  .form-input {
    padding: 0.75rem; /* Increased padding */
    border: 1px solid black;
    border-radius: 8px; /* Increased border radius */
    font-size: 1.2rem; /* Increased font size */
  }

  .form-button {
    background-color: red;
    color: white;
    border: none;
    border-radius: 8px;
    padding: 1rem; /* Increased padding */
    font-size: 1.2rem; /* Increased font size */
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .form-button:hover {
    background-color: #333;
  }


  @media screen and (max-width: 768px) {
    .login-container {
      padding: 2rem;
      max-width: 60%; /* Adjusted for smaller screens */
    }

    .login-title {
      font-size: 2rem;
    }

    .login-header {
      margin-bottom: 1.5rem;
    }
  }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
</head>
<body>
    <div class="login-container">
  <div class="login-header">
    <h1 class="login-title">Sign In</h1>
  </div>
    <form  class="login-form" action="login.php" method="POST">
      <div class="form-group">
        <label class="form-label" for="username">Username:</label>
        <input class="form-input" type="text" id="uname" name="uname" required>

        <label class="form-label" for="password">Password:</label>
        <input  class="form-input" type="password" id="pass" name="pass" required>
        <?php if (isset($_GET['error']) && $_GET['error'] == 1) { ?>
        <p style="color: red; font-size: 10px;">Invalid username or password. Please try again.</p>
      <?php } ?>

        <button class="form-button" type="submit">Sign In</button>
      </div>
    </form>
</body>
</html>
