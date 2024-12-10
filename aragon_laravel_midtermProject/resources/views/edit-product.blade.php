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
        <form method="POST" action="{{route('product.edit', $product->id)}}" class="w-full shadow pt-7 px-3 flex flex-col space-y-5 py-6">
            @csrf
            @method("PATCH")
            <div class="justify-between flex items-center">
            <h1 class=" font-semibold flex items-center space-x-1"><span class="text-xl text-[#F57703]"><ion-icon name="create"></ion-icon></span>
                <span class="text-md text-slate-800 font-extrabold">UPDATE PRODUCT</span>
            </h1>
            <div class="space-y-2 flex-col flex justify-center">
                <a href={{route('dashboard')}} type="submit" class="rounded-sm flex items-center justify-center space-x-1 py-2 px-4 bg-[#F57703] text-white font-bold"><span class="flex items-center justify-center text-xl">
                    <ion-icon name="backspace"></ion-icon></span>
                    <span>Back</span>
                </a>
            <button type="submit" class="rounded-sm flex items-center space-x-1 py-2 px-4 bg-[#F57703] text-white font-bold"><span  class="flex items-center justify-center text-xl">
                <ion-icon name="create"></ion-icon></span>
                <span>Update Product</span>
            </button>

        </div>
        </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3 w-full">
                    <input required type="text" id="product_name" name="product_name" placeholder="Product Name" value={{old('product_name', $product->product_name)}} class="p-2 rounded-md border border-[#F57703]"/>
                    <input required type="text" id="category" name="category" placeholder="Category" value={{old('category', $product->category)}} class="p-2 rounded-md border border-[#F57703]"/>
                    <input required type="number" id="price" name="price" min="1" step="any" placeholder="Price" value={{old('price', $product->price)}} class="p-2 rounded-md border border-[#F57703]"/>
                    <input required type="number" id="stock_quantity" name="stock_quantity" placeholder="Stock Quantity" value={{old('stock_quantity', $product->stock_quantity)}} class="p-2 rounded-md border border-[#F57703]"/>
                    <input required type="string" id="manufacturer" name="manufacturer" placeholder="Manufacturer" value={{old('manufacturer', $product->manufacturer)}} class="p-2 rounded-md border border-[#F57703] col-span-1 md:col-span-2" />
                    <textarea required type="text" id="description" name="description" placeholder="Product Description" class="p-2 rounded-md border border-[#F57703] col-span-1 md:col-span-3">{{old('description', $product->description)}}</textarea>

            </div>
        </form>
    </div>
    </x-app-layout>
