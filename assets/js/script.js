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


/**
 * email validation
 */

const form = document.querySelector("#subscribeForm");

if(form){

form.addEventListener("submit", function(e){

  const email = form.email_address.value.trim();
  const pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if(!pattern.test(email)){
    alert("Please enter a valid email address");
    e.preventDefault();
  }

});

}


/*-----------------------------------*\
  CART SYSTEM
\*-----------------------------------*/

/* CART SYSTEM */

let cart = JSON.parse(localStorage.getItem("cart")) || [];

const cartSidebar = document.getElementById("cart-sidebar");
const cartOverlay = document.getElementById("cart-overlay");
const cartItems = document.getElementById("cart-items");
const cartTotal = document.getElementById("cart-total");
const cartCount = document.getElementById("cart-count");
const cartPrice = document.getElementById("cart-price");


/* OPEN CART */
window.openCart = function () {
  cartSidebar.classList.add("active");
  cartOverlay.classList.add("active");
  renderCart();
}


/* CLOSE CART */
window.closeCart = function () {
  cartSidebar.classList.remove("active");
  cartOverlay.classList.remove("active");
}


/* ADD TO CART */
window.addToCart = function (name, price, image) {

  const product = {
    name: name,
    price: Number(price),
    image: image
  };

  cart.push(product);

  localStorage.setItem("cart", JSON.stringify(cart));

  renderCart();
  openCart();
}


/* DISPLAY CART */
function renderCart() {

  cartItems.innerHTML = "";

  let total = 0;

  if (cart.length === 0) {
    cartItems.innerHTML = "<p>Your cart is empty</p>";
  }

  cart.forEach((item, index) => {

    total += item.price;

    cartItems.innerHTML += `
      <div class="cart-item">
        <img src="${item.image}" alt="${item.name}">
        <div>
          <p>${item.name}</p>
          <p>₹${item.price}</p>
        </div>
        <button class="remove-btn" onclick="removeItem(${index})">❌</button>
      </div>
    `;
  });

  cartTotal.innerText = total;
  cartCount.innerText = cart.length;
  cartPrice.innerText = "₹" + total + ".00";
}


/* REMOVE ITEM */
window.removeItem = function (index) {
  cart.splice(index, 1);
  localStorage.setItem("cart", JSON.stringify(cart));
  renderCart();
}


/* CLOSE CART WHEN CLICK OUTSIDE */
cartOverlay.addEventListener("click", closeCart);


/* LOAD CART ON PAGE LOAD */
renderCart();