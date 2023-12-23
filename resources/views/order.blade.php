@extends('layouts.master')

@section('title', 'Order')

@section('content')

<div class="row my-5">
    <div class="col-12 px-5">
        <form action="{{ route('createOrder') }}" method="POST">
            @csrf
            <div class="mb-3 col-md-12 col-sm-12">
                <label for="status" class="form-label">Status Pembayaran</label>
                <select class="form-control" id="status" name="status" value="{{ old('status') }}">
                    <option disabled selected>Pilih Status</option>
                    <option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
                    <option value="Selesai">Selesai</option>
                </select>
            </div>

            <div id="items-container">
                <div class="item">
                    <br>
                    <label for="items[0][item_id]">Item:</label>
                    <select class="form-control" name="items[0][item_id]" required onchange="updateTotal()">
                        <option disabled selected value>Pilih Item</option>
                        @foreach ($items as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }} | Rp. {{ $item->harga }}</option>
                        @endforeach
                    </select>
                    <label for="items[0][quantity]">Quantity:</label>
                    <input class="form-control" type="number" name="items[0][quantity]" min="1" required onchange="updateTotal()">
                </div>
            </div>
            <br>
            <div class="d-flex justify-content-between" id="total-container">
                <table cellpadding="5">
                    <tr>
                        <td>
                            Subtotal
                        </td>
                        <td>: <span id="subtotal"><b>Rp. 0.00</b></span></td>
                    </tr>
                    <tr>
                        <td>
                            Pajak 11%
                        </td>
                        <td>: <span id="pajak"><b>Rp. 0.00</b></span></td>
                    </tr>
                    <tr>
                        <td>
                            Total Harga
                        </td>
                        <td>: <span id="total"><b>Rp. 0.00</b></span></td>
                    </tr>
                </table>
                {{-- <p>Subtotal : <span id="subtotal"><b>Rp. 0.00</b></span><br><br>
                Pajak 11% : <span id="pajak"><b>Rp. 0.00</b></span><br><br>
                Total Harga : <span id="total"><b>Rp. 0.00</b></span></p> --}}
            </div>
            <br>
            <button class="btn btn-success" type="button" onclick="addItem()">Add Item</button>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
</div>

<script>
    let itemCounter = 1;

function addItem() {
    const container = document.getElementById("items-container");
    const newItem = document.createElement("div");
    newItem.className = "item";

    newItem.innerHTML = `
                <hr>
                <label for="items[${itemCounter}][item_id]">Item:</label>
                <select class="form-control" name="items[${itemCounter}][item_id]" required onchange="updateTotal()">
                    <option disabled selected>Pilih Item</option>
                    @foreach ($items as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }} | Rp. {{ $item->harga }}</option>
                     @endforeach
                </select>

                <label for="items[${itemCounter}][quantity]">Quantity:</label>
                <input class="form-control" type="number" name="items[${itemCounter}][quantity]" min="1" required onchange="updateTotal()">
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
    document.getElementById("subtotal").innerHTML =
        "<strong>Rp. " + subtotal.toFixed(2) + "</strong>";
    document.getElementById("pajak").innerHTML =
        "<strong>Rp. " + tax.toFixed(2) + "</strong>";
    document.getElementById("total").innerHTML =
        "<strong>Rp. " + total.toFixed(2) + "</strong>";

    updateSelectedOptions();
}
</script>
@endsection
