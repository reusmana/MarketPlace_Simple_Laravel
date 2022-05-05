@extends('layouts.app')

@section('content')

<h1>INI PAGE SHOP</h1>

<div class="container">
    <div class="row">
        <div class="col-md-4">
              <div class="list-group">
                  <h3>Category</h3>
                  <a href="/index-shop" class="list-group-item list-group-item-action" aria-current="true">
                    All
                  </a>
                  @foreach($categories as $item)
                  <li class="list-group-item list-group-item-action {{$item->id == $id ? 'active' : ''}}" >
                    <a href="/category/{{$item->id}}" style="color: black; text-decoration:none">{{$item->name}}</a>
                  </li>

                  @endforeach
                </div>
            

              <form class="d-flex mt-4">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
        </div>

        <div class="col-md-8">
            <h3>Our Product</h3>
            <hr>
            <div class="row">
                
                @foreach ($products as $product)
                <div class="col-md-4 mt-4 ">
                  <div class="card p-3" style="width: 18rem; justify-content: center; border: 5px solid black">
                      <a href="/show/{{$product->id }}">
                      <img src="{{asset($product->image)}}" class="card-img-top" alt="..."></a>
                      <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <p class="card-text">Rp. {{number_format($product->price)}}</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                      </div>
                    </div>
              </div>
                    
                @endforeach
               
                
              </div>
              <div class="mt-3">
              {{$products->links()}}
              </div>
            </div>
          </div>
</div>





@endsection