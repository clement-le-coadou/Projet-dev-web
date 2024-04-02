function increment(productId) {
   var quantityElement = document.getElementById('panier_' + productId);
    var stockElement = document.getElementById('stock_' + productId);

    var quantity = parseInt(quantityElement.textContent);
    var stock = parseInt(stockElement.textContent);
   
    if (quantity < stock) {
        quantity++;
        quantityElement.textContent = quantity;

        updateCart(productId, quantity);
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

        updateCart(productId, quantity);
    }
}

function updateCart(productId, quantity) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'produit.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            console.log(xhr.responseText);
            // Mettre à jour l'affichage du panier si nécessaire
        }
    };
    xhr.send('product_id=' + productId + '&quantity=' + quantity);
}
