<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

    @php
    $total = 0; 
        @endphp 

    <div class="container">
        <h1>Anda melakukan transaction : </h1>
        <table class="table">
            <thead>
                <tr>
                <th>No</th>
                <th>Nama Product</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Total harga</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($productsMail as $productMail)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$productMail->product->name}}</td>
                    <td>Rp. {{number_format($productMail->product->price)}}</td>
                    <td>{{$productMail->qty}}</td>
                    <td>Rp. {{number_format($productMail->qty * $productMail->product->price)}}</td>
                </tr>

                @php
                $total += ($productMail->qty * $productMail->product->price);
            @endphp
                @endforeach

            </tbody>
        </table>
        
        <h1>Total Pemesanannya : Rp. {{number_format($total)}}</h1>
    </div>
    
</body>
</html>