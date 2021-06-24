@extends('login/layout')
@section('title', 'Register')
@section('body')
<div class="container">
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
    <div id="login-row" class="row justify-content-center align-items-center">
        <div id="login-column" class="col-md-6">
            <div class="box">
                <div class="shape1"></div>
                <div class="shape2"></div>
                <div class="shape3"></div>
                <div class="shape4"></div>
                <div class="shape5"></div>
                <div class="shape6"></div>
                <div class="shape7"></div>
                <div class="shape7"></div>
                <div class="float">
                    <form method="POST" class="form" action="{{ route('register-process') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="username" class="text-white">Name:</label><br>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-white">Email:</label><br>
                            <input required type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-white">Password:</label><br>
                            <input min="6" type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endsection
@section('css')
 <style>
    .box {
        width: 500px;
        margin: 200px 0;
    }
    
    .shape1{
        position: relative;
        height: 150px;
        width: 150px;
        background-color: #0074d9;
        border-radius: 80px;
        float: left;
        margin-right: -50px;
    }
    .shape2 {
        position: relative;
        height: 150px;
        width: 150px;
        background-color: #0074d9;
        border-radius: 80px;
        margin-top: -30px;
        float: left;
    }
    .shape3 {
        position: relative;
        height: 150px;
        width: 150px;
        background-color: #0074d9;
        border-radius: 80px;
        margin-top: -30px;
        float: left;
        margin-left: -31px;
    }
    .shape4 {
        position: relative;
        height: 150px;
        width: 150px;
        background-color: #0074d9;
        border-radius: 80px;
        margin-top: -25px;
        float: left;
        margin-left: -32px;
    }
    .shape5 {
        position: relative;
        height: 150px;
        width: 150px;
        background-color: #0074d9;
        border-radius: 80px;
        float: left;
        margin-right: -48px;
        margin-left: -32px;
        margin-top: -30px;
    }
    .shape6 {
        position: relative;
        height: 150px;
        width: 150px;
        background-color: #0074d9;
        border-radius: 80px;
        float: left;
        margin-right: -20px;
        margin-top: -35px;
    }
    .shape7 {
        position: relative;
        height: 150px;
        width: 150px;
        background-color: #0074d9;
        border-radius: 80px;
        float: left;
        margin-right: -20px;
        margin-top: -57px;
    }
    .float {
        position: absolute;
        z-index: 2;
    }
    
    .form {
        margin-left: 145px;
    }
    </style>

@endsection
