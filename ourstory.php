<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Our Glow Up Story</title>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    background:linear-gradient(180deg,#eef6f0,#ffffff);
    color:#1f2d1f;
    font-family:'Inter', sans-serif;
}

/* ================= HEADER ================= */
header{
    background:linear-gradient(135deg,#e1f0e6,#ffffff);
    padding:70px 20px 110px;
    text-align:center;
    box-shadow:0 20px 40px rgba(47,93,50,0.15);
    border-bottom-left-radius:120px;
    border-bottom-right-radius:120px;
}

header h1{
    font-family:'Playfair Display', serif;
    font-size:52px;
    color:#2f5d32;
    margin-bottom:15px;
}

header p{
    max-width:720px;
    margin:auto;
    font-size:17px;
    color:#3b4b3f;
    line-height:1.8;
}

/* ================= PAGE ================= */
.blog-page{
    max-width:1200px;
    margin:auto;
    padding:100px 60px;
}

/* ================= STORY SECTIONS ================= */
.blog-row{
    display:grid;
    grid-template-columns: 1.1fr 0.9fr;
    gap:60px;
    align-items:center;
    margin-bottom:160px;
}

.blog-row.reverse{
    grid-template-columns: 0.9fr 1.1fr;
}

.blog-row > div:first-child{
    background:rgba(255,255,255,0.85);
    backdrop-filter: blur(10px);
    padding:60px;
    border-radius:32px;
    box-shadow:0 30px 60px rgba(47,93,50,0.18);
}

.blog-title{
    font-family:'Playfair Display', serif;
    font-size:44px;
    color:#2f5d32;
    margin-bottom:25px;
}

.blog-title:after{
    content:"";
    width:70px;
    height:3px;
    background:#2f5d32;
    display:block;
    margin-top:14px;
}

.blog-text{
    font-size:16px;
    line-height:1.9;
    color:#3b4b3f;
}

.blog-image{
    height:420px;
    border-radius:32px;
    overflow:hidden;
    box-shadow:0 40px 80px rgba(47,93,50,0.25);
}

.blog-row.reverse .blog-image{
    height:520px;
}

.blog-image img{
    width:100%;
    height:100%;
    object-fit:cover;
    filter:grayscale(40%);
    transition:0.8s;
}

.blog-image:hover img{
    filter:grayscale(0%);
    transform:scale(1.05);
}

/* ================= VALUES ================= */
.values{
    background:rgba(255,255,255,0.85);
    backdrop-filter: blur(10px);
    padding:70px;
    border-radius:32px;
    box-shadow:0 30px 60px rgba(47,93,50,0.18);
}

.values h2{
    text-align:center;
    font-family:'Playfair Display', serif;
    font-size:44px;
    color:#2f5d32;
    margin-bottom:50px;
}

.value-grid{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:32px;
}

.value-card{
    background:#eef6f0;
    padding:40px 30px;
    border-radius:24px;
    text-align:center;
    box-shadow:0 10px 25px rgba(47,93,50,0.12);
    transition:0.5s ease;
}

.value-card:hover{
    transform:translateY(-10px);
    box-shadow:0 25px 50px rgba(47,93,50,0.2);
}

/* ICON */
.value-icon{
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:38px;
    margin-bottom:18px;
}

.value-icon i{
    background:linear-gradient(135deg,#9ad1b3,#2f5d32);
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
    transition:0.5s ease;
}

.value-card:hover .value-icon i{
    transform:scale(1.2);
    filter:drop-shadow(0 0 10px rgba(154,209,179,0.7));
}

.value-card h3{
    font-size:20px;
    color:#2f5d32;
    margin-bottom:10px;
}

.value-card p{
    font-size:14px;
    color:#3b4b3f;
}

/* ================= FOOTER ================= */
footer{
    background:linear-gradient(135deg,#e1f0e6,#ffffff);
    padding: 20px 60px;
    text-align:center;
    box-shadow:0 -20px 40px rgba(47,93,50,0.12);
    border-top-left-radius:120px;
    border-top-right-radius:120px;
}


footer p{
    font-size:14px;
    color:#3b4b3f;
}

/* ================= MOBILE ================= */
@media(max-width:900px){
    .blog-row,.blog-row.reverse{
        grid-template-columns:1fr;
    }
    .blog-image{
        height:280px;
    }
    .value-grid{
        grid-template-columns:repeat(2,1fr);
    }
}

@media(max-width:500px){
    .value-grid{
        grid-template-columns:1fr;
    }
}
</style>
</head>

<body>

<header>
    <h1>Our GLOWING Story</h1>
    <p>Glowing is where clean beauty meets mindful self-care.</P>
    <P>We create simple, skin-loving rituals that help you feel confident and naturally radiant.</p>
</header>

<div class="blog-page">

<!-- Section 1 -->
<div class="blog-row">
  <div>
    <h1 class="blog-title">Where It All Began</h1>
    <div class="blog-text">
      Glowing began with a simple belief — real beauty starts when you treat your skin with care and intention.
In a world filled with harsh products and endless routines, we wanted to create something calmer, cleaner, and more meaningful.
Our journey started with a love for self-care and a desire to make skincare feel less overwhelming and more personal.
Every formula we create is designed to nourish, protect, and restore your skin’s natural balance.
We believe glowing skin is built through small daily rituals, not quick fixes.
That’s why Glowing exists — to help you feel confident, radiant, and beautifully yourself.
    </div>
  </div>
  <div class="blog-image">
    <img src="assets/images/story-1.jpg">
  </div>
</div>

<!-- Section 2 -->
<div class="blog-row reverse">
  <div class="blog-image">
    <img src="assets/images/story-2.jpg">
  </div>
  <div>
    <h1 class="blog-title">The Glow Philosophy</h1>
    <div class="blog-text">
      At Glowing, we believe true radiance is built through consistency, not perfection.
Healthy skin comes from hydration, nourishment, and daily moments of self-care.
We focus on clean formulas that work with your skin, not against it.
Every product is designed to protect your barrier and support long-term glow.
Because when your skin feels balanced, your confidence naturally shines through.
That’s the philosophy behind every Glowing ritual.
    </div>
  </div>
</div>

<!-- Values -->
<div class="values">
<h2>What We Stand For</h2>

<div class="value-grid">
  <div class="value-card">
    <div class="value-icon"><i class="fa-regular fa-heart"></i></div>
    <h3>Self Love</h3>
    <p>Confidence and care at every stage.</p>
  </div>

  <div class="value-card">
    <div class="value-icon"><i class="fa-solid fa-leaf"></i></div>
    <h3>Clean Beauty</h3>
    <p>Formulas that respect skin and nature.</p>
  </div>

  <div class="value-card">
    <div class="value-icon"><i class="fa-regular fa-calendar-check"></i></div>
    <h3>Consistency</h3>
    <p>Daily habits that create glow.</p>
  </div>

  <div class="value-card">
    <div class="value-icon"><i class="fa-solid fa-users"></i></div>
    <h3>Community</h3>
    <p>A supportive wellness family.</p>
  </div>
</div>
</div>
</div>

</div>

<footer>
    <p>© 2026 GLOWING. Designed with care, confidence & clean beauty.</p>
</footer>

</body>
</html>