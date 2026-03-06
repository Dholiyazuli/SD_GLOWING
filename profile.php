<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>My Account</title>

<style>

*{
  margin:0;
  padding:0;
  box-sizing:border-box;
  font-family: "Segoe UI", Arial, sans-serif;
}

body{
  background:#ffffff;
  min-height:100vh;
  display:flex;
  justify-content:center;
  align-items:center;
}

/* main card */
.profile-card{
  width:96%;
  max-width:880px;
  padding:45px 55px 55px 55px;
  background:white;
  border-radius:30px;

  box-shadow:
      0 20px 60px rgba(0,0,0,.06),
      0 0 0 1px rgba(0,0,0,.03);

  display:flex;
  gap:55px;
}

/* left avatar */
.left-block{
  width:40%;
  display:flex;
  justify-content:center;
  align-items:center;
}

.avatar-box{
  width:150px;
  height:150px;
  border-radius:50%;
  background:#f4f8e6;
  border:3px solid #d7e7a9;
  display:flex;
  justify-content:center;
  align-items:center;
  font-size:50px;
  font-weight:900;
  color:#000;
}

/* right content */
.right-block{
  width:60%;
}

/* name text */
.username{
  font-size:24px;
  font-weight:900;
  color:#000;
}

/* email */
.useremail{
  font-size:14px;
  color:#6d6d6d;
  margin-top:4px;
  margin-bottom:20px;
}

/* heading */
.section-title{
  font-size:17px;
  font-weight:900;
  color:#000;
  margin-bottom:5px;
}

/* address text */
.address{
  font-size:14px;
  margin-bottom:12px;
}

/* subtle link */
.address-link{
  font-size:13px;
  color:#6f6f6f;
}

/* lime logout button */
.logout-btn{
  margin-top:30px;
  display:inline-block;
  padding:13px 45px;
  border-radius:40px;

  background:#cbdc7b;        /* <<< same color as Create Account button */
  color:#000;
  font-weight:800;
  text-decoration:none;
}

.logout-btn:hover{
  filter:brightness(0.92);
}

/* responsive */
@media(max-width:860px){

  .profile-card{
    flex-direction:column;
    text-align:center;
  }

  .left-block,
  .right-block{
    width:100%;
  }
}
</style>
</head>

<body>

<?php if(!isset($_SESSION['user_id'])) { ?>

  <div class="profile-card" style="justify-content:center;">
      <div class="right-block" style="text-align:center;">
          <h2>You are not logged in</h2>
          <a href="login.php">Login</a> |
          <a href="account.php">Create Account</a>
      </div>
  </div>

<?php } else { ?>

<div class="profile-card">

  <!-- Left avatar -->
  <div class="left-block">
      <div class="avatar-box">
        <?= strtoupper(substr($_SESSION['username'],0,1)); ?>
      </div>
  </div>

  <!-- Right content -->
  <div class="right-block">

      <div class="username"><?= $_SESSION['username']; ?></div>

      <div class="useremail"><?= $_SESSION['email']; ?></div>

      <div class="section-title">Default address</div>

      <div class="address">
        <?= $_SESSION['username']; ?><br>
        India
      </div>

      <div class="address-link">View addresses (1)</div>

      <a href="logout.php" class="logout-btn">Logout</a>

  </div>

</div>

<?php } ?>

</body>
</html>
