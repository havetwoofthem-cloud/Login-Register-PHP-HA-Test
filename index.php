<?php

session_start();

$errors = [
  'login' => $_SESSION['login_error'] ?? '',
  'register' => $_SESSION['register_error'] ?? ''
];
$activeFOrm = $_SESSION['active_form'] ?? 'login';
$activeForm = isset($_GET['form']) ? $_GET['form'] : 'register';

session_unset();

function showError($error) {
  return !empty($error) ? "<p class='error-message'>$error</p>" : '';
}

function isActiveForm($formName, $activeForm) {
  return $formName === $activeForm ? 'active' : '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Horizon Academy | Account</title>
  <link rel="stylesheet" href="styles.css">
  <link href='https://unpkg.com' rel='stylesheet'>
</head>

<body>

  <div id="login-form" class="login-wrapper <?= isActiveForm('login', $activeForm); ?>">
    <form action="horizonacademy_account.php" method="post">

      <h1>Login</h1>
      <?= showError($error['login']); ?>
      <div class="login-input-box">
        <input type="text" placeholder="Username" required>
        <i class="bx bxs-user"></i>
      </div>

      <div class="login-input-box">
        <input type="password" placeholder="Password" required>
        <i class="bx bxs-lock-alt"></i>
      </div>

      <div class="login-remember-forgot">
        <label><input type="checkbox">Remember Me?</label>
        <a href="#">Forgot Password?</a>
      </div>

      <button type="submit" class="login-btn">Login</button>
      <div class="login-register-link">

        <p>Don't have an account? <a href="#" onclick="showForm('register-form')">Register</a></p>
      </div>

    </form>

  </div>
  <div id="register-form" class="register-wrapper <?= isActiveForm('register', $activeForm); ?>">
    <form action="horizonacademy_account.php" method="post">

      <h1>Register</h1>
      <?= showError($error['register']); ?>
      <div class="login-input-box">
        <input type="text" placeholder="Your Name" required>
        <i class="bx bxs-user"></i>
      </div>

      <div class="login-input-box">
        <input type="email" placeholder="Email" required>
        <i class="bx bxs-envelope"></i>
      </div>

      <div class="login-input-box">
        <input type="password" placeholder="Password" required>
        <i class="bx bxs-lock-alt"></i>
      </div>

      <div class="login-input-box">

        <select name="role" required>
          <option value="">--Registration Role--</option>
          <option value="student">Student</option>
          <option value="educator">Educator</option>
          <option value="administrator">Administrator</option>
        </select>

        <i class="bx bx-chevron-down"></i>
      </div>

      <button type="submit" class="login-btn">Register</button>
      <div class="login-register-link">
        <p>Already have an account? <a href="#" onclick="showForm('login-form')">Login&excl;</a></p>
      </div>
    </form>
  </div>

  <script src="script.js"></script>

</body>
</html>
