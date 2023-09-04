@extends('Maternal.layout1')
@section('content')
<div id="login" class="container card shadow-lg p-3 mb-5 bg-body-tertiary rounded">
    <div class="col">
        <div >
            <form class="row" method="POST" action="{{ route('login.user') }}">
                @csrf
                <h1 style="text-align: center">WELCOME BACK<br><h4 style="text-align: center">LOG IN</h4></h1>
                <div class="row pt-2">
                    <input class="form-control" type="text" name="username" placeholder="Username">
                </div>
                <div class="row pt-2">
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </div>
                <div class="row d-flex justify-content-center pt-2">
                    <button class="btn btn-outline-success btn-sm mb-2" type="submit">LOGIN</button>
                </div>
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-6">
                        <p class="text-center"><a href="{{ route('register.index')}}">Create an account</a></p>
                    </div>
                    <div class="col-3"></div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
