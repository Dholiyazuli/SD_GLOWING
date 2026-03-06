<?php
session_start();

// If already logged in → go to profile
if(isset($_SESSION['user_id'])){
    header("Location: profile.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = new mysqli("localhost", "root", "", "glowing");

    if ($conn->connect_error) {
        die("DB connection failed");
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, `full name`, email, password FROM users WHERE email=?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt->store_result();

    if($stmt->num_rows>0){

        $stmt->bind_result($uid,$fullname,$dbemail,$dbpass);
        $stmt->fetch();

        if($password==$dbpass){

            $_SESSION['user_id']=$uid;
            $_SESSION['username']=$fullname;
            $_SESSION['email']=$dbemail;

            header("Location:index.php");
            exit();
        } 
        else {
            $error="Wrong password";
        }

    } 
    else {
        $error="Email not found";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Glowing – Login</title>

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
  width: 180px;
  margin-bottom: 5px;
}

/* title */
.title{
  font-size: 26px;
  font-weight: 900;
  color:#c6d56c;
  margin: 10px 0 25px 0;
  letter-spacing: 1px;
}

/* text fields */
input{
  width:100%;
  padding:16px;
  margin-top:18px;
  border-radius:40px;
  border:2px solid #000;
  outline:none;
  font-size:15px;
}

/* password wrapper */
.password-field{
  position: relative;
  width: 100%;
  display:flex;
  align-items:center;
}

/* icon */
.password-field .eye{
  position:absolute;
  right:18px;
  width:26px;
  height:26px;
  cursor:pointer;
  top:50%;
  transform:translateY(-35%);
}

/* submit button */
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

/* bottom link */
.signup-text{
  margin-top:14px;
  font-size:14px;
}

.signup-text a{
  text-decoration:none;
  font-weight:700;
  color:#7e8a17;
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

  .password-field .eye{
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

  <h2 class="title">LOGIN</h2>

  <?php 
  if(isset($error)) echo "<p style='color:red;'>$error</p>"; 
  ?>

  <form method="POST">

    <!-- email -->
    <input type="email" name="email" placeholder="enter email" required>

    <!-- password -->
    <div class="password-field">
      <input type="password" id="loginpass" name="password" placeholder="enter password" required>
      <img src="assets/images/open-eye.png" class="eye" onclick="toggle('loginpass', this)">
    </div>

    <button type="submit">login</button>

    <p class="signup-text">
        don’t have an account?
        <a href="account.php">Create account</a>
    </p>

  </form>

</div>

<script>
function toggle(id, el){

  let input = document.getElementById(id);

  if(input.type === "password"){
      input.type = "text";
      el.src = "assets/images/close-eye.png";
  } 
  else {
      input.type = "password";
      el.src = "assets/images/open-eye.png";
  }
}
</script>

</body>
</html>