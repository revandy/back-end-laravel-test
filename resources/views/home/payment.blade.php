@extends('home/layout')
@section('content')
<form action="{{ route('transaction') }}" method="POST" class="form-horizontal">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-12">
            <h3>Pay your order</h3>
            <div class="form-group">
                <input value="{{ $id_transaction }}" disabled required placeholder="Order Number" name="id_transaction" type="number" class="form-control">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Pay Now</button>
</form>
@endsection