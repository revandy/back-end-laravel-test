@extends('home/layout')
@section('content')
<h3>Order History</h3>
<form method="GET" action="">
    <div class="form-group">
        <div class="col-md-6">
            <input placeholder="ID ORDER" name="id_transaction" type="text" class="form-control">
        </div>
    </div>
</form>
<div class="col-md-12">
    <table class="table">
        <tr>
            <th>ID ORDER</th>
            <th>Biaya</th>
            <th>Produk</th>
            <th>Action</th>
        </tr>
        @foreach($history as $h)
        <tr>
            <td>{{ $h->id_transaction }}</td>
            <td>{{ $h->product_value }}</td>
            <td>{{ $h->product_name }}</td>
            <td>
                @if ($h->status == 'Pending')
                <form method="POST" class="form" action="{{ route('pay-now') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="id_transaction" value="{{ $h->id_transaction }}">
                    <button class="btn btn-primary">Pay now</button>
                </form>
                @else
                    {{ $h->status }}
                @endif
            </td>
        </tr>
        @endforeach
       
    </table>
    
</div>

@endsection