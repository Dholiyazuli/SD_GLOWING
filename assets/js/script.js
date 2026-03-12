'use strict';



/**
 * add event on element
 */

const addEventOnElem = function (elem, type, callback) {
  if (elem.length > 1) {
    for (let i = 0; i < elem.length; i++) {
      elem[i].addEventListener(type, callback);
    }
  } else {
    elem.addEventListener(type, callback);
  }
}



/**
 * navbar toggle
 */

const navTogglers = document.querySelectorAll("[data-nav-toggler]");
const navbar = document.querySelector("[data-navbar]");
const navbarLinks = document.querySelectorAll("[data-nav-link]");
const overlay = document.querySelector("[data-overlay]");

const toggleNavbar = function () {
  navbar.classList.toggle("active");
  overlay.classList.toggle("active");
}

addEventOnElem(navTogglers, "click", toggleNavbar);

const closeNavbar = function () {
  navbar.classList.remove("active");
  overlay.classList.remove("active");
}

addEventOnElem(navbarLinks, "click", closeNavbar);



/**
 * header sticky & back top btn active
 */

const header = document.querySelector("[data-header]");
const backTopBtn = document.querySelector("[data-back-top-btn]");

const headerActive = function () {
  if (window.scrollY > 150) {
    header.classList.add("active");
    backTopBtn.classList.add("active");
  } else {
    header.classList.remove("active");
    backTopBtn.classList.remove("active");
  }
}

addEventOnElem(window, "scroll", headerActive);

let lastScrolledPos = 0;

const headerSticky = function () {
  if (lastScrolledPos >= window.scrollY) {
    header.classList.remove("header-hide");
  } else {
    header.classList.add("header-hide");
  }

  lastScrolledPos = window.scrollY;
}

addEventOnElem(window, "scroll", headerSticky);



/**
 * scroll reveal effect
 */

const sections = document.querySelectorAll("[data-section]");

const scrollReveal = function () {
  for (let i = 0; i < sections.length; i++) {
    if (sections[i].getBoundingClientRect().top < window.innerHeight / 2) {
      sections[i].classList.add("active");
    }
  }
}

scrollReveal();

addEventOnElem(window, "scroll", scrollReveal);



const form = document.querySelector("form");

form.addEventListener("submit", function(e){

  const email = form.email.value.trim();
  const pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if(!pattern.test(email)){
    alert("Please enter a valid email address");
    e.preventDefault();
  }

});


/*-----------------------------------*\
  # CART SYSTEM
\*-----------------------------------*/

let cart = JSON.parse(localStorage.getItem("cart")) || [];

const cartSidebar = document.getElementById("cart-sidebar");
const cartOverlay = document.getElementById("cart-overlay");
const cartItems = document.getElementById("cart-items");
const cartTotal = document.getElementById("cart-total");
const cartCount = document.getElementById("cart-count");
const cartPrice = document.getElementById("cart-price");

/* OPEN CART */
function openCart(){
  cartSidebar.classList.add("active");
  cartOverlay.style.display="block";
  renderCart();
}

/* CLOSE CART */
function closeCart(){
  cartSidebar.classList.remove("active");
  cartOverlay.style.display="none";
}

/* ADD PRODUCT */
function addToCart(name,price,image){

  const product={
    name:name,
    price:price,
    image:image,
    qty:1
  };

  cart.push(product);

  localStorage.setItem("cart",JSON.stringify(cart));

  renderCart();
  openCart();
}

/* DISPLAY CART */
function renderCart(){

  cartItems.innerHTML="";
  let total=0;

  cart.forEach((item,index)=>{

    total+=item.price;

    cartItems.innerHTML+=`

      <div class="cart-item">

        <img src="${item.image}">

        <div>
          <p>${item.name}</p>
          <p>₹${item.price}</p>
        </div>

        <button onclick="removeItem(${index})">❌</button>

      </div>

    `;

  });

  cartTotal.innerText=total;
  cartCount.innerText=cart.length;
  cartPrice.innerText="₹"+total+".00";

}

/* REMOVE ITEM */

function removeItem(index){

  cart.splice(index,1);

  localStorage.setItem("cart",JSON.stringify(cart));

  renderCart();

}

/* LOAD CART ON PAGE LOAD */

renderCart();

/* CLOSE CART WHEN CLICK OUTSIDE */

cartOverlay.addEventListener("click", closeCart);