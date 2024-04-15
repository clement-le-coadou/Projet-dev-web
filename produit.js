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

function addToCart(productId, categorie, name) {
    var quantityElement = document.getElementById('panier_' + productId);
    var quantity = parseInt(quantityElement.textContent);
    var stockElement = document.getElementById('stock_' + productId);
    var stock = parseInt(stockElement.textContent);

    if (quantity > 0) {
        // Vérifier si la quantité ajoutée au panier est inférieure ou égale au stock affiché
        if (quantity <= stock) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "php/charger_panier.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Mettre à jour l'affichage du stock après l'ajout au panier
                    updateStockDisplay(productId, quantity);
                    console.log(xhr.responseText);
                }
            };
            xhr.send("product_id=" + productId + "&quantity=" + quantity + "&categorie=" + categorie + "&name=" + name);
        } else {
            alert("La quantité ajoutée au panier dépasse le stock disponible.");
        }
    } else {
        alert("Veuillez sélectionner au moins une quantité.");
    }
}

// Fonction pour mettre à jour l'affichage du stock
function updateStockDisplay(productId, quantityAdded) {
    var stockElement = document.getElementById('stock_' + productId);
    var currentStock = parseInt(stockElement.textContent);
    var newStock = currentStock - quantityAdded;
    stockElement.textContent = newStock;
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

// Fonction pour afficher l'image en grand
function showImage(imageSrc) {
    var modal = document.getElementById('modal');
    var modalImg = document.getElementById('modal-image');
    modal.style.display = "block";
    modalImg.src = imageSrc;
}

// Fonction pour fermer la boîte modale
function closeModal() {
    var modal = document.getElementById('modal');
    modal.style.display = "none";
}

function showImageFullscreen(imageSrc) {
    var modal = document.getElementById('modal');
    var modalImg = document.getElementById('modal-image');
    modal.style.display = "block";
    modalImg.src = imageSrc;
}