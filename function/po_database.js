

$(document).ready(function() {
  fetchLastTransactionNumber(); // Fetch last transaction number on page load
});

function fetchLastTransactionNumber() {
  fetch('get_last_transaction_number.php')
      .then(response => {
          if (!response.ok) {
              throw new Error('Network response was not ok');
          }
          return response.json();
      })
      .then(data => {
          console.log('Data received:', data); // Log the received data
          const lastNumber = data.last_number;
          console.log('Last Number:', lastNumber); // Log the last number
          document.getElementById('transactionNumber').textContent = generateNextTransactionNumber(lastNumber);
      })
      .catch(error => {
          console.error('Error fetching last transaction number:', error);
      });
}

function generateNextTransactionNumber(lastNumber) {
    console.log('Generating next transaction number from:', lastNumber);
    if (!lastNumber.startsWith('PORD')) {
        console.error('Invalid last number format:', lastNumber);
        return 'PORD0001'; // Fallback if format is unexpected
    }
    const numberPart = parseInt(lastNumber.replace('PORD', '')) + 1;
    const nextNumber = `PORD${String(numberPart).padStart(4, '0')}`;
    console.log('Generated Transaction Number:', nextNumber);
    return nextNumber;
  }
function loadProducts() {
  const supplierName = document.getElementById("supplier").value;
  if (supplierName) {
      updateProductList(supplierName);
  } else {
      document.getElementById("product_list").innerHTML = '<option value="">-- Select Product --</option>'; // Reset products
  }
}
function updateProductList(supplierName) {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", `supplier_products.php?supplier_name=${supplierName}`, true);
  xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
          // Clean up any unwanted tags from the response and update product list
          document.getElementById("product_list").innerHTML = xhr.responseText; // Populate product list
      }
  };
  xhr.send();
}


function addProduct() {
  const productSelect = document.getElementById("product_list");
  const productName = productSelect.value;
  const quantity = parseInt(document.getElementById("product_qty").value);

  if (!productName || quantity < 1) {
      alert("Please select a valid product and enter a quantity of 1 or more.");
      return;
  }

  fetchProductPrice(productName, function(price) {
      const table = document.getElementById("display").getElementsByTagName("tbody")[0];
      let existingRow = null;

      for (let i = 0; i < table.rows.length; i++) {
          if (table.rows[i].cells[0].textContent === productName) {
              existingRow = table.rows[i];
              break;
          }
      }

      if (existingRow) {
          const existingQuantity = parseInt(existingRow.cells[2].textContent);
          const newQuantity = existingQuantity + quantity;
          existingRow.cells[2].textContent = newQuantity; // Update quantity
          existingRow.cells[3].textContent = (price * newQuantity).toFixed(2); // Update total price
      } else {
          addToTable(productName, price, quantity);
      }

      updateTotalPrice(); // Update the total price after adding/updating
  });
}

function fetchProductPrice(productName, callback) {
  $.ajax({
      url: 'get_price.php',
      method: 'POST',
      data: { product_name: productName },
      success: function(response) {
          callback(parseFloat(response));
      },
      error: function() {
          alert('Error fetching product price.');
      }
  });
}

function addToTable(productName, price, quantity) {
    const table = document.getElementById("display").getElementsByTagName("tbody")[0];
    let row = table.insertRow();
    row.innerHTML = `
        <td>${productName}</td>
        <td>${price.toFixed(2)}</td>
        <td><input type='number' value='${quantity}' min='1' onchange='updateRowTotal(this)'/></td>
        <td>${(price * quantity).toFixed(2)}</td>
        <td><button onclick="removeItem(this)">Delete</button></td>
    `;
}

function updateRowTotal(input) {
    const row = input.parentNode.parentNode; // Get the row containing the input
    const price = parseFloat(row.cells[1].textContent); // Get the product price
    const quantity = parseInt(input.value); // Get the new quantity from the input
    const totalCell = row.cells[3]; // Get the total price cell

    if (quantity < 1) {
        alert("Quantity must be 1 or more.");
        input.value = 1; // Reset to 1 if invalid
        return;
    }

    const newTotal = (price * quantity).toFixed(2); // Calculate new total
    totalCell.textContent = newTotal; // Update total price in the table
    updateTotalPrice(); // Update the overall total price
}

function removeItem(button) {
  const row = button.parentNode.parentNode;
  row.parentNode.removeChild(row);
  updateTotalPrice();
}

function updateTotalPrice() {
  const table = document.getElementById("display").getElementsByTagName("tbody")[0];
  const rows = table.rows;
  let total = 0;

  for (let i = 0; i < rows.length; i++) {
      total += parseFloat(rows[i].cells[3].textContent);
  }

  document.getElementById("total_price").textContent = total.toFixed(2);
  document.getElementById("totalPriceInput").value = total.toFixed(2);
}

function showPopupForm() {
  if (isTableEmpty()) {
      alert("Please add a product first.");
      return;
  }
  $('#popupForm').modal('show');
}

function isTableEmpty() {
  return document.getElementById("display").getElementsByTagName("tbody")[0].rows.length === 0;
}

function saveTransaction() {
  const transactionData = {
      transactionNumber: document.getElementById("transactionNumber").textContent,
      transactionDate: document.getElementById("transactionDate").textContent,
      supplierName: document.getElementById("supplier").value,
      totalAmount: document.getElementById("total_price").textContent,
      products: gatherProducts()
  };

  $.ajax({
      url: 'save.php',
      method: 'POST',
      data: transactionData,
      success: function(response) {
        try {
            const res = JSON.parse(response);
            if (res.success) {
                window.location.href = 'purchase_order.php';
            } else {
                alert(res.message);
            }
        } catch (e) {
            console.error('Invalid JSON response:', response);
            alert('Error processing the response.');
        }
    },
    
      error: function(jqXHR, textStatus, errorThrown) {
          console.error("AJAX error: ", textStatus, errorThrown);
          alert("Error saving transaction.");
      }
  });
}

function gatherProducts() {
  const table = document.getElementById("display").getElementsByTagName("tbody")[0];
  const rows = table.rows;
  let products = [];

  for (let i = 0; i < rows.length; i++) {
      products.push({
          name: rows[i].cells[0].textContent,
          price : rows[i].cells[1].textContent,
          quantity: rows[i].cells[2].textContent
      });
  }

  return JSON.stringify(products);
}