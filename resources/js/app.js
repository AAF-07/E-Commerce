import './bootstrap';

window.showTab = function(tabId) {
    // 1. Sembunyikan semua konten tab
    const tabContents = document.querySelectorAll('.tab-content');
    tabContents.forEach(content => content.classList.add('hidden'));

    // 2. Tampilkan tab yang dipilih
    const selectedTab = document.getElementById(tabId);
    if (selectedTab) {
        selectedTab.classList.remove('hidden');
    }

    // 3. Update Style Menu Sidebar
    // Kita cari semua LI di dalam sidebar profil
    const menuItems = document.querySelectorAll('ul.space-y-3 li');
    menuItems.forEach(item => {
        // Reset semua ke gaya default (abu-abu)
        item.classList.remove('font-semibold', 'underline', 'text-teal-500');
        item.classList.add('text-gray-600');
    });

    // 4. Highlight menu yang aktif
    // Kita cari berdasarkan ID yang kita buat tadi (menu-biodata, menu-alamat, dll)
    let activeMenu = document.getElementById('menu-' + tabId);

    // Jika tabId adalah sub-tab (seperti editProfile atau editAlamat), 
    // kita highlight menu utamanya
    if (tabId === 'editProfile') activeMenu = document.getElementById('menu-biodata');
    if (tabId === 'editAlamat' || tabId === 'tambahAlamat') activeMenu = document.getElementById('menu-alamat');

    if (activeMenu) {
        activeMenu.classList.add('font-semibold', 'underline', 'text-teal-500');
        activeMenu.classList.remove('text-gray-600');
    }
}

// Tambahkan fungsi markRead ke window agar bisa dipanggil dari onclick di Blade

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

    const cartForm = document.querySelector('form[action*="cart/add"]');
    if (cartForm) {
        cartForm.addEventListener('submit', () => {
            if (quantityForm) {
                quantityForm.value = quantityInput.value;
            }
        });
    }
}

// ============= CART PAGE LOGIC =============
// Only initialize if checkout-btn exists (cart page only)
const checkoutBtn = document.getElementById('checkout-btn');

if (checkoutBtn) {
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
                const rowId = checkbox.dataset.rowId;
                const quantityInput = document.querySelector(`.quantity-input[data-row-id="${rowId}"]`);

                if (!quantityInput) return;

                const price = parseFloat(checkbox.dataset.price);
                const qty = parseInt(quantityInput.value);

                if (isNaN(qty)) return;

                totalItems += qty;
                totalPrice += price * qty;
            });

            const totalItemsEl = document.getElementById('total-items');
            const totalPriceEl = document.getElementById('total-price');
            const finalPriceEl = document.getElementById('final-price');

            if (totalItemsEl) {
                totalItemsEl.textContent = totalItems;
            }
            if (totalPriceEl) {
                totalPriceEl.textContent = totalItems > 0 ? 'Rp. ' + totalPrice.toLocaleString('id-ID') : 'Rp. 0';
            }
            if (finalPriceEl) {
                finalPriceEl.textContent = totalItems > 0 ? 'Rp. ' + totalPrice.toLocaleString('id-ID') : 'Rp. 0';
            }
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

            if (!quantityInput || !priceElement) return;

            const price = parseFloat(priceElement.getAttribute('data-price'));
            const qty = parseInt(quantityInput.value);

            if (isNaN(qty)) return;

            const totalPrice = price * qty;
            priceElement.textContent = 'Rp. ' + totalPrice.toLocaleString('id-ID');
            updateSummary();
        }

        qtyDecrementButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                const rowId = button.getAttribute('data-row-id');
                const quantityInput = document.querySelector(`.quantity-input[data-row-id="${rowId}"]`);

                if (!quantityInput) return;

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

                if (!quantityInput) return;

                let qty = parseInt(quantityInput.value);
                if (isNaN(qty) || qty < 1) qty = 1;

                if (qty < 50) {
                    qty++;
                    quantityInput.value = qty;
                    updateItemPrice(rowId);
                }
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

    // Checkout button handler (cart page only)
    checkoutBtn.addEventListener('click', function() {
        const checkedItems = Array.from(document.querySelectorAll('.item-checkbox:checked')).map(cb => cb.dataset.rowId);

        if (checkedItems.length === 0) {
            alert('Pilih minimal satu produk untuk checkout!');
            return;
        }

        const checkedItemsInput = document.getElementById('checked-items');
        if (checkedItemsInput) {
            checkedItemsInput.value = JSON.stringify(checkedItems);
        }

        const checkoutForm = document.getElementById('checkout-form');
        if (checkoutForm) {
            checkoutForm.submit();
        }
    });
}

//checkout
