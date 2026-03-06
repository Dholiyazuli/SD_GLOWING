<?php
$comparison = "";

$products = [
    "green_facewash" => [
        "name" => "Green Tea Oil-Control Facewash",
        "price" => 299,
        "skin" => "Oily, Acne-prone",
        "ingredients" => "Salicylic Acid, Green Tea, Aloe Vera",
        "pros" => "Controls oil, reduces pimples, refreshing feel",
        "cons" => "Not suitable for very dry skin"
    ],
    "hydrating_cleanser" => [
        "name" => "Deep Hydrating Cream Cleanser",
        "price" => 349,
        "skin" => "Dry, Sensitive",
        "ingredients" => "Hyaluronic Acid, Ceramides, Shea Butter",
        "pros" => "Deep moisture, no dryness, soft skin",
        "cons" => "Not good for oily skin"
    ],
    "vitc_serum" => [
        "name" => "Vitamin-C Glow Boost Serum",
        "price" => 499,
        "skin" => "All Skin Types",
        "ingredients" => "Vitamin-C, Niacinamide, Orange Extract",
        "pros" => "Brightening, removes dullness, fades spots",
        "cons" => "May irritate sensitive skin"
    ],
    "acne_gel" => [
        "name" => "Acne Clearing Treatment Gel",
        "price" => 399,
        "skin" => "Oily, Combination",
        "ingredients" => "Benzoyl Peroxide, Tea Tree Oil",
        "pros" => "Reduces active acne fast",
        "cons" => "Can cause dryness if overused"
    ]
];

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $p1 = $_POST["product1"];
    $p2 = $_POST["product2"];

    if($p1 == $p2){
        $comparison = "<h3>Please select two different products.</h3>";
    } else {
        $A = $products[$p1];
        $B = $products[$p2];
        $better = ($A["price"] < $B["price"]) ? $A["name"] : $B["name"];

        $comparison = "
        <h2>📊 Product Comparison Result</h2>
        <table>
            <tr><th>Feature</th><th>{$A['name']}</th><th>{$B['name']}</th></tr>
            <tr><td>Price</td><td>₹{$A['price']}</td><td>₹{$B['price']}</td></tr>
            <tr><td>Best For Skin</td><td>{$A['skin']}</td><td>{$B['skin']}</td></tr>
            <tr><td>Key Ingredients</td><td>{$A['ingredients']}</td><td>{$B['ingredients']}</td></tr>
            <tr><td>Pros</td><td>{$A['pros']}</td><td>{$B['pros']}</td></tr>
            <tr><td>Cons</td><td>{$A['cons']}</td><td>{$B['cons']}</td></tr>
        </table>
        <h3>✔ Recommended Product: <span class='green'>{$better}</span></h3>
        ";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Smart Skincare Product Comparison</title>
<link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
*{box-sizing:border-box;}

body{
    margin:0;
    min-height:100vh;
    font-family:'Urbanist',sans-serif;
    background:linear-gradient(135deg,#e9f9ef,#f4fff8);
    display:flex;
    justify-content:center;
    align-items:center;
}

.container{
    width:900px;
    max-width:95%;
    background:white;
    padding:40px;
    border-radius:28px;
    box-shadow:0 40px 80px rgba(13,157,74,0.18);
}

h1{
    text-align:center;
    color:#0d9d4a;
    margin-bottom:30px;
}

.form-row{
    display:flex;
    gap:25px;
}

label{
    color:#0b6b3a;
    font-weight:600;
}

.custom-select{
    position:relative;
    margin-top:8px;
}

.selected{
    background:#f5fff8;
    border:2px solid #cdeedd;
    padding:18px 22px;
    border-radius:18px;
    cursor:pointer;
    display:flex;
    justify-content:space-between;
    align-items:center;
    font-size:16px;
}

.selected.active{
    border-color:#0b6b3a;
}

.arrow{
    width:10px;
    height:10px;
    border-right:2.5px solid #0b6b3a;
    border-bottom:2.5px solid #0b6b3a;
    transform:rotate(45deg);
}

.options{
    display:none;
    position:absolute;
    width:100%;
    top:110%;
    background:white;
    border:1px solid #cdeedd;
    border-radius:16px;
    overflow:hidden;
    box-shadow:0 20px 40px rgba(13,157,74,0.2);
    z-index:10;
}

.options div{
    padding:14px 20px;
    cursor:pointer;
}

.options div:hover{
    background:#e9f9ef;
    color:#0b6b3a;
}

.options .active{
    background:#0b6b3a;
    color:white;
}

.options.open{
    display:block;
}

button{
    width:100%;
    margin-top:25px;
    padding:14px;
    font-size:16px;
    font-weight:600;
    border:2.5px solid #0b6b3a;
    background:white;
    color:#0b6b3a;
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
    border-radius:22px;
    border:1px solid #cdeedd;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:15px;
}

th,td{
    padding:12px;
    border:1px solid #cdeedd;
}

th{
    background:#e9f9ef;
    color:#0b6b3a;
}

.green{
    color:#0b6b3a;
    font-weight:700;
}

@media(max-width:768px){
    .form-row{flex-direction:column;}
    h1{font-size:22px;}
}
</style>
</head>

<body>

<div class="container">
<h1>🌿 Smart Skincare Product Comparison</h1>

<form method="POST">
<div class="form-row">

<div style="flex:1;">
<label>First Product</label>
<div class="custom-select">
<input type="hidden" name="product1" id="p1" value="green_facewash">
<div class="selected" onclick="toggle(1)"><span id="t1">Green Tea Oil-Control Facewash</span><div class="arrow"></div></div>
<div class="options" id="o1">
<div onclick="choose(1,'green_facewash','Green Tea Oil-Control Facewash')">Green Tea Oil-Control Facewash</div>
<div onclick="choose(1,'hydrating_cleanser','Deep Hydrating Cream Cleanser')">Deep Hydrating Cream Cleanser</div>
<div onclick="choose(1,'vitc_serum','Vitamin-C Glow Boost Serum')">Vitamin-C Glow Boost Serum</div>
<div onclick="choose(1,'acne_gel','Acne Clearing Treatment Gel')">Acne Clearing Treatment Gel</div>
</div>
</div>
</div>

<div style="flex:1;">
<label>Second Product</label>
<div class="custom-select">
<input type="hidden" name="product2" id="p2" value="hydrating_cleanser">
<div class="selected" onclick="toggle(2)"><span id="t2">Deep Hydrating Cream Cleanser</span><div class="arrow"></div></div>
<div class="options" id="o2">
<div onclick="choose(2,'green_facewash','Green Tea Oil-Control Facewash')">Green Tea Oil-Control Facewash</div>
<div onclick="choose(2,'hydrating_cleanser','Deep Hydrating Cream Cleanser')">Deep Hydrating Cream Cleanser</div>
<div onclick="choose(2,'vitc_serum','Vitamin-C Glow Boost Serum')">Vitamin-C Glow Boost Serum</div>
<div onclick="choose(2,'acne_gel','Acne Clearing Treatment Gel')">Acne Clearing Treatment Gel</div>
</div>
</div>
</div>

</div>

<button type="submit">Compare Now</button>
</form>

<?php if($comparison!=""){ ?>
<div class="result"><?php echo $comparison;?></div>
<?php } ?>

</div>

<script>
function toggle(n){
    document.getElementById("o"+n).classList.toggle("open");
}
function choose(n,val,text){
    document.getElementById("p"+n).value=val;
    document.getElementById("t"+n).innerText=text;
    document.querySelectorAll("#o"+n+" div").forEach(e=>e.classList.remove("active"));
    event.target.classList.add("active");
    document.getElementById("o"+n).classList.remove("open");
}
</script>

</body>
</html>
