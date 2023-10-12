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
    <div class="container-fluid card shadow-lg bg-body-tertiary rounded" id="profile">
        <div class="row">
            <h3 class="d-flex justify-content-center">{{ $childs->firstname }}'s Profile</h3>
            <div class="dropdown-center d-flex justify-content-end mb-1">
                <button class="btn btn-outline-primary dropdown-toggle btn-sm mb-1" data-bs-toggle="dropdown">
                    ACTIONS
                </button>
                <ul class="dropdown-menu">
                    <li class="nav-item"
                        style="margin-bottom: -15px;
                        margin-left: -10px; margin-right: -10px;">
                        <a class="nav-link" href="{{ route('consultations.create.child', $childs->id) }}">
                            <p style="text-align: center">New Consultation</p>
                        </a>
                    </li>
                    <li class="nav-item"
                        style="margin-bottom: -15px;
                    margin-left: -10px; margin-right: -10px;">
                        <a class="nav-link" href="#">
                            <p style="text-align: center">View Consultations</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <div class="row">
                    <div class="row d-flex justify-content-center">
                        <div class="col-12">
                            @if ($childs->sex == 'Female')
                                <img class="card-img mt-2" style="border-radius: 600px; width:195px; height: 195px;"
                                    src="{{ asset('img/avatar2.png') }}">
                            @else
                                <img class="card-img mt-2" style="border-radius: 600px; width:195px; height: 195px;"
                                    src="{{ asset('img/avatar.png') }}">
                            @endif
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center" style="margin-left: 19px;">
                        <div class="col-6">
                            <p style="margin-bottom: 2px; ">Weight:</p>
                            <p style="margin-bottom: 2px; ">Height:</p>
                            <p style="margin-bottom: 2px; ">Pressure:</p>
                            <p style="margin-bottom: 2px; ">BMI:</p>
                        </div>
                        <div class="col-6" id="show-list">
                            @if ($consultations != null)
                                <p style="margin-bottom: 2px; "> {{ $consultations->weight }}</p>
                                <p style="margin-bottom: 2px; "> {{ $consultations->height }}</p>
                                <p style="margin-bottom: 2px; "> {{ $consultations->pressure }}</p>
                                <p style="margin-bottom: 2px; "> {{ $consultations->BMI }}</p>
                            @else
                                <p style="margin-bottom: 2px; " class="text-center"> null </p>
                                <p style="margin-bottom: 2px; " class="text-center"> null </p>
                                <p style="margin-bottom: 2px; " class="text-center"> null </p>
                                <p style="margin-bottom: 4px; " class="text-center"> null </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-10">
                <div class="row">
                    <form>
                        @csrf
                        <ul class="nav nav-tabs justify-content-start mb-2">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#personnel">
                                    <label class="form-label">
                                        <h5>Personnel Details</h5>
                                    </label>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#father">
                                    <label class="form-label">
                                        <h5>Father's Details</h5>
                                    </label>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#emergency">
                                    <label class="form-label">
                                        <h5>Emergency Contact</h5>
                                    </label>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#medical">
                                    <label class="form-label">
                                        <h5>Medical Details</h5>
                                    </label>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#insurance">
                                    <label class="form-label">
                                        <h5>Insurance Details</h5>
                                    </label>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="personnel" class="tab-pane fade">
                                <div class="row mb-2 mt-2">
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-label">Full name:</label>
                                        </div>
                                        <div class="col-9">
                                            <input class="form-control form-control-sm"
                                                value="{{ $childs->firstname }} {{ $childs->middlename }} {{ $childs->surname }}"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <label>Birthdate:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input class="form-control form-control-sm"
                                                        value="{{ $childs->birthdate }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <label>Nationality:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input class="form-control form-control-sm"
                                                        value="{{ $childs->nationality }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <label>Mother:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input class="form-control form-control-sm"
                                                        value="{{ $mothers->firstname . '' . $mothers->surname }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <label>Preferred language:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input class="form-control form-control-sm mt-2 mb-2" type="text"
                                                        name="preferred_language" placeholder="preferred language"
                                                        value="{{ $childs->preferred_language }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <label>Region:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input class="form-control form-control-sm"
                                                        value="{{ $childs->region }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <label>Home address:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input class="form-control form-control-sm"
                                                        value="{{ $childs->home_address }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="father" class="tab-pane fade">
                                <div class="row mb-2 mt-2">
                                    <div class="row mb-2">
                                        <div class="col-5">
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <label>Name:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input class="form-control form-control-sm"
                                                        value="{{ $childs->fathers_name }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <label>Nationality:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input class="form-control form-control-sm"
                                                        value="{{ $childs->fathers_nationality }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5">
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <label>Region:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input class="form-control form-control-sm"
                                                        value="{{ $childs->fathers_region }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <label>Home address:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input class="form-control form-control-sm"
                                                        value="{{ $childs->fathers_home_address }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5">
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <label>Email:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input class="form-control form-control-sm"
                                                        value="{{ $childs->fathers_email }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <label>Phone Number:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input class="form-control form-control-sm"
                                                        value="{{ $childs->fathers_phone_number }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="emergency" class="tab-pane fade">
                                <div class="row mb-2 mt-2">
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <label>Name:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input class="form-control form-control-sm"
                                                        value="{{ $childs->emergency_contact_name }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <label>Relationship:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input class="form-control form-control-sm"
                                                        value="{{ $childs->relationship_with_patient }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <label>Phone Number:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input class="form-control form-control-sm"
                                                        value="{{ $childs->emergency_contact_number }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <label>Home address:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input class="form-control form-control-sm"
                                                        value="{{ $childs->emergency_contact_home_address }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="medical" class="tab-pane fade">
                                <div class="row mb-2 mt-2">
                                    <div class="row mb-2">
                                        <div class="col-4">
                                            <div class="row mb-2">
                                                <div class="col-4">
                                                    <label>Allergies:</label>
                                                </div>
                                                <div class="col-8">
                                                    <input class="form-control form-control-sm mt-2" type="text"
                                                        name="allergies" placeholder="Allergies"
                                                        value="{{ $childs->allergies }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="row mb-2">
                                                <div class="col-5">
                                                    <label>Current Medications:</label>
                                                </div>
                                                <div class="col-7">
                                                    <input class="form-control form-control-sm mt-2" type="text"
                                                        name="current_medication" placeholder="Any current medications.."
                                                        value="{{ $childs->current_medication }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-4">
                                            <div class="row mb-2">
                                                <div class="col-9">
                                                    <label>Previous Surgeries:</label>
                                                </div>
                                                <div class="col-3">
                                                    <input class="form-control form-control-sm" style="width: 55px;"
                                                        type="text" name="previous_surgeries"
                                                        placeholder="Previous Surgeries"
                                                        value="{{ $childs->previous_surgeries }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="row mb-2">
                                                <div class="col-5">
                                                    <label>Chronic-medical Condition:</label>
                                                </div>
                                                <div class="col-7">
                                                    <input class="form-control form-control-sm mt-2" type="text"
                                                        name="chronic_medical_condition"
                                                        placeholder="Any chronic medical condition"
                                                        value="{{ $childs->chronic_medical_condition }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12">
                                            <div class="row mb-2">
                                                <div class="col-4">
                                                    <label>Family history of medical conditions:</label>
                                                </div>
                                                <div class="col-8">
                                                    <input class="form-control form-control-sm mt-2" type="text"
                                                        name="family_history_of_medical_condition"
                                                        placeholder="Family history of medical conditions"
                                                        value="{{ $childs->family_history_of_medical_conditions }}"
                                                        readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="insurance" class="tab-pane fade">
                                <div class="row mb-2 mt-2">
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="row mb-2">
                                                <div class="col-5">
                                                    <label>Insurance provider:</label>
                                                </div>
                                                <div class="col-7">
                                                    <input class="form-control form-control-sm mt-2" type="text"
                                                        name="insurance_provider" placeholder="Insurance provider"
                                                        value="{{ $childs->insurance_provider }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row mb-2">
                                                <div class="col-5">
                                                    <label>Phone number:</label>
                                                </div>
                                                <div class="col-7">
                                                    <input class="form-control form-control-sm mt-2" type="tel"
                                                        name="insurance_phone_number" placeholder="Insurance phone number"
                                                        value="{{ $childs->insurance_phone_number }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="row mb-2">
                                                <div class="col-5">
                                                    <label>Member number:</label>
                                                </div>
                                                <div class="col-7">
                                                    <input class="form-control form-control-sm mt-2 mb-2" type="text"
                                                        name="member_number" placeholder="Member number"
                                                        value="{{ $childs->member_number }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row mb-2">
                                                <div class="col-5">
                                                    <label>Group number:</label>
                                                </div>
                                                <div class="col-7">
                                                    <input class="form-control form-control-sm mt-2 mb-2" type="text"
                                                        name="group_number" placeholder="Group number"
                                                        value="{{ $childs->group_number }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
