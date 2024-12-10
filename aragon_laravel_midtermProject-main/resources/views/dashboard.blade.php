<x-app-layout>
<div class="flex flex-col py-3 px-5 h-full relative">
    <div class=" py-5">
    <h1 class=" font-semibold flex items-center space-x-2"><span class="text-4xl text-[#F57703]"><ion-icon name="bag-handle"></ion-icon></span>
        <span class="text-3xl text-slate-800 font-extrabold">Product Form Management</span>
    </h1>
</div>

   @if(session('success'))
   <script>
    alert("{{session('success')}}")
</script>

   @endif
    <form  method="POST" action="{{route('product.store')}}" class="w-full shadow pt-7 px-3 flex flex-col space-y-5 py-6">
        @csrf
        <div class="justify-between flex items-center">
        <h1 class=" font-semibold flex items-center space-x-1"><span class="text-xl text-[#F57703]"><ion-icon name="add-circle"></ion-icon></span>
            <span class="text-md text-slate-800 font-extrabold">STORE PRODUCT</span>
        </h1>
        <button type="submit" class="rounded-sm flex items-center space-x-1 py-2 px-4 bg-[#F57703] text-white font-bold"><span>
            <ion-icon name="add"></ion-icon></span>
            <span>Create Product</span>
        </button>
    </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 w-full">
                <input required type="text" id="product_name" name="product_name" placeholder="Product Name" class="p-2 rounded-md border border-[#F57703]"/>
                <input required type="text" id="category" name="category" placeholder="Category" class="p-2 rounded-md border border-[#F57703]"/>
                <input required type="number" id="price" name="price" min="1" step="any" placeholder="Price" class="p-2 rounded-md border border-[#F57703]"/>
                <input required type="number" id="stock_quantity" name="stock_quantity" placeholder="Stock Quantity" class="p-2 rounded-md border border-[#F57703]"/>
                <input required type="string" id="manufacturer" name="manufacturer" placeholder="Manufacturer" class="p-2 rounded-md border border-[#F57703] col-span-1 md:col-span-2"/>
                <textarea required type="text" id="description" name="description" placeholder="Product Description" class="p-2 rounded-md border border-[#F57703] col-span-1 md:col-span-3"></textarea>

        </div>
    </form>
    <div class="pt-5">
    <h1 class="text-slate-900 font-semibold text-xl text-start flex items-center space-x-1 pb-3">
        <span class="text-2xl flex items-center justify-center text-[#F57703]"><ion-icon name="list-circle"></ion-icon></span>
        <span class="text-lg">
        List of Products</span></h1>
    <table class="w-full border border-slate-900/50 pt-2">
        <thead>
        <tr>
            <th class="p-3 border border-[#F57703]">#</th>
            <th class="p-3 border border-[#F57703]">Product Name</th>
            <th class="p-3 border border-[#F57703]">Category</th>
            <th class="p-3 border border-[#F57703]">Price</th>
            <th class="p-3 border border-[#F57703]">Stock Quantity</th>
            <th class="p-3 border border-[#F57703]">Description</th>
            <th class="p-3 border border-[#F57703]">Manufacturer</th>
            <th class="p-3 border border-[#F57703]">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $key => $product)
            <tr class="text-center">
                <td class="p-3 border border-[#F57703] font-extrabold text-[#F57703]">{{$key + 1}}</td>
                <td class="p-3 border border-[#F57703]">{{$product->product_name}}</td>
                <td class="p-3 border border-[#F57703]">{{$product->category}}</td>
                <td class="p-3 border border-[#F57703]">{{$product->price}}</td>
                <td class="p-3 border border-[#F57703]">{{$product->stock_quantity}}</td>
                <td class="p-3 border border-[#F57703]">{{$product->description}}</td>
                <td class="p-3 border border-[#F57703]">{{$product->manufacturer}}</td>
                <td class="border border-slate-900/50">
                    <div class="w-full flex space-x-1 items-center justify-center">

                    <a href={{route('product.edit', $product->id)}} type="submit" type="submit" class="text-[#F57703] text-sm flex items-center justify-center rounded-sm py-1.5 px-2 border-[#F57703] border">
                        <ion-icon name="create"></ion-icon>
                    </a>
                    <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-white text-sm flex items-center justify-center rounded-sm py-1.5 px-2 bg-[#F57703]">
                            <ion-icon name="close-circle"></ion-icon>
                        </button>
                    </form>
                </div>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
</x-app-layout>
