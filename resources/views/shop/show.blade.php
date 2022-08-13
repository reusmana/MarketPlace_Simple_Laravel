<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Details') }}
        </h2>
    </x-slot>

<div class="container mt-4">
    <h2>{{$product->name}}</h2>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <img src="{{asset($product->image)}}"/>
        </div>
        <div class="col-md-6">
            <h3>{{$product->desc}}</h3>
            <p></p>
        </div>
        <div class="col-md-3 p-4" style="border: 2px solid black">
            <p>Harga</p>
            <h3>Rp. {{number_format($product->price)}}</h3>

            
            {{-- untuk menginput product ke cart --}}
            <form action="/store" method="POST"> 
                @csrf
            <input type="hidden" value="{{$product->id}}" name="item_id">
            <input type="submit" value="add to cart" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
</x-app-layout>