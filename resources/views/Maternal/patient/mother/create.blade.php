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
    <form id="regForm" class="container shadow-lg bg-body-tertiary rounded" action="{{ route('mothers.store') }}"
        method="POST">
        @csrf
        <h3 style="text-align: center">MOTHER-PATIENT REGISTRATION FORM</h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="tab">
            <div class="row">
                <div class="col-12">
                    <label class="form-label">
                        <h5>Personnel Details:</h5>
                    </label>
                </div>
                <div class="row mb-1">
                    <label class="form-label">Full name:</label>
                    <div class="col-4">
                        <input class="form-control" type="text" name="firstname" placeholder="First Name">
                    </div>
                    <div class="col-4">
                        <input class="form-control" type="text" name="middlename" placeholder="Middle Name">
                    </div>
                    <div class="col-4">
                        <input class="form-control" type="text" name="surname" placeholder="Surname">
                        <input type="hidden" name="sex" value="Female">
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-6">
                        <label class="form-label">Birthdate:</label>
                        <input class="form-control" type="date" name="birthdate">
                    </div>
                    <div class="col-6">
                        <label class="form-label">Nationality:</label>
                        <input class="form-control" type="text" name="nationality" placeholder="e.g. Tanzanian">
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-6">
                        <label class="form-label">Marital status:</label>
                        <select name="marital_status" id="marital" class="form-control form-select form-select-sm">
                            <option value="Married">Married</option>
                            <option value="Single">Single</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label">Region:</label>
                                <input class="form-control" type="text" name="region" placeholder="e.g Dar es Salaam">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Home address:</label>
                                <input class="form-control" type="text" name="home_address"
                                    placeholder="District/Street/House No.">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label class="form-label">Email:</label>
                        <input class="form-control" type="email" name="email" placeholder="someone@something.com">
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label">Phone Number:</label>
                            <input class="form-control" type="tel" name="phone_number" placeholder="+255755757575">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab">
            <div class="row" id="husbandinfo" style="display: none">
                <div class="col-12">
                    <label class="form-label">
                        <h5>Husband's Information:</h5>
                    </label>
                </div>
                <div class="row mb-1">
                    <div class="col-6">
                        <label class="form-label">Name:</label>
                        <input class="form-control" type="text" name="husbands_name"
                            placeholder="e.g Natsu Dragneel Heartfilia">
                    </div>
                    <div class="col-6">
                        <label class="form-label">Nationality:</label>
                        <input class="form-control" type="text" name="husbands_nationality"
                            placeholder="e.g Tanzanian">
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-6">
                        <label class="form-label">Region:</label>
                        <input class="form-control" type="text" name="husbands_region"
                            placeholder="e.g Dar es Salaam">
                    </div>
                    <div class="col-6">
                        <label class="form-label">Address:</label>
                        <input class="form-control" type="text" name="husbands_home_address"
                            placeholder="District/Street/House no.">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label class="form-label">Email:</label>
                        <input class="form-control" type="text" name="husbands_email"
                            placeholder="someone@something.com">
                    </div>
                    <div class="col-6">
                        <label class="form-label">Phone Number:</label>
                        <input class="form-control" type="tel" name="husbands_phone_number"
                            placeholder="+255755757575">
                    </div>
                </div>
            </div>
        </div>
        <div class="tab">
            <div class="row">
                <div class="col-12">
                    <label class="form-label">
                        <h5>Emergency Contact Information:</h5>
                    </label>
                </div>
                <div class="row mb-1">
                    <div class="col-6">
                        <label class="form-label">Name:</label>
                        <input class="form-control" type="text" name="emergency_contact_name"
                            placeholder="Firstname Middlename Surname">
                    </div>
                    <div class="col-6">
                        <label class="form-label">Relationship:</label>
                        <input class="form-control" type="text" name="relationship_with_patient"
                            placeholder="Father,Sister and ...">
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-6">
                        <label class="form-label">Phone Number:</label>
                        <input class="form-control" type="tel" name="emergency_contact_number"
                            placeholder="+255757575757">
                    </div>
                    <div class="col-6">
                        <label class="form-label">Home address</label>
                        <input class="form-control" type="text" name="emergency_contact_home_address"
                            placeholder="Emergency Contact number">
                    </div>
                </div>
            </div>
        </div>
        <div class="tab">
            <div class="col-12">
                <label class="form-label">
                    <h5>Pregnancy History:</h5>
                </label>
            </div>
            <div class="row">
                <div class="col-6">
                    <label class="form-label">Estimated Due Date:</label>
                    <input class="form-control" type="date" name="estimated_due_date">
                </div>
                <div class="col-6">
                    <label class="form-label ">Last Menstrual Period:</label>
                    <input class="form-control" type="date" name="last_menstrual_period">
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label class="form-label">Previous pregnancies:</label>
                    <input class="form-control" id="number" type="number" name="number_of_previous_pregnancies">
                </div>
                <div class="col-4">
                    <label class="form-label">Previous live births:</label>
                    <input class="form-control" id="number" type="number" name="number_of_previous_live_births">
                </div>
                <div class="col-4">
                    <label class="form-label ">Previous miscarriages:</label>
                    <input class="form-control" id="number" type="number" name="number_of_previous_miscarriages">
                </div>
            </div>
        </div>
        <div class="tab">
            <div class="row">
                <div class="col-12">
                    <label class="form-label">
                        <h5>Medical Information:</h5>
                    </label>
                </div>
                <div class="row">
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label">Allergies:</label>
                            <input class="form-control" type="text" name="allergies"
                                placeholder="like Sulphur and the like..">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Chronic Medical condiition:</label>
                            <input class="form-control" type="text" name="chronic_medical_condition"
                                placeholder="Any chronic medical condition">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label">Current Medication:</label>
                            <input class="form-control" type="text" name="current_medication"
                                placeholder="Any current medications..">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Previous surgeries</label>
                            <input class="form-control" type="number" name="previous_surgeries">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label class="form-label">Family history of medical conditions:</label>
                        <input class="form-control" type="text" name="family_history_of_medical_conditions"
                            placeholder="like Diabetes and the like">
                    </div>
                </div>
            </div>
        </div>
        <div class="tab">
            <div class="row">
                <div class="col-12">
                    <label class="form-label">
                        <h5>Insurance Information:</h5>
                    </label>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label class="form-label">Insurance provider:</label>
                        <input class="form-control mt-2" type="text" name="insurance_provider"
                            placeholder="Strategies,Jubilee,....">
                    </div>
                    <div class="col-6">
                        <label class="form-label">Insurance phone number:</label>
                        <input class="form-control mt-2" type="tel" name="insurance_phone_number"
                            placeholder="+25506060606">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label class="form-label">Member number:</label>
                        <input class="form-control mt-2" type="text" name="member_number" placeholder="22-222-22">
                    </div>
                    <div class="col-4">
                        <label class="form-label">Group number:</label>
                        <input class="form-control mt-2" type="text" name="group_number" placeholder="33-33-33">
                    </div>
                    <div class="col-4">
                        <label class="form-label">Preferred language:</label>
                        <input class="form-control mt-2" type="text" name="preferred_language"
                            placeholder="English,Germany,....">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3" style="overflow: auto;">
            <div class="col-3">
                <div class="d-flex justify-content-start">
                    <button id="prev" class="btn btn-outline-primary" onclick="nextPrev(-1)">Previous</button>
                </div>
            </div>
            <div class="col-6">
                <div style="text-align:center;margin-top:40px;">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                </div>
            </div>
            <div class="col-3">
                <div class="d-flex justify-content-end">
                    <button id="next" class="btn btn-outline-primary" onclick="nextPrev(1)">Next</button>
                </div>
            </div>
        </div>
    </form>
@endsection
