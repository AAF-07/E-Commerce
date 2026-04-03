import './bootstrap';

window.showTab = function(tabId) {
    // Sembunyikan semua konten tab
    const tabContents = document.querySelectorAll('.tab-content');
    tabContents.forEach(content => content.classList.add('hidden'));

    // Tampilkan konten tab yang dipilih
    const selectedTab = document.getElementById(tabId);
    if (selectedTab) {
        selectedTab.classList.remove('hidden');
    }
}

// Tampilkan tab pertama secara default saat halaman dimuat
document.addEventListener('DOMContentLoaded', () => {
    showTab('biodata');
});

// Handle quantity input counter
const decrementBtn = document.getElementById('decrement-button');
const incrementBtn = document.getElementById('increment-button');
const quantityInput = document.getElementById('quantity-input');
const quantityForm = document.getElementById('quantity-form');
if (decrementBtn && incrementBtn && quantityInput) {
    decrementBtn.addEventListener('click', (e) => {
        e.preventDefault();
        let value = parseInt(quantityInput.value) || 1;
        if (value > 1) {
            quantityInput.value = value - 1;
            if (quantityForm) quantityForm.value = quantityInput.value;
        }
    });
    incrementBtn.addEventListener('click', (e) => {
        e.preventDefault();
        let value = parseInt(quantityInput.value) || 1;
        if (value < 50) {
            quantityInput.value = value + 1;
            if (quantityForm) quantityForm.value = quantityInput.value;
        }
    });
    // Sinkronkan quantity saat form disubmit
    const cartForm = document.querySelector('form[action*="cart/add"]');
    if (cartForm) {
        cartForm.addEventListener('submit', () => {
            if (quantityForm) {
                quantityForm.value = quantityInput.value;
            }
        });
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const checkboxes = document.querySelectorAll('.item-checkbox');
    const qtyMinusButtons = document.querySelectorAll('.qty-minus');
    const qtyPlusButtons = document.querySelectorAll('.qty-plus');

    function updateSummary() {
        let totalItems = 0;
        let totalPrice = 0;

        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                totalItems++;
                totalPrice += parseFloat(checkbox.getAttribute('data-price'));
            }
        });

        document.getElementById('total-items').textContent = totalItems;
        document.getElementById('total-price').textContent = 'Rp. ' + totalPrice.toLocaleString('id-ID');
        document.getElementById('final-price').textContent = 'Rp. ' + totalPrice.toLocaleString('id-ID');
    }

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateSummary);
    });

    qtyMinusButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            // Logic untuk kurangi qty bisa ditambahkan di sini
        });
    });

    qtyPlusButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            // Logic untuk tambah qty bisa ditambahkan di sini
        });
    });
});

//cart page
document.addEventListener('DOMContentLoaded', () => {
    const checkboxes = document.querySelectorAll('.item-checkbox');
    const qtyDecrementButtons = document.querySelectorAll('.qty-decrement');
    const qtyIncrementButtons = document.querySelectorAll('.qty-increment');
    const quantityInputs = document.querySelectorAll('.quantity-input');

    function updateSummary() {
        let totalItems = 0;
        let totalPrice = 0;

        const checkedItems = document.querySelectorAll('.item-checkbox:checked');

        checkedItems.forEach(checkbox => {
            const rowId = checkbox.dataset.rowId; // ✅ definisi di sini

            const quantityInput = document.querySelector(`.quantity-input[data-row-id="${rowId}"]`);
            if (!quantityInput) return;

            const price = parseFloat(checkbox.dataset.price);
            const qty = parseInt(quantityInput.value);

            if (isNaN(qty)) return;


            totalItems += qty;
            totalPrice += price * qty;

            console.log('rowId:', rowId, 'qty:', qty); // ✅ aman di sini
        });

        document.getElementById('total-items').textContent = totalItems;
        document.getElementById('total-price').textContent =
            totalItems > 0 ? 'Rp. ' + totalPrice.toLocaleString('id-ID') : 'Rp. 0';

        document.getElementById('final-price').textContent =
            totalItems > 0 ? 'Rp. ' + totalPrice.toLocaleString('id-ID') : 'Rp. 0';
    }

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', (e) => {
            requestAnimationFrame(() => {
                updateSummary();
            });
        });
    });

    function updateItemPrice(rowId) {
        const quantityInput = document.querySelector(`.quantity-input[data-row-id="${rowId}"]`);
        const priceElement = document.querySelector(`.item-total-price[data-row-id="${rowId}"]`);
        const price = parseFloat(priceElement.getAttribute('data-price'));
        const qty = parseInt(quantityInput.value);
        if (isNaN(qty)) return;        const totalPrice = price * qty;

        priceElement.textContent = 'Rp. ' + totalPrice.toLocaleString('id-ID');
        updateSummary();
    }



    qtyDecrementButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            const rowId = button.getAttribute('data-row-id');
            const quantityInput = document.querySelector(`.quantity-input[data-row-id="${rowId}"]`);
            let qty = parseInt(quantityInput.value);
            if (isNaN(qty) || qty < 1) qty = 1;

            if (qty > 1) {
                qty--;
                quantityInput.value = qty;
                updateItemPrice(rowId);
            }
        });
    });

    qtyIncrementButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            const rowId = button.getAttribute('data-row-id');
            const quantityInput = document.querySelector(`.quantity-input[data-row-id="${rowId}"]`);
            let qty = parseInt(quantityInput.value);
            if (isNaN(qty) || qty < 1) qty = 1;

            qty++;
            quantityInput.value = qty;
            updateItemPrice(rowId);
        });
    });

    quantityInputs.forEach(input => {
        input.addEventListener('change', () => {
            const rowId = input.getAttribute('data-row-id');
            updateItemPrice(rowId);
        });
    });

    updateSummary();
});

