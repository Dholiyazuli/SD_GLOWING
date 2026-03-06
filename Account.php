<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = new mysqli("localhost", "root", "", "glowing");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    if ($password !== $confirm) {
        $error = "Passwords do not match";
    } else {

        $stmt = $conn->prepare("INSERT INTO users (`full name`, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $fullname, $email, $password);

        if ($stmt->execute()) {
            header("Location: login.php");
            exit();
        } else {
            $error = "Email already exists";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Glowing – Create Account</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>

*{
  margin:0;
  padding:0;
  box-sizing:border-box;
  font-family:Arial, Helvetica, sans-serif;
}

body{
  background:#ffffff;
  display:flex;
  justify-content:center;
  align-items:center;
  min-height:100vh;
}

/* MAIN CARD */
.wrapper{
  width: 95%;
  max-width: 520px;
  padding:45px 30px 48px 30px;
  border-radius:22px;
  text-align:center;
  box-shadow:0 0 40px rgba(0,0,0,0.10);
}

/* logo */
.logo img{
  width:180px;
  margin-bottom:5px;
}

/* heading */
.title{
  font-size: 26px;
  font-weight: 900;
  color:#c6d56c;
  letter-spacing:1px;
  margin-bottom:25px;
}

/* INPUTS */
input{
  width:100%;
  padding:16px;
  margin-top:18px;
  border-radius:40px;
  border:2px solid #000;
  font-size:15px;
  outline:none;
}

/* PASSWORD FIELD */
.password-field{
  width:100%;
  position:relative;
  display:flex;
  align-items:center;
}

/* EYE ICON */
.eye{
  position:absolute;
  right:18px;
  width:26px;
  height:26px;
  cursor:pointer;

  top:50%;
  transform:translateY(-35%);
}

/* BUTTON */
button{
  width:100%;
  padding:15px;
  margin-top:25px;
  border-radius:40px;
  border:none;
  background:#cbdc7b;
  font-weight:bold;
  font-size:16px;
  cursor:pointer;
}

/* FOOTER TEXT */
.login-text{
  margin-top:14px;
  font-size:14px;
}

.login-text a{
  color:#7e8a17;
  text-decoration:none;
  font-weight:700;
}

/* ---------------------- */
/* RESPONSIVE STYLES      */
/* ---------------------- */

/* Tablets */
@media (max-width: 991px){
  .wrapper{
    max-width: 480px;
    padding:35px 25px;
  }

  .logo img{
    width:160px;
  }

  input{
    font-size:14px;
    padding:14px;
  }

  button{
    font-size:15px;
  }
}

/* Phones */
@media (max-width: 576px){
  body{
    padding:20px;
  }

  .wrapper{
    max-width:100%;
    padding:30px 20px;
    border-radius:18px;
  }

  .logo img{
    width:150px;
  }

  .title{
    font-size:22px;
  }

  input{
    padding:12px;
    font-size:13px;
  }

  .eye{
    width:22px;
    right:14px;
  }

  button{
    padding:12px;
    font-size:14px;
  }
}
</style>
</head>

<body>

<div class="wrapper">

  <div class="logo">
    <img src="assets/images/logo.png">
  </div>

  <h2 class="title">CREATE ACCOUNT</h2>

  <?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>

  <form method="POST">

    <input type="text" name="fullname" placeholder="Full name" required>

    <input type="email" name="email" placeholder="Email" required>

    <div class="password-field">
      <input type="password" id="p1" name="password" placeholder="Password" required>
      <img src="assets/images/open-eye.png" class="eye" onclick="toggle('p1', this)">
    </div>

    <div class="password-field">
      <input type="password" id="p2" name="confirm_password" placeholder="Confirm password" required>
      <img src="assets/images/open-eye.png" class="eye" onclick="toggle('p2', this)">
    </div>

    <button type="submit">Create Account</button>

    <p class="login-text">
      Already have account?
      <a href="login.php">Login</a>
    </p>

  </form>

</div>

<script>
function toggle(id, el){

  let input = document.getElementById(id);

  if(input.type === "password"){
      input.type = "text";
      el.src = "assets/images/close-eye.png";
  } else {
      input.type = "password";
      el.src = "assets/images/open-eye.png";
  }
}
</script>

</body>
</html>
