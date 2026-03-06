<?php
// product.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Detail Page</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 40px;
            background:#ffffff;
        }

        .product-container{
            max-width: 1200px;
            margin: auto;
            display: grid;
            grid-template-columns: 120px 1.2fr 1fr;
            gap: 30px;
            align-items: start;
        }

        /* ⭐ rating stars */
        .rating-wrapper ion-icon{
            color: #FFC107;
            font-size: 22px;
        }

        .rating-wrapper{
            display: flex;
            align-items: center;
            gap: 3px;
        }

        .rating-text{
            color: #777;
            margin-top: 4px;
            font-size: 14px;
        }

        /* thumbnail sidebar */
        .thumbnail-list{
            display: flex;
            flex-direction: column;
            gap: 12px;
            height: 500px;
            width: 120px;
            overflow-y: auto;
            scrollbar-width: none;      /* Firefox */
            -ms-overflow-style: none;   /* IE/Edge */
        }

        /* hide scrollbar Chrome */
        .thumbnail-list::-webkit-scrollbar{
            display: none;
        }

        .thumbnail-list img{
            width: 100px;
            border-radius: 8px;
            cursor: pointer;
            border: 2px solid transparent;
        }

        .thumbnail-list img:hover{
            border: 2px solid hsl(148, 20%, 38%);
        }

        /* main image */
        .main-image img{
            width: 550px;
            border-radius: 12px;
        }

        /* product details */
        .product-details h2{
            font-size: 28px;
            margin-bottom: 10px;
        }

        .price{
            margin-top: 5px;
        }

        .description{
            color: #444;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .sizes button{
            padding: 8px 18px;
            margin-right: 8px;
            margin-top: 10px;
            border: 1px solid #ccc;
            background: white;
            cursor: pointer;
            border-radius: 6px;
        }

        .sizes button:hover{
            border-color: black;
        }

        .add-cart{
            margin-top: 20px;
            background: black;
            color: white;
            border: none;
            padding: 12px 22px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 15px;
        }

        .add-cart:hover{
            opacity: .8;
        }

        .policy{
            margin-top: 18px;
            color: #555;
        }

/* ------------------- TABLET ------------------- */
@media (max-width: 992px){

    .product-container{
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .thumbnail-list{
        height: auto;
    }

    .main-image img{
        max-width: 100%;
    }
}

/* ------------------- MOBILE ------------------- */
@media (max-width: 768px){

    /* stack layout */
    .product-container{
        display: flex;
        flex-direction: column;
        gap: 18px;
    }

    /* thumbnails become horizontal */
    .thumbnail-list{
        flex-direction: row;
        width: 100%;
        height: auto;
        overflow-x: auto;
        overflow-y: hidden;
    }

    .thumbnail-list img{
        width: 90px;
    }

    .main-image{
        text-align: center;
    }

    .main-image img{
        max-width: 90%;
    }

    .product-details h2{
        font-size: 22px;
    }
}

/* --------- VERY SMALL PHONE (≤480px) --------- */
@media (max-width: 480px){

    body{
        padding: 12px;
    }

    .thumbnail-list img{
        width: 75px;
    }

    .main-image img{
        max-width: 100%;
    }

    .add-cart{
        width: 100%;
    }
}        
    </style>
</head>

<body>

<div class="product-container">

    <!-- Left thumbnails -->
    <div class="thumbnail-list">
        <img src="assets/images/product-1.jpg" onclick="changeImage(this.src)">
        <img src="assets/images/product1.1.jpg" onclick="changeImage(this.src)">
        <img src="assets/images/product1.2.jpg" onclick="changeImage(this.src)">
        <img src="assets/images/product1.3.jpg" onclick="changeImage(this.src)">
        <img src="assets/images/product1.4.jpg" onclick="changeImage(this.src)">
        <img src="assets/images/product1.5.jpg" onclick="changeImage(this.src)">
        <img src="assets/images/product1.6.jpg" onclick="changeImage(this.src)">
    </div>

    <!-- Main image -->
    <div class="main-image">
        <img id="productImg" src="assets/images/product-1.jpg" alt="Product Image">
    </div>

    <!-- Details -->
    <div class="product-details">

        <h2>Plum Green Tea Renewed Clarity Night Gel Mini</h2>

        <div class="rating-wrapper" aria-label="5 star rating">
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
        </div>

        <p class="rating-text">50,000+ reviews</p>

        <h1 class="price">$80</h1>

        <p class="description">
            Plum Green Tea Renewed Clarity Night Gel Mini | Hydrates Skin & Fights Acne | Lightweight, Quick-Absorbing, Non-Sticky Gel Texture | Oily, Acne-Prone Skin | 100% Vegan(15ml)
        </p>

        <h3>Select Size</h3>

        <div class="sizes">
            <button>S</button>
            <button>M</button>
            <button>L</button>
            <button>XL</button>
            <button>XXL</button>
        </div>

        <button class="add-cart">ADD TO CART</button>

        <div class="policy">
            <p>✔ 100% Original Product</p>
            <p>✔ Cash on delivery available</p>
            <p>✔ Easy return within 7 days</p>
        </div>

    </div>

</div>

<script>
function changeImage(src){
    document.getElementById("productImg").src = src;
}
</script>

<!-- ⭐ Ionicons script (required for stars) -->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>
