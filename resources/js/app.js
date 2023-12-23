import "./bootstrap";

let itemCounter = 1;

function addItem() {
    const container = document.getElementById("items-container");
    const newItem = document.createElement("div");
    newItem.className = "item";

    newItem.innerHTML = `
                <hr>
                <label for="items[${itemCounter}][item_id]">Item:</label>
                <select class="form-control" name="items[${itemCounter}][item_id]" required>
                    <option disabled selected value>-- Select Item --</option>
                    @foreach ($items as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }} | Rp. {{ $item->harga }}</option>
                     @endforeach
                </select>

                <label for="items[${itemCounter}][quantity]">Quantity:</label>
                <input class="form-control" type="number" name="items[${itemCounter}][quantity]" min="1" required>
            `;

    container.appendChild(newItem);
    itemCounter++;

    updateTotal();
    updateSelectedOptions();
}

function updateSelectedOptions() {
    const allSelects = document.querySelectorAll(
        '[name^="items["][name$="[item_id]"]'
    );

    allSelects.forEach((select) => {
        const selectedValue = select.value;

        if (selectedValue !== "-- Select Item --") {
            // Disable the selected option in other dropdowns
            allSelects.forEach((otherSelect) => {
                if (otherSelect !== select) {
                    const optionToDisable = otherSelect.querySelector(
                        `option[value="${selectedValue}"]`
                    );
                    if (optionToDisable) {
                        optionToDisable.disabled = true;
                    }
                }
            });
        }
    });
}

function updateTotal() {
    // Get all quantity and price elements
    const quantities = document.querySelectorAll(
        '[name^="items["][name$="[quantity]"]'
    );
    const prices = document.querySelectorAll(
        '[name^="items["][name$="[item_id]"]'
    );

    let subtotal = 0;

    // Calculate the total based on quantity and price
    for (let i = 0; i < quantities.length; i++) {
        const quantity = parseFloat(quantities[i].value) || 0;
        const price =
            parseFloat(prices[i].selectedOptions[0].text.split("Rp. ")[1]) || 0;
        subtotal += quantity * price;
    }
    const pajak = 0.11;
    const tax = subtotal * pajak;

    const total = subtotal + tax;

    // Update the total display
    document.getElementById("total").innerHTML =
        "<strong>Rp. " + total.toFixed(2) + "</strong>";

    updateSelectedOptions();
}
