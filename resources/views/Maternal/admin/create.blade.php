@extends('Maternal.layout')
@section('content')
    @if (Auth::user()->role == 'Admin')
        <div id="admin-register" class="container shadow-lg p-3 mb-5 bg-body-tertiary rounded">
            <form method="POST" action="{{ route('store') }}">
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
                <h2 style="text-align: center">CREATE USER</h2>
                <div class="row mb-2">
                    <div class="col-3">
                        <label>Full-Name:</label>
                    </div>
                    <div class="col-3">
                        <input class="form-control" type="text" name="firstname" placeholder="First Name">
                    </div>
                    <div class="col-3">
                        <input class="form-control" type="text" name="middlename" placeholder="Middle Name">
                    </div>
                    <div class="col-3">
                        <input class="form-control" type="text" name="surname" placeholder="Surname">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3">
                                <label>Region:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="text" name="region" placeholder="Region">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3">
                                <label>Address:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="text" name="address"
                                    placeholder="District/Street/House No.">
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
                                <input class="form-control" type="text" name="username" placeholder="Username">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3">
                                <label>Email:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="email" name="email" placeholder="Email">
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
                                <input class="form-control" type="tel" name="phone_number" placeholder="Phone number">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3">
                                <label>Role:</label>
                            </div>
                            <div class="col-9">
                                <select name="role" class="form-control form-select form-select-sm">
                                    <option value="Doctor">Doctor</option>
                                    <option value="Nurse">Nurse</option>
                                    <option value="Patient">Patient</option>
                                    <option value="Admin">Admin</option>
                                </select>
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
                                <label>Birthdate:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="date" name="birthdate">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-2">
                                <label>Password:</label>
                            </div>
                            <div class="col-10">
                                <input class="form-control" type="password" name="password" placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-2">
                                <label>Retype-Password:</label>
                            </div>
                            <div class="col-10">
                                <input class="form-control" type="password" name="confirm"
                                    placeholder="Retype Password">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5"></div>
                    <div class="col-2">
                        <div class="justify-content-center">
                            <button class="btn btn-outline-success" type="submit">SAVE</button>
                        </div>
                    </div>
                    <div class="col-5"></div>
                </div>
            </form>
        </div>
    @endif
@endsection
