@include('Layout.layout')
<nav class="flex gap-6 font-semibold items-center justify-center py-4">
    <a href="/admin/dashboard"
       class="hover:text-teal-500">
        Home
    </a>
    <a href="/admin/report" class="hover:text-teal-500">
        Report
    </a>
    <a href="/admin/staff" class="hover:text-teal-500">
        Staff
    </a>
    <a href="/admin/backup" class="hover:text-teal-500">
        Back Up
    </a>
</nav>
@section('content')

<div class="max-w-5xl mx-auto px-6 py-10">

    <h1 class="text-3xl font-bold text-center mb-10">
        Laporan Pengguna
    </h1>

    <div class="bg-white border border-red-400 rounded-xl p-10 shadow-sm">

        <!-- Top Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-start">

            <!-- Cover -->
            <div>
                @if ($report->produk )
                    <img src="{{ asset('storage/' . $report->produk->gambar_produk) }}" class="w-24 rounded" alt="Product Image">

                    <h2 class="text-xl font-semibold mt-6">
                        {{ $report->produk->nama_produk }}
                    </h2>
                @else
                    <div class="w-24 h-24 bg-gray-200 rounded flex items-center justify-center text-gray-500">
                        No Image
                    </div>

                    <div>
                        <h2 class="text-xl font-semibold mt-6">
                            Produk tidak tersedia
                        </h2>
                    </div>
                @endif


                <p class="text-lg mt-2">
                    Rp. {{ number_format($report->order->total_amount, 0, ',', '.') }}
                </p>
            </div>

            <!-- Detail Kiri -->
            <div class="space-y-3">
                <div>
                    <p class="text-gray-500">Status</p>
                    <p class="font-semibold">{{ $report->order->status }}</p>
                </div>

                <div>
                    <p class="text-gray-500">Pengiriman</p>
                    <p class="font-semibold">{{ $report->order->pengiriman }}</p>
                </div>

                <div>
                    <p class="text-gray-500">Tanggal pembelian</p>
                    <p class="font-semibold">{{ $report->order->created_at->format('d M Y') }}</p>
                </div>

                <div>
                    <p class="text-gray-500">Estimasi tiba</p>
                    <p class="font-semibold">{{ $report->order->created_at->addDays(3)->format('d M Y') }}</p>
                </div>

                <div>
                    <p class="text-gray-500">Pembayaran</p>
                    <p class="font-semibold">{{ $report->order->payment_method }}</p>
                </div>
            </div>

            <!-- Detail Kanan -->
            <div class="space-y-3 border-l md:pl-8">
                <div>
                    <p class="text-gray-500">Alamat</p>
                    <p class="font-semibold">{{ $report->order->alamat }}</p>
                </div>

                <div>
                    <p class="text-gray-500">No. Pesanan</p>
                    <p class="font-semibold">{{ $report->order->order_code }}</p>
                </div>

                <div>
                    <p class="text-gray-500">Nama</p>
                    <p class="font-semibold">{{ $report->user->name }}</p>
                </div>

                <div>
                    <p class="text-gray-500">Email</p>
                    <p class="font-semibold">{{ $report->user->email }}</p>
                </div>

                <div>
                    <p class="text-gray-500">No. Hp</p>
                    <p class="font-semibold">{{ $report->user->phone ?? 'Belum Ada' }}</p>
                </div>
            </div>

        </div>

        <!-- Laporan Text -->
        <div class="mt-10">
            <div class="border border-red-400 rounded-lg p-6 text-gray-700">
               {{ $report->laporan }}
            </div>
        </div>

        <!-- Button -->
        <div class="mt-10 text-center">
            <a href="/admin/report"
               class="bg-teal-500 hover:bg-teal-400 text-black font-semibold px-10 py-3 rounded-xl transition">
                Kembali
            </a>
        </div>

    </div>

</div>
