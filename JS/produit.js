function increment(productId) {
   var quantityElement = document.getElementById('panier_' + productId);
    var stockElement = document.getElementById('stock_' + productId);

    var quantity = parseInt(quantityElement.textContent);
    var stock = parseInt(stockElement.textContent);
   
    if (quantity < stock) {
        quantity++;
        quantityElement.textContent = quantity;

    } else {
        alert("La quantité maximale disponible est atteinte.");
    }
}

function decrement(productId) {
    var quantityElement = document.getElementById('panier_' + productId);
    var quantity = parseInt(quantityElement.textContent);

    if (quantity > 0) {
        quantity--;
        quantityElement.textContent = quantity;

    }
}

function addToCart(productId,categorie,name) {
    var quantityElement = document.getElementById('panier_' + productId);
    var quantity = parseInt(quantityElement.textContent);

    if (quantity > 0) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "panier.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
            }
        };
        xhr.send("product_id=" + productId + "&quantity=" + quantity+"&categorie="+categorie+"&name="+name);
    } else {
        alert("Veuillez sélectionner au moins une quantité.");
    }
}

function toggleStockVisibility() {
    var stocks = document.getElementsByClassName('stock');
    for (var i = 0; i < stocks.length; i++) {
        if (stocks[i].style.visibility == 'collapse') {
            stocks[i].style.visibility = 'visible';
        } else {
            stocks[i].style.visibility = 'collapse';
        }
    }
}


