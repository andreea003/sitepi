document.addEventListener('DOMContentLoaded', () => {
  let carts = document.querySelectorAll('.add-cart');
  let totalCostElement = document.querySelector('.total-cost');

  let products = [
    {
        name: 'Mercedes AMG Petronas F1 2023 Team Long Sleeved Drive T-Shirt - Black',
        tag: 'tricouMercedes',
        price: 70.00,
        inCart: 0
    },

    {
        name: 'Oracle Red Bull Racing 2023 New Era Sergio Perez 9FORTY Cap',
        tag: 'rbcap',
        price: 39.99,
        inCart: 0
    },

    {
        name: 'Scuderia Ferrari 2023 Team Charles Leclerc Football Shirt',
        tag: 'shirtFerrari',
        price: 99.99,
        inCart: 0
    },

    {
        name: 'Scuderia Ferrari 2023 Team Softshell Jacket',
        tag: 'jacketFerrari',
        price: 169.99,
        inCart: 0
    },

    {

        name: 'McLaren Essential Logo Hoodie - Grey',
        tag: 'hoodie',
        price: 79.99,
        inCart: 0
    },

    {
        name: 'Oracle Red Bull Racing 2023 Team Water Resistant Jacket',
        tag: 'rbjacket',
        price: 165.99,
        inCart: 0
    },

];

  for (let i = 0; i < carts.length; i++) {
      carts[i].addEventListener('click', (event) => {
          let productID = event.target.getAttribute('data-product-id');
          let product = products[productID - 1];

          if (product) {
              cartNumbers(product);
              totalCost(product);
              displayCartItems();
          } else {
              console.log("Nu a găsit produsul");
          }
      });
  }

  function onLoadCartNumbers() {
      let productNumbers = localStorage.getItem('cartNumbers');
      let cartCountElement = document.querySelector('.cart-count');

      if (productNumbers) {
          cartCountElement.textContent = productNumbers;
      }

      let totalCost = localStorage.getItem('totalCost');
      if (totalCost) {
          totalCostElement.textContent = 'Total: $' + parseFloat(totalCost).toFixed(2);
      }
  }

  function cartNumbers(product) {
      let productNumbers = localStorage.getItem('cartNumbers');
      productNumbers = parseInt(productNumbers) || 0;

      localStorage.setItem('cartNumbers', productNumbers + 1);
      document.querySelector('.cart-count').textContent = productNumbers + 1;

      setItems(product);
  }

  function setItems(product) {
      let cartItems = localStorage.getItem('productsInCart');
      cartItems = JSON.parse(cartItems) || {};

      if (!cartItems[product.tag]) {
          product.inCart = 1;
          cartItems[product.tag] = product;
      } else {
          cartItems[product.tag].inCart += 1;
      }

      localStorage.setItem('productsInCart', JSON.stringify(cartItems));
  }

  function applyCoupon() {
      let couponCode = document.getElementById('couponCode').value;
      let validCoupons = ['CUPON1', 'CUPON2'];

      if (validCoupons.includes(couponCode)) {
          localStorage.setItem('couponCode', couponCode);
          console.log('Cupon aplicat cu succes!');
      } else {
          console.log('Cupon invalid');
      }
  }

  function getDiscount() {
      let couponCode = localStorage.getItem('couponCode');
      let validCoupons = ['CUPON1', 'CUPON2'];
      let discount = 0;

      if (validCoupons.includes(couponCode)) {
          switch (couponCode) {
              case 'CUPON1':
                  discount = 10;
                  break;
              case 'CUPON2':
                  discount = 20;
                  break;
          }
      }

      return discount;
  }

  function totalCost(product) {
      let cartCost = localStorage.getItem('totalCost') || 0;
      let discount = getDiscount();

      cartCost = parseFloat(cartCost);
      localStorage.setItem('totalCost', cartCost + product.price - discount);

      totalCostElement.textContent = 'Total: $' + (cartCost + product.price - discount).toFixed(2);
  }

  
  // Funcția displayProducts pentru filtrarea și afișarea produselor în funcție de un termen de căutare și sortarea după preț
function displayProducts(searchTerm = '', sortByPrice = false) {
    let productsContainer = document.getElementById('productContainer');
    productsContainer.innerHTML = '';

    // Aplică sortarea după preț, dacă este activată
    if (sortByPrice) {
        products.sort((a, b) => a.price - b.price);
    }

    // Filtrare produse în funcție de searchTerm
    let filteredProducts = products.filter(product => {
        return product.name.toLowerCase().includes(searchTerm.toLowerCase());
    });

    // Afisare produse
    if (filteredProducts.length > 0) {
        filteredProducts.forEach(product => {
            let productDiv = document.createElement('div');
            productDiv.classList.add('product');
            productDiv.innerHTML = `
                <img src="${product.image}">
                <h3>${product.name}</h3>
                <span class="price">$${product.price.toFixed(2)}</span>
                <button class="add-cart" data-product-id="${product.id}">Add to Cart</button>
            `;
            productsContainer.appendChild(productDiv);
        });
    } else {
        productsContainer.innerHTML = '<p>Nu s-au găsit produse</p>';
    }
}


// Adaugă un eveniment pentru butonul de sortare după preț
let sortButton = document.getElementById('sortButton');
sortButton.addEventListener('click', () => {
    let searchInput = document.getElementById('searchInput').value;
    let sortByPrice = true;
    displayProducts(searchInput, sortByPrice);
});


  let applyCouponButton = document.getElementById('applyCoupon');
  applyCouponButton.addEventListener('click', applyCoupon);

  let resetButton = document.querySelector('.reset-cart');
  resetButton.addEventListener('click', () => {
      localStorage.removeItem('cartNumbers');
      localStorage.removeItem('productsInCart');
      localStorage.removeItem('totalCost');
      localStorage.removeItem('couponCode');
      document.querySelector('.cart-count').textContent = 0;
      totalCostElement.textContent = 'Total: $0.00';
      displayCartItems();
  });

  onLoadCartNumbers();
  displayCartItems();
});

