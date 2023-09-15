@extends('Maternal.layout1')
@section('content')
    <div id="login" class="container card shadow-lg bg-body-tertiary rounded">
        <div class="col">
            <form class="row" method="POST" action="{{ route('login.user') }}">
                @csrf
                <div class="row">
                    <h1 style="text-align: center">WELCOME BACK<br>
                        <h4 style="text-align: center">LOG IN</h4>
                    </h1>
                </div>
                <div class="row mt-2">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <input class="form-control" type="text" name="username" placeholder="Username">
                    </div>
                    <div class="col-1"></div>
                </div>
                <div class="row mt-2">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <input class="form-control" type="password" name="password" placeholder="Password">
                    </div>
                    <div class="col-1"></div>
                </div>
                <div class="row mt-2 mb-3">
                    <div class="col-5"></div>
                    <div class="col-2">
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-outline-success" type="submit">LOGIN</button>
                        </div>
                    </div>
                    <div class="col-5"></div>
                </div>
            </form>
        </div>
    </div>
@endsection
