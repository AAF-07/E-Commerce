@include('Layout.layout')

<nav class="flex gap-6 font-semibold items-center justify-center py-4">
    <a href="/admin/dashboard" class="hover:text-teal-500">Home</a>
    <a href="/admin/report" class="hover:text-teal-500">Report</a>
    <a href="/admin/staff" class="hover:text-teal-500">Staff</a>
    <a href="/admin/backup" class="hover:text-teal-500">Back Up</a>
</nav>

@section('content')

<div class="max-w-6xl mx-auto px-6 py-8">

    <h1 class="text-3xl font-bold text-center mb-10">Akun</h1>

    <div class="bg-white rounded-xl shadow-md overflow-hidden">

        <table class="min-w-full text-left border-collapse">

            <!-- HEADER -->
            <thead class="bg-teal-800 text-white">
                <tr>
                    <th class="px-6 py-4">No.</th>
                    <th class="px-6 py-4">Nama Lengkap</th>
                    <th class="px-6 py-4">Email</th>
                    <th class="px-6 py-4">Jumlah Order</th>
                    <th class="px-6 py-4">Aksi</th>
                </tr>
            </thead>

            <!-- BODY -->
            <tbody>
                @foreach($user as $i => $u)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $i + 1 }}</td>
                    <td class="px-6 py-4">{{ $u->name }}</td>
                    <td class="px-6 py-4">{{ $u->email }}</td>
                    <td class="px-6 py-4">5</td>
                    <td class="px-6 py-4">
                        <button class="text-red-500 hover:underline font-semibold">
                            Batasi
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>

</div>

