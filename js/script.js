// Delete checked products
function deleteProducts() {
    let cellArr = [];
    let cells = document.getElementsByClassName('cell');

    // checked divs 
    for (let i = 0; i < cells.length; i++) {
        let cell = cells[i];
        if (cell.children.length > 0 && cell.children[0].checked) {
            cellArr.push(cell.children[1].children[0].textContent);
        }
    }

    let jsonString = JSON.stringify(cellArr);

    $.ajax({
        type: 'POST',
        url: 'delete_product.php',
        data: { 'skuValArr': jsonString },
    });

    // refresh page
    refresh();
}

// Refresh browser window
function refresh() {
    setTimeout(function () {
        window.location.reload(true);
    }, 100);
}

// Fill dynamically changed form
function handleSelectChange(event) {
    let selectedElement = event.target;
    let selectedValue = selectedElement.value - 1;
    let attribDivsBox = document.getElementById("attribDiv");
    let attribDiv = attribDivsBox.children[selectedValue];

    // hide all variant of forms
    for (let i = 0; i < attribDivsBox.childElementCount; i++) {
        attribDivsBox.children[i].style.display = "none";
    }

    // make visible selected form variant 
    attribDiv.style.display = "block";

    // class for empty inputs
    let allInputsArr = attribDivsBox.getElementsByTagName("input");
    for (let a = 0; a < allInputsArr.length; a++) {
        allInputsArr[a].className = "";
    }

    let inputsArr = attribDiv.getElementsByTagName("input");
    for (let b = 0; b < inputsArr.length; b++) {
        inputsArr[b].className = "checkEmptyString";
    }
}

// Check empty inputs
function checkFields() {
    let attribBox = document.getElementsByClassName("checkEmptyString");
    let select = document.getElementById("productType");
    let msg = document.getElementById("errorMsg");
    msg.style.display = "none";
    let errorArr = [];

    // check sku for uniq
    let uniqSkuCode = checkSkuUniq(document.getElementById("sku").value);

    if (uniqSkuCode == false) {
        for (let a = 0; a < attribBox.length; a++) {
            if (attribBox[a].value == null || attribBox[a].value == "") {
                errorArr.push(attribBox[a].name);
            }
        }

        // check empty fields
        if (errorArr.length > 0) {
            msg.style.display = "inline-block";
            msg.textContent = "Please, submit required data: " + errorArr;

            // stop form submit
            event.preventDefault();
            event.stopPropagation();

            // check the type switcher 
        } else if (select.selectedIndex == 0) {
            msg.style.display = "inline-block";
            msg.textContent = "Please, select product type!" + errorArr;

            // stop form submit
            event.preventDefault();
            event.stopPropagation()
        }
    } else {
        msg.style.display = "inline-block";
        msg.textContent = "SKU code is not uniq! Please, change value!" + errorArr;
        event.preventDefault();
        event.stopPropagation();
    }
}

// Save SKU list to browser local storage
function saveSkuToStorage(Arr) {
    let skuValuesArr = JSON.parse(Arr);
    localStorage.clear();
    localStorage.setItem("sku_array", JSON.stringify(skuValuesArr));
}

// Check SKU existing
function checkSkuUniq(skuName) {
    let skuArr = JSON.parse(localStorage.getItem("sku_array"));
    let skuExist = false;
    for (let i = 0; i < skuArr.length; i++) {
        if (skuArr[i] == skuName) {
            skuExist = true;
        }
    }
    return skuExist;
}