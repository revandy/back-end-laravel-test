@extends('home/layout')
@section('content')
@if(session('errors'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Something it's wrong:
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
</ul>
</div>
@endif
@if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
                        </div>
@endif
@if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
@endif
<form action="{{ route('transaction') }}" method="POST" class="form-horizontal">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <input type="hidden" name="type_order" value="product">
                <textarea required placeholder="Product" name="product" type="text" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <textarea required placeholder="Shipping Address" name="address" type="text" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <input required placeholder="Price" name="price" type="number" class="form-control">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Submit</button>
</form>
@endsection