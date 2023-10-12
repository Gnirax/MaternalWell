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
            <h3 class="d-flex justify-content-center">{{ $mothers->firstname }}'s Profile</h3>
            <div class="dropdown-center d-flex justify-content-end">
                <button class="btn btn-outline-primary dropdown-toggle btn-sm mb-1" data-bs-toggle="dropdown">
                    ACTIONS
                </button>
                <ul class="dropdown-menu">
                    <li class="nav-item"
                        style="margin-bottom: -15px;
                        margin-left: -10px; margin-right: -10px;">
                        <a class="nav-link" href="{{ route('consultations.create.mother', $mothers->id) }}">
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
                    <li class="nav-item"
                        style="margin-bottom: -15px;
                    margin-left: -10px; margin-right: -10px;">
                        <a class="nav-link" href="{{ route('childs.create', $mothers->id) }}">
                            <p style="text-align: center">Add Child</p>
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
                            <img class="card-img mt-2" style="border-radius: 600px; width:195px; height: 195px;"
                                src="{{ asset('img/avatar2.png') }}">
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
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#personnel">
                                    <label class="form-label">
                                        <h5>Personnel Details</h5>
                                    </label>
                                </a></li>
                            @if ($mothers->marital_status == 'Married')
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#husband">
                                        <label class="form-label">
                                            <h5>Husband Details</h5>
                                        </label>
                                    </a></li>
                            @endif
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#emergency">
                                    <label class="form-label">
                                        <h5>Emergency Contact</h5>
                                    </label>
                                </a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#pregnancy">
                                    <label class="form-label">
                                        <h5>Pregnancy Details</h5>
                                    </label>
                                </a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#medical">
                                    <label class="form-label">
                                        <h5>Medical Details</h5>
                                    </label>
                                </a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#insurance">
                                    <label class="form-label">
                                        <h5>Insurance Details</h5>
                                    </label>
                                </a></li>
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
                                                value="{{ $mothers->firstname }} {{ $mothers->middlename }} {{ $mothers->surname }}"
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
                                                        value="{{ $mothers->birthdate }}" readonly>
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
                                                        value="{{ $mothers->nationality }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <label>Marital status:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input class="form-control form-control-sm"
                                                        value="{{ $mothers->marital_status }}" readonly>
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
                                                        value="{{ $mothers->preferred_language }}" readonly>
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
                                                        value="{{ $mothers->region }}" readonly>
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
                                                        value="{{ $mothers->home_address }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <label>Email:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input class="form-control form-control-sm"
                                                        value="{{ $mothers->email }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row mb-2">
                                                <div class="col-5">
                                                    <label>Phone number:</label>
                                                </div>
                                                <div class="col-7">
                                                    <input class="form-control form-control-sm"
                                                        value="{{ $mothers->phone_number }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="husband" class="tab-pane fade">
                                <div class="row mb-2 mt-2">
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <label>Name:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input class="form-control form-control-sm"
                                                        value="{{ $mothers->husbands_name }}" readonly>
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
                                                        value="{{ $mothers->husbands_nationality }}" readonly>
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
                                                        value="{{ $mothers->husbands_region }}" readonly>
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
                                                        value="{{ $mothers->husbands_home_address }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <label>Email:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input class="form-control form-control-sm"
                                                        value="{{ $mothers->husbands_email }}" readonly>
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
                                                        value="{{ $mothers->husbands_phone_number }}" readonly>
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
                                                        value="{{ $mothers->emergency_contact_name }}" readonly>
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
                                                        value="{{ $mothers->relationship_with_patient }}" readonly>
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
                                                        value="{{ $mothers->emergency_contact_number }}" readonly>
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
                                                        value="{{ $mothers->emergency_contact_home_address }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="pregnancy" class="tab-pane fade">
                                <div class="row mb-2 mt-2">
                                    <div class="row mb-2">
                                        <div class="col-5">
                                            <div class="row mb-2">
                                                <div class="col-5">
                                                    <label>Due date:</label>
                                                </div>
                                                <div class="col-7">
                                                    <input class="form-control form-control-sm"
                                                        value="{{ $pregnancy->estimated_due_date }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row mb-2">
                                                <div class="col-6">
                                                    <label>Last Menstrual period:</label>
                                                </div>
                                                <div class="col-6">
                                                    <input class="form-control form-control-sm"
                                                        value="{{ $pregnancy->last_menstrual_period }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-4">
                                            <div class="row mb-2">
                                                <div class="col-9">
                                                    <label>Pregnancies:</label>
                                                </div>
                                                <div class="col-3">
                                                    <input class="form-control form-control-sm" style="width: 55px;"
                                                        value="{{ $mothers->number_of_previous_pregnancies }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="row mb-2">
                                                <div class="col-9">
                                                    <label>live-births:</label>
                                                </div>
                                                <div class="col-3">
                                                    <input class="form-control form-control-sm" style="width: 55px;"
                                                        value="{{ $mothers->number_of_previous_live_births }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="row mb-2">
                                                <div class="col-9">
                                                    <label>Miscarriages:</label>
                                                </div>
                                                <div class="col-3">
                                                    <input class="form-control form-control-sm" style="width: 55px;"
                                                        value="{{ $mothers->number_of_previous_miscarriages }}" readonly>
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
                                                        value="{{ $mothers->allergies }}" readonly>
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
                                                        value="{{ $mothers->current_medication }}" readonly>
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
                                                        value="{{ $mothers->previous_surgeries }}" readonly>
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
                                                        value="{{ $mothers->chronic_medical_condition }}" readonly>
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
                                                        value="{{ $mothers->family_history_of_medical_conditions }}"
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
                                                        value="{{ $mothers->insurance_provider }}" readonly>
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
                                                        value="{{ $mothers->insurance_phone_number }}" readonly>
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
                                                        value="{{ $mothers->member_number }}" readonly>
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
                                                        value="{{ $mothers->group_number }}" readonly>
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
