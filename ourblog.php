<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Glow Up Blog</title>

<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600&family=Inter:wght@300;400;500&display=swap');

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
    padding:80px 20px;
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


/* ================= PAGE WRAPPER ================= */
.blog-page{
    max-width:1200px;
    margin:auto;
    padding:100px 60px;
}

/* ================= SECTION LAYOUT ================= */
.blog-row{
    display:grid;
    grid-template-columns: 1.1fr 0.9fr;
    gap:60px;
    align-items:center;
    margin-bottom:160px;
    position:relative;
}

/* Divider */
.blog-row:after{
    content:"";
    position:absolute;
    bottom:-80px;
    left:0;
    width:100%;
    height:1px;
    background:linear-gradient(90deg,transparent,#b7d3bf,transparent);
}

.blog-row.reverse{
    grid-template-columns: 0.9fr 1.1fr;
}

/* ================= TEXT CARD ================= */
.blog-row > div:first-child{
    background:rgba(255,255,255,0.85);
    backdrop-filter: blur(10px);
    padding:60px;
    border-radius:32px;
    box-shadow:
        0 30px 60px rgba(47,93,50,0.18),
        0 10px 25px rgba(47,93,50,0.12);
}

/* ================= TITLES ================= */
.blog-title{
    font-family:'Playfair Display', serif;
    font-size:44px;
    line-height:1.2;
    color:#2f5d32;
    margin-bottom:30px;
}

.blog-title:after{
    content:"";
    width:70px;
    height:3px;
    background:#2f5d32;
    display:block;
    margin-top:16px;
}

/* ================= TEXT ================= */
.blog-text,
.blog-bottom{
    font-size:16px;
    line-height:1.9;
    color:#3b4b3f;
}

/* ================= IMAGE ================= */
.blog-image{
    height:440px;
    border-radius:32px;
    overflow:hidden;
    position:relative;
    box-shadow:
        0 40px 80px rgba(47,93,50,0.25),
        0 15px 40px rgba(47,93,50,0.18);
}

.blog-row.reverse .blog-image{
    height:580px;
}

.blog-image:after{
    content:"";
    position:absolute;
    inset:0;
    background:linear-gradient(
        180deg,
        rgba(47,93,50,0.35),
        transparent
    );
    opacity:0.6;
}

.blog-image img{
    width:100%;
    height:100%;
    object-fit:cover;
    filter:grayscale(40%);
    transform:scale(1.06);
    transition:0.9s ease;
}

.blog-image:hover img{
    filter:grayscale(0%);
    transform:scale(1);
}

/* Hover lift */
.blog-row:hover{
    transform:translateY(-6px);
    transition:0.6s ease;
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
    header h1{
        font-size:38px;
    }

    .blog-page{
        padding:80px 30px;
    }

    .blog-row,
    .blog-row.reverse{
        grid-template-columns:1fr;
    }

    .blog-image,
    .blog-row.reverse .blog-image{
        height:300px;
    }

    .blog-row > div:first-child{
        padding:40px;
    }
}
</style>
</head>

<body>

<!-- HEADER -->
<header>
    <h1>GLOWING Journal</h1>
    <p>Where clean beauty meets mindful self-care. Discover thoughtful skincare, simple rituals, and everyday habits designed to keep your skin healthy, balanced, and naturally radiant.</p>
</header>

<!-- MAIN CONTENT -->
<div class="blog-page">

<!-- Section 1 -->
<div class="blog-row">
    <div>
        <h1 class="blog-title">New Skincare Trends You Need to Know in 2026</h1>

        <div class="blog-text">
            The beauty world is changing faster than ever, and 2026 is all about smart, skin-first skincare. Instead of heavy makeup and complicated routines, people are now choosing clean formulas, fewer steps, and products that truly care for their skin.<br><br>

            At Glowing, we believe that skincare should be simple, effective, and kind to your skin. That’s why modern trends focus on hydration, barrier repair, and natural glow instead of harsh treatments.<br><br>

            Skin minimalism saves time, reduces irritation, and improves long-term results — giving you healthier, happier skin.
        </div>
    </div>

    <div class="blog-image">
        <img src="assets/images/blog-4.jpg" alt="Skincare Trends">
    </div>
</div>

<!-- Section 2 -->
<div class="blog-row reverse">
    <div class="blog-image">
        <img src="assets/images/blog-5.jpg" alt="Skincare Rituals">
    </div>

    <div>
        <h1 class="blog-title">Best Skincare Rituals for Every Lifestyle</h1>

        <div class="blog-text">
            Your skincare routine should fit your lifestyle, not the other way around. Whether you work indoors, outdoors, or from home, your skin needs balanced care.<br><br>

            Lightweight cleansers, antioxidants, sunscreen, and nourishing serums help your skin stay protected and radiant.
        </div>

        <div class="blog-bottom">
            Glowing formulas adapt to your daily routine, supporting long-term skin health — not quick fixes. Your glow should last beyond the mirror.
        </div>
    </div>
</div>

</div>

<!-- FOOTER -->
<footer>
    <p>© 2026 GLOWING. Designed with care, confidence & clean beauty.</p>
</footer>

</body>
</html>