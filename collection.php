<?php
$selectedType = isset($_GET['skin']) ? $_GET['skin'] : "all";

$products = [

/* DRY */
["name"=>"Hydra Cream 1","price"=>1200,"old"=>1500,"skin"=>"dry","img"=>"images/dry1.jpg"],
["name"=>"Hydra Cream 2","price"=>1200,"old"=>1500,"skin"=>"dry","img"=>"images/dry2.jpg"],
["name"=>"Hydra Cream 3","price"=>1200,"old"=>1500,"skin"=>"dry","img"=>"images/dry3.jpg"],
["name"=>"Hydra Cream 4","price"=>1200,"old"=>1500,"skin"=>"dry","img"=>"images/dry4.jpg"],
["name"=>"Hydra Cream 5","price"=>1200,"old"=>1500,"skin"=>"dry","img"=>"images/dry5.jpg"],

/* OILY */
["name"=>"Oil Control Gel 1","price"=>900,"old"=>1100,"skin"=>"oily","img"=>"images/oily1.jpg"],
["name"=>"Oil Control Gel 2","price"=>900,"old"=>1100,"skin"=>"oily","img"=>"images/oily2.jpg"],
["name"=>"Oil Control Gel 3","price"=>900,"old"=>1100,"skin"=>"oily","img"=>"images/oily3.jpg"],
["name"=>"Oil Control Gel 4","price"=>900,"old"=>1100,"skin"=>"oily","img"=>"images/oily4.jpg"],
["name"=>"Oil Control Gel 5","price"=>900,"old"=>1100,"skin"=>"oily","img"=>"images/oily5.jpg"],

/* COMBINATION */
["name"=>"Balance Serum 1","price"=>1500,"old"=>1800,"skin"=>"combination","img"=>"images/comb1.jpg"],
["name"=>"Balance Serum 2","price"=>1500,"old"=>1800,"skin"=>"combination","img"=>"images/comb2.jpg"],
["name"=>"Balance Serum 3","price"=>1500,"old"=>1800,"skin"=>"combination","img"=>"images/comb3.jpg"],
["name"=>"Balance Serum 4","price"=>1500,"old"=>1800,"skin"=>"combination","img"=>"images/comb4.jpg"],
["name"=>"Balance Serum 5","price"=>1500,"old"=>1800,"skin"=>"combination","img"=>"images/comb5.jpg"],

/* SENSITIVE */
["name"=>"Calm Lotion 1","price"=>1000,"old"=>1300,"skin"=>"sensitive","img"=>"images/sen1.jpg"],
["name"=>"Calm Lotion 2","price"=>1000,"old"=>1300,"skin"=>"sensitive","img"=>"images/sen2.jpg"],
["name"=>"Calm Lotion 3","price"=>1000,"old"=>1300,"skin"=>"sensitive","img"=>"images/sen3.jpg"],
["name"=>"Calm Lotion 4","price"=>1000,"old"=>1300,"skin"=>"sensitive","img"=>"images/sen4.jpg"],
["name"=>"Calm Lotion 5","price"=>1000,"old"=>1300,"skin"=>"sensitive","img"=>"images/sen5.jpg"],
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
        <div data-value="oily">Oily</div>
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