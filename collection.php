<?php
$selectedType = isset($_GET['skin']) ? $_GET['skin'] : "all";

$products = [

/* DRY */
["name"=>"Deep Moisturizing Cream with Hyaluronic Acid ","price"=>999,"old"=>1499,"skin"=>"dry","img"=>"assets/images/product/dry skin/product1.jpg"],
["name"=>"Daily Repair Cream for Dry & Flaky Skin ","price"=>1099,"old"=>1599,"skin"=>"dry","img"=>"assets/images/product/dry skin/product2.jpg"],
["name"=>"Boost Intense Hydration Cream with Vitamin E ","price"=>1199,"old"=>1699,"skin"=>"dry","img"=>"assets/images/product/dry skin/product3.jpg"],
["name"=>"Ultra Hydrating Night Cream for Dry Skin with Aloe Vera","price"=>1299,"old"=>1799,"skin"=>"dry","img"=>"assets/images/product/dry skin/product4.jpg"],
["name"=>"Lock Cream for Extra Dry Skin (Dermat Tested)","price"=>1399,"old"=>1899,"skin"=>"dry","img"=>"assets/images/product/dry skin/product5.jpg"],

/* OIL */
["name"=>"Oil Control Face Gel with Niacinamide & Tea Tree for Acne-Free Skin ","price"=>899,"old"=>1199,"skin"=>"oil","img"=>"assets/images/product/oil skin/product1.jpg"],
["name"=>"Matte Finish Oil Control Gel with Salicylic Acid for Pimples","price"=>949,"old"=>1299,"skin"=>"oil","img"=>"assets/images/product/oil skin/product2.jpg"],
["name"=>"Lightweight Oil-Free Gel Moisturizer with Green Tea Extract ","price"=>999,"old"=>1399,"skin"=>"oil","img"=>"assets/images/product/oil skin/product3.jpg"],
["name"=>"Anti-Acne Oil Control Gel with Vitamin B3 for Clear Skin ","price"=>879,"old"=>1199,"skin"=>"oil","img"=>"assets/images/product/oil skin/product4.jpg"],
["name"=>"Pomegranate Oil Control Gel Cream for Youthful Glow ","price"=>929,"old"=>1299,"skin"=>"oil","img"=>"assets/images/product/oil skin/product5.jpg"],

/* COMBINATION */
["name"=>"Balance Skin Serum with Niacinamide & Hyaluronic Acid for Oil-Dry Control","price"=>1499,"old"=>1899,"skin"=>"combination","img"=>"assets/images/product/combination skin/product1.jpg"],
["name"=>"Rose Extract Balancing Face Serum for Hydration & Oil Control ","price"=>1399,"old"=>1799,"skin"=>"combination","img"=>"assets/images/product/combination skin/product2.jpg"],
["name"=>"Gold Infused Glow Serum for Even Tone & Radiant Skin ","price"=>1599,"old"=>1999,"skin"=>"combination","img"=>"assets/images/product/combination skin/product3.jpg"],
["name"=>"Collagen Boost Face Serum for Firm & Balanced Skin ","price"=>1499,"old"=>1899,"skin"=>"combination","img"=>"assets/images/product/combination skin/product4.jpg"],
["name"=>"Coffee Detox Balancing Serum for Clear & Smooth Skin ","price"=>1299,"old"=>1699,"skin"=>"combination","img"=>"assets/images/product/combination skin/product5.jpg"],

/* SENSITIVE */
["name"=>"Calming Skin Repair Lotion with Aloe Vera & Chamomile for Sensitive Skin","price"=>999,"old"=>1399,"skin"=>"sensitive","img"=>"assets/images/product/sensitive skin/product1.jpg"],
["name"=>"Hydra Calm Moisturizing Lotion with Ceramides for Dry & Sensitive Skin ","price"=>1099,"old"=>1499,"skin"=>"sensitive","img"=>"assets/images/product/sensitive skin/product2.jpg"],
["name"=>"Soothing Face Lotion with Rose Water & Vitamin E for Irritated Skin","price"=>949,"old"=>1299,"skin"=>"sensitive","img"=>"assets/images/product/sensitive skin/product3.jpg"],
["name"=>"Ultra Gentle Daily Lotion for Sensitive & Allergy-Prone Skin (Dermat Tested)","price"=>1199,"old"=>1599,"skin"=>"sensitive","img"=>"assets/images/product/sensitive skin/product4.jpg"],
["name"=>"Redness Relief Calming Lotion with Green Tea Extract ","price"=>1049,"old"=>1399,"skin"=>"sensitive","img"=>"assets/images/product/sensitive skin/product5.jpg"],
];
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Collection - Glowing</title>

<style>
body{
    margin:0;
    font-family:'Segoe UI', sans-serif;
    background:#f8f7f4;
}

/* TITLE */
.page-title{
    text-align:center;
    padding:40px 0 20px;
    font-size:28px;
    font-weight:600;
}

/* DROPDOWN */
.filter-wrapper{
    display:flex;
    justify-content:center;
    margin-bottom:30px;
}

.custom-select{
    width:240px;
    position:relative;
}

.select-selected{
    padding:12px 40px 12px 15px;
    border:1px solid #2f4f3f;
    border-radius:8px;
    cursor:pointer;
    background:white;
    color:#2f4f3f;
    font-weight:500;
    position:relative;
}

.select-selected.active{
    background:#2f4f3f;
    color:white;
}

.select-selected:after{
    content:"▼";
    position:absolute;
    right:15px;
    top:50%;
    transform:translateY(-50%);
    font-size:12px;
}

.select-items{
    position:absolute;
    top:110%;
    left:0;
    right:0;
    background:white;
    border:1px solid #2f4f3f;
    border-radius:8px;
    display:none;
    box-shadow:0 10px 25px rgba(0,0,0,0.1);
    z-index:10;
}

.select-items div{
    padding:12px;
    cursor:pointer;
}

.select-items div:hover{
    background:#f0f5f3;
}

.select-items .selected-option{
    background:#2f4f3f;
    color:white;
}

/* GRID */
.container{
    width:90%;
    margin:auto;
}

.products{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:25px;
}

/* CARD */
.card{
    background:white;
    border-radius:16px;
    overflow:hidden;
    box-shadow:0 5px 20px rgba(0,0,0,0.05);
    transition:0.4s;
}

.card:hover{
    transform:translateY(-8px);
    box-shadow:0 20px 40px rgba(0,0,0,0.12);
}

.image-box{
    position:relative;
}

.image-box img{
    width:100%;
    height:260px;
    object-fit:cover;
    transition:0.5s;
}

.card:hover img{
    transform:scale(1.08);
}

.badge{
    position:absolute;
    top:15px;
    left:15px;
    background:#2f4f3f;
    color:white;
    padding:5px 10px;
    font-size:12px;
    border-radius:4px;
}

.float-icons{
    position:absolute;
    right:15px;
    top:50%;
    transform:translateY(-50%);
    display:flex;
    flex-direction:column;
    gap:14px;
    opacity:0;
    transition:0.4s;
}

.card:hover .float-icons{
    opacity:1;
}

.icon-btn{
    width:42px;
    height:42px;
    border-radius:50%;
    background:white;
    display:flex;
    align-items:center;
    justify-content:center;
    cursor:pointer;
    box-shadow:0 5px 15px rgba(0,0,0,0.15);
    transition:0.3s;
}

.wishlist.active{
    background:#2f4f3f;
    color:white;
}

.details{
    padding:18px;
}

.old{
    text-decoration:line-through;
    color:#888;
}

.new{
    font-weight:bold;
}

.shop-btn{
    width:100%;
    padding:10px;
    background:#2f4f3f;
    color:white;
    border:none;
    border-radius:8px;
    cursor:pointer;
    margin-top:10px;
}

</style>
</head>
<body>

<div class="page-title">Skin Care Collection</div>

<div class="filter-wrapper">
<div class="custom-select">
    <div class="select-selected" id="selectedText">
        <?php echo ucfirst($selectedType); ?>
    </div>
    <div class="select-items" id="dropdownList">
        <div data-value="all">All</div>
        <div data-value="dry">Dry</div>
        <div data-value="oil">Oil</div>
        <div data-value="combination">Combination</div>
        <div data-value="sensitive">Sensitive</div>
    </div>
</div>
</div>

<div class="container">
<div class="products">

<?php foreach($products as $product){
if($selectedType=="all" || $product['skin']==$selectedType){ ?>

<div class="card">
<div class="image-box">
<div class="badge">-20%</div>
<img src="<?php echo $product['img']; ?>">
<div class="float-icons">
<div class="icon-btn">🛒</div>
<div class="icon-btn wishlist">❤</div>
</div>
</div>

<div class="details">
<strong><?php echo $product['name']; ?></strong><br>
<span class="old">₹<?php echo $product['old']; ?></span>
<span class="new">₹<?php echo $product['price']; ?></span>
<button class="shop-btn">Shop Now</button>
</div>
</div>

<?php }} ?>

</div>
</div>

<script>
const selected = document.getElementById("selectedText");
const dropdown = document.getElementById("dropdownList");

selected.addEventListener("click", ()=>{
    dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
});

document.querySelectorAll("#dropdownList div").forEach(option=>{
    if(option.dataset.value === "<?php echo $selectedType; ?>"){
        option.classList.add("selected-option");
        selected.classList.add("active");
    }

    option.addEventListener("click", function(){
        window.location.href = "?skin=" + this.dataset.value;
    });
});

document.addEventListener("click", function(e){
    if(!e.target.closest(".custom-select")){
        dropdown.style.display = "none";
    }
});

document.querySelectorAll('.wishlist').forEach(btn=>{
    btn.addEventListener('click', function(){
        this.classList.toggle('active');
    });
});
</script>

</body>
</html>