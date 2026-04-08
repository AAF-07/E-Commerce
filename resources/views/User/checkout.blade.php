@extends('User.Layout.layout')

@section('content')
<div class="px-10 py-6">

    <!-- title -->
    <h1 class="text-3xl font-bold mb-6">Checkout</h1>

    <div class="grid grid-cols-2 gap-10">

        <!-- LEFT -->
        <div class="space-y-6">

            <!-- alamat -->
            <div class="bg-gray-100 rounded-xl shadow p-5">
                <h2 class="text-lg font-semibold mb-2">Alamat</h2>

                <p class="text-gray-600 mb-3">
                    {{ $alamat ?? 'Belum ada alamat yang tersimpan. Silakan buat alamat pengiriman.' }}
                </p>

                <!-- Modal toggle -->
                <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="text-black bg-[#3BC1A8] box-border border border-transparent hover:bg-[#249E94] focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none" type="button">
                    Buat Alamat
                </button>

                <!-- Main modal -->
                <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-100 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                                <h3 class="text-lg font-medium text-heading">Masukan Alamat Pengiriman</h3>
                                <button type="button" class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center" data-modal-hide="authentication-modal">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/></svg>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form action="{{ route('checkout.alamat.add') }}" method="POST" class="pt-4 my-0 md:pt-6">
                                @csrf
                                <div class="mb-4">
                                    <label for="alamat" class="block mb-2.5 text-sm font-medium text-heading">Alamat</label>
                                    <input type="text" id="alamat" name="alamat" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Masukkan alamat lengkap" required />
                                </div>
                                <button type="submit" class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                                    Simpan Alamat
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- pesanan -->
            <div class="bg-gray-100 rounded-xl shadow p-5">
                <h2 class="text-lg font-semibold mb-4">Pesanan</h2>
                @forelse ($selectedItems as $item)
                    <div class="flex gap-5 items-center mb-4">
                        <img src="{{ asset('storage/' . $item->options['image']) }}" class="w-20 h-28 object-cover rounded">
                        <div>
                            <h3 class="text-lg font-semibold">{{ $item->name }}</h3>
                            <p>Rp. {{ number_format($item->price, 0, ',', '.') }}/barang</p>
                            <p class="text-gray-600">Qty: {{ $item->qty }}</p>
                            <p class="font-semibold text-teal-600">Subtotal: Rp. {{ number_format($item->price * $item->qty, 0, ',', '.') }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-600">Tidak ada item dalam pesanan.</p>
                @endforelse
            </div>

        </div>

        <!-- RIGHT -->
        <div class="bg-gray-100 rounded-xl shadow p-5 h-fit">

            <!-- pengiriman -->
            <h2 class="text-lg font-semibold mb-3">Pengiriman</h2>

            <select id="shipping-method" name="pengiriman" class="w-full border rounded-lg px-3 py-2 mb-5">
                <option value="">Pilih Pengiriman</option>
                <option name="pengiriman" value="jne">JNE</option>
                <option name="pengiriman" value="jt">J&T</option>
                <option name="pengiriman" value="sicepat">SiCepat</option>
                <option name="pengiriman" value="kurir_kami">Kurir Kami</option>
            </select>

            <!-- ringkasan -->
            <h2 class="text-lg font-semibold mb-2">Ringkasan Belanja</h2>

            <div class="flex justify-between text-gray-700">
                <span>Total Harga (<span id="total-items">{{ $selectedItems->count() }}</span> barang)</span>
                <span id="summary-price">Rp. {{ number_format($totalPrice, 0, ',', '.') }}</span>
            </div>

            <div class="flex justify-between text-gray-700">
                <span>Biaya Pengiriman</span>
                <span id="shipping-cost">Rp. 0</span>
            </div>

            <div class="flex justify-between text-gray-700 mb-3">
                <span>Diskon</span>
                <span>Rp. 0</span>
            </div>

            <hr class="mb-3">

            <div class="flex justify-between font-semibold text-lg mb-4">
                <span>Total</span>
                <span id="final-total">Rp. {{ number_format($totalPrice, 0, ',', '.') }}</span>
            </div>

            <button id="pay-button" class="w-full bg-teal-500 text-white py-2 rounded-lg hover:bg-teal-600">
                Beli
            </button>

        </div>

    </div>
</div>

<script>
    const basePrice = {{ $totalPrice }};
    const snapToken = '{{ $snapToken }}';

    document.getElementById('shipping-method').addEventListener('change', function() {
        let shippingCost = 0;
        if (this.value) {
            shippingCost = 5000;
        }

        const finalTotal = basePrice + shippingCost;

        document.getElementById('shipping-cost').textContent = 'Rp. ' + shippingCost.toLocaleString('id-ID');
        document.getElementById('final-total').textContent = 'Rp. ' + finalTotal.toLocaleString('id-ID');
    });

    document.getElementById('pay-button').addEventListener('click', function() {
        const shippingMethod = document.getElementById('shipping-method').value;

        if (!shippingMethod) {
            alert('Pilih metode pengiriman terlebih dahulu!');
            return;
        }

        snap.pay(snapToken, {
            onSuccess: function(result) {
                window.location.href = '/checkout/finish?order_id=' 
                    + result.order_id 
                    + '&pengiriman=' + shippingMethod;
            },
            onPending: function(result) {
                window.location.href = '/checkout/pending?order_id=' + result.order_id;
            },
            onError: function(result) {
                window.location.href = '/checkout/error';
            },
            onClose: function() {
                console.log('User close popup');
            }
        });
    });
</script>

@endsection
