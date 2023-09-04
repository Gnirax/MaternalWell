@extends('Maternal.layout')
@section('content')
@if (Auth::user()->role == 'Admin')
    <div id="admin-register" class="container shadow-lg p-3 mb-5 bg-body-tertiary rounded">
            <form method="POST" action="{{ route('create') }}">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div id="top_register">
                    <h2 style="text-align: center">REGISTRATION FORM</h2>
                    <div class="row">
                        <div class="col-4">
                            <input class="form-control" type="text" name="firstname" placeholder="First Name">
                        </div>
                        <div class="col-4">
                            <input class="form-control" type="text" name="middlename" placeholder="Middle Name">
                        </div>
                        <div class="col-4">
                            <input class="form-control" type="text" name="surname" placeholder="Surname">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <input class="form-control" type="text" name="region" placeholder="Region">
                        </div>
                        <div class="col-6">
                            <input class="form-control" type="text" name="address"
                                placeholder="District/Street/House No.">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <input class="form-control" type="text" name="username" placeholder="Username">
                        </div>
                        <div class="col-6">
                            <input class="form-control" type="email" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label">Phone number:</label>
                            <input class="form-control" type="tel" name="phone_number" placeholder="Phone number">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Role:</label>
                            <select name="role" class="form-control form-select form-select-sm">
                                <option value="Doctor">Doctor</option>
                                <option value="Nurse">Nurse</option>
                                <option value="Patient">Patient</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <input class="form-control" type="password" name="password" placeholder="Password">
                        </div>
                        <div class="col-6">
                            <input class="form-control" type="password" name="confirm" placeholder="Retype Password">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Sex:</label>
                            </div>
                            <div class="col-9">
                                <select name="sex" class="form-control form-select form-select-sm">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Birthdate:</label><br>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="date" name="birthdate">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <button class="btn btn-outline-success btn-sm mb-3" type="submit">REGISTER</button>
                </div>
            </form>
    </div>
@endif
@endsection
