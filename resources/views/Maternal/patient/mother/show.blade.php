@extends('Maternal.layout')
@section('content')
    <div class="container-fluid shadow-lg bg-body-tertiary rounded mb-2">
        <div class="card mb-2">
            <div class="row g-0">
                <div class="col-md-3">
                    <div class="row">
                        <img class="card-img" src="{{ asset('img/avatar2.png') }}">
                        <div class="col-10">
                            <a class="nav-link" href="{{ route('consultations.create.mother', $mothers->id) }}">New
                                Consultation</a>
                            <a class="nav-link" href="#">Medical History</a>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
                <div class="col-md-9">
                    <form>
                        @csrf
                        <h2 style="text-align: center">{{ $mothers->firstname }}'s Profile</h2>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <ul class="nav nav-tabs justify-content-start mb-2">
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#personnel">
                                    <label class="form-label">
                                        <h5>Personnel Details</h5>
                                    </label>
                            </a></li>
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
                                    <h5>Medical history</h5>
                                </label>
                            </a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#insurance">
                                <label class="form-label">
                                    <h5>Insurance Information</h5>
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
                                            <input class="form-control"
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
                                                    <input class="form-control" value="{{ $mothers->birthdate }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row mb-2">
                                                <div class="col-5">
                                                    <label>Phone number:</label>
                                                </div>
                                                <div class="col-7">
                                                    <input class="form-control" value="{{ $mothers->phone_number }}"
                                                        readonly>
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
                                                    <input class="form-control" value="{{ $mothers->region }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <label>Address:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input class="form-control" value="{{ $mothers->address }}" readonly>
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
                                                    <input class="form-control" value="{{ $mothers->email }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <label>Preferred language:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input class="form-control mt-2 mb-2" type="text"
                                                        name="preferred_language" placeholder="preferred language"
                                                        value="{{ $mothers->preferred_language }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="emergency" class="tab-pane fade">
                                <div class="row mb-2 mt-2">
                                    <div class="row mb-2">
                                        <div class="col-5">
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <label>Name:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input class="form-control"
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
                                                    <input class="form-control"
                                                        value="{{ $mothers->relationship_with_patient }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5">
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <label>Contact:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input class="form-control"
                                                        value="{{ $mothers->emergency_contact_number }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <label>Address:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input class="form-control" value="" readonly>
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
                                                <div class="col-6">
                                                    <input class="form-control"
                                                        value="{{ $mothers->estimated_due_date }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row mb-2">
                                                <div class="col-6">
                                                    <label>Last Menstrual period:</label>
                                                </div>
                                                <div class="col-6">
                                                    <input class="form-control"
                                                        value="{{ $mothers->last_menstrual_period }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-4">
                                            <div class="row mb-2">
                                                <div class="col-8">
                                                    <label>Pregnancies:</label>
                                                </div>
                                                <div class="col-3">
                                                    <input class="form-control" style="width: 55px;"
                                                        value="{{ $mothers->number_of_previous_pregnancies }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="row mb-2">
                                                <div class="col-8">
                                                    <label>live-births:</label>
                                                </div>
                                                <div class="col-3">
                                                    <input class="form-control" style="width: 55px;"
                                                        value="{{ $mothers->number_of_previous_live_births }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="row mb-2">
                                                <div class="col-8">
                                                    <label>Miscarriages:</label>
                                                </div>
                                                <div class="col-3">
                                                    <input class="form-control" style="width: 55px;"
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
                                                    <input class="form-control mt-2" type="text" name="allergies"
                                                        placeholder="Allergies" value="{{ $mothers->allergies }}"
                                                        readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="row mb-2">
                                                <div class="col-5">
                                                    <label>Current Medications:</label>
                                                </div>
                                                <div class="col-7">
                                                    <input class="form-control mt-2" type="text"
                                                        name="current_medication" placeholder="Any current medications.."
                                                        value="{{ $mothers->current_medication }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-8">
                                            <div class="row mb-2">
                                                <div class="col-5">
                                                    <label>Chronic-medical Condition:</label>
                                                </div>
                                                <div class="col-7">
                                                    <input class="form-control mt-2" type="text"
                                                        name="chronic_medical_condition"
                                                        placeholder="Any chronic medical condition"
                                                        value="{{ $mothers->chronic_medical_condition }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="row mb-2">
                                                <div class="col-8">
                                                    <label>Previous Surgeries:</label>
                                                </div>
                                                <div class="col-3">
                                                    <input class="form-control" style="width: 55px;" type="text"
                                                        name="previous_surgeries" placeholder="Previous Surgeries"
                                                        value="{{ $mothers->previous_surgeries }}" readonly>
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
                                                <div class="col-7">
                                                    <input class="form-control mt-2" type="text"
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
                                                <div class="col-4">
                                                    <label>Insurance provider:</label>
                                                </div>
                                                <div class="col-7">
                                                    <input class="form-control mt-2" type="text"
                                                        name="insurance_provider" placeholder="Insurance provider"
                                                        value="{{ $mothers->insurance_provider }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="row mb-2">
                                                <div class="col-5">
                                                    <label>Phone number:</label>
                                                </div>
                                                <div class="col-7">
                                                    <input class="form-control mt-2" type="tel"
                                                        name="insurance_phone_number" placeholder="Insurance phone number"
                                                        value="{{ $mothers->insurance_phone_number }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5">
                                            <div class="row mb-2">
                                                <div class="col-5">
                                                    <label>Member number:</label>
                                                </div>
                                                <div class="col-7">
                                                    <input class="form-control mt-2 mb-2" type="text"
                                                        name="member_number" placeholder="Member number"
                                                        value="{{ $mothers->member_number }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="row mb-2">
                                                <div class="col-5">
                                                    <label>Group number:</label>
                                                </div>
                                                <div class="col-7">
                                                    <input class="form-control mt-2 mb-2" type="text"
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
    </div>
@endsection
