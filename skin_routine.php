<?php
$routine = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $skin = $_POST["skin_type"];

    if($skin == "oily"){
        $routine = "
        <h3>🟢 Oily Skin Routine</h3>
        <b>Morning:</b><br>
        ✔ Foaming face wash with Salicylic Acid<br>
        ✔ Oil-free toner<br>
        ✔ Lightweight gel moisturizer<br>
        ✔ Matte sunscreen SPF 50<br><br>

        <b>Night:</b><br>
        ✔ Cleanser for oily skin<br>
        ✔ Niacinamide serum (oil-control)<br>
        ✔ Water-based moisturizer<br>
        ✔ Clay mask twice a week
        ";
    }
    elseif($skin == "dry"){
        $routine = "
        <h3>🟢 Dry Skin Routine</h3>
        <b>Morning:</b><br>
        ✔ Hydrating cream cleanser<br>
        ✔ Hyaluronic acid serum<br>
        ✔ Thick moisturizer (ceramides)<br>
        ✔ Dewy sunscreen SPF 30<br><br>

        <b>Night:</b><br>
        ✔ Gentle milk cleanser<br>
        ✔ Hydrating toner<br>
        ✔ Night repair cream<br>
        ✔ Avoid alcohol-based products
        ";
    }
    elseif($skin == "sensitive"){
        $routine = "
        <h3>🟢 Sensitive Skin Routine</h3>
        <b>Morning:</b><br>
        ✔ Fragrance-free cleanser<br>
        ✔ Soothing aloe toner<br>
        ✔ Hypoallergenic moisturizer<br>
        ✔ Mineral sunscreen SPF 50<br><br>

        <b>Night:</b><br>
        ✔ Gentle cleanser only<br>
        ✔ Calming serum (Centella / Aloe)<br>
        ✔ Ceramide moisturizer<br>
        ✔ Patch test before new products
        ";
    }
    else{
        $routine = "
        <h3>🟢 Normal / Combination Skin Routine</h3>
        <b>Morning:</b><br>
        ✔ Gel cleanser<br>
        ✔ Light moisturizer<br>
        ✔ Sunscreen SPF 50<br><br>

        <b>Night:</b><br>
        ✔ Cleanser<br>
        ✔ Vitamin-C serum<br>
        ✔ Moisturizer<br>
        ✔ Weekly gentle exfoliation
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Skin Care Routine Planner</title>

<link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
*{box-sizing:border-box;}

body{
    margin:0;
    min-height:100vh;
    font-family:'Urbanist', sans-serif;
    background:linear-gradient(135deg,#e9f9ef,#f4fff8);
    display:flex;
    justify-content:center;
    align-items:center;
}

.box{
    width:520px;
    max-width:95%;
    background:white;
    padding:36px;
    border-radius:28px;
    box-shadow:0 40px 80px rgba(13,157,74,0.18);
}

h2{
    text-align:center;
    color:#0d9d4a;
    margin-bottom:25px;
}

label{
    display:block;
    margin-bottom:6px;
    font-size:14px;
    font-weight:600;
    color:#0b6b3a;   /* Dark green */
    letter-spacing:0.3px;
}

.custom-select{
    position:relative;
    margin-top:10px;
}

.selected{
    background:#f5fff8;
    border:1px solid #cdeedd;
    padding:14px 18px;
    border-radius:14px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    cursor:pointer;
}

.arrow{
    width:8px;
    height:8px;
    border-right:2px solid #0b6b3a;
    border-bottom:2px solid #0b6b3a;
    transform:rotate(45deg);
}

.options{
    display:none;
    position:absolute;
    top:110%;
    width:100%;
    background:white;
    border:1px solid #cdeedd;
    border-radius:14px;
    overflow:hidden;
    box-shadow:0 15px 40px rgba(13,157,74,0.2);
    z-index:5;
}

.options.open{display:block;}

.options div{
    padding:14px 18px;
    cursor:pointer;
}

.options div:hover{
    background:#e9f9ef;
}

.options .active{
    background:#0b6b3a;
    color:white;
}

button{
    width:100%;
    margin-top:22px;
    padding:14px 0;
    font-size:16px;
    font-weight:600;
    color:#0b6b3a;
    background:white;
    border:2.5px solid #0b6b3a;
    border-radius:40px;
    cursor:pointer;
}

button:hover{
    background:linear-gradient(135deg,#0b6b3a,#0f8a4d);
    color:white;
}

.result{
    margin-top:30px;
    background:#f5fff8;
    padding:25px;
    border-radius:20px;
    border:1px solid #cdeedd;
    
}
.result h3{
    color:black;
    font-weight:700;
}

/* Morning & Night labels */
.result b{
    color:#0b6b3a;
    font-weight:600;
}
</style>
</head>

<body>

<div class="box">
<h2>🌿 Smart Skincare Routine Planner</h2>

<form method="POST">
<label>Select your skin type</label>

<div class="custom-select">
    <input type="hidden" name="skin_type" id="skinInput" value="oily">

    <div class="selected" onclick="toggleSelect()">
        <span id="selectedText">Oily Skin</span>
        <div class="arrow"></div>
    </div>

    <div class="options">
        <div onclick="choose('oily','Oily Skin')">Oily Skin</div>
        <div onclick="choose('dry','Dry Skin')">Dry Skin</div>
        <div onclick="choose('sensitive','Sensitive Skin')">Sensitive Skin</div>
        <div onclick="choose('normal','Normal / Combination')">Normal / Combination</div>
    </div>
</div>

<button type="submit">Generate My Routine</button>
</form>

<?php if($routine!=""){ ?>
<div class="result"><?php echo $routine; ?></div>
<?php } ?>
</div>

<script>
function toggleSelect(){
    document.querySelector(".options").classList.toggle("open");
}

function choose(value,text){
    document.getElementById("skinInput").value=value;
    document.getElementById("selectedText").innerText=text;

    document.querySelectorAll(".options div").forEach(o=>o.classList.remove("active"));
    event.target.classList.add("active");
    document.querySelector(".options").classList.remove("open");
}
</script>

</body>
</html>
