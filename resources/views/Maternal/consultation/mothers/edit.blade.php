@extends('Maternal.layout')
@section('content')
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
    <div id="consultation_edit" class="container card shadow-lg bg-body-tertiary rounded mb-4 mt-4">
        <form class="row" method="POST" action="{{ route('consultations.update', $consultations->id) }}">
            @csrf
            @method('PUT')
            @if (Auth::user()->role == 'Nurse')
                <h2 style="text-align: center">{{ $mothers->firstname }}'s CONSULTATION</h2>
                <div class="row mb-4 mt-2">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label mt-2">Date:</label>
                            </div>
                            <div class="col-9">
                                <input type="date" class="form-control" name="date" value="{{ $consultations->date }}"
                                    readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label mt-2">Doctor:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="text" name="doctors_id"
                                    value="{{ $doctors->firstname }} {{ $doctors->surname }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4 mt-2">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label mt-2">Weight:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" name="weight" placeholder="in kg">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label mt-2">Height:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" name="height" placeholder="in cm">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4 mt-2">
                    <div class="col-2"></div>
                    <div class="col-3">
                        <label class="form-label">Pressure :</label>
                    </div>
                    <div class="col-2">
                        <input class="form-control" name="systolic" placeholder="Systolic">
                    </div>
                    <div class="col-2">
                        <input class="form-control" name="diastolic" placeholder="Diastolic">
                    </div>
                    <div class="col-2"></div>
                </div>
                <div class="row">
                    <div class="col-5"></div>
                    <div class="col-2">
                        <button class="btn btn-outline-success btn-sm d-flex justify-content-center"
                            type="submit">SAVE</button>
                    </div>
                    <div class="col-5"></div>
                </div>
            @elseif (Auth::user()->role == 'Admin')
                <h2 style="text-align: center" class="mt-4">EDIT CONSULTATION</h2>
                <div class="row mb-4 mt-2">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label mt-2">Date:</label>
                            </div>
                            <div class="col-9">
                                <input type="date" class="form-control" name="date"
                                    value="{{ $consultations->date }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label mt-2">Doctor:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="text" name="doctors_id"
                                    value="{{ $doctors->firstname }} {{ $doctors->surname }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4 mt-2">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label mt-2">Weight:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" name="weight" type="number" placeholder="in kg">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label mt-2">Height:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" name="height" type="number" placeholder="in cm">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4 mt-2">
                    <div class="col-2"></div>
                    <div class="col-3">
                        <label class="form-label">Pressure :</label>
                    </div>
                    <div class="col-2">
                        <input class="form-control" name="systolic" type="number" placeholder="Systolic">
                    </div>
                    <div class="col-2">
                        <input class="form-control" name="diastolic" type="number" placeholder="Diastolic">
                    </div>
                    <div class="col-2"></div>
                </div>
                <div class="row">
                    <div class="col-5"></div>
                    <div class="col-2">
                        <button class="btn btn-outline-success btn-sm d-flex justify-content-center"
                            type="submit">UPDATE</button>
                    </div>
                    <div class="col-5"></div>
                </div>
            @else
                <h2 style="text-align: center">NOT AUTHORISED TO YOU</h2>
            @endif
        </form>
    </div>
@endsection
