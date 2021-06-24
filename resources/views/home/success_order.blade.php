@extends('home/layout')
@section('content')
<h3>Success</h3>
<p>
    Order No: {{ $id_transaction }}
</p>
<p>
    Total: {{ $product_value }}
</p>
<center>
    <p>
        {{ $type_order }} {{ $product_name }} that costs {{ $product_value }} will be shipped to: 
    </p>
    <p>
        {{ $address }}
    </p>
</center>
<form method="POST" class="form" action="{{ route('payment-finish') }}">
    {{ csrf_field() }}
    <input name="id_transaction" type="hidden" value="{{ $id_transaction }}">
    <button class="btn btn-primary btn-block">Pay Now</button>
</form>

@endsection