document.addEventListener("DOMContentLoaded", function () {
    var scrollSpy = new bootstrap.ScrollSpy(document.body, {
        target: "#navbarSupportedContent"
    });
});

      if (document.readyState == "loading") {
        document.addEventListener("DOMContentLoaded", ready)
    } else {
        ready();
    }
    
    function ready() {
        var removeButtons = document.querySelectorAll('.trash-icon');
        console.log(removeButtons);
        for (var x = 0; x < removeButtons.length; x++) {
            var button = removeButtons[x];
            button.addEventListener('click', removeItem);
        }
        var quantityInputs = document.getElementsByClassName('quantity')
        for (var x = 0; x < removeButtons.length; x++) {
            var input = quantityInputs[x]
            input.addEventListener('change', quantityChanged)
        }
        var addOrder = document.querySelectorAll('.button button');
        for (var x = 0; x < addOrder.length; x++){
            var button = addOrder[x];
            if (button.textContent == 'Order') {
                button.addEventListener('click', addOrderCliked);
            }
        }
    }
    
    function removeItem(event) {
        var buttonClicked = event.target;
        var parent = buttonClicked.parentNode;
        parent.remove();
        var orderItems = document.getElementsByClassName('list-order');
        if (orderItems.length === 0) {
            document.getElementsByClassName("total-price")[0].innerText = "P0";
        }
        totalUpdate()
    }
    function quantityChanged(event){
        var input = event.target;
        if(isNaN(input.value) || input.value <= 0){
            input.value = 1;
        }
        totalUpdate();
    }
    function addOrderCliked(event){
        var button = event.target;
        var products = button.parentElement.parentElement;
        var title = products.querySelector('.name-order').innerText;
        var price = parseFloat(products.querySelector('.price-order').innerText.replace("P", ""));
        addProductToCart(title, price);
        totalUpdate();
    }
    function addProductToCart(title, price) {
        const orderBox = document.createElement('div');
        orderBox.classList.add('list-order');
        orderBox.innerHTML = `
            <div class="product-title">${title}</div>
            <div class="product-price">P${price}</div>
            <input type="number" value="1" class="quantity">
            <i class="bx bxs-trash trash-icon" id="trashBtn"></i>
        `;
        const orderContent = document.querySelector('.order');
        orderContent.appendChild(orderBox);
        const removeButton = orderBox.querySelector('.trash-icon');
        removeButton.addEventListener('click', removeItem);
        const quantityInput = orderBox.querySelector('.quantity');
        quantityInput.addEventListener('change', quantityChanged);
    }

    function totalUpdate(){
        var orderContent = document.getElementsByClassName('order')[0];
        var orderItems = orderContent.getElementsByClassName('list-order');
        var total = 0;
        for (var i = 0; i < orderItems.length; i++){
            var orderItem = orderItems[i]
            var priceElement = orderItem.getElementsByClassName('product-price')[0];
            var quantityElement = orderItem.getElementsByClassName('quantity')[0];
            var price = parseFloat(priceElement.innerText.replace("P", ""))
            var quan = quantityElement.value
            total = total + price * quan;
    
            document.getElementsByClassName("total-price")[0].innerText = "P" + total;
        }
    }