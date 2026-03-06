<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Skin Type Test</title>

<!-- Urbanist Font -->
<link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    box-sizing:border-box;
}

body{
    margin:0;
    padding:0;
    font-family:'Urbanist', sans-serif;
    background:linear-gradient(135deg,#e9f9ef,#f4fff8);
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

/* MAIN CARD */
.container{
    width:70%;
    max-width:950px;
    background:white;
    border-radius:28px;
    padding:40px;
    box-shadow:0 30px 80px rgba(13,157,74,0.15);
    animation:popup 0.8s ease;
}

/* HEADING */
h2{
    text-align:center;
    color:#0d9d4a;
    font-size:34px;
    font-weight:700;
}

/* underline */
.line{
    width:150px;
    height:4px;
    background:linear-gradient(90deg,#0d9d4a,#3ed87f);
    border-radius:10px;
    margin:14px auto 35px;
}

/* QUESTIONS */
.question{
    background:#f5fff8;
    padding:20px 24px;
    border-radius:18px;
    margin-bottom:22px;
    border:1px solid #d9f5e4;
    transition:0.4s;
}

.question:hover{
    transform:translateY(-3px);
    box-shadow:0 15px 40px rgba(13,157,74,0.08);
}

.question b{
    display:block;
    margin-bottom:15px;
    font-size:18px;
    color:#1b3b2b;
}

/* radio buttons */
.question label{
    display:flex;
    align-items:center;
    gap:12px;
    padding:12px 16px;
    margin-bottom:10px;
    border-radius:12px;
    background:white;
    cursor:pointer;
    transition:0.3s;
    border:1px solid #e2f3ea;
}

.question label:hover{
    background:#e9f9ef;
}

.question input{
    accent-color:#0d9d4a;
    transform:scale(1.3);
}

button{
    margin:35px auto 0;
    display:block;
    padding:14px 48px;
    font-size:17px;
    font-weight:600;
    letter-spacing:0.4px;
    font-family:'Urbanist', sans-serif;
    color:#0b6b3a;
    background:#ffffff;
    border:2.5px solid #0b6b3a;
    border-radius:40px;
    cursor:pointer;
    transition:0.35s ease;
    box-shadow:0 10px 25px rgba(11,107,58,0.18);
}

/* Hover = shine */
button:hover{
    background:linear-gradient(135deg,#0b6b3a,#0f8a4d);
    color:white;
    box-shadow:0 18px 45px rgba(11,107,58,0.45);
    transform:translateY(-2px);
}

/* click */
button:active{
    transform:scale(0.97);
}


/* RESULT */
#resultBox{
    margin-top:35px;
    padding:28px 32px;
    border-radius:22px;
    background:linear-gradient(135deg,#e9fff1,#f6fffa);
    border:1px solid #9de9be;
    box-shadow:0 20px 50px rgba(13,157,74,0.15);
    animation:slide 0.6s ease;
}

#resultBox h3{
    margin-top:0;
    font-size:26px;
    color:#0d9d4a;
}

#resultBox p{
    font-size:16px;
    line-height:1.7;
    color:#245c3f;
}

/* Animations */
@keyframes popup{
    from{opacity:0; transform:scale(0.9);}
    to{opacity:1; transform:scale(1);}
}

@keyframes slide{
    from{opacity:0; transform:translateY(20px);}
    to{opacity:1; transform:translateY(0);}
}

/* Mobile */
@media(max-width:768px){
    .container{
        width:94%;
        padding:25px;
    }

    h2{
        font-size:26px;
    }

    .question b{
        font-size:16px;
    }
}

/* Tablet */
@media(min-width:769px) and (max-width:1024px){
    .container{
        width:85%;
    }
}

</style>
</head>

<body>

<div class="container">

<h2>🌿 Know Your Skin Type</h2>
<div class="line"></div>

<form method="post">

<div class="question">
<b>1) After 2–3 hours, your face becomes:</b>
<label><input type="radio" name="q1" value="oily" required> Very oily</label>
<label><input type="radio" name="q1" value="dry"> Tight and dry</label>
<label><input type="radio" name="q1" value="combo"> Oily T-zone only</label>
<label><input type="radio" name="q1" value="sensitive"> Red / irritated</label>
</div>

<div class="question">
<b>2) Your pores are:</b>
<label><input type="radio" name="q2" value="oily" required> Large & visible</label>
<label><input type="radio" name="q2" value="dry"> Very small</label>
<label><input type="radio" name="q2" value="combo"> Large on nose only</label>
<label><input type="radio" name="q2" value="sensitive"> Easily inflamed</label>
</div>

<div class="question">
<b>3) After face wash your skin feels:</b>
<label><input type="radio" name="q3" value="dry" required> Tight & flaky</label>
<label><input type="radio" name="q3" value="oily"> Quickly oily again</label>
<label><input type="radio" name="q3" value="combo"> Oily only in some areas</label>
<label><input type="radio" name="q3" value="sensitive"> Burning or itching</label>
</div>

<div class="question">
<b>4) You mostly face:</b>
<label><input type="radio" name="q4" value="oily" required> Acne / pimples</label>
<label><input type="radio" name="q4" value="dry"> Dullness</label>
<label><input type="radio" name="q4" value="combo"> Both oily & dry patches</label>
<label><input type="radio" name="q4" value="sensitive"> Rashes or redness</label>
</div>

<button type="submit" name="check">💚 Show My Skin Type</button>

</form>

<?php
if(isset($_POST['check'])){
    $scores = ["oily"=>0,"dry"=>0,"combo"=>0,"sensitive"=>0];

    $scores[$_POST['q1']]++;
    $scores[$_POST['q2']]++;
    $scores[$_POST['q3']]++;
    $scores[$_POST['q4']]++;

    $result = array_search(max($scores), $scores);

    echo "<div id='resultBox'>";

    if($result=="oily"){
        echo "<h3>Oily Skin 🌿</h3><p>Use gel moisturizers, salicylic acid cleansers and clay masks. Avoid heavy creams.</p>";
    }
    elseif($result=="dry"){
        echo "<h3>Dry Skin 🌿</h3><p>Use hydrating cleanser, hyaluronic acid serum and rich moisturizers.</p>";
    }
    elseif($result=="combo"){
        echo "<h3>Combination Skin 🌿</h3><p>Use lightweight moisturizer, clay mask on T-zone, hydrate dry cheeks.</p>";
    }
    else{
        echo "<h3>Sensitive Skin 🌿</h3><p>Use fragrance-free gentle products. Avoid harsh scrubs and strong acids.</p>";
    }

    echo "</div>";

    echo "<script>
        document.getElementById('resultBox').scrollIntoView({
            behavior: 'smooth',
            block: 'center'
        });
    </script>";
}
?>

</div>
</body>
</html>
