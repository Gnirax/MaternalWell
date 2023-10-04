@extends('Maternal.layout')
@section('content')
    @if (Auth::user()->role == 'Admin')
        <div class="d-flex justify-content-end">
            <a href={{ url()->previous() }}>
                <button class="btn btn-primary" style="width:78px; height: 40px; margin-bottom: 10px;">
                    <p style="font-size: 18px;">
                        <i class="fas fa-angle-left"></i>
                        Back
                    </p>
                </button>
            </a>
        </div>
        <div id="admin-show" class="container shadow-lg p-3 mb-5 bg-body-tertiary rounded">
            <form>
                @csrf
                <h3 style="text-align: center">{{ $users->firstname }}'s </h3>
                <div class="row mb-2">
                    <div class="col-3">
                        <label>Full Name:</label>
                    </div>
                    <div class="col-9">
                        <input class="form-control"
                            value="{{ $users->firstname }} {{ $users->middlename }} {{ $users->surname }}" readonly>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3">
                                <label>Region:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" value="{{ $users->region }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3">
                                <label>Address:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" value="{{ $users->home_address }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4">
                                <label>Username:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control" value="{{ $users->username }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3">
                                <label>Email:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" value="{{ $users->email }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-5">
                                <label>Phone number:</label>
                            </div>
                            <div class="col-7">
                                <input class="form-control" value="{{ $users->phone_number }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3">
                                <label>Role:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" value="{{ $users->role }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3">
                                <label>Sex:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" value="{{ $users->sex }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3">
                                <label>Birthdate:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" value="{{ $users->birthdate }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-2">
                        <label>Password:</label>
                    </div>
                    <div class="col-10">
                        <input class="form-control" value="{{ $users->password }}" readonly>
                    </div>
                </div>
            </form>
        </div>
    @endif
@endsection
