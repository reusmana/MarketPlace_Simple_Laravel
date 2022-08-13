<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cart') }}
        </h2>
    </x-slot>

<div class="container mt-4">
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
    @endif
    @if(Session::has('error'))
    <div class="alert alert-danger">
        {{Session::get('error')}}
    </div>
    @endif



    @php
        $total = 0;
    @endphp
    @if($carts->count() == 0)

    <p style="text-align:center; font-size: 20px">Your Cart Empty</p>
    @endif


    <div class="row">
        <h3>{{$carts->count()}} items product</h3>
        @foreach ($carts as $cart)
        <hr>
        <div class="col-md-3">
            <img src="{{asset('storage/images/product.jpg')}}" class="card-img-top"/>
        </div>
        <div class="col-md-9 ">
            <div class="d-flex justify-content-between">
            <h3>{{$cart->product->name}}</h3>
            <h4>Rp. {{number_format($cart->product->price)}}</h4>
            <select name="qty" class="quantity" data-item="{{$cart->id}}">
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{$i}}" {{$cart->qty == $i ? 'selected' : ''}}>{{$i}}</option>
                @endfor
                </select>

            <h3>Rp. {{number_format($cart->product->price * $cart->qty)}}</h3>
            </div>
            <hr>
            <div class="d-flex justify-content-between">
            <p>{{$cart->product->desc}}</p>
            <form action="" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Remove</button>
            </form>
            </div>

        </div>
        <hr>    
{{-- hitung total product dengan variabel baru yaitu php dalam laravel --}}
        @php
            $total += ($cart->product->price * $cart->qty); 
        @endphp
        @endforeach

    </div>
    <div class="totalz">
        <h4 class="total-price">Rp. {{number_format($total)}}</h4>
    </div>
    <form action="/checkout" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Checkout</button>
        </form>
</div>




<script type="text/javascript">
    (function(){
    const classname = document.querySelectorAll('.quantity');

    Array.from(classname).forEach(function(element){
     element.addEventListener('change', function(){
        const id = element.getAttribute('data-item');
        axios.patch(`/cart/${id}`, {
            quantity: this.value,
            id: id
          })
          .then(function (response) {
            //console.log(response);
            window.location.href = '/index-cart'
          })
          .catch(function (error) {
            console.log(error);
          });
   })
 })
    })();
</script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</x-app-layout>
