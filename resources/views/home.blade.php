<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>



        <div class="row justify-content-center">
        <div class="col-md-4">
            <img src="https://www.dallalii.com/img/admin/logo.png" />
        </div>
        <div class="col-md-4">
        <div class="row">
        <h1>Nama </h1>
        <p>{{Auth::user()->name}}</p>
        <h1>Email</h1>
        <p>{{Auth::user()->email}}</p>
        <h1>Address</h1>
        <p>{{Auth::user()->address}}</p>
        <h1>Phone</h1>
        <p>{{Auth::user()->phone}}</p>
        
        </div>
        </div>
        </div>

    </div>
</div>

</x-app-layout>
