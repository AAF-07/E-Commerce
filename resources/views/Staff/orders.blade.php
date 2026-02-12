@include('Layout.layout')
<nav class="flex gap-6 font-semibold items-center justify-center py-4">
    <a href="/staff/dashboard"
       class="hover:text-teal-500 ">
        Home
    </a>
    <a href="/staff/products" class="hover:text-teal-500">
        Product
    </a>
    <a href="/staff/orders" class=" border-b-2 border-teal-500 pb-1">
        Orders
    </a>
</nav>
@section("content")
<h1>Orders</h1>


