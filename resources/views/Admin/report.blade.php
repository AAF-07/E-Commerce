

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

<div class="max-w-5xl mx-auto px-6 py-8">

    <h1 class="text-3xl font-bold text-center mb-10">Laporan User</h1>

    <!-- Card 1 -->
    @foreach ($reported as $report)
    <div class="border border-red-400 rounded-xl p-6 mb-6 flex justify-between items-center">

        <div class="flex items-center gap-6">
                <div class="text-lg font-semibold">{{ $report->order_id }}</div>

        @if ($report->produk)
            <img src="{{ asset('storage/' . $report->produk->gambar_produk) }}" class="w-24 rounded" alt="Product Image">
        @else
            <div class="w-24 h-24 bg-gray-200 rounded flex items-center justify-center text-gray-500">
                No Image
            </div>
        @endif
            <div>
                <h2 class="text-xl font-semibold">{{ $report->produk->nama_produk ?? '-' }}</h2>
                <p>Rp. {{ number_format($report->order->total_amount, 0, ',', '.') }}</p>
                <p>Alamat : {{ $report->order->alamat }}</p>
                <p>User : {{ $report->user->name }}</p>
                <p>Pembayaran : {{ $report->order->payment_method }}</p>
            </div>


        </div>

        <div class="text-right">
            <a href="/admin/report_detail/{{ $report->id }}" class="bg-red-500 text-white px-6 py-2 rounded-lg font-semibold">
                {{ $report->order->status }}
            </a>
            <p class="mt-3 font-semibold"> </p>
        </div>

    </div>
    @endforeach

</div>


